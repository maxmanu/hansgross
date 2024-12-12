<?php

/**
 * SERVICIOS CPT
 */
function registrar_cpt_servicios()
{
  $labels = array(
    'name' => 'Servicios',
    'Post type general name',
    'singular_name' => 'Servicio',
    'Post type singular name',
    'menu_name' => 'Servicios',
    'Admin Menu text',
    'name_admin_bar' => 'Servicio',
    'Add New on Toolbar',
    'add_new' => 'Añadir nuevo',
    'add_new_item' => 'Añadir nuevo servicio',
    'new_item' => 'Nuevo servicio',
    'edit_item' => 'Editar servicio',
    'view_item' => 'Ver servicio',
    'all_items' => 'Todos los servicios',
    'search_items' => 'Buscar servicios',
    'parent_item_colon' => 'Servicio superior:',
    'not_found' => 'No se encontraron servicios.',
    'not_found_in_trash' => 'No se encontraron servicios en la papelera.',
    'featured_image' => 'Imagen destacada',
    'Overrides the “Featured Image” phrase for this post type.',
    'set_featured_image' => 'Establecer imagen destacada',
    'Overrides the “Set featured image” phrase for this post type.',
    'remove_featured_image' => 'Eliminar imagen destacada',
    'Overrides the “Remove featured image” phrase for this post type.',
    'use_featured_image' => 'Usar como imagen destacada',
    'Overrides the “Use as featured image” phrase for this post type.',
    'archives' => 'Archivo de servicios',
    'The post type archive label used in nav menus.',
    'insert_into_item' => 'Insertar en el servicio',
    'Overrides the “Insert into post” phrase.',
    'uploaded_to_this_item' => 'Subido a este servicio',
    'Overrides the “Uploaded to this post” phrase.',
    'filter_items_list' => 'Filtrar lista de servicios',
    'Screen reader text for the filter links.',
    'items_list_navigation' => 'Navegación de lista de servicios',
    'Screen reader text for the pagination.',
    'items_list' => 'Lista de servicios',
    'Screen reader text for the items list.',
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
    'title'         => 'Primera Fila de Contenido', // Título del metabox
    'object_types'  => array('servicios'), // Tipos de contenido donde se aplicará
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  $cmb->add_field(array(
    'name'       => 'Texto de primera fila', // Etiqueta del campo
    'desc'       => 'Introduce una descripción.', // Descripción debajo del campo
    'id'         => 'texto_fila_1', // ID único del campo
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop' => true, // use wpautop?
      'media_buttons' => false, // show insert/upload button(s)
      'teeny'         => false, // Usa el editor estándar (no simplificado)
    ),
  ));

  // $cmb->add_field(array(
  //   'name'         => 'Arrastra y suelta tus archivos',
  //   'desc'         => 'Puedes subir uno o varios archivos luego ordenarlos mediante drag and drop.',
  //   'id'           => 'galeria_fila_1',
  //   'type'         => 'file_list', // Permite múltiples archivos
  //   'text'         => array(
  //     'add_upload_files_text' => 'Añadir archivos', // Botón de subir
  //     'remove_image_text'     => 'Eliminar',        // Texto de eliminar
  //     'file_text'             => 'Archivo:',        // Texto del archivo
  //     'file_download_text'    => 'Descargar',       // Texto para descargar
  //     'remove_text'           => 'Eliminar',        // Texto de eliminar
  //   ),
  //   'query_args'   => array(
  //     'type' => array('image/jpeg', 'image/png'), // Tipos de archivos permitidos
  //   ),
  //   'preview_size' => 'medium', // Tamaño de la vista previa
  // ));

  //--------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'servicio_metabox_3', // ID único del metabox
    'title'         => 'Segunda Fila de Contenido', // Título del metabox
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
    'name'       => 'Texto de segunda fila', // Etiqueta del campo
    'desc'       => 'Introduce una descripción.', // Descripción debajo del campo
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
    'title'         => 'Tercera Fila de Contenido', // Título del metabox
    'object_types'  => array('servicios'), // Tipos de contenido donde se aplicará (en este caso, solo posts)
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  // Añadir un campo de texto para el autor
  $cmb->add_field(array(
    'name'       => 'Texto de tercera fila', // Etiqueta del campo
    'desc'       => 'Introduce una descripción.', // Descripción debajo del campo
    'id'         => 'texto_fila_3', // ID único del campo
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop' => true, // use wpautop?
      'media_buttons' => false, // show insert/upload button(s)
      'teeny'         => false, // Usa el editor estándar (no simplificado)
    ),
  ));

  // $cmb->add_field(array(
  //   'name'         => 'Arrastra y suelta tus archivos',
  //   'desc'         => 'Puedes subir uno o varios archivos luego ordenarlos mediante drag and drop.',
  //   'id'           => 'galeria_fila_3',
  //   'type'         => 'file_list', // Permite múltiples archivos
  //   'text'         => array(
  //     'add_upload_files_text' => 'Añadir archivos', // Botón de subir
  //     'remove_image_text'     => 'Eliminar',        // Texto de eliminar
  //     'file_text'             => 'Archivo:',        // Texto del archivo
  //     'file_download_text'    => 'Descargar',       // Texto para descargar
  //     'remove_text'           => 'Eliminar',        // Texto de eliminar
  //   ),
  //   'query_args'   => array(
  //     'type' => array('image/jpeg', 'image/png'), // Tipos de archivos permitidos
  //   ),
  //   'preview_size' => 'medium', // Tamaño de la vista previa
  // ));
}
