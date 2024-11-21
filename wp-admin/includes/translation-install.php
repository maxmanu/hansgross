<?php
/**
 * ClassicPress Translation Installation Administration API
 *
 * @package ClassicPress
 * @subpackage Administration
 */


/**
 * Retrieve translations from WordPress Translation API.
 *
 * @since 4.0.0
 *
 * @param string       $type Type of translations. Accepts 'plugins', 'themes', 'core'.
 * @param array|object $args Translation API arguments. Optional.
 * @return array|WP_Error On success an associative array of translations, WP_Error on failure.
 */
function translations_api( $type, $args = null ) {
	// Include an unmodified $wp_version.
	require ABSPATH . WPINC . '/version.php';

	if ( ! in_array( $type, array( 'plugins', 'themes', 'core' ), true ) ) {
		return new WP_Error( 'invalid_type', __( 'Invalid translation type.' ) );
	}

	/**
	 * Allows a plugin to override the WordPress.org Translation Installation API entirely.
	 *
	 * @since 4.0.0
	 *
	 * @param false|array $result The result array. Default false.
	 * @param string      $type   The type of translations being requested.
	 * @param object      $args   Translation API arguments.
	 */
	$res = apply_filters( 'translations_api', false, $type, $args );

	if ( false === $res ) {
		$stats   = array(
			'locale'  => get_locale(),
			'version' => $args['version'], // Version of plugin, theme or core
		);
		$options = array(
			'timeout' => 3,
			'method'  => 'POST',
		);
		if ( 'core' === $type ) {
			// Get ClassicPress core translations from the ClassicPress.net API.
			$stats['cp_version'] = $cp_version;
			$options['method']   = 'GET';
			$url                 = add_query_arg(
				$stats,
				'https://api-v1.classicpress.net/translations/core/2.0.0/translations.json'
			);
			$request             = wp_remote_request( $url, $options );
		} else {
			// Get plugin and theme translations from the WP.org API.
			$stats['wp_version']     = $wp_version;
			$options['body']         = $stats;
			$options['body']['slug'] = $args['slug']; // Plugin or theme slug
			$url                     = 'https://api.wordpress.org/translations/' . $type . '/1.0/';
			$request                 = wp_remote_request( $url, $options );
		}

		if ( is_wp_error( $request ) ) {
			trigger_error(
				sprintf(
					/* translators: %s: support forums URL */
					__( 'An unexpected error occurred. Something may be wrong with WordPress.org, ClassicPress.net or this server&#8217;s configuration. If you continue to have problems, please try the <a href="%s">support forums</a>.' ),
					__( 'https://forums.classicpress.net/c/support' )
				) . ' ' . __( '(ClassicPress could not establish a secure connection to ClassicPress.net. Please contact your server administrator.)' ),
				headers_sent() || WP_DEBUG ? E_USER_WARNING : E_USER_NOTICE
			);

			// Retry request
			$request = wp_remote_request( $url, $options );
		}

		if ( is_wp_error( $request ) ) {
			$res = new WP_Error(
				'translations_api_failed',
				sprintf(
					/* translators: %s: Support forums URL. */
					__( 'An unexpected error occurred. Something may be wrong with WordPress.org, ClassicPress.net or this server&#8217;s configuration. If you continue to have problems, please try the <a href="%s">support forums</a>.' ),
					__( 'https://wordpress.org/support/forums/' )
				),
				$request->get_error_message()
			);
		} else {
			$res = json_decode( wp_remote_retrieve_body( $request ), true );
			if ( ! is_object( $res ) && ! is_array( $res ) ) {
				$res = new WP_Error(
					'translations_api_failed',
					sprintf(
						/* translators: %s: Support forums URL. */
						__( 'An unexpected error occurred. Something may be wrong with WordPress.org, ClassicPress.net or this server&#8217;s configuration. If you continue to have problems, please try the <a href="%s">support forums</a>.' ),
						__( 'https://wordpress.org/support/forums/' )
					),
					wp_remote_retrieve_body( $request )
				);
			}
		}
	}

	/**
	 * Filters the Translation Installation API response results.
	 *
	 * @since 4.0.0
	 *
	 * @param array|WP_Error $res  Response as an associative array or WP_Error.
	 * @param string         $type The type of translations being requested.
	 * @param object         $args Translation API arguments.
	 */
	return apply_filters( 'translations_api_result', $res, $type, $args );
}

/**
 * Get available translations from the ClassicPress.net API.
 *
 * @since 4.0.0
 *
 * @see translations_api()
 *
 * @return array[] Array of translations, each an array of data, keyed by the language. If the API response results
 *                 in an error, an empty array will be returned.
 */
function wp_get_available_translations() {
	if ( ! wp_installing() ) {
		$translations = get_site_transient( 'available_translations' );
		if ( false !== $translations ) {
			return $translations;
		}
	}

	// Include an unmodified $wp_version.
	require ABSPATH . WPINC . '/version.php';

	$api = translations_api( 'core', array( 'version' => $wp_version ) );

	if ( is_wp_error( $api ) || empty( $api['translations'] ) ) {
		return array();
	}

	$translations = array();
	// Key the array with the language code for now.
	foreach ( $api['translations'] as $translation ) {
		$translations[ $translation['language'] ] = $translation;
	}

	if ( ! defined( 'WP_INSTALLING' ) ) {
		set_site_transient( 'available_translations', $translations, 3 * HOUR_IN_SECONDS );
	}

	return $translations;
}

