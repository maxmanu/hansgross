<?php

/**
 * CPT CERTIFICADOS
 */
function registrar_cpt_certificados()
{
  $labels = array(
    'name' => _x('Certificados', 'Post type general name', 'tu-text-domain'),
    'singular_name' => _x('Certificado', 'Post type singular name', 'tu-text-domain'),
    'menu_name' => _x('Certificados', 'Admin Menu text', 'tu-text-domain'),
    'name_admin_bar' => _x('Certificado', 'Add New on Toolbar', 'tu-text-domain'),
    'add_new' => __('Añadir nuevo', 'tu-text-domain'),
    'add_new_item' => __('Añadir nuevo certificado', 'tu-text-domain'),
    'new_item' => __('Nuevo certificado', 'tu-text-domain'),
    'edit_item' => __('Editar certificado', 'tu-text-domain'),
    'view_item' => __('Ver certificado', 'tu-text-domain'),
    'all_items' => __('Todos los certificados', 'tu-text-domain'),
    'search_items' => __('Buscar certificados', 'tu-text-domain'),
    'parent_item_colon' => __('Certificado superior:', 'tu-text-domain'),
    'not_found' => __('No se encontraron certificados.', 'tu-text-domain'),
    'not_found_in_trash' => __('No se encontraron certificados en la papelera.', 'tu-text-domain'),
    'featured_image' => _x('Imagen destacada', 'Overrides the “Featured Image” phrase for this post type.', 'tu-text-domain'),
    'set_featured_image' => _x('Establecer imagen destacada', 'Overrides the “Set featured image” phrase for this post type.', 'tu-text-domain'),
    'remove_featured_image' => _x('Eliminar imagen destacada', 'Overrides the “Remove featured image” phrase for this post type.', 'tu-text-domain'),
    'use_featured_image' => _x('Usar como imagen destacada', 'Overrides the “Use as featured image” phrase for this post type.', 'tu-text-domain'),
    'archives' => _x('Archivo de certificados', 'The post type archive label used in nav menus.', 'tu-text-domain'),
    'insert_into_item' => _x('Insertar en el certificado', 'Overrides the “Insert into post” phrase.', 'tu-text-domain'),
    'uploaded_to_this_item' => _x('Subido a este certificado', 'Overrides the “Uploaded to this post” phrase.', 'tu-text-domain'),
    'filter_items_list' => _x('Filtrar lista de certificados', 'Screen reader text for the filter links.', 'tu-text-domain'),
    'items_list_navigation' => _x('Navegación de lista de certificados', 'Screen reader text for the pagination.', 'tu-text-domain'),
    'items_list' => _x('Lista de certificados', 'Screen reader text for the items list.', 'tu-text-domain'),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'certificados'),
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-awards', // Cambia el ícono si lo deseas.
    'supports' => array('title'),
  );

  register_post_type('certificados', $args);
}
add_action('init', 'registrar_cpt_certificados');

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/**
 * CUSTOM FIELDS CERTIFICADOS
 */
add_action('cmb2_admin_init', 'crear_campos_certificados');
function crear_campos_certificados()
{
  // Crear un metabox para el CPT "certificados"
  $cmb = new_cmb2_box(array(
    'id' => 'certificados_metabox',
    'title' => __('Información de Certificados', 'textdomain'),
    'object_types' => array('certificados'), // Aplica al Custom Post Type "certificados"
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));

  // Campo repetidor (group field)
  $group_field_id = $cmb->add_field(array(
    'id' => 'grupo_certificados',
    'type' => 'group',
    'description' => __('Añade información de certificados', 'textdomain'),
    'options' => array(
      'group_title' => __('Certificado {#}', 'textdomain'), // Título para cada grupo
      'add_button'    => __('Añadir Certificado', 'textdomain'),
      'remove_button' => __('Eliminar Certificado', 'textdomain'),
      'sortable'      => true, // Permitir reordenar
    ),
  ));

  // Subcampo: Número de código
  $cmb->add_group_field($group_field_id, array(
    'name' => __('Número de Código', 'textdomain'),
    'id'   => 'numero_codigo',
    'type' => 'text',
    'attributes' => array(
      'placeholder' => __('Ej: 12345', 'textdomain'),
    ),
  ));

  // Subcampo: Nombre del Certificado
  $cmb->add_group_field($group_field_id, array(
    'name' => __('Nombre del Certificado', 'textdomain'),
    'id'   => 'nombre_certificado',
    'type' => 'text',
    'attributes' => array(
      'placeholder' => __('Ej: Certificado de Excelencia', 'textdomain'),
    ),
  ));

  // Subcampo: Subir PDF
  $cmb->add_group_field($group_field_id, array(
    'name' => __('Subir PDF del Certificado', 'textdomain'),
    'id'   => 'archivo_pdf',
    'type' => 'file',
    'options' => array(
      'url' => false, // Ocultar campo URL adicional
    ),
    'text' => array(
      'add_upload_file_text' => __('Subir PDF', 'textdomain'),
    ),
  ));
}


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/**
 * FUNCIONALIDAD BUSCAR CERTIFICADOS
 */

