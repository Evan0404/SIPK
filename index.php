<?php 
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    if(isset($_GET['logout'])){
      // Hapus semua data sesi
      session_unset();
      // Hancurkan sesi
      session_destroy();
      // Redirect ke halaman login
      header("Location: login.php");
      exit();

    }
    include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/img/apple-icon.png"
    />
    <link rel="icon" type="image/png" href="assets/img/logo.png" />
    <title>SIPK | HMJ-Akuntansi </title>
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
      rel="stylesheet"
    />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"
    ></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link
      id="pagestyle"
      href="./assets/css/argon-dashboard.css?v=2.0.4"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>

  <body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-danger position-absolute w-100"></div>
    <?php include "slidebar.php"; ?>
    <main class="main-content position-relative border-radius-lg">
      <!-- Navbar -->
      <nav
        class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
        id="navbarBlur"
        data-scroll="false"
      >
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol
              class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5"
            >
              <li class="breadcrumb-item text-sm">
                <a class="opacity-5 text-white" href="javascript:;">Pages</a>
              </li>
              <li
                class="breadcrumb-item text-sm text-white active"
                aria-current="page"
              >
                <span class="text-capitalize">
                    <?php
                        if(isset($_GET['hal'])){
                            echo str_replace("-", " ", $_GET['hal']);
                        }else{
                            echo "dashboard";
                        }
                    ?>
                </span>
              </li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0 text-capitalize">
                <?php
                    if(isset($_GET['hal'])){
                        echo str_replace("-", " ", $_GET['hal']);
                    }else{
                        echo "dashboard";
                    }
                ?>
            </h6>
          </nav>
          <div
            class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
            id="navbar"
          >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <!-- <div class="input-group">
                <span class="input-group-text text-body"
                  ><i class="fas fa-search" aria-hidden="true"></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Type here..."
                />
              </div> -->
            </div>
            <ul class="navbar-nav justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a
                  href="javascript:;"
                  class="nav-link text-white font-weight-bold px-0"
                >
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">
                    <?= $_SESSION['admin']['username']?>
                  </span>
                </a>
              </li>
              <li class="nav-item d-flex align-items-center">
                <a
                  href="index.php?logout"
                  class="nav-link text-white font-weight-bold px-2"
                >
                  <span class="d-sm-inline d-none">
                    Logout
                  </span>
                </a>
              </li>
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a
                  href="javascript:;"
                  class="nav-link text-white p-0"
                  id="iconNavbarSidenav"
                >
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
        <?php
            if(isset($_GET['hal'])){
                include "pages/$_GET[hal].php";
            }else{
                include "pages/dashboard.php";
            }
        ?>
        <footer class="footer pt-3">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div
                  class="copyright text-center text-sm text-muted text-lg-start"
                >
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with <i class="fa fa-heart"></i> by
                  <a
                    href=""
                    class="font-weight-bold"
                    target="_blank"
                    >Wedang Tech</a
                  >
                  for a better web.
                </div>
              </div>
              <!-- <div class="col-lg-6">
                <ul
                  class="nav nav-footer justify-content-center justify-content-lg-end"
                >
                  <li class="nav-item">
                    <a
                      href="https://www.creative-tim.com"
                      class="nav-link text-muted"
                      target="_blank"
                      >Creative Tim</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      href="https://www.creative-tim.com/presentation"
                      class="nav-link text-muted"
                      target="_blank"
                      >About Us</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      href="https://www.creative-tim.com/blog"
                      class="nav-link text-muted"
                      target="_blank"
                      >Blog</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      href="https://www.creative-tim.com/license"
                      class="nav-link pe-0 text-muted"
                      target="_blank"
                      >License</a
                    >
                  </li>
                </ul>
              </div> -->
            </div>
          </div>
        </footer>
      </div>
    </main>
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <?php
      $kas=$con->query("SELECT SUM(jumlah) AS total, DATE_FORMAT(tgl_kas, '%M %Y') as bulan, DATE_FORMAT(tgl_kas, '%m') as bulanNo FROM kas GROUP BY bulan ORDER BY bulanNo ASC LIMIT 12 ");
    ?>
    <script>
      var ctx1 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, "rgba(94, 114, 228, 0.2)");
      gradientStroke1.addColorStop(0.2, "rgba(94, 114, 228, 0.0)");
      gradientStroke1.addColorStop(0, "rgba(94, 114, 228, 0)");
      new Chart(ctx1, {
        type: "line",
        data: {
          labels: [
            <?php foreach($kas as $bul){?>
              "<?= $bul['bulan']?>",
            <?php }?>
          ],
          datasets: [
            {
              label: "Saldo",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#f5365c",
              backgroundColor: gradientStroke1,
              borderWidth: 3,
              fill: true,
              data: [
                <?php 
                  foreach ($kas as $data) {
                  $masuk = $con->query("SELECT SUM(jumlah) AS total FROM masuk_keluar WHERE jenis ='Masuk' and DATE_FORMAT(tgl, '%M %Y') = '$data[bulan]'")->fetch_assoc();  
                  $keluar = $con->query("SELECT SUM(jumlah) AS total FROM masuk_keluar WHERE jenis ='Keluar' and DATE_FORMAT(tgl, '%M %Y') = '$data[bulan]'")->fetch_assoc();  

                ?>
                  <?= $data['total']+$masuk['total']-$keluar['total']?>,
                <?php }?>
              ],
              maxBarThickness: 6,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
          },
          interaction: {
            intersect: false,
            mode: "index",
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
              },
              ticks: {
                display: true,
                padding: 10,
                color: "black",
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: "normal",
                  lineHeight: 2,
                },
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5],
              },
              ticks: {
                display: true,
                color: "#ccc",
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: "normal",
                  lineHeight: 2,
                },
              },
            },
          },
        },
      });
    </script>
    <?php
      $kas=$con->query("SELECT SUM(jumlah) AS total FROM kas LIMIT 12 ")->fetch_assoc();
      $masuk = $con->query("SELECT SUM(jumlah) AS total FROM masuk_keluar WHERE jenis ='Masuk' LIMIT 12")->fetch_assoc();  
      $keluar = $con->query("SELECT SUM(jumlah) AS total FROM masuk_keluar WHERE jenis ='Keluar' LIMIT 12")->fetch_assoc();  

    ?>
    <script>
      var ctx2 = document.getElementById("chart-pie").getContext("2d");

      // var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

      // gradientStroke1.addColorStop(1, "rgba(94, 114, 228, 0.2)");
      // gradientStroke1.addColorStop(0.2, "rgba(94, 114, 228, 0.0)");
      // gradientStroke1.addColorStop(0, "rgba(94, 114, 228, 0)");
      new Chart(ctx2, {
        type: "pie",
        data: {
          labels: [
            'Uang Keluar',
            'Kas',
            'Uang Masuk',
          ],
          datasets: [{
            label: 'My First Dataset',
            data: [<?= $keluar['total']?>, <?= $kas['total']?>, <?= $masuk['total']?> ],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
          }]
        },
      });
    </script>
    <script>
      var win = navigator.platform.indexOf("Win") > -1;
      if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
          damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  </body>
</html>
