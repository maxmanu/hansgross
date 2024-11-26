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
  register_nav_menus(
    array(
      'menu-1' => esc_html__('Primary', 'seed'),
    )
  );

  // Set up the WordPress core custom background feature.
  add_theme_support(
    'custom-background',
    apply_filters(
      'seed_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

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
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function seed_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('Sidebar', 'seed'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'seed'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'seed_widgets_init');

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
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Bootstrap 5 wp_nav_menu walker
 */

class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach ($this->current_item->classes as $class) {
      if (in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

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



// Remove Categories and Tags
// add_action('init', 'myprefix_remove_tax');
// function myprefix_remove_tax() {
//     register_taxonomy('category', array());
//     register_taxonomy('post_tag', array());
// }

/**
 * Desactivar la prohibición de crear custom fields nativos Wordpress de ACF
 */
// add_filter('acf/settings/remove_wp_meta_box', '__return_false');

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
 * EVENTOS CPT
 */
function registrar_cpt_eventos()
{
  $labels = array(
    'name'                  => _x('Eventos', 'Post type general name', 'tu-text-domain'),
    'singular_name'         => _x('Evento', 'Post type singular name', 'tu-text-domain'),
    'menu_name'             => _x('Eventos', 'Admin Menu text', 'tu-text-domain'),
    'name_admin_bar'        => _x('Evento', 'Add New on Toolbar', 'tu-text-domain'),
    'add_new'               => __('Añadir nuevo', 'tu-text-domain'),
    'add_new_item'          => __('Añadir nuevo evento', 'tu-text-domain'),
    'new_item'              => __('Nuevo evento', 'tu-text-domain'),
    'edit_item'             => __('Editar evento', 'tu-text-domain'),
    'view_item'             => __('Ver evento', 'tu-text-domain'),
    'all_items'             => __('Todos los eventos', 'tu-text-domain'),
    'search_items'          => __('Buscar eventos', 'tu-text-domain'),
    'parent_item_colon'     => __('Evento superior:', 'tu-text-domain'),
    'not_found'             => __('No se encontraron eventos.', 'tu-text-domain'),
    'not_found_in_trash'    => __('No se encontraron eventos en la papelera.', 'tu-text-domain'),
    'featured_image'        => _x('Imagen destacada', 'Overrides the “Featured Image” phrase for this post type.', 'tu-text-domain'),
    'set_featured_image'    => _x('Establecer imagen destacada', 'Overrides the “Set featured image” phrase for this post type.', 'tu-text-domain'),
    'remove_featured_image' => _x('Eliminar imagen destacada', 'Overrides the “Remove featured image” phrase for this post type.', 'tu-text-domain'),
    'use_featured_image'    => _x('Usar como imagen destacada', 'Overrides the “Use as featured image” phrase for this post type.', 'tu-text-domain'),
    'archives'              => _x('Archivo de eventos', 'The post type archive label used in nav menus.', 'tu-text-domain'),
    'insert_into_item'      => _x('Insertar en el evento', 'Overrides the “Insert into post” phrase.', 'tu-text-domain'),
    'uploaded_to_this_item' => _x('Subido a este evento', 'Overrides the “Uploaded to this post” phrase.', 'tu-text-domain'),
    'filter_items_list'     => _x('Filtrar lista de eventos', 'Screen reader text for the filter links.', 'tu-text-domain'),
    'items_list_navigation' => _x('Navegación de lista de eventos', 'Screen reader text for the pagination.', 'tu-text-domain'),
    'items_list'            => _x('Lista de eventos', 'Screen reader text for the items list.', 'tu-text-domain'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'eventos'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'menu_icon'          => 'dashicons-calendar-alt',
    'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
  );

  register_post_type('eventos', $args);
}
add_action('init', 'registrar_cpt_eventos');

/**
 * CATEGORÍAS EVENTOS CPT
 */

function registrar_taxonomia_categorias_eventos()
{
  $labels = array(
    'name'              => _x('Categorías de Eventos', 'taxonomy general name', 'tu-text-domain'),
    'singular_name'     => _x('Categoría de Evento', 'taxonomy singular name', 'tu-text-domain'),
    'search_items'      => __('Buscar categorías', 'tu-text-domain'),
    'all_items'         => __('Todas las categorías', 'tu-text-domain'),
    'parent_item'       => __('Categoría superior', 'tu-text-domain'),
    'parent_item_colon' => __('Categoría superior:', 'tu-text-domain'),
    'edit_item'         => __('Editar categoría', 'tu-text-domain'),
    'update_item'       => __('Actualizar categoría', 'tu-text-domain'),
    'add_new_item'      => __('Añadir nueva categoría', 'tu-text-domain'),
    'new_item_name'     => __('Nombre de la nueva categoría', 'tu-text-domain'),
    'menu_name'         => __('Categorías de Eventos', 'tu-text-domain'),
  );

  $args = array(
    'hierarchical'      => true, // true para categorías, false para etiquetas (tags)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'categorias-eventos'),
  );

  register_taxonomy('categorias_eventos', array('eventos'), $args);
}
add_action('init', 'registrar_taxonomia_categorias_eventos');



function load_event_posts_by_category()
{
  if (!isset($_GET['category_slug'])) {
    wp_send_json_error('No se especificó la categoría.');
    return;
  }

  $category_slug = sanitize_text_field($_GET['category_slug']);

  // Cambiar la consulta para usar la taxonomía personalizada
  $query = new WP_Query([
    'post_type' => 'eventos',
    'tax_query' => [
      [
        'taxonomy' => 'categorias_eventos', // Nombre de tu taxonomía
        'field'    => 'slug',             // Consulta por slug
        'terms'    => $category_slug,     // Slug de la categoría seleccionada
      ],
    ],
    'posts_per_page' => 5, // Cambiar según necesidad
  ]);

  if ($query->have_posts()) {
    $posts = [];

    while ($query->have_posts()) {
      $query->the_post();
      $posts[] = [
        'title' => get_the_title(),
        'excerpt' => get_the_excerpt(),
        'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
        'date' => get_the_date(),
        'link' => get_permalink(),
      ];
    }

    wp_reset_postdata();

    wp_send_json_success($posts);
  } else {
    wp_send_json_error('No se encontraron posts para esta categoría.');
  }
}
add_action('wp_ajax_load_event_posts_by_category', 'load_event_posts_by_category');
add_action('wp_ajax_nopriv_load_event_posts_by_category', 'load_event_posts_by_category');




function enqueue_custom_scripts()
{
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', ['jquery'], null, true);

  // Pasar la URL de admin-ajax.php al script
  wp_localize_script('custom-js', 'wp_ajax_data', [
    'ajax_url' => admin_url('admin-ajax.php'),
  ]);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


/**
 * SERVICIOS CPT
 */
function registrar_cpt_servicios()
{
  $labels = array(
    'name'                  => _x('Servicios', 'Post type general name', 'tu-text-domain'),
    'singular_name'         => _x('Servicio', 'Post type singular name', 'tu-text-domain'),
    'menu_name'             => _x('Servicios', 'Admin Menu text', 'tu-text-domain'),
    'name_admin_bar'        => _x('Servicio', 'Add New on Toolbar', 'tu-text-domain'),
    'add_new'               => __('Añadir nuevo', 'tu-text-domain'),
    'add_new_item'          => __('Añadir nuevo servicio', 'tu-text-domain'),
    'new_item'              => __('Nuevo servicio', 'tu-text-domain'),
    'edit_item'             => __('Editar servicio', 'tu-text-domain'),
    'view_item'             => __('Ver servicio', 'tu-text-domain'),
    'all_items'             => __('Todos los servicios', 'tu-text-domain'),
    'search_items'          => __('Buscar servicios', 'tu-text-domain'),
    'parent_item_colon'     => __('Servicio superior:', 'tu-text-domain'),
    'not_found'             => __('No se encontraron servicios.', 'tu-text-domain'),
    'not_found_in_trash'    => __('No se encontraron servicios en la papelera.', 'tu-text-domain'),
    'featured_image'        => _x('Imagen destacada', 'Overrides the “Featured Image” phrase for this post type.', 'tu-text-domain'),
    'set_featured_image'    => _x('Establecer imagen destacada', 'Overrides the “Set featured image” phrase for this post type.', 'tu-text-domain'),
    'remove_featured_image' => _x('Eliminar imagen destacada', 'Overrides the “Remove featured image” phrase for this post type.', 'tu-text-domain'),
    'use_featured_image'    => _x('Usar como imagen destacada', 'Overrides the “Use as featured image” phrase for this post type.', 'tu-text-domain'),
    'archives'              => _x('Archivo de servicios', 'The post type archive label used in nav menus.', 'tu-text-domain'),
    'insert_into_item'      => _x('Insertar en el servicio', 'Overrides the “Insert into post” phrase.', 'tu-text-domain'),
    'uploaded_to_this_item' => _x('Subido a este servicio', 'Overrides the “Uploaded to this post” phrase.', 'tu-text-domain'),
    'filter_items_list'     => _x('Filtrar lista de servicios', 'Screen reader text for the filter links.', 'tu-text-domain'),
    'items_list_navigation' => _x('Navegación de lista de servicios', 'Screen reader text for the pagination.', 'tu-text-domain'),
    'items_list'            => _x('Lista de servicios', 'Screen reader text for the items list.', 'tu-text-domain'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'lista-servicios'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-hammer', // Cambia el ícono si lo deseas.
    'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
  );

  register_post_type('servicios', $args);
}
add_action('init', 'registrar_cpt_servicios');

/**
 * SOFTWARES CPT
 */
function registrar_cpt_softwares()
{
  $labels = array(
    'name'                  => _x('Softwares', 'Post type general name', 'tu-text-domain'),
    'singular_name'         => _x('Software', 'Post type singular name', 'tu-text-domain'),
    'menu_name'             => _x('Softwares', 'Admin Menu text', 'tu-text-domain'),
    'name_admin_bar'        => _x('Software', 'Add New on Toolbar', 'tu-text-domain'),
    'add_new'               => __('Añadir nuevo', 'tu-text-domain'),
    'add_new_item'          => __('Añadir nuevo software', 'tu-text-domain'),
    'new_item'              => __('Nuevo software', 'tu-text-domain'),
    'edit_item'             => __('Editar software', 'tu-text-domain'),
    'view_item'             => __('Ver software', 'tu-text-domain'),
    'all_items'             => __('Todos los softwares', 'tu-text-domain'),
    'search_items'          => __('Buscar softwares', 'tu-text-domain'),
    'parent_item_colon'     => __('Software superior:', 'tu-text-domain'),
    'not_found'             => __('No se encontraron softwares.', 'tu-text-domain'),
    'not_found_in_trash'    => __('No se encontraron softwares en la papelera.', 'tu-text-domain'),
    'featured_image'        => _x('Imagen destacada', 'Overrides the “Featured Image” phrase for this post type.', 'tu-text-domain'),
    'set_featured_image'    => _x('Establecer imagen destacada', 'Overrides the “Set featured image” phrase for this post type.', 'tu-text-domain'),
    'remove_featured_image' => _x('Eliminar imagen destacada', 'Overrides the “Remove featured image” phrase for this post type.', 'tu-text-domain'),
    'use_featured_image'    => _x('Usar como imagen destacada', 'Overrides the “Use as featured image” phrase for this post type.', 'tu-text-domain'),
    'archives'              => _x('Archivo de softwares', 'The post type archive label used in nav menus.', 'tu-text-domain'),
    'insert_into_item'      => _x('Insertar en el software', 'Overrides the “Insert into post” phrase.', 'tu-text-domain'),
    'uploaded_to_this_item' => _x('Subido a este software', 'Overrides the “Uploaded to this post” phrase.', 'tu-text-domain'),
    'filter_items_list'     => _x('Filtrar lista de softwares', 'Screen reader text for the filter links.', 'tu-text-domain'),
    'items_list_navigation' => _x('Navegación de lista de softwares', 'Screen reader text for the pagination.', 'tu-text-domain'),
    'items_list'            => _x('Lista de softwares', 'Screen reader text for the items list.', 'tu-text-domain'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'lista-softwares'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-desktop', // Ícono del menú (puedes cambiarlo).
    'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
  );

  register_post_type('softwares', $args);
}
add_action('init', 'registrar_cpt_softwares');


/**
 * AJAX PÁGINA ACADÉMICO
 */

function mostrar_selector_categorias()
{
  $categorias = get_terms([
    'taxonomy' => 'categorias_eventos',
    'hide_empty' => true,
  ]);

  if (!empty($categorias) && !is_wp_error($categorias)) {
    echo '<ul class="list-group list-group-flush" id="lista-categorias-eventos">';
    foreach ($categorias as $categoria) {
      echo '<li class="list-group-item" data-categoria="' . esc_attr($categoria->term_id) . '"><div>' . esc_html($categoria->name) . '</div></li>';
    }
    echo '</ul>';
  }
}
add_shortcode('selector_categorias_eventos', 'mostrar_selector_categorias');


function cargar_script_ajax_listado()
{
?>
  <script>
    jQuery(document).ready(function($) {
      var $listaCategorias = $('#lista-categorias-eventos');
      var $resultadosEventos = $('#resultados-eventos');
      var categoriaActiva = null;

      // Cargar eventos iniciales
      function cargarEventos(pagina = 1) {
        $.ajax({
          url: '<?php echo admin_url("admin-ajax.php"); ?>',
          type: 'POST',
          data: {
            action: categoriaActiva ? 'filtrar_eventos' : 'cargar_todos_eventos',
            paged: pagina,
            categoria_id: categoriaActiva // Enviar categoría activa solo si existe
          },
          beforeSend: function() {
            $resultadosEventos.html('<p>Cargando eventos...</p>');
          },
          success: function(response) {
            $resultadosEventos.html(response);
          },
          error: function(xhr, status, error) {
            console.error('Error al cargar los eventos iniciales:', error);
            $resultadosEventos.html('<p>Hubo un error al cargar los eventos.</p>');
          }
        });
      }

      // Cargar la primera página al cargar la página
      cargarEventos();

      // Manejar el clic en los botones de paginación
      $resultadosEventos.on('click', '.page-link', function(e) {
        e.preventDefault(); // Evitar recarga de página
        var pagina = $(this).data('pagina');
        cargarEventos(pagina); // Cargar la página correspondiente
      });

      // Filtrar eventos por categoría
      $listaCategorias.on('click', 'li', function() {
        var $categoria = $(this);

        if ($categoria.hasClass('activo')) {
          console.log('Categoría ya activa.');
          return;
        }

        categoriaActiva = $categoria.data('categoria'); // Actualizar la categoría activa
        $listaCategorias.find('li').removeClass('activo');
        $categoria.addClass('activo');

        cargarEventos(1); // Cargar eventos filtrados desde la primera página
      });

    });
  </script>
<?php
}
add_action('wp_footer', 'cargar_script_ajax_listado');




function filtrar_eventos()
{
  $paged = isset($_POST['paged']) ? absint($_POST['paged']) : 1;
  $categoria_id = isset($_POST['categoria_id']) ? intval($_POST['categoria_id']) : 0;

  $args = [
    'post_type' => 'eventos',
    'posts_per_page' => 6, // Todos los eventos
    'paged'          => $paged,
  ];

  if ($categoria_id) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'categorias_eventos',
        'field'    => 'term_id',
        'terms'    => $categoria_id,
      ],
    ];
  }

  $eventos = new WP_Query($args);

  if ($eventos->have_posts()) {
    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-card-servicios g-4">';
    while ($eventos->have_posts()) {
      $eventos->the_post();
      // Obtener las categorías del evento
      $categorias = get_the_terms(get_the_ID(), 'categorias_eventos');
      $nombres_categorias = $categorias && !is_wp_error($categorias)
        ? implode(', ', wp_list_pluck($categorias, 'name'))
        : 'Sin categoría';

      // Inicializar clases dinámicas
      $clase_categoria = 'btn-category-card';
      if ($categorias && !is_wp_error($categorias)) {
        foreach ($categorias as $categoria) {
          if ($categoria->slug === 'webinars') { // Cambia 'webinars' por el slug de tu categoría
            $clase_categoria .= ' btn-category-card--green';
            break;
          }
        }
      }

      echo '<div class="col">';
      echo '<div class="card h-100">';
      echo '<div class="position-relative">';
      echo '<div class="' . esc_attr($clase_categoria) . '">' . esc_html($nombres_categorias) . '</div>';
      echo ' <img src="' . wp_get_attachment_url(get_post_thumbnail_id()) . '" class="card-img-top" alt="...">';
      echo '<div class="btn-precio-card"><sup>S/</sup>59<sup>.99</sup></div>';
      echo '</div>';
      echo '<div class="card-body">';
      echo '<div class="row">';
      echo '<div class="col-2 text-center">';
      echo '<p class="date-text">SET</p>';
      echo '<p class="date-text date-text--day">18</p>';
      echo '</div>';
      echo '<div class="col-10">';
      echo '<h5 class="card-title">' . get_the_title() . '</h5>';
      echo '<p class="card-category mb-2"><b>Categoría:</b> Criminalística</p>';
      echo '<p class="card-text">' . get_the_excerpt() . '</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<div class="card-footer">';
      echo '<a href="">';
      echo '<button class="btn btn-hans btn-card-comprar">';
      echo '<i class="bi bi-cart2 pr-2"></i>';
      echo '<span>Comprar</span>';
      echo '</button>';
      echo '</a>';
      echo '<a href="' .  get_permalink() . '"><button class="btn btn-hans btn-card-ver">Ver más</button></a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';

    // Generar paginación
    $total_pages = $eventos->max_num_pages;
    if ($total_pages > 1) {
      echo '<div class="row mt-4">';
      echo '<div class="col">';
      echo '<nav aria-label="Page navigation">';
      echo '<ul class="pagination justify-content-end">';

      for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = $i == $paged ? ' active' : '';
        echo '<li class="page-item' . $active_class . '">';
        echo '<a class="page-link" href="#" data-pagina="' . $i . '">' . $i . '</a>';
        echo '</li>';
      }

      echo '</ul>';
      echo '</nav>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo '<p>No se encontraron eventos.</p>';
  }

  wp_die();
}
add_action('wp_ajax_filtrar_eventos', 'filtrar_eventos');
add_action('wp_ajax_nopriv_filtrar_eventos', 'filtrar_eventos');


function cargar_todos_eventos()
{
  // Obtener la página actual desde AJAX (si no se pasa, usar la primera página).
  $paged = isset($_POST['paged']) ? absint($_POST['paged']) : 1;
  $categoria_id = isset($_POST['categoria_id']) ? absint($_POST['categoria_id']) : 0;

  $args = [
    'post_type' => 'eventos',
    'posts_per_page' => 6, // Todos los eventos
    'paged'          => $paged,
  ];

  if ($categoria_id) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'categorias_eventos',
        'field'    => 'term_id',
        'terms'    => $categoria_id,
      ],
    ];
  }

  $eventos = new WP_Query($args);

  if ($eventos->have_posts()) {
    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-card-servicios g-4">';
    while ($eventos->have_posts()) {
      $eventos->the_post();
      // Obtener las categorías del evento
      $categorias = get_the_terms(get_the_ID(), 'categorias_eventos');
      $nombres_categorias = $categorias && !is_wp_error($categorias)
        ? implode(', ', wp_list_pluck($categorias, 'name'))
        : 'Sin categoría';

      // Inicializar clases dinámicas
      $clase_categoria = 'btn-category-card';
      if ($categorias && !is_wp_error($categorias)) {
        foreach ($categorias as $categoria) {
          if ($categoria->slug === 'webinars') { // Cambia 'webinars' por el slug de tu categoría
            $clase_categoria .= ' btn-category-card--green';
            break;
          }
        }
      }

      echo '<div class="col">';
      echo '<div class="card h-100">';
      echo '<div class="position-relative">';
      echo '<div class="' . esc_attr($clase_categoria) . '">' . esc_html($nombres_categorias) . '</div>';
      echo ' <img src="' . wp_get_attachment_url(get_post_thumbnail_id()) . '" class="card-img-top" alt="...">';
      echo '<div class="btn-precio-card"><sup>S/</sup>59<sup>.99</sup></div>';
      echo '</div>';
      echo '<div class="card-body">';
      echo '<div class="row">';
      echo '<div class="col-2 text-center">';
      echo '<p class="date-text">SET</p>';
      echo '<p class="date-text date-text--day">18</p>';
      echo '</div>';
      echo '<div class="col-10">';
      echo '<h5 class="card-title">' . get_the_title() . '</h5>';
      echo '<p class="card-category mb-2"><b>Categoría:</b> Criminalística</p>';
      echo '<p class="card-text">' . get_the_excerpt() . '</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<div class="card-footer">';
      echo '<a href="">';
      echo '<button class="btn btn-hans btn-card-comprar">';
      echo '<i class="bi bi-cart2 pr-2"></i>';
      echo '<span>Comprar</span>';
      echo '</button>';
      echo '</a>';
      echo '<a href="' .  get_permalink() . '"><button class="btn btn-hans btn-card-ver">Ver más</button></a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';

    // Agregar los botones de paginación
    $total_pages = $eventos->max_num_pages;
    if ($total_pages > 1) {
      echo '<div class="row">';
      echo '<div class="col">';
      echo '<nav aria-label="Page navigation example">';
      echo '<ul class="pagination justify-content-end">';

      for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = $i == $paged ? ' active' : '';
        echo '<li class="page-item' . $active_class . '">';
        echo '<a class="page-link" href="#" data-pagina="' . $i . '">' . $i . '</a>';
        echo '</li>';
      }

      echo '</ul>';
      echo '</nav>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo '<p>No hay eventos disponibles.</p>';
  }

  wp_die();
}
add_action('wp_ajax_cargar_todos_eventos', 'cargar_todos_eventos');
add_action('wp_ajax_nopriv_cargar_todos_eventos', 'cargar_todos_eventos');


function registrar_cpt_certificados()
{
  $labels = array(
    'name'                  => _x('Certificados', 'Post type general name', 'tu-text-domain'),
    'singular_name'         => _x('Certificado', 'Post type singular name', 'tu-text-domain'),
    'menu_name'             => _x('Certificados', 'Admin Menu text', 'tu-text-domain'),
    'name_admin_bar'        => _x('Certificado', 'Add New on Toolbar', 'tu-text-domain'),
    'add_new'               => __('Añadir nuevo', 'tu-text-domain'),
    'add_new_item'          => __('Añadir nuevo certificado', 'tu-text-domain'),
    'new_item'              => __('Nuevo certificado', 'tu-text-domain'),
    'edit_item'             => __('Editar certificado', 'tu-text-domain'),
    'view_item'             => __('Ver certificado', 'tu-text-domain'),
    'all_items'             => __('Todos los certificados', 'tu-text-domain'),
    'search_items'          => __('Buscar certificados', 'tu-text-domain'),
    'parent_item_colon'     => __('Certificado superior:', 'tu-text-domain'),
    'not_found'             => __('No se encontraron certificados.', 'tu-text-domain'),
    'not_found_in_trash'    => __('No se encontraron certificados en la papelera.', 'tu-text-domain'),
    'featured_image'        => _x('Imagen destacada', 'Overrides the “Featured Image” phrase for this post type.', 'tu-text-domain'),
    'set_featured_image'    => _x('Establecer imagen destacada', 'Overrides the “Set featured image” phrase for this post type.', 'tu-text-domain'),
    'remove_featured_image' => _x('Eliminar imagen destacada', 'Overrides the “Remove featured image” phrase for this post type.', 'tu-text-domain'),
    'use_featured_image'    => _x('Usar como imagen destacada', 'Overrides the “Use as featured image” phrase for this post type.', 'tu-text-domain'),
    'archives'              => _x('Archivo de certificados', 'The post type archive label used in nav menus.', 'tu-text-domain'),
    'insert_into_item'      => _x('Insertar en el certificado', 'Overrides the “Insert into post” phrase.', 'tu-text-domain'),
    'uploaded_to_this_item' => _x('Subido a este certificado', 'Overrides the “Uploaded to this post” phrase.', 'tu-text-domain'),
    'filter_items_list'     => _x('Filtrar lista de certificados', 'Screen reader text for the filter links.', 'tu-text-domain'),
    'items_list_navigation' => _x('Navegación de lista de certificados', 'Screen reader text for the pagination.', 'tu-text-domain'),
    'items_list'            => _x('Lista de certificados', 'Screen reader text for the items list.', 'tu-text-domain'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'certificados'),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-awards', // Cambia el ícono si lo deseas.
    'supports'           => array('title'),
  );

  register_post_type('certificados', $args);
}
add_action('init', 'registrar_cpt_certificados');


add_action('cmb2_admin_init', 'crear_campos_certificados');
function crear_campos_certificados()
{
  // Crear un metabox para el CPT "certificados"
  $cmb = new_cmb2_box(array(
    'id'            => 'certificados_metabox',
    'title'         => __('Información de Certificados', 'textdomain'),
    'object_types'  => array('certificados'), // Aplica al Custom Post Type "certificados"
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true,
  ));

  // Campo repetidor (group field)
  $group_field_id = $cmb->add_field(array(
    'id'          => 'grupo_certificados',
    'type'        => 'group',
    'description' => __('Añade información de certificados', 'textdomain'),
    'options'     => array(
      'group_title'   => __('Certificado {#}', 'textdomain'), // Título para cada grupo
      'add_button'    => __('Añadir Certificado', 'textdomain'),
      'remove_button' => __('Eliminar Certificado', 'textdomain'),
      'sortable'      => true, // Permitir reordenar
    ),
  ));

  // Subcampo: Número de código
  $cmb->add_group_field($group_field_id, array(
    'name' => __('Número de Código', 'textdomain'),
    'id'   => 'numero_codigo',
    'type' => 'text',
    'attributes' => array(
      'placeholder' => __('Ej: 12345', 'textdomain'),
    ),
  ));

  // Subcampo: Nombre del Certificado
  $cmb->add_group_field($group_field_id, array(
    'name' => __('Nombre del Certificado', 'textdomain'),
    'id'   => 'nombre_certificado',
    'type' => 'text',
    'attributes' => array(
      'placeholder' => __('Ej: Certificado de Excelencia', 'textdomain'),
    ),
  ));

  // Subcampo: Subir PDF
  $cmb->add_group_field($group_field_id, array(
    'name' => __('Subir PDF del Certificado', 'textdomain'),
    'id'   => 'archivo_pdf',
    'type' => 'file',
    'options' => array(
      'url' => false, // Ocultar campo URL adicional
    ),
    'text' => array(
      'add_upload_file_text' => __('Subir PDF', 'textdomain'),
    ),
  ));
}

add_action('wp_ajax_buscar_certificados', 'buscar_certificados');
add_action('wp_ajax_nopriv_buscar_certificados', 'buscar_certificados');

function buscar_certificados()
{
  $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

  if (empty($query)) {
    wp_send_json(array(
      'titulo' => '',
      'contenido' => '<p>Por favor, escribe algo para buscar.</p>'
    ));
  }

  $args = array(
    'post_type' => 'certificados',
    'post_status' => 'publish',
    'title' => $query,
    'posts_per_page' => 1,
  );

  $certificados = new WP_Query($args);

  if ($certificados->have_posts()) {
    $certificados->the_post();

    // Obtener título del post
    $titulo = get_the_title();

    // Obtener los custom fields
    $custom_fields = get_post_meta(get_the_ID(), 'grupo_certificados', true);
    $contenido = '';

    if (!empty($custom_fields)) {
      foreach ($custom_fields as $field) {
        $codigo = isset($field['numero_codigo']) ? esc_html($field['numero_codigo']) : '';
        $nombre = isset($field['nombre_certificado']) ? esc_html($field['nombre_certificado']) : '';
        $pdf = isset($field['archivo_pdf']) ? esc_url($field['archivo_pdf']) : '';

        $contenido .= '<tr>';
        $contenido .= '<th>';
        $contenido .= '<img src="' . get_template_directory_uri() . '/assets/img/icon-diploma.png" class="img-fluid me-3" alt="...">';
        if ($codigo) {
          $contenido .= '<span>' . $codigo . '</span>';
        }
        $contenido .= '</th>';
        $contenido .= '<td>';
        $contenido .= '<div class="pt-3">';
        if ($nombre) {
          $contenido .= '<span>' . $nombre . '</span>';
        }
        $contenido .= '</div>';
        $contenido .= '</td>';
        $contenido .= '<td class="text-center">';
        $contenido .= '<div class="pt-3">';
        if ($pdf) {
          $contenido .= '<a href="' . $pdf . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/img/icon-eye.png" class="img-fluid icon-table" alt="..."></a>';
        }
        $contenido .= '</div>';
        $contenido .= '</td>';
        $contenido .= '<td class="text-center">';
        $contenido .= '<div class="pt-3">';
        if ($pdf) {
          $contenido .= '<a href="' . $pdf . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/img/icon-expediente.png" class="img-fluid icon-table" alt=""></a>';
        }
        $contenido .= '</div>';
        $contenido .= '</td>';
        $contenido .= '</tr>';
      }
    } else {
      $contenido .= '<p>No se encontraron detalles para este certificado.</p>';
    }

    wp_send_json(array(
      'titulo' => $titulo,
      'contenido' => $contenido
    ));
  } else {
    wp_send_json(array(
      'titulo' => '',
      'contenido' => '<p>No se encontró ningún certificado con el título exacto "' . esc_html($query) . '".</p>'
    ));
  }
}



function cargar_scripts_buscador()
{
  wp_enqueue_script('buscador-certificados', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);

  // Agregar el objeto AJAX
  wp_localize_script('buscador-certificados', 'ajax_object', array(
    'ajax_url' => admin_url('admin-ajax.php'), // URL del endpoint AJAX
  ));
}
add_action('wp_enqueue_scripts', 'cargar_scripts_buscador');
