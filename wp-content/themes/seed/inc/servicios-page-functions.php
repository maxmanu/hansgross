<?php

/**
 * CUSTOM FIELDS SERVICIOS
 */
add_action('cmb2_admin_init', 'custom_fields_pagina_servicios');
function custom_fields_pagina_servicios()
{
  $page_id = 36; // ID de la página "Servicios"

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_servicios', // ID único
    'title'         => 'Sección Todos los Servicios', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'priority'      => 'low',
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id), // Aplica solo para la página con ID 25
    ),
  ));

  // Campo de texto: Título
  $cmb->add_field(array(
    'name' => 'Título de sección',
    'id'   => 'servicios_titulo',
    'type' => 'text',
    'desc' => 'Ingresa el título principal de la página.',
  ));

  // Campo de texto largo: Descripción
  $cmb->add_field(array(
    'name' => 'Descripción',
    'id'   => 'servicios_descripcion',
    'type' => 'textarea',
    'desc' => 'Escribe una descripción detallada para la página.',
  ));

  // Campo de texto: Título
  $cmb->add_field(array(
    'name' => 'Mensaje de Whatsapp',
    'id'   => 'texto_whatsapp',
    'type' => 'text',
    'desc' => 'Ingresa el mensaje para whatsapp.',
  ));
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------