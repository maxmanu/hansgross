<?php
/*
Template Name:  Nosotros
*/
get_header();
$subtitulo = get_post_meta(get_the_ID(), 'pagina_subtitulo', true);
$titulo = get_post_meta(get_the_ID(), 'nosotros_titulo', true);
$descripcion = get_post_meta(get_the_ID(), 'nosotros_descripcion', true);
$imagen_1 = get_post_meta(get_the_ID(), 'nosotros_imagen_1', true);
$imagen_2 = get_post_meta(get_the_ID(), 'nosotros_imagen_2', true);
$titulo_de_seccion_equipo = get_post_meta(get_the_ID(), 'titulo_de_seccion_equipo', true);
$subtitulo_de_seccion_equipo = get_post_meta(get_the_ID(), 'subtitulo_de_seccion_equipo', true);
$colaboradores = get_post_meta(get_the_ID(), 'grupo_colaboradores', true);
$mision = get_post_meta(get_the_ID(), 'mision', true);
$vision = get_post_meta(get_the_ID(), 'vision', true);
$imagen_mision = get_post_meta(get_the_ID(), 'imagen_mision', true);
$imagen_fondo = get_post_meta(get_the_ID(), 'imagen_fondo', true);
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>); background-repeat: no-repeat; background-size: cover">
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

<section class="section-quienes-somos ptb-100">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 text-white">
        <div class="row">
          <div class="col-auto">
            <span class="square"></span>
          </div>
          <div class="col">
            <?php
            if ($titulo) {
              echo '<h2>' . esc_html($titulo) . '</h2>';
            }
            ?>
            <?php
            if ($descripcion) {
              echo '<div class="text-justify">' . wpautop($descripcion) . '</div>';
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6 offset-lg-1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-quienes-somos.webp" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>

<section class="section-equipo">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <?php if (!empty($titulo_de_seccion_equipo)): ?>
          <h2 class="colorgreen-2"><?php echo esc_html($titulo_de_seccion_equipo); ?></h2>
        <?php endif; ?>
        <?php if (!empty($subtitulo_de_seccion_equipo)): ?>
          <p><?php echo esc_html($subtitulo_de_seccion_equipo); ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <section class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">

          <?php
          // Obtén los colaboradores del campo group
          $colaboradores = get_post_meta(get_the_ID(), 'grupo_colaboradores', true);

          // Verifica que existan colaboradores
          if (!empty($colaboradores)) {
            echo '<ul class="splide__list">';
            foreach ($colaboradores as $colaborador) {
              // Recuperar los valores del colaborador
              $nombre = isset($colaborador['nombre_colaborador']) ? esc_html($colaborador['nombre_colaborador']) : '';
              $cargo = isset($colaborador['cargo_colaborador']) ? esc_html($colaborador['cargo_colaborador']) : '';
              $imagen = isset($colaborador['imagen_colaborador']) ? esc_url($colaborador['imagen_colaborador']) : '';

              // Generar HTML dinámico para cada colaborador
              echo '<li class="splide__slide">';
              echo '  <div class="card">';
              if ($imagen) {
                echo '    <img src="' . $imagen . '" class="card-img-top" alt="' . $nombre . '">';
              } else {
                // Si no hay imagen, opcionalmente puedes mostrar una imagen por defecto
                echo '    <img src="' . get_template_directory_uri() . '/assets/img/img-equipo.webp" class="card-img-top" alt="' . $nombre . '">';
              }
              echo '    <div class="card-eq">';
              echo '      <div class="container">';
              echo '        <div class="row justify-content-center">';
              echo '          <div class="col-2">';
              echo '            <span class="square square--equipo"></span>';
              echo '          </div>';
              echo '          <div class="col-auto">';
              echo '            <p class="card-title mb-0"><b>' . $nombre . '</b></p>';
              echo '            <small>' . $cargo . '</small>';
              echo '          </div>';
              echo '        </div>';
              echo '      </div>';
              echo '    </div>';
              echo '  </div>';
              echo '</li>';
            }
            echo '</ul>';
          }
          ?>

        </div>
      </section>
    </div>
  </div>
</section>
<section class="section-mision ptb-100">
  <div class="container">
    <div class="row row--mision">
      <div
        class="col-lg-6 col--mision"
        style="background-image: url(<?php if ($imagen_mision) {
                                        echo esc_url($imagen_mision);
                                      } ?>); background-repeat: no-repeat; background-size: cover;background-position:center;">
        <div class="row h-100 align-items-end pb-4 ps-4">
          <div class="col-auto">
            <span class="square"></span>
          </div>
          <div class="col">
            <h2 class="mb-0 text-white">Misión</h2>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-flex align-items-center">
        <?php
        if ($mision) {
          echo '<p>' . esc_html($mision) . '</p>';
        }
        ?>
      </div>
    </div>
    <div class="row row--vision position-relative">
      <div class="boxes-decor"></div>
      <div class="col-lg-8 d-flex align-items-center">
        <?php
        if ($vision) {
          echo '<p class="vision-text">' . esc_html($vision) . '</p>';
        }
        ?>
      </div>
      <div class="col-lg-4">
        <div class="row h-100 align-items-end pb-5 ps-4">
          <div class="col-auto">
            <span class="square square--grey"></span>
          </div>
          <div class="col">
            <h2 class="mb-0">Visión</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>