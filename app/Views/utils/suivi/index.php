<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Suivi Flotte
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Suivi Flotte
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Suivi Flotte
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container" style="height: 100vh;">
  <div class="row mb-3">
    <div class="col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Tracteurs</p>
                <h5 class="font-weight-bolder">
                  <?= $tracs ?>
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
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Remorques</p>
                <h5 class="font-weight-bolder">
                  <?= $rems ?>
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
  <div class="row">
    <div class="col-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Durée de validité VT inférieures à 20jours</h4>
        </div>
        <div class="card-body">
          <h5>Tracteurs</h5>
          <div class="container-fluid mb-3">
            <div class="row">
              <?php foreach ($deadVTTracs as $i) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 row ">
                  <div class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="fa fa-truck text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?= $i['chrono'] ?></h6>
                        <span class="text-xs"><?= $i['immatriculation'] ?></span></span>
                      </div>
                    </div>
                    </li>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>

          <h5>Remorques</h5>
          <div class="container-fluid mb-3">
            <div class="row">
              <?php foreach ($deadVTRems as $i) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 row ">
                  <div class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="fa fa-trailer text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?= $i['chrono'] ?></h6>
                        <span class="text-xs"><?= $i['immatriculation'] ?></span></span>
                      </div>
                    </div>
                    </li>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Durée de validité AS inférieures à 20jours</h4>
        </div>
        <div class="card-body">
          <h5>Tracteurs</h5>
          <div class="container-fluid mb-3">
            <div class="row">
              <?php foreach ($deadASTracs as $i) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 row ">
                  <div class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="fa fa-truck text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?= $i['chrono'] ?></h6>
                        <span class="text-xs"><?= $i['immatriculation'] ?></span></span>
                      </div>
                    </div>
                    </li>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>

          <h5>Remorques</h5>
          <div class="container-fluid mb-3">
            <div class="row">
              <?php foreach ($deadASRems as $i) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 row ">
                  <div class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="fa fa-trailer text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?= $i['chrono'] ?></h6>
                        <span class="text-xs"><?= $i['immatriculation'] ?></span></span>
                      </div>
                    </div>
                    </li>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Durée de validité CATs inférieures à 20jours</h4>
        </div>
        <div class="card-body">
          <h5>Tracteurs</h5>
          <div class="container-fluid mb-3">
            <div class="row">
              <?php foreach ($deadCATTracs as $i) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 row ">
                  <div class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="fa fa-truck text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?= $i['chrono'] ?></h6>
                        <span class="text-xs"><?= $i['immatriculation'] ?></span></span>
                      </div>
                    </div>
                    </li>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>

          <h5>Remorques</h5>
          <div class="container-fluid mb-3">
            <div class="row">
              <?php foreach ($deadCATRems as $i) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 row ">
                  <div class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="fa fa-trailer text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?= $i['chrono'] ?></h6>
                        <span class="text-xs"><?= $i['immatriculation'] ?></span></span>
                      </div>
                    </div>
                    </li>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <?= $this->endSection(); ?>