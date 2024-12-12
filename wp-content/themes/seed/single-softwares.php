<?php
get_header();
$titulo_hero = get_post_meta(38, 'pagina_titulo', true);
$subtitulo = get_post_meta(38, 'pagina_subtitulo', true);
$texto_fila_1 = get_post_meta(get_the_ID(), 'texto_fila_1', true);
$galeria_fila_1 = get_post_meta(get_the_ID(), 'galeria_fila_1', true);
$video_imagen = get_post_meta(get_the_ID(), 'video_software', true);
$brochure = get_post_meta(get_the_ID(), 'brochure_software', true);
$texto_fila_2 = get_post_meta(get_the_ID(), 'texto_fila_2', true);
$image_left = get_post_meta(get_the_ID(), 'imagen_left', true);
$image_right = get_post_meta(get_the_ID(), 'imagen_right', true);
?>

<header id="miDiv" class="continer-fluid software-page" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(38)) ?>); background-repeat: no-repeat; background-size: cover">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-8">
          <?php if (!empty($titulo_hero)): ?>
            <h1 class="banner-title"><?php echo esc_html($titulo_hero); ?></h1>
          <?php endif; ?>
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
<?php
if (!empty($texto_fila_1) && !empty($video_imagen)) : ?>
  <section class="section-software-description position-relative ptb-100">
    <span class="box-decor-image" style="background:#CCCED0;opacity:0.5;top:30px;right:inherit;left:55%;"></span>
    <div class="container">
      <div class="row mb-4">
        <div class="col-lg-6">
          <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="img-fluid img-single-software mb-5" alt="...">
          <div class="position-relative">
            <?php
            echo '<div class="contenido-fila">';
            echo wp_kses_post(wpautop($texto_fila_1));
            echo '</div>';
            ?>
            <span class="box-decor-image" style="background:#85E5BB;opacity:0.5;top:-30px;right:50px;"></span>
          </div>
        </div>
        <div class="col-lg-6 text-lg-end text-center">
          <div class="position-relative mb-3">
            <?php if ($video_imagen): ?>
              <?php
              $file_type = wp_check_filetype($video_imagen);
              if (in_array($file_type['ext'], array('mp4', 'webm'))) : ?>
                <a data-fslightbox="gallery" href="<?php echo esc_url($video_imagen) ?>">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-person-video.png" alt="" class="img-fluid position-relative img-description">
                  <div class="btn-play-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-play.svg" class="btn-play" alt="">
                  </div>
                </a>
              <?php else: ?>
                <img src="<?php echo esc_url($video_imagen) ?>" alt="Imagen del Servicio" class="img-fluid rounded">
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <?php
          if ($brochure) { ?>
            <a href="<?php echo esc_url($brochure) ?>" download>
              <button class="btn btn-download">
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-expediente.png" style="width:30px;padding-bottom:5px;" alt=""></span>
                Descargar Brochure
              </button>
            </a>
          <?php }
          ?>
        </div>
      </div>

      <?php
      if (!empty($image_left) && !empty($image_right) && !empty($texto_fila_2)) : ?>
        <div class="row align-items-center mb-4">
          <div class="col-lg-6 position-relative">
            <div class="wrap wrap2">
              <img class="imga img-fluid" src="<?php echo esc_url($image_left) ?>" alt="">
              <img class="imgb img-fluid" src="<?php echo esc_url($image_right) ?>" alt="">
            </div>
            <span class="box-decor-image" style="background:#CCCED0;opacity:0.5;top:35px;right:30%;width:40px;height:40px;"></span>
            <span class="box-decor-image" style="background:#85E5BB;opacity:0.5;top:inherit;right:inherit;bottom:50px;left:10%;"></span>
          </div>
          <div class="col-lg-6">
            <?php
            echo '<div class="contenido-fila">';
            echo wp_kses_post(wpautop($texto_fila_2));
            echo '</div>';
            ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
<?php get_template_part('template-parts/content', 'cta'); ?>

<?php
get_footer();
?>