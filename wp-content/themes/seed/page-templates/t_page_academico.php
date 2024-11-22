<?php
/*
Template Name:  Académico
*/
get_header();
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-hero-academico.webp); background-repeat: no-repeat; background-size: cover">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
          <h1 class="banner-title">ACADÉMICO</h1>
          <p class="banner-subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-todos-cursos ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-2 mb-5">
        <h2 class="colorgreen-2">Todos los cursos y webinars</h2>
      </div>
    </div>
    <div class="row gx-md-5">
      <div class="col-xl-2">
        <div class="nav-category-curso mb-5">
          <p>Académico</p>
          <!-- <ul class="list-group list-group-flush">
            <li class="list-group-item colorgreen-2">
              <div>Cursos</div>
            </li>
            <li class="list-group-item">
              <div>Webinars</div>
            </li>
          </ul> -->
          <?php
          echo do_shortcode('[selector_categorias_eventos]')
          ?>
        </div>
        <div class="nav-category-curso">
          <p>Categoría</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item colorgreen-2">
              <div>Criminalística</div>
            </li>
            <li class="list-group-item">
              <div>Informática</div>
            </li>
          </ul>
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