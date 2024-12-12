<?php

/**
 * SOFTWARES CPT
 */
function registrar_cpt_softwares()
{
  $labels = array(
    'name'                  => 'Softwares',
    'Post type general name',
    'singular_name'         => 'Software',
    'Post type singular name',
    'menu_name'             => 'Softwares',
    'Admin Menu text',
    'name_admin_bar'        => 'Software',
    'Add New on Toolbar',
    'add_new'               => 'Añadir nuevo',
    'add_new_item'          => 'Añadir nuevo software',
    'new_item'              => 'Nuevo software',
    'edit_item'             => 'Editar software',
    'view_item'             => 'Ver software',
    'all_items'             => 'Todos los softwares',
    'search_items'          => 'Buscar softwares',
    'parent_item_colon'     => 'Software superior:',
    'not_found'             => 'No se encontraron softwares.',
    'not_found_in_trash'    => 'No se encontraron softwares en la papelera.',
    'featured_image'        => 'Imagen destacada',
    'Overrides the “Featured Image” phrase for this post type.',
    'set_featured_image'    => 'Establecer imagen destacada',
    'Overrides the “Set featured image” phrase for this post type.',
    'remove_featured_image' => 'Eliminar imagen destacada',
    'Overrides the “Remove featured image” phrase for this post type.',
    'use_featured_image'    => 'Usar como imagen destacada',
    'Overrides the “Use as featured image” phrase for this post type.',
    'archives'              => 'Archivo de softwares',
    'The post type archive label used in nav menus.',
    'insert_into_item'      => 'Insertar en el software',
    'Overrides the “Insert into post” phrase.',
    'uploaded_to_this_item' => 'Subido a este software',
    'Overrides the “Uploaded to this post” phrase.',
    'filter_items_list'     => 'Filtrar lista de softwares',
    'Screen reader text for the filter links.',
    'items_list_navigation' => 'Navegación de lista de softwares',
    'Screen reader text for the pagination.',
    'items_list'            => 'Lista de softwares',
    'Screen reader text for the items list.',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'softwares'),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-desktop', // Ícono del menú (puedes cambiarlo).
    'supports'           => array('title', 'thumbnail'),
  );

  register_post_type('softwares', $args);
}
add_action('init', 'registrar_cpt_softwares');

add_action('cmb2_admin_init', 'cmb2_add_software_fields');

function cmb2_add_software_fields()
{
  $cmb = new_cmb2_box(array(
    'id'            => 'software_metabox_2', // ID único del metabox
    'title'         => 'Primera Fila de Contenido', // Título del metabox
    'object_types'  => array('softwares'), // Tipos de contenido donde se aplicará
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
    'custom_required' => true, // Indica que el campo es obligatorio.
  ));

  $cmb->add_field(array(
    'name'         => 'Video o Imagen',
    'desc'         => 'Sube un video o imagen.',
    'id'           => 'video_software',
    'type'         => 'file',
    'options'      => array(
      'url' => false, // Oculta el campo de URL adicional (opcional)
    ),
    'text'         => array(
      'add_upload_file_text' => 'Añadir video o imagen' // Texto del botón
    ),
    'query_args' => array(
      'type' => array(
        'image/jpeg',
        'image/png',
        'video/mp4',
        'video/webm'
      ), // Permitir imágenes y videos
    ),
    'preview_size' => array(300, 300), // Tamaño del preview en el administrador
  ));

  $cmb->add_field(array(
    'name'         => 'Brochure',
    'desc'         => 'Sube un pdf.',
    'id'           => 'brochure_software',
    'type'         => 'file',
    'options'      => array(
      'url' => false, // Oculta el campo de URL adicional (opcional)
    ),
    'text'         => array(
      'add_upload_file_text' => 'Añadir archivo' // Texto del botón
    ),
    'query_args'   => array(
      'type' => 'pdf', // Tipos de archivo permitidos
    ),
    'preview_size' => array(300, 300), // Tamaño del preview en el administrador
  ));

  //--------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'software_metabox_3', // ID único del metabox
    'title'         => 'Segunda Fila de Contenido', // Título del metabox
    'object_types'  => array('softwares'), // Tipos de contenido donde se aplicará (en este caso, solo posts)
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  $cmb->add_field(array(
    'name' => 'Imagen 1', // Nombre del campo
    'desc' => 'Sube una imagen', // Descripción opcional
    'id'   => 'imagen_left', // ID único del campo
    'type' => 'file', // Tipo de campo
    'options' => array(
      'url' => true, // Permitir la URL
    ),
    'text' => array(
      'add_upload_file_text' => 'Subir imagen', // Texto del botón
    ),
    'query_args' => array(
      'type' => 'image', // Limitar a imágenes
    ),
  ));

  $cmb->add_field(array(
    'name' => 'Imagen 2', // Nombre del campo
    'desc' => 'Sube una imagen', // Descripción opcional
    'id'   => 'imagen_right', // ID único del campo
    'type' => 'file', // Tipo de campo
    'options' => array(
      'url' => true, // Permitir la URL
    ),
    'text' => array(
      'add_upload_file_text' => 'Subir imagen', // Texto del botón
    ),
    'query_args' => array(
      'type' => 'image', // Limitar a imágenes
    ),
  ));

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
}
