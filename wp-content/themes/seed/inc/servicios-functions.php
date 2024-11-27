<?php

/**
 * SERVICIOS CPT
 */
function registrar_cpt_servicios()
{
  $labels = array(
    'name' => _x('Servicios', 'Post type general name', 'tu-text-domain'),
    'singular_name' => _x('Servicio', 'Post type singular name', 'tu-text-domain'),
    'menu_name' => _x('Servicios', 'Admin Menu text', 'tu-text-domain'),
    'name_admin_bar' => _x('Servicio', 'Add New on Toolbar', 'tu-text-domain'),
    'add_new' => __('Añadir nuevo', 'tu-text-domain'),
    'add_new_item' => __('Añadir nuevo servicio', 'tu-text-domain'),
    'new_item' => __('Nuevo servicio', 'tu-text-domain'),
    'edit_item' => __('Editar servicio', 'tu-text-domain'),
    'view_item' => __('Ver servicio', 'tu-text-domain'),
    'all_items' => __('Todos los servicios', 'tu-text-domain'),
    'search_items' => __('Buscar servicios', 'tu-text-domain'),
    'parent_item_colon' => __('Servicio superior:', 'tu-text-domain'),
    'not_found' => __('No se encontraron servicios.', 'tu-text-domain'),
    'not_found_in_trash' => __('No se encontraron servicios en la papelera.', 'tu-text-domain'),
    'featured_image' => _x('Imagen destacada', 'Overrides the “Featured Image” phrase for this post type.', 'tu-text-domain'),
    'set_featured_image' => _x('Establecer imagen destacada', 'Overrides the “Set featured image” phrase for this post type.', 'tu-text-domain'),
    'remove_featured_image' => _x('Eliminar imagen destacada', 'Overrides the “Remove featured image” phrase for this post type.', 'tu-text-domain'),
    'use_featured_image' => _x('Usar como imagen destacada', 'Overrides the “Use as featured image” phrase for this post type.', 'tu-text-domain'),
    'archives' => _x('Archivo de servicios', 'The post type archive label used in nav menus.', 'tu-text-domain'),
    'insert_into_item' => _x('Insertar en el servicio', 'Overrides the “Insert into post” phrase.', 'tu-text-domain'),
    'uploaded_to_this_item' => _x('Subido a este servicio', 'Overrides the “Uploaded to this post” phrase.', 'tu-text-domain'),
    'filter_items_list' => _x('Filtrar lista de servicios', 'Screen reader text for the filter links.', 'tu-text-domain'),
    'items_list_navigation' => _x('Navegación de lista de servicios', 'Screen reader text for the pagination.', 'tu-text-domain'),
    'items_list' => _x('Lista de servicios', 'Screen reader text for the items list.', 'tu-text-domain'),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'lista-servicios'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-hammer', // Cambia el ícono si lo deseas.
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
  );

  register_post_type('servicios', $args);
}
add_action('init', 'registrar_cpt_servicios');