/**
 * Output the select form for the language selection on the installation screen.
 *
 * @since 4.0.0
 *
 * @global string $wp_local_package Locale code of the package.
 *
 * @param array[] $languages Array of available languages (populated via the Translation API).
 */
function wp_install_language_form( $languages ) {
	global $wp_local_package;

	$installed_languages = get_available_languages();

	echo "<label class='screen-reader-text' for='language'>Select a default language</label>\n";
	echo "<select size='14' name='language' id='language'>\n";
	echo '<option value="" lang="en" selected data-continue="Continue" data-installed="1">English (United States)</option>';
	echo "\n";

	if ( ! empty( $wp_local_package ) && isset( $languages[ $wp_local_package ] ) ) {
		if ( isset( $languages[ $wp_local_package ] ) ) {
			$language = $languages[ $wp_local_package ];
			printf(
				'<option value="%s" lang="%s" data-continue="%s"%s>%s</option>' . "\n",
				esc_attr( $language['language'] ),
				esc_attr( current( $language['iso'] ) ),
				esc_attr( $language['strings']['continue'] ? $language['strings']['continue'] : 'Continue' ),
				in_array( $language['language'], $installed_languages, true ) ? ' data-installed="1"' : '',
				esc_html( $language['native_name'] )
			);

			unset( $languages[ $wp_local_package ] );
		}
	}

	foreach ( $languages as $language ) {
		printf(
			'<option value="%s" lang="%s" data-continue="%s"%s>%s</option>' . "\n",
			esc_attr( $language['language'] ),
			esc_attr( current( $language['iso'] ) ),
			esc_attr( $language['strings']['continue'] ? $language['strings']['continue'] : 'Continue' ),
			in_array( $language['language'], $installed_languages, true ) ? ' data-installed="1"' : '',
			esc_html( $language['native_name'] )
		);
	}
	echo "</select>\n";
	echo '<p class="step"><span class="spinner"></span><input id="language-continue" type="submit" class="button button-primary button-large" value="Continue"></p>';
}

/**
 * Download a language pack.
 *
 * @since 4.0.0
 * @since CP-2.1.0 Added `$force` parameter to allow updates
 *
 * @see wp_get_available_translations()
 *
 * @param string $download Language code to download.
 * @param bool   $force    Optional. If set to true, language pack will be overwritten.
 * @return string|false Returns the language code if successfully downloaded
 *                      (or already installed), or false on failure.
 */
function wp_download_language_pack( $download, $force = false ) {
	// Check if the translation is already installed.
	if ( in_array( $download, get_available_languages(), true ) && false === $force ) {
		return $download;
	}

	if ( ! wp_is_file_mod_allowed( 'download_language_pack' ) ) {
		return false;
	}

	// Confirm the translation is one we can download.
	$translations = wp_get_available_translations();
	if ( ! $translations ) {
		return false;
	}
	foreach ( $translations as $translation ) {
		if ( $translation['language'] === $download ) {
			$translation_to_load = true;
			break;
		}
	}

	if ( empty( $translation_to_load ) ) {
		return false;
	}
	$translation = (object) $translation;

	require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	$skin              = new Automatic_Upgrader_Skin();
	$upgrader          = new Language_Pack_Upgrader( $skin );
	$translation->type = 'core';
	$result            = $upgrader->upgrade( $translation, array( 'clear_update_cache' => false ) );

	if ( ! $result || is_wp_error( $result ) ) {
		return false;
	}

	return $translation->language;
}

/**
 * Check if ClassicPress has access to the filesystem without asking for
 * credentials.
 *
 * @since 4.0.0
 *
 * @return bool Returns true on success, false on failure.
 */
function wp_can_install_language_pack() {
	if ( ! wp_is_file_mod_allowed( 'can_install_language_pack' ) ) {
		return false;
	}

	require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	$skin     = new Automatic_Upgrader_Skin();
	$upgrader = new Language_Pack_Upgrader( $skin );
	$upgrader->init();

	$check = $upgrader->fs_connect( array( WP_CONTENT_DIR, WP_LANG_DIR ) );

	if ( ! $check || is_wp_error( $check ) ) {
		return false;
	}

	return true;
}

/**
 * Download new language packs after core update.
 * Called during update_core() from wp-admin/includes/update-core.php
 *
 * @since CP-2.1.0
 *
 * @return void|bool|WP_Error Returns true on success, WP_Error on failure.
 */
function maybe_upgrade_translations() {
	$languages = get_available_languages();

	// Return if no language packs currently installed
	if ( empty( $languages ) ) {
		return;
	}

	$available_languages = wp_get_available_translations();

	// Return if no language packs are available from the API
	if ( empty( $available_languages ) ) {
		return;
	}

	$result = true;
	$failed = array();

	foreach ( $languages as $language => $locale ) {
		if ( array_key_exists( $locale, $available_languages ) ) {
			$download = wp_download_language_pack( $locale, true );
			if ( $locale !== $download ) {
				$failed[] = $locale;
			}
		}
	}

	if ( ! empty( $failed ) ) {
		$result = new WP_Error(
			'language_pack_updates_failed',
			__( 'Unable to update language pack for locales' ),
			implode( ', ', $failed )
		);
	}

	return $result;
}
