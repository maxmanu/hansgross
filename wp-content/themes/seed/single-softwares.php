<?php
get_header();
$subtitulo = get_post_meta(38, 'pagina_subtitulo', true);
?>

<header id="miDiv" class="continer-fluid software-page" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(38)) ?>); background-repeat: no-repeat; background-size: cover">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-8">
          <h1 class="banner-title"><?php echo get_the_title(38) ?></h1>
          <?php if (!empty($subtitulo)): ?>
            <p class="banner-subtitle"><?php echo esc_html($subtitulo); ?></p>
          <?php endif; ?>
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
                      <a href="<?php echo get_permalink() ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="card-img-top" alt="..."></a>
                    </div>
                  </div>
              <?php endwhile;
              }
              wp_reset_postdata();
              ?>
            </div>
            <!-- If we need navigation buttons -->
            <div id="button-prev-software" class="swiper-button-prev">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-soft-left.svg" class="arrow-soft" alt="...">
            </div>
            <div id="button-next-software" class="swiper-button-next">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-soft-right.svg" class="arrow-soft" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-software-description ptb-100">
  <div class="container">
    <div class="row mb-4">
      <div class="col-lg-6">
        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="img-fluid img-single-software mb-5" alt="...">
        <h2 class="colorgreen-2">Lorem Ipsum is simply</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy</p>
      </div>
      <div class="col-lg-6 text-lg-end text-center">
        <div class="position-relative mb-3">
          <a data-fslightbox="gallery" href="https://www.youtube.com/watch?v=3nQNiWdeH2Q">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-person-video.png" alt="" class="img-fluid position-relative img-description">
            <div class="btn-play-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-play.svg" class="btn-play" alt="">
            </div>
          </a>
        </div>
        <button class="btn btn-download">
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-expediente.png" style="width:30px;padding-bottom:5px;" alt=""></span>
          Descargar Brochure
        </button>
      </div>
    </div>
    <div class="row align-items-center mb-4">
      <div class="col-lg-6">
        <div class="wrap wrap2">
          <img class="imga img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/dactiloscopia.webp" alt="">
          <img class="imgb img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/img-right-soft.webp" alt="">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="colorgreen-2">Lorem Ipsum is simply</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy </p>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/content', 'cta'); ?>

<?php
get_footer();
?>