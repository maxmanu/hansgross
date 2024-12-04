<?php

/**
 * FILTRO DE POST POR CATEGORÍAS
 */
function filter_posts_by_category()
{
  // Recuperar la categoría seleccionada
  $category_id = isset($_GET['category']) ? $_GET['category'] : '';

  // Configurar los parámetros de la consulta
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1, // Mostrar todos los posts
  );

  if ($category_id) {
    $args['cat'] = $category_id; // Filtrar por categoría
  }

  // Ejecutar la consulta
  $query = new WP_Query($args);

  // Verificar si hay resultados
  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
?>
      <div class="col">
        <div class="card card--blog h-100">
          <div class="position-relative">
            <div class="btn-category-card">
              <?php
              $fecha_publicacion = get_the_date('j \d\e F, Y');
              $fecha_publicacion_es = traducir_mes($fecha_publicacion);
              echo '<span>' . esc_html($fecha_publicacion_es) . '</span>';
              ?>
            </div>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text mb-1">Por
              <?php
              $custom_author_name = get_post_meta(get_the_ID(), 'custom_author_name', true);
              echo !empty($custom_author_name) ? esc_html($custom_author_name) : 'Autor desconocido';
              ?>
            </p>
            <?php
            // Obtener las categorías del post
            $categories = get_the_category();
            // Verificar si el post tiene categorías
            if (!empty($categories)) {
              // Mostrar la primera categoría
              echo '<p class="card-category mb-1">Categoría: ' . esc_html($categories[0]->name) . '</p>';
            }
            ?>
            <p class="card-text"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?></p>
          </div>
          <div class="card-footer colorgreen-2">
            <div><a href="<?php the_permalink() ?>">Mostrar más</a></div>
            <div class="btn-arrows-servicios">
              <a href="<?php the_permalink() ?>"><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
<?php
    endwhile;
  else :
    echo 'No se encontraron posts.';
  endif;

  // Restablecer post data
  wp_reset_postdata();

  die(); // Finaliza la ejecución
}

add_action('wp_ajax_filter_posts_by_category', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filter_posts_by_category', 'filter_posts_by_category');

//-----------------------------------------------------------------------------------

add_action('cmb2_admin_init', 'cmb2_add_author_field');

function cmb2_add_author_field()
{
  // Configuración del metabox
  $cmb = new_cmb2_box(array(
    'id'            => 'author_metabox', // ID único del metabox
    'title'         => __('Información del Autor', 'textdomain'), // Título del metabox
    'object_types'  => array('post'), // Tipos de contenido donde se aplicará (en este caso, solo posts)
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  // Añadir un campo de texto para el autor
  $cmb->add_field(array(
    'name'       => __('Nombre del Autor', 'textdomain'), // Etiqueta del campo
    'desc'       => __('Introduce el nombre del autor.', 'textdomain'), // Descripción debajo del campo
    'id'         => 'custom_author_name', // ID único del campo
    'type'       => 'text', // Tipo de campo (en este caso, texto)
    // 'attributes' => array(
    //   // 'required' => true, // Hacerlo obligatorio
    // ),
  ));

  //--------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'author_metabox_2', // ID único del metabox
    'title'         => __('Primera Fila de Contenido', 'textdomain'), // Título del metabox
    'object_types'  => array('post'), // Tipos de contenido donde se aplicará (en este caso, solo posts)
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  // Añadir un campo de texto para el autor
  $cmb->add_field(array(
    'name'       => __('Texto de primera fila', 'textdomain'), // Etiqueta del campo
    'desc'       => __('Introduce una descripción.', 'textdomain'), // Descripción debajo del campo
    'id'         => 'texto_fila_1', // ID único del campo
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop' => true, // use wpautop?
      'media_buttons' => false, // show insert/upload button(s)
      'teeny'         => false, // Usa el editor estándar (no simplificado)
    ),
  ));

  // Campo: Imagen del colaborador
  $cmb->add_field(array(
    'name' => 'Imagen',
    'id'   => 'imagen_fila_1',
    'type' => 'file', // Permite subir una imagen
    'options' => array(
      'url' => false, // Ocultar el campo para la URL del archivo
    ),
    'text' => array(
      'add_upload_file_text' => __('Subir Imagen', 'cmb2'),
    ),
    'query_args' => array(
      'type' => array('image/jpeg', 'image/png', 'image/gif'), // Solo permite estos formatos de imagen
    ),
    'preview_size' => 'thumbnail', // Tamaño de la imagen de vista previa
  ));

  //--------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'author_metabox_3', // ID único del metabox
    'title'         => __('Segunda Fila de Contenido', 'textdomain'), // Título del metabox
    'object_types'  => array('post'), // Tipos de contenido donde se aplicará (en este caso, solo posts)
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  // Añadir un campo de texto para el autor
  $cmb->add_field(array(
    'name'       => __('Texto de segunda fila', 'textdomain'), // Etiqueta del campo
    'desc'       => __('Introduce una descripción.', 'textdomain'), // Descripción debajo del campo
    'id'         => 'texto_fila_2', // ID único del campo
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop' => true, // use wpautop?
      'media_buttons' => false, // show insert/upload button(s)
      'teeny'         => false, // Usa el editor estándar (no simplificado)
    ),
  ));

  //--------------------------------------------------------------------------------

  $cmb = new_cmb2_box(array(
    'id'            => 'author_metabox_4', // ID único del metabox
    'title'         => __('Tercera Fila de Contenido', 'textdomain'), // Título del metabox
    'object_types'  => array('post'), // Tipos de contenido donde se aplicará (en este caso, solo posts)
    'context'       => 'normal', // Dónde aparecerá (normal, side, advanced)
    'priority'      => 'high', // Prioridad del metabox
    'show_names'    => true, // Mostrar etiquetas del campo
  ));

  // Campo: Imagen del colaborador
  $cmb->add_field(array(
    'name' => 'Imagen',
    'id'   => 'imagen_fila_3',
    'type' => 'file', // Permite subir una imagen
    'options' => array(
      'url' => false, // Ocultar el campo para la URL del archivo
    ),
    'text' => array(
      'add_upload_file_text' => __('Subir Imagen', 'cmb2'),
    ),
    'query_args' => array(
      'type' => array(
        'image/jpeg',
        'image/png',
        'image/gif'
      ), // Solo permite estos formatos de imagen
    ),
    'preview_size' => 'thumbnail', // Tamaño de la imagen de vista previa
  ));

  // Añadir un campo de texto para el autor
  $cmb->add_field(array(
    'name'       => __('Texto de tercera fila', 'textdomain'), // Etiqueta del campo
    'desc'       => __('Introduce una descripción.', 'textdomain'), // Descripción debajo del campo
    'id'         => 'texto_fila_3', // ID único del campo
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop' => true, // use wpautop?
      'media_buttons' => false, // show insert/upload button(s)
      'teeny'         => false, // Usa el editor estándar (no simplificado)
    ),
  ));
}
