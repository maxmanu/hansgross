<?php
get_header();
$titulo_hero = get_post_meta(get_the_ID(), 'pagina_titulo', true);
$subtitulo = get_post_meta(get_the_ID(), 'pagina_subtitulo', true);
$titulo_de_seccion_eventos = get_post_meta(get_the_ID(), 'titulo_de_seccion_eventos', true);
$subtitulo_de_seccion_eventos = get_post_meta(get_the_ID(), 'subtitulo_de_seccion_eventos', true);
$descripcion_webinars = get_post_meta(get_the_ID(), 'descripcion_webinars', true);
$descripcion_cursos = get_post_meta(get_the_ID(), 'descripcion_cursos', true);
$titulo_de_seccion_certificados = get_post_meta(get_the_ID(), 'titulo_de_seccion_certificados', true);
$subtitulo_de_seccion_certificados = get_post_meta(get_the_ID(), 'subtitulo_de_seccion_certificados', true);
$imagen_left_certificados = get_post_meta(get_the_ID(), 'imagen_left', true);
$imagen_right_certificados = get_post_meta(get_the_ID(), 'imagen_right', true);
$titulo_de_seccion_servicios = get_post_meta(get_the_ID(), 'titulo_de_seccion_servicios', true);
$subtitulo_de_seccion_servicios = get_post_meta(get_the_ID(), 'subtitulo_de_seccion_servicios', true);
$titulo_de_seccion_softwares = get_post_meta(get_the_ID(), 'titulo_de_seccion_softwares', true);
$subtitulo_de_seccion_softwares = get_post_meta(get_the_ID(), 'subtitulo_de_seccion_softwares', true);
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>); background-repeat: no-repeat; background-size: cover">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7 text-center text-md-start">
          <?php if (!empty($titulo_hero)): ?>
            <h1 class="banner-title pb-4"><?php echo esc_html($titulo_hero); ?></h1>
          <?php endif; ?>
          <?php if (!empty($subtitulo)): ?>
            <p class="banner-subtitle"><?php echo esc_html($subtitulo); ?></p>
          <?php endif; ?>
          <a href="<?php echo esc_url(get_permalink(33)); ?>"><button class="btn btn-hans btn-hans--green">Contáctanos</button></a>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-clientes">
  <div class="container">
    <div class="row align-items-center py-3">
      <div class="col-lg-3">
        <p class="mb-0">NUESTROS CLIENTES</p>
      </div>
      <div class="col-lg-9">
        <div class="swiper swiperLogosClientes logos">
          <div class="swiper-wrapper align-items-center">
            <?php
            // Obtiene los valores del grupo repetidor
            $galeria = get_post_meta(get_the_ID(), 'galeria_imagenes', true);

            if (!empty($galeria)): ?>

              <?php foreach ($galeria as $imagen):
                $url = !empty($imagen['logo']) ? esc_url($imagen['logo']) : '';
              ?>
                <div class="swiper-slide">
                  <div class="col text-center"><img src="<?php echo $url; ?>" alt="" class="img-fluid"></div>
                </div>
              <?php endforeach; ?>

            <?php endif; ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-eventos ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center mb-5">
        <?php if (!empty($titulo_de_seccion_eventos)): ?>
          <h2 class="colorgreen-2"><?php echo esc_html($titulo_de_seccion_eventos); ?></h2>
        <?php endif; ?>
        <?php if (!empty($subtitulo_de_seccion_eventos)): ?>
          <p><?php echo esc_html($subtitulo_de_seccion_eventos); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="grid">
      <div class="swiper swiperEventos">
        <div class="swiper-wrapper">

        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="col-right-event">
        <div class="card card--eventos-description">
          <div class="card-content pt-5">

          </div>
        </div>
        <div class="grid" style="margin-top: 20px;">
          <div id="webinars" data-category-slug="webinars" data-link="/academico?categoria=webinars" data-content="<?php echo esc_attr($descripcion_webinars); ?>" class="card card--btn-event active text-bg-dark">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card.webp" class="card-img" alt="...">
            <div class="card-img-overlay">
              <p>Webinars <i class="bi bi-camera-video ms-2 d-block d-md-none"></i></p>
            </div>
          </div>
          <div id="cursos" data-category-slug="cursos" data-link="/academico?categoria=cursos" data-content="<?php echo esc_attr($descripcion_cursos); ?>" class="card card--btn-event text-bg-dark">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card.webp" class="card-img" alt="...">
            <div class="card-img-overlay">
              <p>Cursos <i class="bi bi-easel ms-2 d-block d-md-none"></i></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-certificados ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <?php if ($imagen_left_certificados) { ?>
          <img src="<?php echo esc_url($imagen_left_certificados); ?>" class="card-img" alt="...">
        <?php } ?>
      </div>
      <div class="col-lg-4 text-center text-white my-5 my-lg-1">
        <?php if (!empty($titulo_de_seccion_certificados)): ?>
          <h2><?php echo esc_html($titulo_de_seccion_certificados); ?></h2>
        <?php endif; ?>
        <?php if (!empty($subtitulo_de_seccion_certificados)): ?>
          <p><?php echo esc_html($subtitulo_de_seccion_certificados); ?></p>
        <?php endif; ?>
        <a href="/certificados"><button class="btn btn-hans btn-hans--white mt-4">Buscar</button></a>
      </div>
      <div class="col-lg-4 hide-mobile">
        <?php if ($imagen_right_certificados) { ?>
          <img src="<?php echo esc_url($imagen_right_certificados); ?>" class="card-img" alt="...">
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<section class="section-servicios">
  <div class="container container-fluid-right">
    <div class="row">
      <div class="col-lg-4">
        <div class="col-section-title text-white mt-5">
          <?php if (!empty($titulo_de_seccion_servicios)): ?>
            <h2 class="title-carousel-section"><?php echo $titulo_de_seccion_servicios; ?></h2>
          <?php endif; ?>
          <?php if (!empty($subtitulo_de_seccion_servicios)): ?>
            <p class="text-center text-md-start"><?php echo esc_html($subtitulo_de_seccion_servicios); ?></p>
          <?php endif; ?>
          <div class="d-flex justify-content-start arrows-swipper position-relative pt-4 hide-mobile">
            <div id="button-prev-servicios" class="btn-arrows-servicios ms-0 me-2">
              <i class="bi bi-arrow-left"></i>
            </div>
            <div id="button-next-servicios" class="btn-arrows-servicios">
              <i class="bi bi-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 position-relative mt-5 mt-lg-1">
        <div class="decor-green"></div>
        <div class="swiper swiperServicios">
          <div class="swiper-wrapper">
            <?php
            $args = array(
              'post_type' => 'servicios',
              'paged' => $paged,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
              while ($query->have_posts()) : $query->the_post(); ?>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <?php
                    // Verificar si el post tiene miniatura
                    if (has_post_thumbnail()) {
                      $thumbnail_url = get_the_post_thumbnail_url();
                    } else {
                      // URL externa de la imagen por defecto
                      $thumbnail_url = 'https://placehold.co/600x460';
                    }
                    ?>
                    <img src="<?php echo $thumbnail_url; ?>" class="card-img-top" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <div class="card-body">
                      <a href="<?php echo get_permalink() ?>">
                        <p class="card-title"><?php echo get_the_title() ?></p>
                      </a>
                    </div>
                  </div>
                </div>
            <?php endwhile;
            }
            wp_reset_postdata();
            ?>
          </div>
          <div class="swiper-pagination"></div>
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-softwares">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 ms-auto text-white text-center text-md-start">
        <?php if (!empty($titulo_de_seccion_softwares)): ?>
          <h2 class="colorgreen-2"><?php echo $titulo_de_seccion_softwares; ?></h2>
        <?php endif; ?>
        <?php if (!empty($subtitulo_de_seccion_softwares)): ?>
          <p class="text-center text-md-start"><?php echo esc_html($subtitulo_de_seccion_softwares); ?></p>
        <?php endif; ?>
        <a href="/softwares"><button class="btn btn-hans btn-hans--white mt-4">Ver más</button></a>
      </div>
    </div>
    <div class="row row-softwares">
      <div class="col position-relative">
        <div class="swiper swiperSoftwares">
          <div class="swiper-wrapper">
            <?php
            $args = array(
              'post_type' => 'softwares',
              'paged' => $paged,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
              while ($query->have_posts()) : $query->the_post(); ?>
                <div class="swiper-slide">
                  <div class="card-software">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="card-img-top" alt="...">
                  </div>
                  <a href="<?php echo get_permalink() ?>">
                    <div class="btn btn-arrows-servicios">
                      <i class="bi bi-arrow-right"></i>
                    </div>
                  </a>
                </div>
            <?php endwhile;
            }
            wp_reset_postdata();
            ?>
          </div>
          <div class="swiper-pagination"></div>
          <!-- If we need navigation buttons -->
          <div id="button-prev-software" class="swiper-button-prev hide-mobile">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-soft-left.svg" class="arrow-soft" alt="...">
          </div>
          <div id="button-next-software" class="swiper-button-next hide-mobile">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-soft-right.svg" class="arrow-soft" alt="...">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>