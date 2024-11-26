<?php
/*
Template Name:  Contactanos
*/
get_header();
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-hero-contacto.webp); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
          <h1 class="banner-title">CONTÁCTANOS</h1>
          <p class="banner-subtitle">Contribuir con objetividad <br> y apego a la verdad.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-table-certificados ptb-100">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="colorgreen-2">Información de contacto</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-lg-10 mx-auto">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-green-whatsapp.png" class="img-fluid mb-4" alt="...">
            <p class="colorgreen-2">+51 971 596 045</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-green-email.png" class="img-fluid mb-4" alt="...">
            <p class="colorgreen-2">info@hansgross.com.pe</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-green-map.png" class="img-fluid mb-4" alt="...">
            <p class="colorgreen-2">Av. América Oeste Mz. M Lt. 07 - A Ofc. 603 Urb. Natasha Alta Trujillo - Perú</p>
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
          <h2 class="colorgreen-2">Envíanos un mensaje</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
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
        <button class="btn btn-hans btn-hans--green" type="submit">Enviar</button>
      </div>
    </form>
    <div class="mt-3">
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