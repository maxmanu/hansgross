<?php
/*
Template Name:  Académico
*/
get_header();
$titulo_hero = get_post_meta(get_the_ID(), 'pagina_titulo', true);
$subtitulo = get_post_meta(get_the_ID(), 'pagina_subtitulo', true);
$titulo_section = get_post_meta(get_the_ID(), 'titulo_seccion_todos_eventos_academicos', true);
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>); background-repeat: no-repeat; background-size: cover">
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

<section class="section-todos-cursos ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-2 mb-5">
        <?php if (!empty($titulo_section)): ?>
          <h2 class="colorgreen-2"><?php echo esc_html($titulo_section); ?></h2>
        <?php endif; ?>
      </div>
    </div>
    <div class="row gx-md-5">
      <div class="col-xl-2">
        <div class="nav-category-curso mb-5">
          <p>Académico</p>
          <?php
          echo do_shortcode('[selector_categorias_eventos]');
          ?>
        </div>
        <div class="nav-category-curso">
          <p>Categoría</p>
          <?php
          echo do_shortcode('[selector_etiquetas_eventos]');
          ?>
        </div>
      </div>
      <div class="col-xl-10">
        <div id="resultados-eventos">

        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>