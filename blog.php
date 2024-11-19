<?php
include("template-parts/header.php");
?>

<header id="miDiv" class="continer-fluid" style="background-image: url(assets/img/bg-hero-blog.webp); background-repeat: no-repeat; background-size: cover; background-position:center;">
  <div id="overlay"></div>
  <div id="contenidoDiv">
    <?php
    include("template-parts/navbar.php");
    ?>
    <div class="container my-auto pb-3">
      <div class="row align-items-center hero-banner">
        <div class="col-md-7">
          <h1 class="banner-title">BLOG - EVENTOS</h1>
          <p class="banner-subtitle">Lorem Ipsum is simply <br> dummy text of the.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="section-blog ptb-100">
  <div class="container">
    <div class="row align-items-center mb-5 px-5">
      <div class="col-lg-9 mx-auto">
        <h2 class="colorgreen-2">Notas - Eventos</h2>
      </div>
      <div class="col-lg-3">
        <select class="form-select select-category" aria-label="Default select example">
          <option selected>Categoría</option>
          <option value="criminalistica">Criminalística</option>
          <option value="informatica">Informática</option>
        </select>
        <!-- <div class="dropdown">
          <button class="btn btn-category dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categoría
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Criminalística</a></li>
            <li><a class="dropdown-item" href="#">Informática</a></li>
          </ul>
        </div> -->
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-card-servicios g-4">
          <div class="col">
            <a href="single.php">
              <div class="card card--blog h-100">
                <div class="position-relative">
                  <div class="btn-category-card">23 de Setiembre</div>
                  <img src="assets/img/img-card-academico.webp" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Lorem Ipsum is simply</h5>
                  <p class="card-text mb-1">Por Rodrigo Esteban</p>
                  <p class="card-category mb-1">Categoría: Criminalística</p>
                  <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing .</p>
                </div>
                <div class="card-footer colorgreen-2">
                  <b>Mostrar más</b>
                  <div class="btn-arrows-servicios">
                    <i class="bi bi-arrow-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="single.php">
              <div class="card card--blog h-100">
                <div class="position-relative">
                  <div class="btn-category-card">23 de Setiembre</div>
                  <img src="assets/img/img-card-academico.webp" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Lorem Ipsum is simply</h5>
                  <p class="card-text mb-1">Por Rodrigo Esteban</p>
                  <p class="card-category mb-1">Categoría: Criminalística</p>
                  <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing .</p>
                </div>
                <div class="card-footer colorgreen-2">
                  <b>Mostrar más</b>
                  <div class="btn-arrows-servicios">
                    <i class="bi bi-arrow-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="single.php">
              <div class="card card--blog h-100">
                <div class="position-relative">
                  <div class="btn-category-card">23 de Setiembre</div>
                  <img src="assets/img/img-card-academico.webp" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Lorem Ipsum is simply</h5>
                  <p class="card-text mb-1">Por Rodrigo Esteban</p>
                  <p class="card-category mb-1">Categoría: Criminalística</p>
                  <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing .</p>
                </div>
                <div class="card-footer colorgreen-2">
                  <b>Mostrar más</b>
                  <div class="btn-arrows-servicios">
                    <i class="bi bi-arrow-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="single.php">
              <div class="card card--blog h-100">
                <div class="position-relative">
                  <div class="btn-category-card">23 de Setiembre</div>
                  <img src="assets/img/img-card-academico.webp" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Lorem Ipsum is simply</h5>
                  <p class="card-text mb-1">Por Rodrigo Esteban</p>
                  <p class="card-category mb-1">Categoría: Criminalística</p>
                  <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing .</p>
                </div>
                <div class="card-footer colorgreen-2">
                  <b>Mostrar más</b>
                  <div class="btn-arrows-servicios">
                    <i class="bi bi-arrow-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="single.php">
              <div class="card card--blog h-100">
                <div class="position-relative">
                  <div class="btn-category-card">23 de Setiembre</div>
                  <img src="assets/img/img-card-academico.webp" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Lorem Ipsum is simply</h5>
                  <p class="card-text mb-1">Por Rodrigo Esteban</p>
                  <p class="card-category mb-1">Categoría: Criminalística</p>
                  <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing .</p>
                </div>
                <div class="card-footer colorgreen-2">
                  <b>Mostrar más</b>
                  <div class="btn-arrows-servicios">
                    <i class="bi bi-arrow-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="single.php">
              <div class="card card--blog h-100">
                <div class="position-relative">
                  <div class="btn-category-card">23 de Setiembre</div>
                  <img src="assets/img/img-card-academico.webp" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Lorem Ipsum is simply</h5>
                  <p class="card-text mb-1">Por Rodrigo Esteban</p>
                  <p class="card-category mb-1">Categoría: Criminalística</p>
                  <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. Lorem Ipsum is simply dummy. Lorem Ipsum is simply dummy text of the printing .</p>
                </div>
                <div class="card-footer colorgreen-2">
                  <b>Mostrar más</b>
                  <div class="btn-arrows-servicios">
                    <i class="bi bi-arrow-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-end">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include("template-parts/footer.php");
?>