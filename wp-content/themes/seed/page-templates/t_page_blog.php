<?php
/*
Template Name:  Blog
*/
get_header();
$titulo_hero = get_post_meta(get_the_ID(), 'pagina_titulo', true);
$subtitulo = get_post_meta(get_the_ID(), 'pagina_subtitulo', true);
$titulo_seccion = get_post_meta(get_the_ID(), 'titulo_seccion_noticias', true);
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7 text-center text-md-start">
          <?php if (!empty($titulo_hero)): ?>
            <h1 class="banner-title"><?php echo esc_html($titulo_hero); ?></h1>
          <?php endif; ?>
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
    <div class="row align-items-center mb-md-5 px-md-5">
      <div class="col-lg-9 mx-auto">
        <?php
        if (!empty($titulo_seccion)) {
          echo '<h2 class="colorgreen-2">' . esc_html($titulo_seccion) . '</h2>';
        }
        ?>
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