<?php
/*
Template Name:  Servicios
*/
get_header();
$titulo_hero = get_post_meta(get_the_ID(), 'pagina_titulo', true);
$subtitulo = get_post_meta(get_the_ID(), 'pagina_subtitulo', true);
$titulo = get_post_meta(get_the_ID(), 'servicios_titulo', true);
$descripcion = get_post_meta(get_the_ID(), 'servicios_descripcion', true);
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>); background-repeat: no-repeat; background-size: cover">
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

<section class="section-serviciosMain ptb-100 text-white">
  <div class="container">
    <div class="row mb-4">
      <div class="col-lg-8 mx-auto text-center">
        <?php
        if ($titulo) {
          echo '<h2>' . esc_html($titulo) . '</h2>';
        }
        ?>
        <?php
        if ($descripcion) {
          echo '<p>' . esc_html($descripcion) . '</p>';
        }
        ?>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col px-md-0">
        <div class="swiper swiperServiciosMain">
          <div class="swiper-wrapper text-center">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
              'post_type' => 'servicios',
              'paged' => $paged,
              'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
              while ($query->have_posts()) : $query->the_post();
                $post_id = get_the_ID(); // Obtener ID del post
                $permalink = get_permalink(); // Obtener el enlace permanente del post
            ?>
                <div class="swiper-slide" data-slide="<?php echo $post_id; ?>">
                  <div class="card">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="card-img-top" alt="...">
                    <div class="card-footer justify-content-center">
                      <a href="<?php echo esc_url($permalink . '?slide=' . $post_id . '#anchorService'); ?>">
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
          <div class="swiper-pagination d-block d-md-none"></div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-1 mx-auto">
        <div class="d-flex justify-content-center arrows-swipper position-relative d-none d-md-flex">
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

<?php get_template_part('template-parts/content', 'cta'); ?>

<?php
get_footer();
?>