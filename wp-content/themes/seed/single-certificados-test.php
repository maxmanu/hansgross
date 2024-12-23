<?php
get_header();
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-hero-certificados.webp); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php get_template_part('template-parts/content', 'nav'); ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
          <h1 class="banner-title">CERTIFICADOS</h1>
          <p class="banner-subtitle">Contribuir con objetividad <br> y apego a la verdad.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-table-certificados">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-11 mx-auto">
        <div class="card-search">
          <p class="pb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has dummy text of the printing and typesetting industry. Lorem Ipsum has and typesetting industry. Lorem Ipsum has</p>
          <div class="input-group mb-3 mx-auto">
            <input type="text" class="form-control" placeholder="Ingresa nombres y apellidos completos" aria-label="Ingresa nombres y apellidos" aria-describedby="button-addon2">
            <button class="btn btn--search" type="button" id="button-addon2">Buscar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-lg-11 mx-auto">
        <p>Alumno:</p>
        <p class="name-student">Alberto Álvarez Mejía</p>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-lg-11 mx-auto">
        <p>Resultados:</p>
        <div class="table-responsive">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th scope="col" class="first-title-table">Código</th>
                <th scope="col">Certificado</th>
                <th scope="col" class="text-center">Visualizar</th>
                <th scope="col" class="text-center">Descargar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $certificados = get_post_meta(get_the_ID(), 'grupo_certificados', true);

              if (!empty($certificados)) {
                foreach ($certificados as $certificado) {
                  $codigo = isset($certificado['numero_codigo']) ? esc_html($certificado['numero_codigo']) : '';
                  $nombre = isset($certificado['nombre_certificado']) ? esc_html($certificado['nombre_certificado']) : '';
                  $pdf = isset($certificado['archivo_pdf']) ? esc_url($certificado['archivo_pdf']) : '';

                  echo '<tr>';
                  echo '<th>';
                  echo '<img src="' . get_template_directory_uri() . '/assets/img/icon-diploma.png" class="img-fluid me-3" alt="...">';
                  if ($codigo) {
                    echo '<span>' . $codigo . '</span>';
                  }
                  echo '</th>';
                  echo '<td>';
                  echo '<div class="pt-3">';
                  if ($nombre) {
                    echo '<span>' . $nombre . '</span>';
                  }
                  echo '</div>';
                  echo '</td>';
                  echo '<td class="text-center">';
                  echo '<div class="pt-3">';
                  if ($pdf) {
                    echo '<a href="' . $pdf . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/img/icon-eye.png" class="img-fluid icon-table" alt="..."></a>';
                  }
                  echo '</div>';
                  echo '</td>';
                  echo '<td class="text-center">';
                  echo '<div class="pt-3">';
                  if ($pdf) {
                    echo '<a href="' . $pdf . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/img/icon-expediente.png" class="img-fluid icon-table" alt=""></a>';
                  }
                  echo '</div>';
                  echo '</td>';
                  echo '</tr>';
                }
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
get_footer();
?>