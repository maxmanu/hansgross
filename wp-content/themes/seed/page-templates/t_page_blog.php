<?php
/*
Template Name:  Blog
*/
get_header();
$subtitulo = get_post_meta(get_the_ID(), 'pagina_subtitulo', true);
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
          <h1 class="banner-title"><?php echo get_the_title() ?></h1>
          <?php if (!empty($subtitulo)): ?>
            <p class="banner-subtitle"><?php echo esc_html($subtitulo); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-blog ptb-100">
  <div class="container">
    <div class="row align-items-center mb-5 px-5">
      <div class="col-lg-9 mx-auto">
        <h2 class="colorgreen-2">Notas - Eventos</h2>
      </div>
      <div class="col-lg-3 pb-3">
        <form id="category-filter-form">
          <select class="form-select select-category" id="category-filter" name="category">
            <option value="">Categoría</option>
            <?php
            // Obtener todas las categorías
            $categories = get_categories();
            foreach ($categories as $category) {
              echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
            }
            ?>
          </select>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-card-servicios g-4" id="posts-container">
          <!-- <?php
                $args = array(
                  'post_type' => 'post',
                  'paged' => $paged,
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                  while ($query->have_posts()) : $query->the_post(); ?>
              <div class="col">
                <div class="card card--blog h-100">
                  <div class="position-relative">
                    <div class="btn-category-card">23 de Setiembre</div>
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="card-img-top" alt="...">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo get_the_title() ?></h5>
                    <p class="card-text mb-1">Por Rodrigo Esteban</p>
                    <p class="card-category mb-1">Categoría: Criminalística</p>
                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing .</p>
                  </div>
                  <div class="card-footer colorgreen-2">
                    <div><a href="<?php echo get_the_permalink() ?>">Mostrar más</a></div>
                    <div class="btn-arrows-servicios">
                      <a href="<?php echo get_the_permalink() ?>"><i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
          <?php endwhile;
                }
                wp_reset_postdata();
          ?> -->
        </div>
        <!-- <div class="row">
          <div class="col">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-end">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
              </ul>
            </nav>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>