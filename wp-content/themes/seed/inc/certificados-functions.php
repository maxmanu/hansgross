<?php

/**
 * CPT CERTIFICADOS
 */
function registrar_cpt_certificados()
{
  $labels = array(
    'name' => 'Certificados',
    'Post type general name',
    'singular_name' => 'Certificado',
    'Post type singular name',
    'menu_name' => 'Certificados',
    'Admin Menu text',
    'name_admin_bar' => 'Certificado',
    'Add New on Toolbar',
    'add_new' => 'Añadir nuevo',
    'add_new_item' => 'Añadir nuevo certificado',
    'new_item' => 'Nuevo certificado',
    'edit_item' => 'Editar certificado',
    'view_item' => 'Ver certificado',
    'all_items' => 'Todos los certificados',
    'search_items' => 'Buscar certificados',
    'parent_item_colon' => 'Certificado superior:',
    'not_found' => 'No se encontraron certificados.',
    'not_found_in_trash' => 'No se encontraron certificados en la papelera.',
    'featured_image' => 'Imagen destacada',
    'Overrides the “Featured Image” phrase for this post type.',
    'set_featured_image' => 'Establecer imagen destacada',
    'Overrides the “Set featured image” phrase for this post type.',
    'remove_featured_image' => 'Eliminar imagen destacada',
    'Overrides the “Remove featured image” phrase for this post type.',
    'use_featured_image' => 'Usar como imagen destacada',
    'Overrides the “Use as featured image” phrase for this post type.',
    'archives' => 'Archivo de certificados',
    'The post type archive label used in nav menus.',
    'insert_into_item' => 'Insertar en el certificado',
    'Overrides the “Insert into post” phrase.',
    'uploaded_to_this_item' => 'Subido a este certificado',
    'Overrides the “Uploaded to this post” phrase.',
    'filter_items_list' => 'Filtrar lista de certificados',
    'Screen reader text for the filter links.',
    'items_list_navigation' => 'Navegación de lista de certificados',
    'Screen reader text for the pagination.',
    'items_list' => 'Lista de certificados',
    'Screen reader text for the items list.',
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
    'title' => 'Información de Certificados',
    'object_types' => array('certificados'), // Aplica al Custom Post Type "certificados"
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));

  // Campo repetidor (group field)
  $group_field_id = $cmb->add_field(array(
    'id' => 'grupo_certificados',
    'type' => 'group',
    'description' => 'Añade información de certificados',
    'options' => array(
      'group_title' => 'Certificado {#}', // Título para cada grupo
      'add_button'    => 'Añadir Certificado',
      'remove_button' => 'Eliminar Certificado',
      'sortable'      => true, // Permitir reordenar
    ),
  ));

  // Subcampo: Número de código
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Número de Código',
    'id'   => 'numero_codigo',
    'type' => 'text',
    'attributes' => array(
      'placeholder' => 'Ej: 12345',
    ),
  ));

  // Subcampo: Nombre del Certificado
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Nombre del Certificado',
    'id'   => 'nombre_certificado',
    'type' => 'text',
    'attributes' => array(
      'placeholder' => 'Ej: Certificado de Excelencia',
    ),
  ));

  // Campo de texto para el año
  $cmb->add_group_field(
    $group_field_id,
    array(
      'name'       => 'Año', // Etiqueta del campo
      'desc'       => 'Introduce un año de 4 dígitos', // Descripción del campo
      'id'         => 'year_field', // ID único para el campo
      'type'       => 'text', // Tipo de campo
      'attributes' => array(
        'placeholder' => '2024', // Placeholder para el campo
        'type'        => 'number', // Solo permite números
      ),
    ),
  );

  // Subcampo: Subir PDF
  $cmb->add_group_field($group_field_id, array(
    'name' => 'Link del Certificado',
    'id'   => 'link_pdf',
    'type' => 'text_url',
  ));
}

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

      // Verifica si hay algún archivo PDF en el repetidor
      $grupo_certificados = get_post_meta($post_id, 'grupo_certificados', true);
      $mostrar_certificado = false;
      if (!empty($grupo_certificados)) {
        // Recorre los elementos del campo repetidor para verificar si existe un archivo PDF
        foreach ($grupo_certificados as $certificado) {
          if (!empty($certificado['link_pdf'])) {
            $mostrar_certificado = true;
            break;
          }
        }
      }

      // Si no hay archivo PDF, no mostrar este certificado
      if ($mostrar_certificado) {
        $num_resultados++; // Salta el certificado si no hay archivo PDF
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

        // Verifica si hay algún archivo PDF en el repetidor
        $grupo_certificados = get_post_meta($post_id, 'grupo_certificados', true);
        $mostrar_certificado = false;
        if (!empty($grupo_certificados)) {
          // Recorre los elementos del campo repetidor para verificar si existe un archivo PDF
          foreach ($grupo_certificados as $certificado) {
            if (!empty($certificado['link_pdf'])) {
              $mostrar_certificado = true;
              break;
            }
          }
        }

        // Si no hay archivo PDF, no mostrar este certificado
        if (!$mostrar_certificado) {
          continue; // Salta el certificado si no hay archivo PDF
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
                        <th scope="col" class="text-center">Código</th>
                        <th scope="col" class="text-center">Año</th>
                        <th scope="col" class="text-center">Certificado</th>
                        <th scope="col" class="text-center">Visualizar</th>
                    </tr>
                </thead>
                <tbody>';

  foreach ($grupo_certificados as $certificado) {
    $numero_codigo = esc_html($certificado['numero_codigo']);
    $year_field = esc_html($certificado['year_field']);
    $nombre_certificado = esc_html($certificado['nombre_certificado']);
    $archivo_pdf = esc_url($certificado['link_pdf']);

    $output .= "<tr>
                    <td class='text-center'>
                        <img src='" . get_template_directory_uri() . "/assets/img/icon-diploma.png' class='img-fluid' alt='...'>
                        <span>{$numero_codigo}</span>
                    </td>
                    <td class='text-center'>
                        <div class='pt-3'>
                            <span>{$year_field}</span>
                        </div>
                    </td>
                    <td class='text-center'>
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

  // Inserta el valor de ajaxurl como una constante en el script
  $inline_script = 'const ajaxurl = "' . admin_url('admin-ajax.php') . '";';
  wp_add_inline_script('certificados-ajax-script', $inline_script);
}
add_action('wp_enqueue_scripts', 'encolar_scripts_certificados');
