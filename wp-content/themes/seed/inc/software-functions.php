<?php

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
    'title'         => __('Primera Fila de Contenido', 'textdomain'), // Título del metabox
    'object_types'  => array('softwares'), // Tipos de contenido donde se aplicará
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
    'title'         => __('Segunda Fila de Contenido', 'textdomain'), // Título del metabox
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
}
