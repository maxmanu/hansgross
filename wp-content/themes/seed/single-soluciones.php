<?php
get_header();
$titulo_hero = get_post_meta(38, 'pagina_titulo', true);
$subtitulo = get_post_meta(38, 'pagina_subtitulo', true);
?>

<header id="miDiv" class="continer-fluid software-page" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(38)) ?>); background-repeat: no-repeat; background-size: cover">
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
      <div class="row row-softwares" id="anchorSoftware">
        <div class="col position-relative">
          <div class="swiper swiperSoftwares">
            <div class="swiper-wrapper">
              <?php
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              $args = array(
                'post_type' => 'soluciones',
                'paged' => $paged,
                'posts_per_page' => -1,
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

<main>
  <?php
  $soluciones = get_post_meta(get_the_ID(), 'software_content_group', true);

  if (!empty($soluciones)) :
    foreach ($soluciones as $solucion) :
      // Obtener los valores de cada campo
      $logo = !empty($solucion['imagen_logo']) ? esc_url($solucion['imagen_logo']) : '';
      $titulo_fila_1 = !empty($solucion['titulo_fila']) ? esc_html($solucion['titulo_fila']) : '';
      $texto_fila_1 = !empty($solucion['texto_fila']) ? esc_html($solucion['texto_fila']) : '';
      $tipo_medio = !empty($solucion['tipo_medio']) ? $solucion['tipo_medio'] : '';
      $imagen = !empty($solucion['imagen_upload']) ? esc_url($solucion['imagen_upload']) : '';
      $video = !empty($solucion['video_upload']) ? esc_url($solucion['video_upload']) : '';
      $thumbnail = !empty($solucion['imagen_thumbnail']) ? esc_url($solucion['imagen_thumbnail']) : '';
      $brochure = !empty($solucion['brochure_software']) ? esc_url($solucion['brochure_software']) : '';
      $imagen_left = !empty($solucion['imagen_left']) ? esc_url($solucion['imagen_left']) : '';
      $imagen_right = !empty($solucion['imagen_right']) ? esc_url($solucion['imagen_right']) : '';
      $titulo_fila_2 = !empty($solucion['titulo_fila_2']) ? esc_html($solucion['titulo_fila_2']) : '';
      $texto_fila_2 = !empty($solucion['texto_fila_2']) ? esc_html($solucion['texto_fila_2']) : '';
  ?>
      <?php if (!empty($texto_fila_1) && !empty($tipo_medio) && (($tipo_medio === 'imagen' && !empty($imagen)) || ($tipo_medio === 'video' && !empty($video)))) : ?>
        <section class="section-software-description position-relative ptb-100">
          <span class="box-decor-image" style="background:#CCCED0;opacity:0.5;top:30px;right:inherit;left:55%;"></span>
          <div class="container">
            <div class="row mb-4">
              <div class="col-lg-6">
                <?php if ($logo) : ?>
                  <div class="text-center text-md-start">
                    <img src="<?php echo $logo; ?>" alt="Logo" class="img-fluid img-single-software mb-5">
                  </div>
                <?php endif; ?>
                <div class="position-relative">
                  <p class="solucion-title"><?php echo esc_html($titulo_fila_1); ?></p>
                  <?php
                  echo '<div class="contenido-fila">';
                  echo wp_kses_post(wpautop($texto_fila_1));
                  echo '</div>';
                  ?>
                  <span class="box-decor-image" style="background:#85E5BB;opacity:0.5;top:-80px;right:50px;"></span>
                </div>
              </div>
              <div class="col-lg-6 text-center">
                <div class="position-relative mb-3">
                  <?php if ($tipo_medio === 'video' && $video): ?>
                    <a data-fslightbox="gallery" href="<?php echo esc_url($video) ?>">
                      <img src="<?php echo $thumbnail ?>" alt="" class="img-fluid position-relative img-description">
                      <div class="btn-play-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-play.svg" class="btn-play" alt="">
                      </div>
                    </a>
                  <?php elseif ($tipo_medio === 'imagen' && $imagen): ?>
                    <a data-fslightbox="gallery" href="<?php echo $imagen ?>">
                      <img src="<?php echo $imagen ?>" alt="Imagen del Servicio" class="img-fluid img-description">
                    </a>
                  <?php endif; ?>
                </div>
                <?php
                if ($brochure) { ?>
                  <a href="<?php echo $brochure ?>" target="_blank" rel="noopener noreferrer">
                    <button class="btn btn-download">
                      <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-expediente.png" style="width:30px;padding-bottom:5px;" alt=""></span>
                      Descargars Brochure
                    </button>
                  </a>
                <?php }
                ?>
              </div>
            </div>

            <?php
            if (!empty($imagen_left) && !empty($imagen_right) && !empty($texto_fila_2)) : ?>
              <div class="row align-items-center mb-4">
                <div class="col-lg-6 position-relative text-center text-lg-start">
                  <div class="wrap wrap2">
                    <img class="imga img-fluid" src="<?php echo $imagen_left ?>" alt="">
                    <img class="imgb img-fluid d-none d-lg-block" src="<?php echo $imagen_right ?>" alt="">
                  </div>
                  <span class="box-decor-image" style="background:#CCCED0;opacity:0.5;top:35px;right:30%;width:40px;height:40px;"></span>
                  <span class="box-decor-image" style="background:#85E5BB;opacity:0.5;top:inherit;right:inherit;bottom:50px;left:10%;"></span>
                </div>
                <div class="col-lg-6">
                  <p class="solucion-title"><?php echo esc_html($titulo_fila_2); ?></p>
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
  <?php
    endforeach;
  endif;
  ?>
</main>

<?php get_template_part('template-parts/content', 'cta'); ?>

<?php
get_footer();
?>