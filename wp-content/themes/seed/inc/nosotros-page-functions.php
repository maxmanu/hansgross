<?php

/**
 * CUSTOM FIELDS NOSOTROS
 */
add_action('cmb2_admin_init', 'custom_fields_pagina_nosotros');
function custom_fields_pagina_nosotros()
{
  // Verifica si estamos en la página con ID 25
  $page_id = 25; // ID de la página "Nosotros"

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_nosotros', // ID único
    'title'         => 'Sección Quienes Somos', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id), // Aplica solo para la página con ID 25
    ),
  ));

  // Campo de texto: Título
  $cmb->add_field(array(
    'name' => 'Título de sección',
    'id'   => 'nosotros_titulo',
    'type' => 'text',
    'desc' => 'Ingresa el título principal de la página.',
  ));

  // Campo de texto largo: Descripción
  $cmb->add_field(array(
    'name' => 'Descripción',
    'id'   => 'nosotros_descripcion',
    'type' => 'textarea',
    'desc' => 'Escribe una descripción detallada para la página.',
  ));

  // Campo de imagen: Imagen 1
  $cmb->add_field(array(
    'name' => 'Imagen 1',
    'id'   => 'nosotros_imagen_1',
    'type' => 'file',
    'desc' => 'Sube la primera imagen para esta página.',
    'options' => array(
      'url' => false, // Desactiva el campo de texto para URL
    ),
  ));

  // Campo de imagen: Imagen 2
  $cmb->add_field(array(
    'name' => 'Imagen 2',
    'id'   => 'nosotros_imagen_2',
    'type' => 'file',
    'desc' => 'Sube la segunda imagen para esta página.',
    'options' => array(
      'url' => false,
    ),
  ));

  //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_nosotros_2', // ID único
    'title'         => 'Sección Nuestro Equipo', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id), // Aplica solo para la página con ID 25
    ),
  ));
  // Campo de texto: Título
  $cmb->add_field(array(
    'name' => 'Título de sección',
    'id'   => 'titulo_de_seccion_equipo',
    'type' => 'text',
    'desc' => 'Ingresa el título principal de la página.',
  ));

  // Campo de texto largo: Descripción
  $cmb->add_field(array(
    'name' => 'Descripción',
    'id'   => 'subtitulo_de_seccion_equipo',
    'type' => 'textarea',
    'desc' => 'Escribe una descripción detallada para la página.',
  ));

  // Crea el grupo de campos
  $group_field_id = $cmb->add_field(array(
    'id'          => 'grupo_colaboradores',
    'type'        => 'group',
    'description' => __('Agrega colaboradores y su información.', 'cmb2'),
    'options'     => array(
      'group_title'   => __(
        'Colaborador {#}',
        'cmb2'
      ), // {#} será reemplazado por el índice del grupo
      'add_button'    => __('Agregar Colaborador', 'cmb2'),
      'remove_button' => __('Eliminar Colaborador', 'cmb2'),
      'sortable'      => true, // Permitir ordenar los campos del grupo
    ),
  ));

  // Campo: Nombre del colaborador
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Nombre del Colaborador',
    'id'   => 'nombre_colaborador',
    'type' => 'text',
  ));

  // Campo: Cargo del colaborador
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Cargo del Colaborador',
    'id'   => 'cargo_colaborador',
    'type' => 'text',
  ));

  // Campo: Imagen del colaborador
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Imagen del Colaborador',
    'id'   => 'imagen_colaborador',
    'type' => 'file', // Permite subir una imagen
    'options' => array(
      'url' => false, // Ocultar el campo para la URL del archivo
    ),
    'text' => array(
      'add_upload_file_text' => __('Subir Imagen', 'cmb2'),
    ),
    'query_args' => array(
      'type' => array('image/jpeg', 'image/png', 'image/gif'), // Solo permite estos formatos de imagen
    ),
    'preview_size' => 'thumbnail', // Tamaño de la imagen de vista previa
  ));

  //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_nosotros_3', // ID único
    'title'         => 'Sección Misión Visión', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id), // Aplica solo para la página con ID 25
    ),
  ));

  // Campo de texto para la Misión
  $cmb->add_field(array(
    'name' => 'Misión', // Nombre del campo
    'desc' => 'Ingresa la misión de la empresa', // Descripción opcional
    'id'   => 'mision', // ID único del campo
    'type' => 'textarea', // Tipo de campo
    'sanitization_cb' => 'sanitize_textarea_field', // Sanitización del campo
  ));

  // Campo de texto para la Visión
  $cmb->add_field(array(
    'name' => 'Visión', // Nombre del campo
    'desc' => 'Ingresa la visión de la empresa', // Descripción opcional
    'id'   => 'vision', // ID único del campo
    'type' => 'textarea', // Tipo de campo
    'sanitization_cb' => 'sanitize_textarea_field', // Sanitización del campo
  ));

  // Campo para la imagen de la misión
  $cmb->add_field(array(
    'name' => 'Imagen de la Misión', // Nombre del campo
    'desc' => 'Sube una imagen representativa para la misión', // Descripción opcional
    'id'   => 'imagen_mision', // ID único del campo
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

  // Campo para la imagen de fondo de la sección
  $cmb->add_field(array(
    'name' => 'Imagen de Fondo', // Nombre del campo
    'desc' => 'Sube una imagen de fondo para la sección', // Descripción opcional
    'id'   => 'imagen_fondo', // ID único del campo
    'type' => 'file', // Tipo de campo
    'options' => array(
      'url' => true, // Permitir la URL
    ),
    'text' => array(
      'add_upload_file_text' => 'Subir imagen de fondo', // Texto del botón
    ),
    'query_args' => array(
      'type' => 'image', // Limitar a imágenes
    ),
  ));
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------