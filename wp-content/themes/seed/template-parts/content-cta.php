<?php
$opciones_generales = get_option('mi_configuracion_general');
$cta_text = isset($opciones_generales['call_to_action']) ? esc_html($opciones_generales['call_to_action']) : '';
$cta_image = isset($opciones_generales['imagen_cta']) ? esc_html($opciones_generales['imagen_cta']) : '';
$whatsapp = isset($opciones_generales['whatsapp_contacto']) ? esc_html($opciones_generales['whatsapp_contacto']) : '';
// Personalizar el texto del mensaje según la página
$whatsapp_message = "Tengo%20una%20consulta"; // Texto por defecto
if (is_page(36) || is_singular('servicios')) {
  $whatsapp_message = "Hola,%20tengo%20una%20consulta%20sobre%20los%20servicios";
} elseif (is_page(38) || is_singular('softwares')) {
  $whatsapp_message = "Hola,%20necesito%20información%20sobre%20los%20softwares";
}
?>
<section class="section-contactanos ptb-50">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5">
        <h2 class="colorgreen-2">Contáctanos</h2>
        <?php
        if ($cta_text) {
          echo '<p>' . esc_html($cta_text) . '</p>';
        }
        ?>
        <div class="group-buttons mt-5">
          <?php
          if ($whatsapp) {
          ?>
            <a target="_blank" href="https://wa.me/51<?php echo $whatsapp; ?>?text=<?php echo $whatsapp_message; ?>">
              <button class="btn btn-hans btn-hans--whats">
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-svg-whats.svg" alt=""></span>
                Por Whatsapp
              </button>
            </a>
          <?php
          }
          ?>
          <a href="/contactanos">
            <button class="btn btn-hans btn-hans--mail">
              <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-svg-mail.svg" alt=""></span>
              Ver más
            </button>
          </a>
        </div>
      </div>
      <div class="col-lg-7">
        <img src="<?php echo esc_url($cta_image); ?>" alt="" class="img-fluid">
      </div>
    </div>
  </div>
</section>