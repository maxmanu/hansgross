<?php

/**
 * CUSTOM FIELDS CERTIFICADOS
 */
add_action('cmb2_admin_init', 'custom_fields_pagina_certificados');
function custom_fields_pagina_certificados()
{
  $page_id = 29; // ID de la página "Certificados"

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_certificados', // ID único
    'title'         => 'Sección Todos los Certificados', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id), // Aplica solo para la página con ID 25
    ),
  ));

  // Campo de texto largo: Descripción
  $cmb->add_field(array(
    'name' => 'Texto buscador',
    'id'   => 'texto_buscador',
    'type' => 'textarea',
    'desc' => 'Escribe una descripción.',
  ));
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------