<?php

/**
 * CUSTOM FIELDS SOFTWARES
 */
add_action('cmb2_admin_init', 'custom_fields_pagina_softwares');
function custom_fields_pagina_softwares()
{
  $page_id = 38; // ID de la página "Softwares"

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_softwares', // ID único
    'title'         => 'Sección Todos las Soluciones', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id), // Aplica solo para la página con ID 25
    ),
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