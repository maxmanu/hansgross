<?php
/*
Template Name:  Softwares
*/
get_header();
$titulo_hero = get_post_meta(get_the_ID(), 'pagina_titulo', true);
$subtitulo = get_post_meta(get_the_ID(), 'pagina_subtitulo', true);
?>

<header id="miDiv" class="continer-fluid software-page" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>); background-repeat: no-repeat; background-size: cover">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-8 text-center text-md-start">
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
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              $args = array(
                'post_type' => 'soluciones',
                'paged' => $paged,
              );
              $query = new WP_Query($args);
              if ($query->have_posts()) {
                while ($query->have_posts()) : $query->the_post();
                  $post_id = get_the_ID();
                  $permalink = get_permalink();
              ?>
                  <div class="swiper-slide" data-slide="<?php echo $post_id; ?>">
                    <div class="card-software">
                      <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="card-img-top" alt="...">
                    </div>
                    <a href="<?php echo esc_url($permalink . '?slide=' . $post_id . '#anchorSoftware'); ?>">
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
  </div>
</header>

<?php get_template_part('template-parts/content', 'cta'); ?>

<?php
get_footer();
?>