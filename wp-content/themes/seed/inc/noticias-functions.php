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
            <div class="btn-category-card">23 de Setiembre</div>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text mb-1">Por Rodrigo Esteban</p>
            <?php
            // Obtener las categorías del post
            $categories = get_the_category();
            // Verificar si el post tiene categorías
            if (!empty($categories)) {
              // Mostrar la primera categoría
              echo '<p class="card-category mb-1">Categoría: ' . esc_html($categories[0]->name) . '</p>';
            }
            ?>
            <p class="card-text"><?php the_excerpt(); ?></p>
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
