<?php
include("template-parts/header.php");
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(assets/img/bg-hero-certificados.webp); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php
    include("template-parts/navbar.php");
    ?>
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
      <div class="col-lg-10 mx-auto">
        <div class="card-search">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has dummy text of the printing and typesetting industry. Lorem Ipsum has and typesetting industry. Lorem Ipsum has</p>
          <div class="input-group mb-3 mx-auto">
            <input type="text" class="form-control" placeholder="Ingresa nombres y apellidos" aria-label="Ingresa nombres y apellidos" aria-describedby="button-addon2">
            <button class="btn btn--search" type="button" id="button-addon2">Buscar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-lg-10 mx-auto">
        <p>Alumno:</p>
        <p class="name-student">Alberto Álvarez Mejía</p>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-lg-10 mx-auto">
        <p>Resultados:</p>
        <div class="table-responsive">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Certificado</th>
                <th scope="col" class="text-center">Visualizar</th>
                <th scope="col" class="text-center">Descargar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>0010828092022</th>
                <td>Certificado Curso Forense</td>
                <td class="text-center"><img src="assets/img/icon-eye.png" class="img-fluid icon-table" alt=""></td>
                <td class="text-center"><img src="assets/img/icon-expediente.png" class="img-fluid icon-table" alt=""></td>
              </tr>
              <tr>
                <th>0140828092022</th>
                <td>Curso In-House de Siniestros Vehiculares</td>
                <td class="text-center"><img src="assets/img/icon-eye.png" class="img-fluid icon-table" alt=""></td>
                <td class="text-center"><img src="assets/img/icon-expediente.png" class="img-fluid icon-table" alt=""></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include("template-parts/footer.php");
?>