// add_action('wp_ajax_buscar_certificados', 'buscar_certificados');
// add_action('wp_ajax_nopriv_buscar_certificados', 'buscar_certificados');

// function buscar_certificados()
// {
//   $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

//   if (empty($query)) {
//     wp_send_json(array(
//       'titulo' => '',
//       'contenido' => '<p>Por favor, escribe algo para buscar.</p>'
//     ));
//   }

//   $args = array(
//     'post_type' => 'certificados',
//     'post_status' => 'publish',
//     'title' => $query,
//     'posts_per_page' => 1,
//   );

//   $certificados = new WP_Query($args);

//   if ($certificados->have_posts()) {
//     $certificados->the_post();

//     // Obtener título del post
//     $titulo = get_the_title();

//     // Obtener los custom fields
//     $custom_fields = get_post_meta(get_the_ID(), 'grupo_certificados', true);
//     $contenido = '';

//     if (!empty($custom_fields)) {
//       foreach ($custom_fields as $field) {
//         $codigo = isset($field['numero_codigo']) ? esc_html($field['numero_codigo']) : '';
//         $nombre = isset($field['nombre_certificado']) ? esc_html($field['nombre_certificado']) : '';
//         $pdf = isset($field['archivo_pdf']) ? esc_url($field['archivo_pdf']) : '';

//         $contenido .= '<tr>';
//         $contenido .= '<th>';
//         $contenido .= '<img src="' . get_template_directory_uri() . '/assets/img/icon-diploma.png" class="img-fluid me-3" alt="...">';
//         if ($codigo) {
//           $contenido .= '<span>' . $codigo . '</span>';
//         }
//         $contenido .= '</th>';
//         $contenido .= '<td>';
//         $contenido .= '<div class="pt-3">';
//         if ($nombre) {
//           $contenido .= '<span>' . $nombre . '</span>';
//         }
//         $contenido .= '</div>';
//         $contenido .= '</td>';
//         $contenido .= '<td class="text-center">';
//         $contenido .= '<div class="pt-3">';
//         if ($pdf) {
//           $contenido .= '<a href="' . $pdf . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/img/icon-eye.png" class="img-fluid icon-table" alt="..."></a>';
//         }
//         $contenido .= '</div>';
//         $contenido .= '</td>';
//         $contenido .= '<td class="text-center">';
//         $contenido .= '<div class="pt-3">';
//         if ($pdf) {
//           $contenido .= '<a href="' . $pdf . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/img/icon-expediente.png" class="img-fluid icon-table" alt=""></a>';
//         }
//         $contenido .= '</div>';
//         $contenido .= '</td>';
//         $contenido .= '</tr>';
//       }
//     } else {
//       $contenido .= '<p>No se encontraron detalles para este certificado.</p>';
//     }

//     wp_send_json(array(
//       'titulo' => $titulo,
//       'contenido' => $contenido
//     ));
//   } else {
//     wp_send_json(array(
//       'titulo' => '',
//       'contenido' => '<p>No se encontró ningún certificado con el título exacto "' . esc_html($query) . '".</p>'
//     ));
//   }
// }

