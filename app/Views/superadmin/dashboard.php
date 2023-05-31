<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Dashboard
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Dashboard
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Dashboard
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Livraisons</p>
                <h5 class="font-weight-bolder">
                  <?= $l ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="fa fa-truck-loading text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Transferts</p>
                <h5 class="font-weight-bolder">
                  <?= $t ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="fa fa-globe-africa text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Exports</p>
                <h5 class="font-weight-bolder">
                  <?= $e ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="fa fa-truck text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Camions</p>
                <h5 class="font-weight-bolder">
                  <?= $c ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="fa fa-trailer text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">[Donnees]</h6>
          <p class="text-sm mb-0">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">[]</span> []
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Classement chauffeurs selon le nombre de TEUS mensuel transfert</h6>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            <?php foreach ($tcm as $t) : ?>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="fa fa-user text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm"><?= $t['nom'] ?></h6>
                    <span class="text-xs">Matricule <span class="text-primary"><?= $t['matricule'] ?></span>, avec <span class="font-weight-bold"><?= $t['teus'] ?> TEUS</span></span>
                  </div>
                </div>
                <!-- <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div> -->
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Classement de la flotte selon le nombre d'opération mensuel</h6>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            <?php foreach ($mcm as $m) : ?>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="fa fa-truck text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm"><?= $m['chrono'] ?></h6>
                    <span class="text-xs">Avec <span class="font-weight-bold"><?= $m['ops'] ?> opérations.</span></span>
                  </div>
                </div>
                <!-- <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div> -->
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
<!-- <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  var ctx1 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

  $.ajax({
    type: "get",
    url: "<?= base_url('line') ?>",
    data: [],
    dataType: "JSON",
    success: function(response) {
      new Chart(ctx1, {
        type: "line",
        data: {
          // labels: ["Jan", "Fèv", "Mar", "Avr", "Mai", "Jui", "Jlt", "Aou", "Sep", "Oct", "Nov", "Déc"],
          datasets: [{
            label: "Transferts",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#5e72e4",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data: response.t,
            maxBarThickness: 6

          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#fbfbfb',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#ccc',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  });
</script>
<?= $this->endSection(); ?>