<?php
/*
Template Name:  Servicios
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
          <h1 class="banner-title">SERVICIOS</h1>
          <p class="banner-subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-serviciosMain ptb-100 text-white">
  <div class="container">
    <div class="row mb-4">
      <div class="col-lg-8 mx-auto text-center">
        <h2>Nuestros Servicios</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col px-0">
        <div class="swiper swiperServiciosMain">
          <div class="swiper-wrapper text-center">
            <?php
            $args = array(
              'post_type' => 'servicios',
              'paged' => $paged,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
              while ($query->have_posts()) : $query->the_post(); ?>
                <div class="swiper-slide">
                  <div class="card">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="card-img-top" alt="...">
                    <div class="card-footer justify-content-center">
                      <a href="<?php echo get_permalink() ?>">
                        <h5 class="card-title"><?php echo get_the_title() ?></h5>
                      </a>
                    </div>
                  </div>
                </div>
            <?php endwhile;
            }
            wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-1 mx-auto">
        <div class="d-flex justify-content-center arrows-swipper position-relative">
          <div id="button-prev-serviciosMain" class="btn-arrows-servicios">
            <i class="bi bi-arrow-left"></i>
          </div>
          <div id="button-next-serviciosMain" class="btn-arrows-servicios">
            <i class="bi bi-arrow-right"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section class="section-servicios-description ptb-100">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-6">
        <h2 class="colorgreen-2">Accidente de transito</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
      </div>
      <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center">
        <div class="swiper swiperServicios2 mt-3">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card-service.webp" class="card-img-top" alt="...">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card-service.webp" class="card-img-top" alt="...">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-card-service.webp" class="card-img-top" alt="...">
              </div>
            </div>
          </div>
          <div class="swiper-pagination swiper-pagination2"></div>
        </div>
      </div>
    </div>
    <div class="row mb-5 align-items-center">
      <div class="col-lg-6 text-lg-start text-center">
        <div class="position-relative mb-3">
          <a data-fslightbox="gallery" href="https://www.youtube.com/watch?v=3nQNiWdeH2Q">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-person-video.png" alt="" class="img-fluid position-relative">
            <div class="btn-play-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-play.svg" class="btn-play" alt="">
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-6">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <h2 class="colorgreen-2">Accidente de transito</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
      </div>
      <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center">
        <div class="swiper swiperServicios3">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dactiloscopia.webp" class="card-img-top" alt="...">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dactiloscopia.webp" class="card-img-top" alt="...">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dactiloscopia.webp" class="card-img-top" alt="...">
              </div>
            </div>
          </div>
          <div class="swiper-pagination swiper-pagination3"></div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<?php get_template_part('template-parts/content', 'cta'); ?>

<?php
get_footer();
?>