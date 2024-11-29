<?php

/**
 * CUSTOM FIELDS HOME
 */

function cmb2_custom_fields_inicio()
{
  // Obtiene el ID de la página configurada como "Inicio"
  $homepage_id = get_option('page_on_front');

  // Solo agrega el meta box si existe una página asignada como "Inicio"
  if ($homepage_id) {
    // Crea el meta box
    $cmb = new_cmb2_box(array(
      'id'           => 'repeater_imagenes_metabox', // ID único del meta box
      'title'        => 'Galería de imágenes', // Título del meta box
      'object_types' => array('page'), // Aplica a páginas (puedes cambiar a cualquier CPT)
      'show_on'      => array('key' => 'id', 'value' => array($homepage_id)), // Solo en la página de inicio
      'context'      => 'normal', // Ubicación: normal, side o advanced
      'priority'     => 'high', // Prioridad
      'show_names'   => true, // Mostrar nombres de los campos
    ));

    // Crea un campo de grupo (repetidor)
    $group_field_id = $cmb->add_field(array(
      'id'          => 'galeria_imagenes', // ID del campo de grupo
      'type'        => 'group',
      'description' => 'Sube múltiples imágenes',
      'options'     => array(
        'group_title'   => 'Imagen {#}', // Título de cada grupo, {#} se reemplaza con el número
        'add_button'    => 'Agregar Imagen', // Texto del botón para agregar
        'remove_button' => 'Eliminar Imagen', // Texto del botón para eliminar
        'sortable'      => true, // Permitir ordenar los elementos
      ),
    ));

    // Campo dentro del grupo para subir una imagen
    $cmb->add_group_field($group_field_id, array(
      'name' => 'Logo', // Nombre del campo
      'id'   => 'logo', // ID único dentro del grupo
      'type' => 'file', // Tipo de campo: subir archivo
      'options' => array(
        'url' => false, // Oculta el campo de URL
      ),
      'text' => array(
        'add_upload_file_text' => 'Subir Logo' // Texto del botón de carga
      ),
    ));

    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    $cmb = new_cmb2_box(array(
      'id'           => 'custom_fields_inicio', // ID único del meta box
      'title'        => 'Sección Eventos Académicos', // Título del meta box
      'object_types' => array('page'), // Se aplica a páginas
      'show_on'      => array('key' => 'id', 'value' => array($homepage_id)), // Solo en la página de inicio
      'context'      => 'normal', // Ubicación: normal, side o advanced
      'priority'     => 'high', // Prioridad del meta box
      'show_names'   => true, // Muestra los nombres de los campos
    ));

    // Campo de texto
    $cmb->add_field(array(
      'name' => 'Título de sección', // Nombre del campo
      // 'desc' => 'Ingresa un texto destacado para mostrar en la página de inicio.', // Descripción del campo
      'id'   => 'titulo_de_seccion_eventos', // ID único del campo
      'type' => 'text', // Tipo de campo
    ));

    // Campo de texto
    $cmb->add_field(array(
      'name' => 'Subtítulo de sección', // Nombre del campo
      // 'desc' => 'Ingresa un texto destacado para mostrar en la página de inicio.', // Descripción del campo
      'id'   => 'subtitulo_de_seccion_eventos', // ID único del campo
      'type' => 'text', // Tipo de campo
    ));

    // Campo de texto
    $cmb->add_field(array(
      'name' => 'Descripción Webinars', // Nombre del campo
      // 'desc' => 'Ingresa un texto destacado para mostrar en la página de inicio.', // Descripción del campo
      'id'   => 'descripcion_webinars', // ID único del campo
      'type' => 'text', // Tipo de campo
    ));

    // Campo de texto
    $cmb->add_field(array(
      'name' => 'Descripción Cursos', // Nombre del campo
      // 'desc' => 'Ingresa un texto destacado para mostrar en la página de inicio.', // Descripción del campo
      'id'   => 'descripcion_cursos', // ID único del campo
      'type' => 'text', // Tipo de campo
    ));
  }
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------