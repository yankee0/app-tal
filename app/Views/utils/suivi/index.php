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
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Durée de validité VT inférieures à 20jours</h4>
        </div>
        <div class="card-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md">
                <div class="h5">Tracteurs</div>
                <div class="row">
                  <?php foreach ($deadASTracs as $c) : ?>
                    <div class="col-md-6"><?= $c['chrono'] ?></div>
                  <?php endforeach ?>
                </div>
              </div>
              <div class="col-md">
                <div class="h5">Remorques</div>
                <div class="row">
                  <?php foreach ($deadASRems as $c) : ?>
                    <div class="col-md-6"><?= $c['chrono'] ?></div>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Durée de validité AS inférieures à 20jours</h4>
        </div>
        <div class="card-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md">
                <div class="h5">Tracteurs</div>
                <div class="row">
                  <?php foreach ($deadVTTracs as $c) : ?>
                    <div class="col-md-6"><?= $c['chrono'] ?></div>
                  <?php endforeach ?>
                </div>
              </div>
              <div class="col-md">
                <div class="h5">Remorques</div>
                <div class="row">
                  <?php foreach ($deadVTRems as $c) : ?>
                    <div class="col-md-6"><?= $c['chrono'] ?></div>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row gap-3">

    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Durée de validité CATs inférieures à 20jours</h4>
        </div>
        <div class="card-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md">
                <div class="h5">Tracteurs</div>
                <div class="row">
                  <?php foreach ($deadCATTracs as $c) : ?>
                    <div class="col-md-6"><?= $c['chrono'] ?></div>
                  <?php endforeach ?>
                </div>
              </div>
              <div class="col-md">
                <div class="h5">Remorques</div>
                <div class="row">
                  <?php foreach ($deadCATRems as $c) : ?>
                    <div class="col-md-6"><?= $c['chrono'] ?></div>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>