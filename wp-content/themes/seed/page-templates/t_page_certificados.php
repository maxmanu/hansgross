<?php
/*
Template Name:  Certificados
*/
get_header();
$titulo_hero = get_post_meta(get_the_ID(), 'pagina_titulo', true);
$subtitulo = get_post_meta(get_the_ID(), 'pagina_subtitulo', true);
$texto_buscador = get_post_meta(get_the_ID(), 'texto_buscador', true);
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
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

<section class="section-table-certificados">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-11 mx-auto">
        <div class="card-search">
          <?php if (!empty($texto_buscador)): ?>
            <p class="pb-3"><?php echo esc_html($texto_buscador); ?></p>
          <?php endif; ?>
          <form id="search-certificados-form">
            <div class="input-group mb-3 mx-auto">
              <input type="text" id="search-certificados" name="search" class="form-control" placeholder="Ingresa nombres y apellidos completos" aria-label="Ingresa nombres y apellidos" aria-describedby="button-addon2">
              <button class="btn btn--search" type="button" id="search-certificados-button">Buscar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-lg-11 mx-auto">
        <div id="results-count" class="mb-3"></div>
        <div id="certificados-results"></div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>