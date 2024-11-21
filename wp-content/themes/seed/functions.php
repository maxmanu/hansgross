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

// Formulario de Contacto
function custom_contact_form_handler()
{
  $name    = sanitize_text_field($_POST['name']);
  $email   = sanitize_email($_POST['email']);
  $asunto    = sanitize_text_field($_POST['asunto']);
  $message = esc_textarea($_POST['message']);
  $redirect_url = esc_url($_POST['redirect_url']);

  $to      = 'info@laforse-hg.com';
  $subject = 'Nuevo mensaje de contacto';
  $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>');

  $body = "Nombre: $name<br>";
  $body .= "Correo electrónico: $email<br>";
  $body .= "Asunto: $subject<br>";
  $body .= "Mensaje: $message<br>";

  if (wp_mail($to, $subject, $body, $headers)) {
    // Éxito en el envío del correo
    $redirect_url = add_query_arg('status', 'success', $redirect_url);
  } else {
    // Error en el envío del correo
    $redirect_url = add_query_arg('status', 'error', $redirect_url);
  }

  // Redirige a la página con el mensaje de éxito o error
  wp_redirect($redirect_url);
  exit();
}

add_action('admin_post_nopriv_custom_contact_form', 'custom_contact_form_handler');
add_action('admin_post_custom_contact_form', 'custom_contact_form_handler');

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
