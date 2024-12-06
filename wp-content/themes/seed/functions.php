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
require get_template_directory() . '/inc/servicios-functions.php';
require get_template_directory() . '/inc/certificados-functions.php';
require get_template_directory() . '/inc/software-functions.php';
require get_template_directory() . '/inc/noticias-functions.php';
require get_template_directory() . '/inc/home-page-functions.php';
require get_template_directory() . '/inc/nosotros-page-functions.php';
require get_template_directory() . '/inc/servicios-page-functions.php';
require get_template_directory() . '/inc/certificados-page-functions.php';
require get_template_directory() . '/inc/contactanos-page-functions.php';
require get_template_directory() . '/inc/blog-page-functions.php';
require get_template_directory() . '/inc/academico-page-functions.php';

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


/**
 * CUSTOM FIELDS PÁGINA DE OPCIONES
 */

add_action('cmb2_admin_init', 'mi_pagina_de_opciones');

function mi_pagina_de_opciones()
{
  // Configuración de la página de opciones
  $cmb_options = new_cmb2_box(array(
    'id'           => 'configuracion_general', // ID único
    'title'        => 'Configuración General', // Título de la página
    'object_types' => array('options-page'), // Define que es una página de opciones
    'option_key'   => 'mi_configuracion_general', // Clave para guardar las opciones
    'menu_title'   => 'Generales', // Título del menú en el admin
    'position'     => 25, // Posición en el menú de admin (25 = debajo de "Comentarios")
    'icon_url'     => 'dashicons-admin-generic', // Icono del menú
    'capability'   => 'manage_options', // Capacidad necesaria para acceder a la página
  ));

  $cmb_options->add_field(array(
    'name' => 'Logo del Sitio',
    'desc' => 'Sube un logo para el sitio web.',
    'id'   => 'logo_sitio',
    'type' => 'file', // Campo para subir archivos
  ));

  // Campo de Celular
  $cmb_options->add_field(array(
    'name' => 'Número de celular',
    'id'   => 'celular_contacto',
    'type' => 'text',
    'desc' => 'Introduce el número de Celular.',
  ));

  // Campo de Correo
  $cmb_options->add_field(array(
    'name' => 'Correo Electrónico',
    'id'   => 'correo_contacto',
    'type' => 'text_email',
    'desc' => 'Introduce el correo electrónico de contacto.',
  ));

  // Campo de Dirección
  $cmb_options->add_field(array(
    'name' => 'Dirección',
    'id'   => 'direccion_contacto',
    'type' => 'textarea_small',
    'desc' => 'Introduce la dirección de la empresa o contacto.',
  ));

  // Campo de Facebook
  $cmb_options->add_field(array(
    'name' => 'Facebook',
    'id'   => 'facebook_url',
    'type' => 'text_url',
    'desc' => 'Introduce la URL de tu página de Facebook.',
  ));

  // Campo de Instagram
  $cmb_options->add_field(array(
    'name' => 'Instagram',
    'id'   => 'instagram_url',
    'type' => 'text_url',
    'desc' => 'Introduce la URL de tu perfil de Instagram.',
  ));

  // Campo de LinkedIn
  $cmb_options->add_field(array(
    'name' => 'LinkedIn',
    'id'   => 'linkedin_url',
    'type' => 'text_url',
    'desc' => 'Introduce la URL de tu perfil de LinkedIn.',
  ));

  // Campo de WhatsApp
  $cmb_options->add_field(array(
    'name' => 'Número de WhatsApp',
    'id'   => 'whatsapp_contacto',
    'type' => 'text',
    'desc' => 'Introduce el número de WhatsApp.',
  ));

  // Texto CTA
  $cmb_options->add_field(array(
    'name' => 'Call to Action',
    'id'   => 'call_to_action',
    'type' => 'textarea',
    'desc' => 'Introduce una descripción para el call to action de la página de servicios y softwares.',
  ));

  // Imagen CTA
  $cmb_options->add_field(array(
    'name'         => 'Imagen de Call to Action',
    'desc'         => 'Sube una imagen.',
    'id'           => 'imagen_cta',
    'type'         => 'file',
    'options'      => array(
      'url' => false, // Oculta el campo de URL adicional (opcional)
    ),
    'text'         => array(
      'add_upload_file_text' => 'Añadir imagen' // Texto del botón
    ),
    'query_args' => array(
      'type' => array(
        'image/jpeg',
        'image/png',
      ),
    ),
    'preview_size' => array(300, 300), // Tamaño del preview en el administrador
  ));

  // Campo numérico para el precio en soles
  $cmb_options->add_field(array(
    'name' => __('Precio del Certificado en Soles (S/)', 'textdomain'),
    'id'   => 'precio_soles_certificado',
    'type' => 'text', // Campo para dinero
    'before_field' => 'S/ ', // Símbolo antes del campo
  ));

  // Campo numérico para el precio en dólares
  $cmb_options->add_field(array(
    'name' => __('Precio del Certificado en Dólares ($)', 'textdomain'),
    'id'   => 'precio_dolares_certificado',
    'type' => 'text', // Campo para dinero
    'before_field' => '$ ', // Símbolo antes del campo
  ));

  // Imagen del Tab Certificados
  $cmb_options->add_field(array(
    'name'         => 'Imagen referencial de Certificado',
    'desc'         => 'Sube una imagen.',
    'id'           => 'imagen_certificado',
    'type'         => 'file',
    'options'      => array(
      'url' => false, // Oculta el campo de URL adicional (opcional)
    ),
    'text'         => array(
      'add_upload_file_text' => 'Añadir imagen' // Texto del botón
    ),
    'query_args' => array(
      'type' => array(
        'image/jpeg',
        'image/png',
      ),
    ),
    'preview_size' => array(300, 300), // Tamaño del preview en el administrador
  ));
}


