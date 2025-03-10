<?php
get_header();
$titulo_hero = get_post_meta(36, 'pagina_titulo', true);
$subtitulo = get_post_meta(36, 'pagina_subtitulo', true);
$titulo = get_post_meta(36, 'servicios_titulo', true);
$descripcion = get_post_meta(36, 'servicios_descripcion', true);
$texto_fila_1 = get_post_meta(get_the_ID(), 'texto_fila_1', true);
$galeria_fila_1 = get_post_meta(get_the_ID(), 'galeria_imagenes_1', true);

// Obtener el tipo de medio seleccionado
$tipo_medio = get_post_meta(get_the_ID(), 'tipo_medio', true);

// Obtener los valores de los campos
$imagen2 = get_post_meta(get_the_ID(), 'imagen_upload', true);
$video = get_post_meta(get_the_ID(), 'video_cmb2', true);
$video_thumbnail = get_post_meta(get_the_ID(), 'imagen_thumbnail', true);
$youtube = get_post_meta(get_the_ID(), 'youtube_url', true);
$youtube_thumbnail = get_post_meta(get_the_ID(), 'youtube_thumbnail', true);
$texto_fila_2 = get_post_meta(get_the_ID(), 'texto_fila_2', true);

$texto_fila_3 = get_post_meta(get_the_ID(), 'texto_fila_3', true);
$galeria_fila_3 = get_post_meta(get_the_ID(), 'galeria_imagenes_2', true);


// Obtener el mensaje personalizado del Custom Field de la página principal
$custom_whatsapp_message = get_post_meta(36, 'whatsapp_message', true);
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(36)) ?>); background-repeat: no-repeat; background-size: cover">
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

<section class="section-serviciosMain ptb-100 text-white" id="anchorService">
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
                      <a href="<?php echo esc_url($permalink . '#anchorService'); ?>">
                        <h5 class="card-title"><?php echo get_the_title(); ?></h5>
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
<section class="section-servicios-description position-relative">
  <span class="box-decor-image" style="background:#CCCED0;opacity:0.5;top:30px;right:500px;"></span>
  <div class="container">
    <?php if (!empty($texto_fila_1) && !empty($galeria_fila_1)) : ?>
      <div class="row mb-5">
        <div class="col-lg-6 position-relative">
          <h2 class="colorgreen-2"><?php echo get_the_title() ?></h2>
          <?php
          echo '<div class="contenido-fila">';
          echo wp_kses_post(wpautop($texto_fila_1));
          echo '</div>';
          ?>
          <span class="box-decor-image" style="background:#85E5BB;opacity:0.5;top:-30px;right:50px;"></span>
          <span class="box-decor-image" style="background:#CCCED0;opacity:0.5;top:inherit;right:inherit;bottom:85px;left:200px;"></span>
        </div>
        <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center position-relative">
          <div class="swiper swiperServicios2 mt-3">
            <div class="swiper-wrapper">
              <?php
              if (!empty($galeria_fila_1)): ?>

                <?php foreach ($galeria_fila_1 as $imagen):
                  $url = !empty($imagen['logo_1']) ? esc_url($imagen['logo_1']) : '';
                ?>
                  <div class="swiper-slide">
                    <div class="card">
                      <img src="<?php echo $url; ?>" alt="Imagen de la galería" class="card-img-top">
                    </div>
                  </div>
                <?php endforeach; ?>

              <?php endif; ?>
            </div>
            <div class="swiper-pagination swiper-pagination2"></div>
          </div>
          <span class="box-decor-image"></span>
        </div>
      </div>
    <?php endif; ?>
    <?php if (!empty($texto_fila_2) && !empty($tipo_medio) && (($tipo_medio === 'imagen' && !empty($imagen2)) || ($tipo_medio === 'video' && !empty($video)) || ($tipo_medio === 'youtube' && !empty($youtube)))) : ?>
      <div class="row mb-5 align-items-center">
        <div class="col-lg-6 text-lg-start text-center">
          <div class="position-relative mb-3 image-column">
            <?php if ($tipo_medio === 'video' && $video): ?>
              <a data-fslightbox="gallery" href="<?php echo esc_url($video) ?>">
                <img src="<?php echo esc_url($video_thumbnail) ?>" alt="" class="img-fluid position-relative">
                <div class="btn-play-wrapper">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-play.svg" class="btn-play" alt="">
                </div>
              </a>
            <?php elseif ($tipo_medio === 'imagen' && $imagen2): ?>
              <a data-fslightbox="gallery" href="<?php echo esc_url($imagen2); ?>">
                <img src="<?php echo esc_url($imagen2); ?>" alt="Imagen del Servicio" class="img-fluid">
              </a>
            <?php elseif ($tipo_medio === 'youtube' && $youtube): ?>
              <a data-fslightbox="gallery" href="<?php echo esc_url($youtube) ?>">
                <img src="<?php echo esc_url($youtube_thumbnail) ?>" alt="" class="img-fluid position-relative">
                <div class="btn-play-wrapper">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-play.svg" class="btn-play" alt="">
                </div>
              </a>
            <?php endif; ?>
            <span class="box-decor-image" style="top:-30px; right:-30px;"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <?php
          echo '<div class="contenido-fila">';
          echo wp_kses_post(wpautop($texto_fila_2));
          echo '</div>';
          ?>
        </div>
      </div>

      <?php
      if (!empty($texto_fila_3) && !empty($galeria_fila_3)) : ?>
        <div class="row">
          <div class="col-lg-6 position-relative">
            <?php
            echo '<div class="contenido-fila">';
            echo wp_kses_post(wpautop($texto_fila_3));
            echo '</div>';
            ?>
            <span class="box-decor-image" style="background:#85E5BB;opacity:0.5;top:-80px;right:0;"></span>
          </div>
          <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center position-relative">
            <div class="swiper swiperServicios3">
              <div class="swiper-wrapper">
                <?php
                if (!empty($galeria_fila_3)): ?>

                  <?php foreach ($galeria_fila_3 as $imagen):
                    $url = !empty($imagen['logo_2']) ? esc_url($imagen['logo_2']) : '';
                  ?>
                    <div class="swiper-slide">
                      <div class="card">
                        <img src="<?php echo $url; ?>" alt="Imagen de la galería" class="card-img-top">
                      </div>
                    </div>
                  <?php endforeach; ?>

                <?php endif; ?>
              </div>
              <div class="swiper-pagination swiper-pagination3"></div>
            </div>
            <span class="box-decor-image" style="top:-120px;right:-10px;"></span>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
  <span class="box-decor-image" style="background:#85E5BB;opacity:0.5;top:inherit;right:inherit;bottom:85px;left:200px;"></span>
</section>

<?php get_template_part('template-parts/content', 'cta'); ?>

<?php
get_footer();
?>