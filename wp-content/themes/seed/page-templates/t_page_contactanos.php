<?php
/*
Template Name:  Contactanos
*/
get_header();
$titulo_hero = get_post_meta(get_the_ID(), 'pagina_titulo', true);
$subtitulo = get_post_meta(get_the_ID(), 'pagina_subtitulo', true);
$titulo_de_seccion_informacion = get_post_meta(get_the_ID(), 'titulo_de_seccion_informacion', true);
$subtitulo_de_seccion_informacion = get_post_meta(get_the_ID(), 'subtitulo_de_seccion_informacion', true);
$titulo_de_seccion_formulario = get_post_meta(get_the_ID(), 'titulo_de_seccion_formulario', true);
$subtitulo_de_seccion_formulario = get_post_meta(get_the_ID(), 'subtitulo_de_seccion_formulario', true);
$opciones_generales = get_option('mi_configuracion_general');
$celular = isset($opciones_generales['celular_contacto']) ? esc_html($opciones_generales['celular_contacto']) : '';
$correo = isset($opciones_generales['correo_contacto']) ? esc_html($opciones_generales['correo_contacto']) : '';
$direccion = isset($opciones_generales['direccion_contacto']) ? esc_html($opciones_generales['direccion_contacto']) : '';
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
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

<section class="section-table-certificados ptb-100">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8 mx-auto text-center">
        <?php if (!empty($titulo_de_seccion_informacion)): ?>
          <h2 class="colorgreen-2"><?php echo esc_html($titulo_de_seccion_informacion); ?></h2>
        <?php endif; ?>
        <?php if (!empty($subtitulo_de_seccion_informacion)): ?>
          <p><?php echo esc_html($subtitulo_de_seccion_informacion); ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-lg-10 mx-auto">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-green-whatsapp.png" class="img-fluid mb-4" alt="...">
            <?php
            if ($celular) {
              echo '<p class="colorgreen-2">' . esc_html($celular) . '</p>';
            }
            ?>
          </div>
          <div class="col-md-4 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-green-email.png" class="img-fluid mb-4" alt="...">
            <?php
            if ($correo) {
              echo '<p class="colorgreen-2">' . esc_html($correo) . '</p>';
            }
            ?>
          </div>
          <div class="col-md-4 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-green-map.png" class="img-fluid mb-4" alt="...">
            <?php
            if ($direccion) {
              echo '<p class="colorgreen-2">' . esc_html($direccion) . '</p>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-eventos ptb-100">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="text-start mb-5">
          <?php if (!empty($titulo_de_seccion_formulario)): ?>
            <h2 class="colorgreen-2"><?php echo esc_html($titulo_de_seccion_formulario); ?></h2>
          <?php endif; ?>
          <?php if (!empty($subtitulo_de_seccion_formulario)): ?>
            <p><?php echo esc_html($subtitulo_de_seccion_formulario); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <form id="contactForm" class="row g-md-5 contact-form" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" novalidate>
      <input type="hidden" name="action" value="send_contact_form">
      <div class="col-lg-7">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nombre y apellido</label>
          <input type="text" id="name" name="name" required class="form-control" placeholder="">
        </div>
        <div class="row mb-3 mb-md-0">
          <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Celular</label>
            <input type="text" id="celular" name="celular" required class="form-control" placeholder="">
          </div>
          <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required placeholder="">
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
          <textarea class="form-control" id="message" name="message" required rows="5"></textarea>
        </div>
      </div>
      <div class="col-12 text-center">
        <input type="hidden" name="redirect_url" value="<?php echo esc_url(get_permalink()); ?>"> <!-- URL actual -->
        <button class="btn-hans btn-hans--green" type="submit">Enviar</button>
      </div>
    </form>
    <div class="mt-3 text-center">
      <div id="formLoading" style="display: none;">
        <i class="bi bi-arrow-clockwise"></i>
        <span>Enviando...</span>
      </div>
      <div id="formStatus"></div>
      <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
        <div class="success-message">
          ¡Gracias! Tu mensaje ha sido enviado correctamente.
        </div>
      <?php elseif (isset($_GET['error']) && $_GET['error'] == '1'): ?>
        <div class="error-message2">
          Ocurrió un error al enviar tu mensaje. Por favor, intenta de nuevo.
        </div>
      <?php endif; ?>
    </div>
  </div>

</section>

<?php
get_footer();
?>