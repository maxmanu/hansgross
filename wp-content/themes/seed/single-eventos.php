<?php
get_header();
$categorias = get_the_terms(get_the_ID(), 'categorias_eventos');
$nombres_categorias = $categorias && !is_wp_error($categorias)
  ? implode(', ', wp_list_pluck($categorias, 'name'))
  : 'Sin categoría';
$clase_categoria = 'btn-category-card';
if ($categorias && !is_wp_error($categorias)) {
  foreach ($categorias as $categoria) {
    if ($categoria->slug === 'webinars') { // Cambia 'webinars' por el slug de tu categoría
      $clase_categoria .= ' btn-category-card--green';
      break;
    }
  }
}
$opciones_generales = get_option('mi_configuracion_general');
$descripcion_servicio = get_post_meta(get_the_ID(), 'evento_descripcion', true);
$fecha = get_post_meta(get_the_ID(), 'servicio_fecha', true);
$horario = get_post_meta(get_the_ID(), 'servicio_horario', true);
$pdf_url = get_post_meta(get_the_ID(), 'servicio_pdf', true);
$temario = get_post_meta(get_the_ID(), 'servicio_temario', true);
$brochure = get_post_meta(get_the_ID(), 'servicio_brochure', true);
$avalado = get_post_meta(get_the_ID(), 'servicio_avalado', true);
$ponente_nombre = get_post_meta(get_the_ID(), 'ponente_nombre', true);
$ponente_cargo = get_post_meta(get_the_ID(), 'ponente_cargo', true);
$ponente_imagen = get_post_meta(get_the_ID(), 'ponente_imagen', true);
$ponente_descripcion = get_post_meta(get_the_ID(), 'ponente_descripcion', true);
$precio_soles = get_post_meta(get_the_ID(), 'precio_soles', true);
$precio_dolares = get_post_meta(get_the_ID(), 'precio_dolares', true);
$video_imagen = get_post_meta(get_the_ID(), 'video_imagen', true);
$libro_gratis = get_post_meta(get_the_ID(), 'libro_gratis', true);

$whatsapp = isset($opciones_generales['whatsapp_contacto']) ? esc_html($opciones_generales['whatsapp_contacto']) : '';
$custom_whatsapp_message = get_post_meta(27, 'texto_whatsapp', true);
$whatsapp_message = urlencode($custom_whatsapp_message);

$precio_soles_certificado =
  isset($opciones_generales['precio_soles_certificado']) ? $opciones_generales['precio_soles_certificado'] : '';
$precio_dolares_certificado  =
  isset($opciones_generales['precio_dolares_certificado']) ? $opciones_generales['precio_dolares_certificado'] : '';
$imagen_certificado =
  isset($opciones_generales['imagen_certificado']) ? $opciones_generales['imagen_certificado'] : '';
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-single-curso.webp); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv" style="position: static;">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner hero-banner--hero">
      </div>
    </div>
  </div>
</header>