/**
 * PERMITIR SUBIDA DE SVG
 */
function permitir_carga_svg($mimes)
{
  // Agrega soporte para SVG
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'permitir_carga_svg');

function sanitizar_svg($file)
{
  if ($file['type'] === 'image/svg+xml') {
    $svg_content = file_get_contents($file['tmp_name']);

    // Lista blanca de etiquetas y atributos permitidos
    $allowed_tags = array(
      'svg'     => array(
        'xmlns'       => true,
        'viewBox'     => true,
        'fill'        => true,
        'stroke'      => true,
        'width'       => true,
        'height'      => true,
      ),
      'g'       => array('fill' => true, 'stroke' => true),
      'path'    => array('d' => true, 'fill' => true, 'stroke' => true),
      'rect'    => array('x' => true, 'y' => true, 'width' => true, 'height' => true, 'fill' => true),
      'circle'  => array('cx' => true, 'cy' => true, 'r' => true, 'fill' => true),
      'polygon' => array('points' => true, 'fill' => true, 'stroke' => true),
      'line'    => array('x1' => true, 'y1' => true, 'x2' => true, 'y2' => true, 'stroke' => true),
      'title'   => array(),
    );

    // Limpia el contenido del SVG
    $sanitized_content = wp_kses($svg_content, $allowed_tags);

    // Guarda el archivo sanitizado
    file_put_contents($file['tmp_name'], $sanitized_content);
  }

  return $file;
}
add_filter('wp_handle_upload_prefilter', 'sanitizar_svg');

function mostrar_svg_biblioteca_medios($response, $attachment, $meta)
{
  if ($response['type'] === 'image' && $response['subtype'] === 'svg+xml') {
    $response['sizes'] = array();
    $response['image'] = true;
    $response['type'] = 'image/svg+xml';
  }
  return $response;
}
add_filter('wp_prepare_attachment_for_js', 'mostrar_svg_biblioteca_medios', 10, 3);


/**
 * MESES DEL AÑO EN ESPAÑOL
 */

if (!function_exists('traducir_mes')) {
  /**
   * Función para traducir los nombres de los meses al español.
   *
   * @param string $fecha Fecha con el nombre del mes en inglés.
   * @return string Fecha con el nombre del mes traducido al español.
   */
  function traducir_mes($fecha)
  {
    // Array de traducción de meses al español
    $meses = array(
      'January' => 'Enero',
      'February' => 'Febrero',
      'March' => 'Marzo',
      'April' => 'Abril',
      'May' => 'Mayo',
      'June' => 'Junio',
      'July' => 'Julio',
      'August' => 'Agosto',
      'September' => 'Septiembre',
      'October' => 'Octubre',
      'November' => 'Noviembre',
      'December' => 'Diciembre'
    );

    // Reemplazar el nombre del mes en inglés por su equivalente en español
    return strtr($fecha, $meses);
  }
}


/**
 * DESACTIVAR EDITOR WYSWYG POR DEFECTO EN LOS POST
 */
function disable_default_editor_for_posts()
{
  // Desactiva el editor para el tipo de post 'post'
  remove_post_type_support('post', 'editor');
}
add_action('init', 'disable_default_editor_for_posts');









function enqueue_jquery_ui_sortable()
{
  if (is_admin()) {
    wp_enqueue_script('jquery-ui-sortable');
  }
}
add_action('admin_enqueue_scripts', 'enqueue_jquery_ui_sortable');


/**
 * SORTEABLE JS
 */
// function enqueue_cmb2_sortable_script()
// {
//   if (is_admin()) {
//     error_log('Script cargado'); // Verifica si esta línea aparece en los logs
//     wp_enqueue_script(
//       'cmb2-sortable-custom',
//       get_template_directory_uri() . '/js/cmb2-sortable.js',
//       array('sortable'),
//       '1.0.0',
//       true
//     );
//   }
// }
// add_action('admin_enqueue_scripts', 'enqueue_cmb2_sortable_script');