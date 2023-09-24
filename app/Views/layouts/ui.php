<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo.jpg') ?>">
  <title>
    TAL - <?= $this->renderSection('title'); ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.0.4') ?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
  <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
</head>

<body class="g-sidenav-show   bg-gray-100">
  <?php if (session()->has('notif')) : ?>
    <div class="card position-absolute bottom-0 left-100 m-3 slidy">
      <div class="card-body">
        <?php if (!session()->notif) : ?>
          <h5 class="card-title text-danger">Erreur!</h5>
        <?php else : ?>
          <h5 class="card-title text-success">Succés!</h5>
        <?php endif ?>
        <p class="card-text"><?= session()->message ?></p>
      </div>
    </div>
  <?php endif ?>
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?= base_url(session()->root) ?>">
        <img src="<?= base_url('assets/img/logo.jpg') ?>" class="navbar-brand-img h-100" alt="Logo">
        <span class="ms-1 font-weight-bold">TAL</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <!-- <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main"> -->
    <ul class="navbar-nav">
      <?php if (
        session()->u['profil'] == 'SUPERADMIN'
      ) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'dashboard') ? 'active' : '' ?>" href="<?= base_url(session()->root) ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
      <?php endif ?>
      <?php if (
        session()->u['profil'] == 'SUPERADMIN'
        or session()->u['profil'] == 'ADMIN'
      ) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'utilisateurs') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/utilisateurs') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Utilisateurs</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if (
        session()->u['profil'] == 'SUPERADMIN'
        or session()->u['profil'] == 'FACTURATION'
      ) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'rapports') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/rapports') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Rapports</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if (
        session()->u['profil'] == 'SUPERADMIN'
        or session()->u['profil'] == 'ADMIN'
      ) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'transporteurs') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/transporteurs') ?>">
            <div class="icon text-info icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="M488 192H336v56c0 39.7-32.3 72-72 72s-72-32.3-72-72V126.4l-64.9 39C107.8 176.9 96 197.8 96 220.2v47.3l-80 46.2C.7 322.5-4.6 342.1 4.3 357.4l80 138.6c8.8 15.3 28.4 20.5 43.7 11.7L231.4 448H368c35.3 0 64-28.7 64-64h16c17.7 0 32-14.3 32-32v-64h8c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm147.7-37.4L555.7 16C546.9.7 527.3-4.5 512 4.3L408.6 64H306.4c-12 0-23.7 3.4-33.9 9.7L239 94.6c-9.4 5.8-15 16.1-15 27.1V248c0 22.1 17.9 40 40 40s40-17.9 40-40v-88h184c30.9 0 56 25.1 56 56v28.5l80-46.2c15.3-8.9 20.5-28.4 11.7-43.7z"></path>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Transporteurs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'chauffeurs') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/chauffeurs') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user-tie text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Chauffeurs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'tracteurs') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/tracteurs') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-truck text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tracteurs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'remorques') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/remorques') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-trailer text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Remorques</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'suivi-flotte') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/suivi-flotte') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-bell text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Suivi Flotte</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if (
        session()->u['profil'] == 'SUPERADMIN'
        or session()->u['profil'] == 'GARAGISTE'
      ) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'garage') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/garage') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-tools text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Garage</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if (
        session()->u['profil'] == 'SUPERADMIN'
        or session()->u['profil'] == 'G. CARBURANT'
      ) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'carburant') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/carburant') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-gas-pump text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Carburant</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if (
        session()->u['profil'] == 'SUPERADMIN'
        or session()->u['profil'] == 'OPS'
      ) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'livraisons') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/livraisons') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Livraisons</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'transferts') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/transferts') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transferts</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'exports') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/exports') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Exports</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (session()->p == 'archives') ? 'active' : '' ?>" href="<?= base_url(session()->root . '/archives') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Archives</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>
    <!-- </div> -->
  </aside>
  <main class="main-content position-relative border-radius-lg ">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= $this->renderSection('bctitle'); ?></li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0"><?= $this->renderSection('ptitle'); ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>
          <ul class="navbar-nav  justify-content-end gap-2">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center ">
              <a href="javascript:;" class="nav-link text-white p-0 d-flex gap-2 align-items-center" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user cursor-pointer"></i>
                <span class="d-none d-lg-block"><?= session()->u['nom'] ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li>
                  <div class="alert alert-primary bg-gradient-faded-primary d-flex flex-column text-white" role="alert">
                    <strong><?= session()->u['nom'] ?></strong>
                    <span class=" text-sm"><?= session()->u['profil'] ?></span>
                  </div>

                </li>
                <li data-bs-toggle="modal" data-bs-target="#modpass">
                  <a class="dropdown-item border-radius-md" href="#">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-warning  me-3  my-auto">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1 text-dark">
                          Modifier mon mot de passe
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="<?= base_url('deconnexion') ?>">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-danger  me-3  my-auto">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1 text-dark">
                          Se déconnecter
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <?= $this->renderSection('main') ?>
    <footer class="footer p-3 bg-white mt-4">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              Transport Afrique Logistique.
            </div>
          </div>
          <div class="col-lg-6">
          </div>
        </div>
      </div>
    </footer>
  </main>


  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modpass" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="mod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mod">Modifier le mot de passe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= csrf_field() ?>
        <?= form_open(base_url(session()->root . '/modifer/mot-de-passe')) ?>
        <div class="modal-body">
          <div class="mb-3">
            <input type="password" required class="form-control" name="mdp" placeholder="Mot de passe actuel">
          </div>
          <div class="mb-3">
            <input type="password" required class="form-control" name="mdpn" placeholder="Nouveau mot de passe">
          </div>
          <div>
            <input type="password" required class="form-control" name="mdpc" placeholder="Confirmez le mot de passe">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" value="<?= session()->u['id'] ?>" name="id" class="btn btn-primary">Enregister</button>
        </div>
      </div>
      <?= form_close() ?>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var elementsAvecNombres = document.querySelectorAll('.num'); // Remplacez "votre-classe" par la classe appropriée

      elementsAvecNombres.forEach(function(element) {
        var texte = element.textContent;
        if (!isNaN(texte)) {
          var nombreAvecPoints = ajouterPoints(texte);
          element.textContent = nombreAvecPoints;
        }
      });
    });

    function ajouterPoints(nombre) {
      return nombre.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
  </script>

  <!-- Optional: Place to the bottom of scripts -->
  <script>
    const myModal = new bootstrap.Modal(document.getElementById('modpass'), options)
  </script>

  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.0.4') ?>"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.table').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5',
        ],
        language: {
          decimal: ',',
          thousands: '.'
        },
      });
    });
  </script>
</body>

</html>