function cargar_scripts_buscador()
{
  wp_enqueue_script('buscador-certificados', get_template_directory_uri() . '/js/custom-certificados.js', array('jquery'), null, true);

  // Agregar el objeto AJAX
  wp_localize_script('buscador-certificados', 'ajax_object', array(
    'ajax_url' => admin_url('admin-ajax.php'), // URL del endpoint AJAX
  ));
}
add_action('wp_enqueue_scripts', 'cargar_scripts_buscador');

/**
 * FUNCIONALIDAD BUSCAR CERTIFICADOS
 */

add_action('wp_ajax_buscar_certificados', 'buscar_certificados');
add_action('wp_ajax_nopriv_buscar_certificados', 'buscar_certificados');

function buscar_certificados()
{
  // Obtener el parámetro de búsqueda
  $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

  if (empty($query)) {
    wp_send_json(array(
      'titulo' => '',
      'contenido' => '<p>Por favor, escribe algo para buscar.</p>'
    ));
  }

  // Modificar la consulta para buscar por título exacto
  add_filter('posts_where', 'filtrar_busqueda_por_titulo');

  $args = array(
    'post_type' => 'certificados',
    'post_status' => 'publish',
    'posts_per_page' => 1, // Un solo resultado
  );

  $certificados = new WP_Query($args);

  // Quitar el filtro después de la consulta
  remove_filter('posts_where', 'filtrar_busqueda_por_titulo');

  // Preparar la respuesta
  if ($certificados->have_posts()) {
    $certificados->the_post();

    // Obtener título del post
    $titulo = get_the_title();

    // Obtener los custom fields
    $custom_fields = get_post_meta(get_the_ID(), 'grupo_certificados', true);
    $contenido = '';

    if (!empty($custom_fields)) {
      foreach ($custom_fields as $field) {
        $codigo = isset($field['numero_codigo']) ? esc_html($field['numero_codigo']) : '';
        $nombre = isset($field['nombre_certificado']) ? esc_html($field['nombre_certificado']) : '';
        $pdf = isset($field['archivo_pdf']) ? esc_url($field['archivo_pdf']) : '';

        $contenido .= '<tr>';
        $contenido .= '<th>';
        $contenido .= '<img src="' . get_template_directory_uri() . '/assets/img/icon-diploma.png" class="img-fluid me-3" alt="...">';
        if ($codigo) {
          $contenido .= '<span>' . $codigo . '</span>';
        }
        $contenido .= '</th>';
        $contenido .= '<td>';
        $contenido .= '<div class="pt-3">';
        if ($nombre) {
          $contenido .= '<span>' . $nombre . '</span>';
        }
        $contenido .= '</div>';
        $contenido .= '</td>';
        $contenido .= '<td class="text-center">';
        $contenido .= '<div class="pt-3">';
        if ($pdf) {
          $contenido .= '<a href="' . $pdf . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/img/icon-eye.png" class="img-fluid icon-table" alt="..."></a>';
        }
        $contenido .= '</div>';
        $contenido .= '</td>';
        $contenido .= '<td class="text-center">';
        $contenido .= '<div class="pt-3">';
        if ($pdf) {
          $contenido .= '<a href="' . $pdf . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/img/icon-expediente.png" class="img-fluid icon-table" alt=""></a>';
        }
        $contenido .= '</div>';
        $contenido .= '</td>';
        $contenido .= '</tr>';
      }
    } else {
      $contenido .= '<p>No se encontraron detalles para este certificado.</p>';
    }

    wp_reset_postdata(); // Restablecer la consulta

    wp_send_json(array(
      'titulo' => $titulo,
      'contenido' => $contenido
    ));
  } else {
    wp_send_json(array(
      'titulo' => '',
      'contenido' => '<p>No se encontró ningún certificado con el título exacto "' . esc_html($query) . '".</p>'
    ));
  }
}

/**
 * Filtro para buscar por título exacto
 */
function filtrar_busqueda_por_titulo($where)
{
  global $wpdb;
  if (isset($_POST['query']) && !empty($_POST['query'])) {
    $titulo = sanitize_text_field($_POST['query']);
    $where .= $wpdb->prepare(" AND {$wpdb->posts}.post_title = %s", $titulo);
  }
  return $where;
}
