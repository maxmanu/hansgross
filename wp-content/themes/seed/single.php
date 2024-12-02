<?php
get_header();
$subtitulo = get_post_meta(31, 'pagina_subtitulo', true);
$post_url = get_permalink();
$post_title = get_the_title();
// Generar los enlaces
$facebook_url = "https://www.facebook.com/sharer.php?u={$post_url}";
// $twitter_url = "https://twitter.com/intent/tweet?url={$post_url}&text={$post_title}";
$linkedin_url = "https://www.linkedin.com/shareArticle?mini=true&url={$post_url}&title={$post_title}";
$whatsapp_url = "https://api.whatsapp.com/send?text={$post_title} {$post_url}";
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(31)) ?>); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
          <h1 class="banner-title"><?php echo get_the_title(31) ?></h1>
          <?php if (!empty($subtitulo)): ?>
            <p class="banner-subtitle"><?php echo esc_html($subtitulo); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-blog">
  <div class="container">
    <div class="row align-items-start">
      <div class="col-auto mb-4" style="color:#0B5636;">
        <a href="javascript:history.back()">
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/back-svg-icon.svg" class="img-fluid" alt=""></span>
          Atrás
        </a>
      </div>
    </div>
    <div class="row align-items-center mb-5">
      <div class="col-lg-12 card card--single mx-auto">
        <div class="row justify-content-end mb-3">
          <div class="col-auto colorgreen-2">
            <!-- Botón para compartir (móvil) -->
            <div id="share-button-container" style="display: none;">
              <a href="" target="_blank" id="share-post-btn">
                Compartir
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/share-svg-icon.svg" class="img-fluid" alt=""></span>
              </a>
            </div>
            <!-- Botón para copiar el enlace (escritorio) -->
            <div id="copy-button-container" style="display: none;">
              <input type="text" hidden id="copy-post-url" value="<?php echo esc_url($post_url); ?>" readonly>
              <a id="copy-link-btn">Compartir <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/share-svg-icon.svg" class="img-fluid" alt=""></span></a><br>
              <small id="copy-link-message" style="display: none; color: green;">¡Enlace copiado!</small>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-9 mx-auto">
            <h2 class="colorgreen"><?php echo get_the_title() ?></h2>
          </div>
          <div class="col-xl-3">
            <div class="social-links justify-content-end">
              <a href="<?php echo esc_url($facebook_url); ?>" class="me-2" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook-svg-icon.svg" alt="" class="img-fluid">
              </a>
              <!-- <a href="<?php echo esc_url($twitter_url); ?>" class="me-2" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram-svg-icon.svg" alt="" class="img-fluid">
              </a> -->
              <a href="<?php echo esc_url($linkedin_url); ?>" class="me-2" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/linkedin-svg-icon.svg" alt="" class="img-fluid">
              </a>
              <a href="<?php echo esc_url($whatsapp_url); ?>" class="" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/whatsapp-svg-icon.svg" alt="" class="img-fluid">
              </a>
            </div>
          </div>
        </div>
        <div class="row mt-3 justify-content-between">
          <div class="col-auto autor-single-text">
            Por Rodrigo Esteban
          </div>
          <div class="col-auto">
            <div class="date-single">23 de Setiembre</div>
          </div>
        </div>
        <div class="row">
          <div class="col colorgreen-2 cat-single-text">
            Categoría: Criminalística
          </div>
        </div>
        <div class="section-text-blog">
          <div class="row mt-5">
            <div class="col-md-5">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy </p>
            </div>
            <div class="col-md-7">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-hero-nosotros.webp" class="img-fluid img-single" alt="">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-12">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy </p>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-7">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-hero-nosotros.webp" class="img-fluid img-single" alt="">
            </div>
            <div class="col-md-5">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p class="ms-4 title-post-recomendados">También te puede interesar</p>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-card-servicios g-4">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post(); ?>
          <div class="col">
            <div class="card card--blog h-100">
              <div class="position-relative">
                <div class="btn-category-card">23 de Setiembre</div>
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo get_the_title() ?></h5>
                <p class="card-text mb-1">Por Rodrigo Esteban</p>
                <p class="card-category mb-1">Categoría: Criminalística</p>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing .</p>
              </div>
              <div class="card-footer colorgreen-2">
                <div><a href="<?php echo get_the_permalink() ?>">Mostrar más</a></div>
                <div class="btn-arrows-servicios">
                  <a href="<?php echo get_the_permalink() ?>"><i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
      <?php endwhile;
      }
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<?php
get_footer();
?>