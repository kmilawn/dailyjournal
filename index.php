<?php
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harry Potter</title>
    <link rel="icon" href="img/logo.jpeg" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <!-- nav begin -->
      <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
          <a class="navbar-brand" href="#">Harry Potter</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"   aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#article">Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#schedule">Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#aboutme">About Me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php" target="_blank">Login</a>
              </li>
              <li class="nav-item"> 
                <button id="dark" class="btn btn-link"><i class="bi bi-moon-stars-fill"></i></button>
              </li>
              <li>
                <button id="light" class="btn btn-link"><i class="bi bi-brightness-low"></i></button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- nav end -->
    <!-- hero begin -->
      <section id="hero" class="text-center p-5 bg-light text-sm-start">
        <div class="container">
          <div class="d-sm-flex flex-sm-row-reverse align-items-center">
            <img src="https://i.pinimg.com/474x/b9/3b/ce/b93bce7326c7e1c7eaa838aa1b604393.jpg" class="img-fluid" width="300">
            <div>
              <h1 class="fw-bold display-4">Hogwarts, The Wizarding World, School of Witchcraft and Wizardry</h1>
              <h4 class="lead display-6">The fun facts about Harry Potter</h4>
              <h6>
                <span id="tanggal"></span>
                <span id="jam"></span>
              </h6>
            </div>
          </div>
        </div>
      </section>
    <!-- hero end -->
<!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

    <!-- Gallery Begin -->
<section id="gallery" class="text-center p-5 bg-light">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Gallery</h1>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        // Variabel untuk menandai item aktif
        $sql = "SELECT * FROM gallery";
        $hasil = $conn->query($sql);
        $isActive = true;

        // Tampilkan data gambar jika ada
        if ($hasil->num_rows > 0):
          while ($row = $hasil->fetch_assoc()):
            // Tambahkan class "active" hanya untuk item pertama
            $activeClass = $isActive ? "active" : "";
            $isActive = false; // Setelah item pertama, set menjadi false
        ?>
            <div class="carousel-item <?= $activeClass ?>">
            <img src="<?= htmlspecialchars($row['gambar'], ENT_QUOTES, 'UTF-8') ?>" class="d-block w-100" alt="Gambar Gallery">
                <p><?= htmlspecialchars($row['id']) ?></p>
              </div>
            </div>
        <?php
          endwhile;
        else:
        ?>
          <div class="carousel-item active">
            <p class="text-muted">Tidak ada gambar di gallery.</p>
          </div>
        <?php endif; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>
<!-- Gallery End -->



    <!-- schedule begin -->
    <section id="schedule" class="text-center p-5">
      <div class="container">
          
          <h1 class="fw-bold display-4 pb-3">Schedule</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
          <div class="col">
          <div class="card border-dark mb-3  " style="max-width: 18rem;">
              <div class="card-header bg-danger">SENIN</div>
              <div class="card-body text-dark">
               
                <p class="card-text">Rekayasa Perangkat Lunak <br> 07.00-09.30 | H.5.6</p>
                <hr>
                <p class="card-text">Logika Informatika <br> 10.20-12.00 | H.4.10</p>
                
              </div>
            </div>
            </div>
          
            <div class="col">
            <div class="card border-dark mb-3  md-col 4" style="max-width: 18rem;">
              <div class="card-header bg-danger">SELASA</div>
              <div class="card-body text-dark">
                <p class="card-text">Probabilitas dan Statistik <br> 07.00-09.30 | H.3.8</p>
                <hr>
                <p class="card-text">Pendidikan Kewarganegaraan <br> 10.20-12.00 | Aula H.7</p>
                <hr>
                <p class="card-text">Basis Data <br> 12.30-14.10 | D.3.M</p>
              </div>
            </div>
            </div>

            <div>
            <div class="card border-dark mb-3  " style="max-width: 18rem;">
              <div class="card-header bg-danger">RABU</div>
              <div class="card-body text-dark">
                  <p class="card-text"> Pemograman Berbasis Web <br> 07.00-08.40 | D.2.J</p>
                  <hr>
                  <p class="card-text">Sistem Informasi <br> 09.30-12.00 | H.5.13</p>
              </div>
            </div>
            </div>

          <div class="col">
            <div class="card border-dark mb-3  " style="max-width: 18rem;">
              <div class="card-header bg-danger">KAMIS</div>
              <div class="card-body text-dark">
                <p class="card-text">Basis Data <br> 07.00-08.40 | H.5.1</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card border-dark mb-3  " style="max-width: 18rem;">
              <div class="card-header bg-danger ">JUM'AT</div>
              <div class="card-body text-dark">
                <p class="card-text">Sistem Operasi <br> 07.00-09.30 | H.4.10</p>
              </div>
            </div>
            </div>

            <div class="col">
            <div class="card border-dark mb-3 md-col 4" style="max-width: 18rem;">
              <div class="card-header bg-danger text-dark">SABTU</div>
              <div class="card-body">
                <p class="card-text">FREE!!</p>
              </div>
            </div>
            </div>
          </div>
      </div>
   </section>
    <!-- schedule end -->

    <!-- about me begin -->
    <section id="aboutme" class="text-center p-5 bg-light text-sm-start">
      <div class="container">
        <div class="d-sm-flex flex-sm-row justify-content-center">
          <img src="https://i.pinimg.com/474x/43/44/a0/4344a0a5f636a639288e5700ffc6c445.jpg" class="rounded-circle" width="200">
          <div>
            <div class="text-align-center">
              <p class="lead display-">A11.2023.15209</p>
              <h5 class="fw-bold display-6">Najwah Kamila</h5>
              <p>Program Studi Teknik Informatika</p>
              <div>
                <a href="https://dinus.ac.id/" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity"><p><b>Universitas Dian Nuswantoro</b></a>
            </div>
          </div>
        </div>
      </section>
    <!-- about me end -->

    <!-- footer begin -->
      <footer class="text-center p-5">
        <div>
          <a href="https://www.instagram.com/daniel9340/" class="icon"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
          <a href="https://twitter.com/harrypotter" class="icon"><i class="bi bi-twitter h2 p-2 text-dark"></i></a>
          <a href="https://wa.me/+6281317596872" class="icon"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
        </div>
        <div>
          Najwah Kamila &copy; 2024
        </div>
      </footer>
    <!-- footer end -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript">
      window.setTimeout("tampilWaktu()", 1000);

      function tampilWaktu() {
        var waktu = new Date();
        var bulan = waktu.getMonth() + 1;

        setTimeout("tampilWaktu", 1000);
        document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
        document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
      };

      document.getElementById("dark").onclick = function () {
        document.body.style.backgroundColor = "black";
        document.body.style.color = "white";
        document.getElementById("hero").classList.remove("bg-light");
        document.getElementById("hero").classList.add("bg-dark");
        document.getElementById("gallery").classList.remove("bg-light");
        document.getElementById("gallery").classList.add("bg-dark");
      };
      document.getElementById("light").onclick = function () {
        document.body.style.backgroundColor = "white";
        document.body.style.color = "black";
        document.getElementById("hero").classList.remove("bg-dark");
        document.getElementById("hero").classList.add("bg-light");
        document.getElementById("gallery").classList.remove("bg-dark");
        document.getElementById("gallery").classList.add("bg-light");
      };
    </script>
  </body>
</html>