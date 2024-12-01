<?php

/**
 * CUSTOM FIELDS CONTACTANOS
 */
add_action('cmb2_admin_init', 'custom_fields_pagina_contactanos');
function custom_fields_pagina_contactanos()
{
  $page_id = 33; // ID de la página "Contactanos"

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_contactanos', // ID único
    'title'         => 'Sección Información de Contacto', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id), // Aplica solo para la página con ID 25
    ),
  ));

  // Campo de texto: Título
  $cmb->add_field(array(
    'name' => 'Título de sección',
    'id'   => 'titulo_de_seccion_informacion',
    'type' => 'text',
    'desc' => 'Ingresa el título de la sección.',
  ));

  // Campo de texto largo: Descripción
  $cmb->add_field(array(
    'name' => 'Descripción',
    'id'   => 'subtitulo_de_seccion_informacion',
    'type' => 'textarea',
    'desc' => 'Escribe una descripción detallada para la sección.',
  ));

  //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_contactanos_2', // ID único
    'title'         => 'Sección Envíanos un Mensaje', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id), // Aplica solo para la página con ID 25
    ),
  ));

  // Campo de texto: Título
  $cmb->add_field(array(
    'name' => 'Título de sección',
    'id'   => 'titulo_de_seccion_formulario',
    'type' => 'text',
    'desc' => 'Ingresa el título de la sección.',
  ));

  // Campo de texto largo: Descripción
  $cmb->add_field(array(
    'name' => 'Descripción',
    'id'   => 'subtitulo_de_seccion_formulario',
    'type' => 'textarea',
    'desc' => 'Escribe una descripción detallada para la sección.',
  ));
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------