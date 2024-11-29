<?php

/**
 * seed functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package seed
 */

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function seed_setup()
{
  /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on seed, use a find and replace
		* to change 'seed' to the name of your theme in all the template files.
		*/
  load_theme_textdomain('seed', get_template_directory() . '/languages');

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
  add_theme_support('title-tag');

  /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
  add_theme_support('post-thumbnails');

  // This theme uses wp_nav_menu() in one location.
  // register_nav_menus(
  //   array(
  //     'menu-1' => esc_html__('Primary', 'seed'),
  //   )
  // );

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support(
    'custom-logo',
    array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    )
  );
}
add_action('after_setup_theme', 'seed_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seed_content_width()
{
  $GLOBALS['content_width'] = apply_filters('seed_content_width', 640);
}
add_action('after_setup_theme', 'seed_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function seed_scripts()
{
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
  wp_enqueue_style('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
  wp_enqueue_style('seed-style', get_stylesheet_uri(), array(), _S_VERSION);
  wp_style_add_data('seed-style', 'rtl', 'replace');

  wp_enqueue_script('seed-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  wp_enqueue_script('jsbootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', '', '', true);
  wp_enqueue_script('jsswiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', '', '', true);
  wp_enqueue_script('jssplide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', '', '', true);
  wp_enqueue_script('fslightbox', get_template_directory_uri() . '/js/fslightbox.js', '', '', true);
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', '', '', true);
}
add_action('wp_enqueue_scripts', 'seed_scripts');

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

function remove_tags_taxonomy()
{
  unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'remove_tags_taxonomy');

// Remove comments page in menu
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});

function process_contact_form()
{
  // Verificar si es una solicitud AJAX
  if (defined('DOING_AJAX') && DOING_AJAX) {
    // Validar los datos recibidos
    if (
      isset($_POST['name'], $_POST['email'], $_POST['celular'], $_POST['message']) &&
      filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {
      $name = sanitize_text_field($_POST['name']);
      $celular = sanitize_text_field($_POST['celular']);
      $email = sanitize_email($_POST['email']);
      $message = sanitize_textarea_field($_POST['message']);

      // Enviar correo
      $to = 'maxcamina@gmail.com, info@hansgross.com.pe, info@obi.com.pe'; // Reemplaza con tu correo deseado
      $headers = ['Content-Type: text/html; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>'];
      $body = "
                <strong>Nombre:</strong> $name <br>
                <strong>Correo:</strong> $email <br>
                <strong>Celular:</strong> $celular <br>
                <strong>Mensaje:</strong> <br>$message
            ";

      if (wp_mail($to, 'Nuevo mensaje de contacto', $body, $headers)) {
        // Respuesta de éxito
        wp_send_json_success(['message' => 'Formulario enviado correctamente.']);
      } else {
        // Respuesta de error al enviar el correo
        wp_send_json_error(['message' => 'Hubo un error al enviar el correo.']);
      }
    } else {
      // Respuesta de error por validación
      wp_send_json_error(['message' => 'Los datos enviados son inválidos.']);
    }
  } else {
    // Respuesta de error (datos inválidos)
    wp_send_json_error(['message' => 'Por favor, completa todos los campos correctamente.']);
  }
  // Terminar correctamente la ejecución del script
  wp_die();
}
add_action('wp_ajax_send_contact_form', 'process_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'process_contact_form');

/**
 * Desactivar Gutemberg
 */
add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Desactivar el editor de texto en las páginas
 */
add_action('init', function () {
  remove_post_type_support('page', 'editor');
}, 99);

/**
 * Hide Metaboxes For All Post Types
 */
function hide_publish_metabox()
{
  remove_meta_box('submitdiv', 'tests_post_type', 'side');
}
add_action('do_meta_boxes', 'hide_publish_metabox');

/**
 * Remove all archive title prefixes
 */
add_filter('get_the_archive_title_prefix', '__return_false');


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/eventos-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/servicios-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/certificados-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/software-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/noticias-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/home-page-functions.php';

/**
 * RADIO BUTTONS CATEGORÍAS
 */
add_action('admin_footer', 'categoryRadioButton');
function categoryRadioButton()
{ {
    echo '<script type="text/javascript">';
    echo 'jQuery("#categorychecklist input, #categorychecklist-pop input, .cat-checklist input")';
    echo '.each(function(){this.type="radio"});</script>';
  }
}

add_action('admin_footer', 'categoryEventosRadioButton');
function categoryEventosRadioButton()
{ {
    echo '<script type="text/javascript">';
    echo 'jQuery("#categorias_eventoschecklist input, #categorias_eventoschecklist-pop input, .cat-checklist input")';
    echo '.each(function(){this.type="radio"});</script>';
  }
}


/**
 * CUSTOM FIELDS GENERICAS
 */

add_action('cmb2_admin_init', 'cmb2_custom_fields_para_paginas');

function cmb2_custom_fields_para_paginas()
{
  // Crea un nuevo meta box
  $cmb = new_cmb2_box(array(
    'id'           => 'custom_fields_paginas', // ID único para el meta box
    'title'        => 'Subtítulo de Página', // Título del meta box
    'object_types' => array('page'), // Se aplica solo a páginas
    'context'      => 'normal', // Contexto: normal, side o advanced
    'priority'     => 'high', // Prioridad: high o low
    'show_names'   => true, // Mostrar nombres de los campos
  ));

  // Agregar un campo de texto
  $cmb->add_field(array(
    'name' => 'Subtítulo', // Etiqueta del campo
    'desc' => 'Ingrese un subtítulo para la página.', // Descripción del campo
    'id'   => 'pagina_subtitulo', // ID único del campo
    'type' => 'text', // Tipo de campo (texto)
  ));
}

add_action('cmb2_admin_init', 'cmb2_custom_fields_inicio');
