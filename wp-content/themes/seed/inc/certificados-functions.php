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

// function cargar_scripts_buscador()
// {
//   wp_enqueue_script('buscador-certificados', get_template_directory_uri() . '/js/custom-certificados.js', array('jquery'), null, true);

//   // Agregar el objeto AJAX
//   wp_localize_script('buscador-certificados', 'ajax_object', array(
//     'ajax_url' => admin_url('admin-ajax.php'), // URL del endpoint AJAX
//   ));
// }
// add_action('wp_enqueue_scripts', 'cargar_scripts_buscador');

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------

function buscar_certificados_ajax()
{
  // Verifica que la solicitud sea válida
  if (!isset($_POST['search']) || empty($_POST['search'])) {
    wp_send_json_error(['message' => 'No se recibió el término de búsqueda.']);
    wp_die();
  }

  // Limpia el término de búsqueda
  $search_term = sanitize_text_field($_POST['search']);

  // Configura la consulta personalizada
  $args = [
    'post_type'      => 'certificados',
    'posts_per_page' => -1,
    's'              => $search_term,
  ];

  $query = new WP_Query($args);

  // Genera el HTML de respuesta
  $num_resultados = 0; // Inicializa el contador
  $response = '';

  if ($query->have_posts()) {
    // Cuenta los certificados válidos
    while ($query->have_posts()) {
      $query->the_post();

      $post_id = get_the_ID();
      $grupo_certificados = get_post_meta($post_id, 'grupo_certificados', true);

      if (!empty($grupo_certificados)) {
        $num_resultados++; // Incrementa el contador solo si hay contenido válido
      }
    }

    // Si hay certificados válidos, genera el HTML
    if ($num_resultados > 0) {
      $response .= '<div class="accordion accordion-flush" id="accordion-certificados">';

      // Reinicia el loop para generar los resultados
      $query->rewind_posts();
      while ($query->have_posts()) {
        $query->the_post();

        $post_id = get_the_ID();
        $grupo_certificados = get_post_meta($post_id, 'grupo_certificados', true);

        if (empty($grupo_certificados)) {
          continue; // Salta los certificados sin contenido válido
        }

        $response .= sprintf(
          '<div class="accordion-item">
                        <h2 class="accordion-header" id="heading-%1$s">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-%1$s" aria-expanded="false" aria-controls="collapse-%1$s">
                                %2$s
                            </button>
                        </h2>
                        <div id="collapse-%1$s" class="accordion-collapse collapse" aria-labelledby="heading-%1$s" data-bs-parent="#accordion-certificados">
                            <div class="accordion-body" id="detalles-certificado-%1$s">
                                <!-- Los detalles del certificado se cargarán aquí mediante AJAX -->
                                <p>Cargando detalles...</p>
                            </div>
                        </div>
                    </div>',
          $post_id, // ID único
          get_the_title() // Título del certificado
        );
      }

      $response .= '</div>';
    } else {
      // No hay certificados con contenido válido
      $response = '<p>No se encontraron certificados con información válida.</p>';
    }
  } else {
    // No hay posts que coincidan con la búsqueda
    $response = '<p>No se encontraron certificados.</p>';
  }

  wp_reset_postdata();

  // Envía la respuesta con los datos generados
  wp_send_json_success(['html' => $response, 'count' => $num_resultados]);
}
add_action('wp_ajax_buscar_certificados', 'buscar_certificados_ajax');
add_action('wp_ajax_nopriv_buscar_certificados', 'buscar_certificados_ajax');




function obtener_detalles_certificado()
{
  if (!isset($_POST['post_id'])) {
    wp_send_json_error('No se proporcionó el ID del certificado.');
    wp_die();
  }

  $post_id = intval($_POST['post_id']);

  // Obtén los datos del campo repetidor
  $grupo_certificados = get_post_meta($post_id, 'grupo_certificados', true);

  if (!$grupo_certificados) {
    echo '<p>No se encontraron datos para este certificado.</p>';
    wp_die();
  }

  // Genera la tabla con los datos del campo repetidor
  $output = '<div class="table-responsive-xl">';
  $output = '<table class="table">';
  $output .= '<thead class="table-light">
                    <tr>
                        <th scope="col" class="first-title-table">Código</th>
                        <th scope="col">Certificado</th>
                        <th scope="col" class="text-center">Visualizar</th>
                        <th scope="col" class="text-center">Descargar</th>
                    </tr>
                </thead>
                <tbody>';

  foreach ($grupo_certificados as $certificado) {
    $numero_codigo = esc_html($certificado['numero_codigo']);
    $nombre_certificado = esc_html($certificado['nombre_certificado']);
    $archivo_pdf = esc_url($certificado['archivo_pdf']);

    $output .= "<tr>
                    <td>
                        <img src='" . get_template_directory_uri() . "/assets/img/icon-diploma.png' class='img-fluid' alt='...'>
                        <span>{$numero_codigo}</span>
                    </td>
                    <td>
                        <div class='pt-3'>
                            <span>{$nombre_certificado}</span>
                        </div>
                    </td>
                    <td class='text-center'>
                        <div class='pt-3'>
                            <a href='{$archivo_pdf}' target='_blank'>
                                <img src='" . get_template_directory_uri() . "/assets/img/icon-eye.png' class='img-fluid icon-table' alt='...'>
                            </a>
                        </div>
                    </td>
                    <td class='text-center'>
                        <div class='pt-3'>
                            <a href='{$archivo_pdf}' download target='_blank'>
                                <img src='" . get_template_directory_uri() . "/assets/img/icon-expediente.png' class='img-fluid icon-table' alt=''>
                            </a>
                        </div>
                    </td>
                </tr>";
  }

  $output .= '</tbody></table>';
  $output .= '</div>';


  echo $output;
  wp_die();
}
add_action('wp_ajax_obtener_detalles_certificado', 'obtener_detalles_certificado');
add_action('wp_ajax_nopriv_obtener_detalles_certificado', 'obtener_detalles_certificado');



function encolar_scripts_certificados()
{
  wp_enqueue_script(
    'certificados-ajax-script',
    get_template_directory_uri() . '/js/custom-certificados.js', // Ajusta según tu estructura
    ['jquery'], // Dependencia de jQuery
    null,
    true
  );

  // Pasa la variable `ajaxurl` al script
  wp_localize_script('certificados-ajax-script', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'encolar_scripts_certificados');
