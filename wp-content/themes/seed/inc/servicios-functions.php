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
    'rewrite' => array('slug' => 'servicios'),
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-hammer', // Cambia el ícono si lo deseas.
    'supports' => array('title', 'excerpt', 'thumbnail'),
  );

  register_post_type('servicios', $args);
}
add_action('init', 'registrar_cpt_servicios');

// function priorizar_pagina_sobre_archive($query)
// {
//   if (!is_admin() && $query->is_main_query() && is_post_type_archive('servicios') && get_page_by_path('servicios')) {
//     $query->set_404(); // Forzar un 404 para el archivo del CPT
//   }
// }
// add_action('pre_get_posts', 'priorizar_pagina_sobre_archive');

add_action('cmb2_admin_init', 'cmb2_add_servicio_fields');

function cmb2_add_servicio_fields()
{
  $cmb = new_cmb2_box(array(
    'id'            => 'servicio_metabox_2', // ID único del metabox
    'title'         => __('Primera Fila de Contenido', 'textdomain'), // Título del metabox
    'object_types'  => array('servicios'), // Tipos de contenido donde se aplicará
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  $cmb->add_field(array(
    'name'       => __('Texto de primera fila', 'textdomain'), // Etiqueta del campo
    'desc'       => __('Introduce una descripción.', 'textdomain'), // Descripción debajo del campo
    'id'         => 'texto_fila_1', // ID único del campo
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop' => true, // use wpautop?
      'media_buttons' => false, // show insert/upload button(s)
      'teeny'         => false, // Usa el editor estándar (no simplificado)
    ),
  ));

  $cmb->add_field(array(
    'name'         => __('Arrastra y suelta tus archivos', 'cmb2'),
    'desc'         => __('Puedes subir uno o varios archivos luego ordenarlos mediante drag and drop.', 'cmb2'),
    'id'           => 'galeria_fila_1',
    'type'         => 'file_list', // Permite múltiples archivos
    'text'         => array(
      'add_upload_files_text' => 'Añadir archivos', // Botón de subir
      'remove_image_text'     => 'Eliminar',        // Texto de eliminar
      'file_text'             => 'Archivo:',        // Texto del archivo
      'file_download_text'    => 'Descargar',       // Texto para descargar
      'remove_text'           => 'Eliminar',        // Texto de eliminar
    ),
    'query_args'   => array(
      'type' => array('image/jpeg', 'image/png'), // Tipos de archivos permitidos
    ),
    'preview_size' => 'medium', // Tamaño de la vista previa
  ));

  //--------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'servicio_metabox_3', // ID único del metabox
    'title'         => __('Segunda Fila de Contenido', 'textdomain'), // Título del metabox
    'object_types'  => array('servicios'), // Tipos de contenido donde se aplicará (en este caso, solo posts)
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  $cmb->add_field(array(
    'name'         => 'Video',
    'desc'         => 'Sube un video o proporciona una URL.',
    'id'           => 'video_cmb2',
    'type'         => 'file',
    'options'      => array(
      'url' => false, // Oculta el campo de URL adicional (opcional)
    ),
    'text'         => array(
      'add_upload_file_text' => 'Añadir video' // Texto del botón
    ),
    'query_args'   => array(
      'type' => array('video/mp4', 'video/avi', 'video/mpeg', 'video/webm'), // Tipos de archivo permitidos
    ),
    'preview_size' => array(300, 300), // Tamaño del preview en el administrador
  ));

  // Añadir un campo de texto para el autor
  $cmb->add_field(array(
    'name'       => __('Texto de segunda fila', 'textdomain'), // Etiqueta del campo
    'desc'       => __('Introduce una descripción.', 'textdomain'), // Descripción debajo del campo
    'id'         => 'texto_fila_2', // ID único del campo
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop' => true, // use wpautop?
      'media_buttons' => false, // show insert/upload button(s)
      'teeny'         => false, // Usa el editor estándar (no simplificado)
    ),
  ));

  //--------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'servicio_metabox_4', // ID único del metabox
    'title'         => __('Tercera Fila de Contenido', 'textdomain'), // Título del metabox
    'object_types'  => array('servicios'), // Tipos de contenido donde se aplicará (en este caso, solo posts)
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  // Añadir un campo de texto para el autor
  $cmb->add_field(array(
    'name'       => __('Texto de tercera fila', 'textdomain'), // Etiqueta del campo
    'desc'       => __('Introduce una descripción.', 'textdomain'), // Descripción debajo del campo
    'id'         => 'texto_fila_3', // ID único del campo
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop' => true, // use wpautop?
      'media_buttons' => false, // show insert/upload button(s)
      'teeny'         => false, // Usa el editor estándar (no simplificado)
    ),
  ));

  $cmb->add_field(array(
    'name'         => __('Arrastra y suelta tus archivos', 'cmb2'),
    'desc'         => __('Puedes subir uno o varios archivos luego ordenarlos mediante drag and drop.', 'cmb2'),
    'id'           => 'galeria_fila_3',
    'type'         => 'file_list', // Permite múltiples archivos
    'text'         => array(
      'add_upload_files_text' => 'Añadir archivos', // Botón de subir
      'remove_image_text'     => 'Eliminar',        // Texto de eliminar
      'file_text'             => 'Archivo:',        // Texto del archivo
      'file_download_text'    => 'Descargar',       // Texto para descargar
      'remove_text'           => 'Eliminar',        // Texto de eliminar
    ),
    'query_args'   => array(
      'type' => array('image/jpeg', 'image/png'), // Tipos de archivos permitidos
    ),
    'preview_size' => 'medium', // Tamaño de la vista previa
  ));
}