<main class="position-relative">
  <section class="section-sidebar-feat">
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-8">
          <div class="card-sidebar text-center">
            <div class="card-video-imagen">
              <!-- Mostrar video o imagen -->
              <?php if ($video_imagen): ?>
                <?php
                $file_type = wp_check_filetype($video_imagen);
                if (in_array($file_type['ext'], array('mp4', 'webm'))) : ?>
                  <video controls style="max-width: 100%; height: auto;">
                    <source src="<?php echo esc_url($video_imagen); ?>" type="<?php echo esc_attr($file_type['type']); ?>">
                    Tu navegador no soporta la reproducción de video.
                  </video>
                <?php else: ?>
                  <img src="<?php echo esc_url($video_imagen); ?>" alt="Imagen del Servicio">
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <!-- <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/video-curso.jpg" alt="" class="video-image mb-3"></a> -->
            <div class="d-inline-flex mb-3 div-precios">
              <p class="text-price"><sup class="sup-price">S/ </sup>
                <?php
                if ($precio_soles) {
                  // Asegurarte de que el precio tenga dos decimales
                  $precio_formateado = number_format($precio_soles, 2, '.', ''); // Formato: 123.45

                  // Separar parte entera y decimales
                  list($parte_entera, $decimales) = explode('.', $precio_formateado);

                  // Construir el HTML con <sup> para los decimales
                  echo '<span>' . esc_html($parte_entera) . '<sup>.' . esc_html($decimales) . '</sup></span>';
                }
                ?>
              </p>
              <div class="vr my-auto"></div>
              <p class="text-price"><sup class="sup-price">$ </sup>
                <?php
                if ($precio_dolares) {
                  // Asegurarte de que el precio tenga dos decimales
                  $precio_formateado = number_format($precio_dolares, 2, '.', ''); // Formato: 123.45

                  // Separar parte entera y decimales
                  list($parte_entera, $decimales) = explode('.', $precio_formateado);

                  // Construir el HTML con <sup> para los decimales
                  echo '<span>' . esc_html($parte_entera) . '<sup>.' . esc_html($decimales) . '</sup></span>';
                }
                ?>
              </p>
            </div>
            <?php
            // Generar enlace de WhatsApp
            $nombre_evento = get_the_title();
            // $mensaje = rawurlencode("Hola, estoy interesado en el evento: $nombre_evento");
            // $whatsapp_url = "https://wa.me/51<?php echo $whatsapp;  
            ?>
            <a target="_blank" href="https://wa.me/51<?php echo $whatsapp; ?>?text=<?php echo $whatsapp_message; ?> <?php echo rawurlencode($nombre_evento); ?>"><button class="btn btn-hans btn-hans--course mb-3"><i class="bi bi-cart2 pe-2"></i>Comprar</button></a>
            <div class="sidebar-feat mb-3">
              <?php if ($fecha): ?>
                <div class="d-flex mb-3 mx-auto text-start">
                  <div class="feat-event-text">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-fecha.png" class="img-fluid me-2" alt="...">
                    <b>Fecha:</b>
                  </div>
                  <div class="ms-3">
                    <?php
                    if ($fecha) {
                      // Convertir la fecha del meta a timestamp
                      $timestamp = strtotime($fecha);
                      // Formatear la fecha al estilo '3 de diciembre, 2024'
                      $fecha_formateada = date_i18n('j \d\e F, Y', $timestamp);
                      $fecha_es = traducir_mes($fecha_formateada);
                      // Mostrar la fecha formateada
                      echo '<span> ' . esc_html($fecha_es) . '</span>';
                    }
                    ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if ($horario): ?>
                <div class="d-flex mb-3 mx-auto text-start">
                  <div class="feat-event-text">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-reloj.png" class="img-fluid me-2" alt="...">
                    <b>Horario:</b>
                  </div>
                  <div class="ms-3 text-start">
                    <?php echo esc_html($horario); ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if ($brochure): ?>
                <div class="d-flex mb-3 mx-auto text-start">
                  <div class="feat-event-text">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-brochure.png" class="img-fluid me-2" alt="...">
                    <b>Brochure:</b>
                  </div>
                  <div class="ms-3">
                    <?php echo esc_html($brochure); ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if ($avalado): ?>
                <div class="d-flex mx-auto text-start">
                  <div class="feat-event-text">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-diploma.png" class="img-fluid me-2" alt="...">
                    <b>Avalado:</b>
                  </div>
                  <div class="ms-3">
                    <?php echo esc_html($avalado); ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <?php if ($pdf_url): ?>
              <a target="_blank" href="<?php echo esc_url($pdf_url); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-pdf.png" alt="" class="btn-pdf img-fluid mb-4"></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-course-features">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-auto mb-5 ms-4" style="color:#fff;">
          <a href="javascript:history.back()">
            <span><svg width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.5063 18.1933C25.5063 15.4123 23.2438 13.1498 20.4628 13.1498H10.8982L12.2494 11.7986C12.6509 11.3972 12.6509 10.7463 12.2494 10.3449C12.0487 10.1442 11.7856 10.0438 11.5225 10.0438C11.2594 10.0438 10.9964 10.1442 10.7957 10.3449L7.68959 13.451C7.49679 13.6437 7.38847 13.9052 7.38847 14.1778C7.38847 14.4504 7.49679 14.7119 7.68959 14.9046L10.7957 18.0107C11.1971 18.4122 11.848 18.4122 12.2494 18.0107C12.6509 17.6093 12.6509 16.9584 12.2494 16.557L10.8982 15.2058H20.4628C22.1101 15.2058 23.4503 16.5459 23.4503 18.1933C23.4503 19.8406 22.1101 21.1808 20.4628 21.1808H12.647C12.0793 21.1808 11.619 21.641 11.619 22.2087C11.619 22.7765 12.0793 23.2367 12.647 23.2367H20.4628C23.2439 23.2367 25.5063 20.9742 25.5063 18.1933ZM32.8947 16.6403C32.8947 7.57116 25.5165 0.192909 16.4474 0.192909C7.37825 0.192909 0 7.57116 0 16.6403C0 25.7094 7.37825 33.0876 16.4474 33.0876C25.5165 33.0876 32.8947 25.7094 32.8947 16.6403ZM30.8388 16.6403C30.8388 24.5757 24.3828 31.0317 16.4474 31.0317C8.5119 31.0317 2.05592 24.5757 2.05592 16.6403C2.05592 8.70481 8.5119 2.24883 16.4474 2.24883C24.3828 2.24883 30.8388 8.70481 30.8388 16.6403Z" fill="#fff" />
              </svg></span>
            Atrás
          </a>
        </div>
      </div>
    </div>
    <div class="bg-green-feature">
      <div class="container">
        <div class="row">
          <div class="col-auto me-auto ms-4">
            <?php
            $nombres_categorias = $categorias && !is_wp_error($categorias)
              ? implode(', ', wp_list_pluck($categorias, 'name'))
              : 'Sin categoría';
            $clase_categoria = 'btn-category-card';
            if ($categorias && !is_wp_error($categorias)) {
              foreach ($categorias as $categoria) {
                if ($categoria->slug === 'webinars') { // Cambia 'webinars' por el slug de tu categoría
                  $clase_categoria .= ' btn-category-card--green';
                  break;
                }
              }
            }
            ?>
            <div class="<?php echo esc_attr($clase_categoria) ?>"><?php echo esc_html($nombres_categorias) ?></div>
          </div>
        </div>
        <div class="row pt-4">
          <div class="col-md-8 me-auto">
            <div class="row">
              <div class="col-2 text-center pt-3">
                <p class="date-text text-uppercase">
                  <?php
                  if ($fecha) {
                    $timestamp = strtotime($fecha);
                    // Obtener la abreviatura en inglés
                    $mes_abreviado = date('M', $timestamp);
                    // Arreglo para traducir las abreviaturas al español
                    $meses_traducidos = array(
                      'Jan' => 'ene',
                      'Feb' => 'feb',
                      'Mar' => 'mar',
                      'Apr' => 'abr',
                      'May' => 'may',
                      'Jun' => 'jun',
                      'Jul' => 'jul',
                      'Aug' => 'ago',
                      'Sep' => 'sep',
                      'Oct' => 'oct',
                      'Nov' => 'nov',
                      'Dec' => 'dic',
                    );
                    // Traducir al español
                    $mes_espanol = isset($meses_traducidos[$mes_abreviado]) ? $meses_traducidos[$mes_abreviado] : $mes_abreviado;
                    // Mostrar el mes traducido
                    echo '<span>' . esc_html($mes_espanol) . '</span>';
                  }
                  ?>
                </p>
                <p class="date-text date-text--day">
                  <?php
                  if ($fecha) {
                    $timestamp = strtotime($fecha);
                    $fecha_formateada = date_i18n('j', $timestamp);
                    echo '<span> ' . esc_html($fecha_formateada) . '</span>';
                  }
                  ?>
                </p>
              </div>
              <div class="col-10">
                <h1 class="banner-title"><?php echo get_the_title() ?></h1>
                <p class="card-category mb-2">
                  <?php
                  // Especifica la taxonomía de etiquetas (por defecto es 'post_tag', pero podría ser personalizada)
                  $taxonomy = 'etiquetas_eventos'; // Cambia si usas una taxonomía personalizada

                  // Obtener todas las etiquetas (términos) del post actual
                  $terms = get_the_terms(get_the_ID(), $taxonomy);

                  // Verificar si hay etiquetas y no hay errores
                  if (!empty($terms) && !is_wp_error($terms)) {
                    echo 'Categoría: ';
                    foreach ($terms as $term) {
                      // Mostrar cada etiqueta con su enlace
                      echo  esc_html($term->name);
                    }
                  } else {
                    echo 'No tiene categoría.';
                  }
                  ?>
                </p>
                <?php if ($descripcion_servicio): ?>
                  <div class="card-text mb-5"><?php echo wp_kses_post($descripcion_servicio); ?></div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container d-block d-lg-none">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card-sidebar text-center mx-auto">
          <div class="card-video-imagen">
            <!-- Mostrar video o imagen -->
            <?php if ($video_imagen): ?>
              <?php
              $file_type = wp_check_filetype($video_imagen);
              if (in_array($file_type['ext'], array('mp4', 'webm'))) : ?>
                <video controls style="max-width: 100%; height: auto;">
                  <source src="<?php echo esc_url($video_imagen); ?>" type="<?php echo esc_attr($file_type['type']); ?>">
                  Tu navegador no soporta la reproducción de video.
                </video>
              <?php else: ?>
                <img src="<?php echo esc_url($video_imagen); ?>" alt="Imagen del Servicio">
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <!-- <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/video-curso.jpg" alt="" class="video-image mb-3"></a> -->
          <div class="d-inline-flex mb-3">
            <p class="text-price"><sup class="sup-price">S/ </sup>
              <?php
              if ($precio_soles) {
                // Asegurarte de que el precio tenga dos decimales
                $precio_formateado = number_format($precio_soles, 2, '.', ''); // Formato: 123.45

                // Separar parte entera y decimales
                list($parte_entera, $decimales) = explode('.', $precio_formateado);

                // Construir el HTML con <sup> para los decimales
                echo '<span>' . esc_html($parte_entera) . '<sup>.' . esc_html($decimales) . '</sup></span>';
              }
              ?>
            </p>
            <div class="vr my-auto"></div>
            <p class="text-price"><sup class="sup-price">$ </sup>
              <?php
              if ($precio_dolares) {
                // Asegurarte de que el precio tenga dos decimales
                $precio_formateado = number_format($precio_dolares, 2, '.', ''); // Formato: 123.45

                // Separar parte entera y decimales
                list($parte_entera, $decimales) = explode('.', $precio_formateado);

                // Construir el HTML con <sup> para los decimales
                echo '<span>' . esc_html($parte_entera) . '<sup>.' . esc_html($decimales) . '</sup></span>';
              }
              ?>
            </p>
          </div>
          <?php
          // Generar enlace de WhatsApp
          $nombre_evento = get_the_title();
          // $mensaje = rawurlencode("Hola, estoy interesado en el evento: $nombre_evento");
          // $whatsapp_url = "https://wa.me/51<?php echo $whatsapp;  
          ?>
          <a target="_blank" href="https://wa.me/51<?php echo $whatsapp; ?>?text=<?php echo $whatsapp_message; ?> <?php echo rawurlencode($nombre_evento); ?>"><button class="btn btn-hans btn-hans--course mb-3"><i class="bi bi-cart2 pe-2"></i>Comprar</button></a>
          <div class="sidebar-feat mb-3">
            <?php if ($fecha): ?>
              <div class="d-flex mb-3 mx-auto text-start">
                <div class="feat-event-text">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-fecha.png" class="img-fluid me-2" alt="...">
                  <b>Fecha:</b>
                </div>
                <div class="ms-3">
                  <?php
                  if ($fecha) {
                    // Convertir la fecha del meta a timestamp
                    $timestamp = strtotime($fecha);
                    // Formatear la fecha al estilo '3 de diciembre, 2024'
                    $fecha_formateada = date_i18n('j \d\e F, Y', $timestamp);
                    $fecha_es = traducir_mes($fecha_formateada);
                    // Mostrar la fecha formateada
                    echo '<span> ' . esc_html($fecha_es) . '</span>';
                  }
                  ?>
                </div>
              </div>
            <?php endif; ?>
            <?php if ($horario): ?>
              <div class="d-flex mb-3 mx-auto text-start">
                <div class="feat-event-text">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-reloj.png" class="img-fluid me-2" alt="...">
                  <b>Horario:</b>
                </div>
                <div class="ms-3 text-start">
                  <?php echo esc_html($horario); ?>
                </div>
              </div>
            <?php endif; ?>
            <?php if ($brochure): ?>
              <div class="d-flex mb-3 mx-auto text-start">
                <div class="feat-event-text">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-brochure.png" class="img-fluid me-2" alt="...">
                  <b>Brochure:</b>
                </div>
                <div class="ms-3">
                  <?php echo esc_html($brochure); ?>
                </div>
              </div>
            <?php endif; ?>
            <?php if ($avalado): ?>
              <div class="d-flex mx-auto text-start">
                <div class="feat-event-text">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-diploma.png" class="img-fluid me-2" alt="...">
                  <b>Avalado:</b>
                </div>
                <div class="ms-3">
                  <?php echo esc_html($avalado); ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <?php if ($pdf_url): ?>
            <a target="_blank" href="<?php echo esc_url($pdf_url); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-pdf.png" alt="" class="btn-pdf img-fluid mb-4"></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <section class="section-course-tabs">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 me-auto">
          <div class="accordion" id="accordionPanelsHans">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-svg-icon.svg" class="img-fluid me-4" style="width:25px;" alt=""></span>
                  Temario
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <?php if ($temario): ?>
                    <div class="card-text mb-5"><?php echo wp_kses_post($temario); ?></div>
                  <?php endif; ?>
                </div>
                <?php if ($libro_gratis): ?>
                  <div class="bloque-free">
                    <div class="">LLévate</div>
                    <div class=""><span class="mx-3">GRATIS</span></div>
                    <div class=""><?php echo esc_html($libro_gratis); ?></div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-svg-icon.svg" class="img-fluid me-4" style="width:25px;" alt=""></span>
                  Ponente
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse position-relative">
                <span class="box-decor-image" style="background:#85E5BB;opacity:0.5;top:10px;right:20px;"></span>
                <div class="accordion-body">
                  <div class="row align-items-center">
                    <div class="col-xl-5 position-relative">
                      <span class="box-decor-image" style="background:#85E5BB;opacity:0.5;top:-30px;right:0;width:40px;height:40px;"></span>
                      <div class="card">
                        <?php if ($ponente_imagen): ?>
                          <img src="<?php echo esc_url($ponente_imagen); ?>" alt="<?php echo esc_attr($ponente_nombre); ?>" class="card-img-top">
                        <?php endif; ?>
                        <div class="card-eq">
                          <div class="container">
                            <div class="row justify-content-center">
                              <div class="col-1">
                                <span class="square square--equipo"></span>
                              </div>
                              <div class="col-auto">
                                <p class="card-title mb-0"><b><?php echo esc_html($ponente_nombre); ?></b></p>
                                <small><?php echo esc_html($ponente_cargo); ?></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-7">
                      <?php if ($ponente_descripcion): ?>
                        <div><?php echo wp_kses_post($ponente_descripcion); ?></div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-svg-icon.svg" class="img-fluid me-4" style="width:25px;" alt=""></span>
                  Certificados
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                <div class="accordion-body">
                  <div class="costo-certificado">
                    <div class="d-sm-flex">
                      <div class="flex-shrink-0">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-diploma.png" class="img-fluid d-none d-md-block" alt="...">
                      </div>
                      <div class="flex-grow-1 ms-sm-3">
                        <p class="costo-certificado-tab">
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-diploma.png" class="img-fluid d-inline d-md-none" alt="...">
                          Costo del Certificado:
                        </p>
                        <p class="accordion-price">
                          <sup>S/</sup>
                          <?php if ($precio_soles_certificado):  echo esc_html($precio_soles_certificado);
                          endif; ?>
                          o
                          <sup>US$ </sup>
                          <?php if ($precio_dolares_certificado):  echo esc_html($precio_dolares_certificado);
                          endif; ?>
                        </p>
                        <p>(Podrá acceder a la grabación del evento)</p>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <?php if ($imagen_certificado): ?>
                      <img src="<?php echo esc_url($imagen_certificado); ?>" alt="imagen-certificado" class="img-fluid mt-2">
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                  <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-svg-icon.svg" class="img-fluid me-4" style="width:25px;" alt=""></span>
                  Procedimientos de Pago
                </button>
              </h2>
              <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                <div class="accordion-body">
                  <div class="row align-items-center">
                    <div class="col-lg-8 mx-auto text-center text-lg-start">
                      <div class="row">
                        <div class="col-lg-4">
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/yape-hansgross.png" class="img-fluid img-yape" alt="...">
                        </div>
                        <div class="col-lg-8 mt-3 mt-lg-0">
                          <p class="title-bloque-tab">Cuenta Corriente BCP soles</p>
                          <p>Número de Cuenta : 191-9851512-0-20<br> CCI : 00219100985151202056</p>
                          <br>
                          <p class="title-bloque-tab">Cuenta Corriente INTERBANK soles</p>
                          <p>Número de Cuenta : 200-3002908296 <br> CCI : 003-200-003002908296-30</p>
                          <p>Titular: HANS GROSS EIRL</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-5 text-center">
                    <div class="col">
                      <p class="title-bloque-tab">Pagos internacionales</p>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-niubiz.webp" class="img-fluid" style="max-width:300px;" alt="...">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</main>

<?php
get_footer();
?>