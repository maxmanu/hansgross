<?php

/**
 * CUSTOM FIELDS BLOG
 */
add_action('cmb2_admin_init', 'custom_fields_pagina_blog');
function custom_fields_pagina_blog()
{
  $page_id = 31; // ID de la página "Blog"

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_blog', // ID único
    'title'         => 'Sección Todas las Noticias', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id),
    ),
    'priority'      => 'low',
  ));

  // Campo de texto largo: Descripción
  $cmb->add_field(array(
    'name' => 'Título de sección',
    'id'   => 'titulo_seccion_noticias',
    'type' => 'text',
    'desc' => 'Escribe un título para la sección.',
  ));
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------