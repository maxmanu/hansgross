<?php

/**
 * CUSTOM FIELDS ACADEMICO
 */
add_action('cmb2_admin_init', 'custom_fields_pagina_academico');
function custom_fields_pagina_academico()
{
  $page_id = 27; // ID de la página "Academico"

  $cmb = new_cmb2_box(array(
    'id'            => 'custom_fields_academico', // ID único
    'title'         => 'Sección Todos los Cursos y Webinars', // Título del metabox
    'object_types'  => array('page'), // Solo para páginas
    'show_on'       => array(
      'key'   => 'id',
      'value' => array($page_id),
    ),
  ));

  $cmb->add_field(array(
    'name' => 'Título de sección',
    'id'   => 'titulo_seccion_todos_eventos_academicos',
    'type' => 'text',
    'desc' => 'Escribe un título para la sección.',
  ));
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------