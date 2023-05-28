<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Tracteurs
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Tracteurs
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Tracteurs
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/utilisateurs')) ?>
        <div class="card-body">
          <h5 class="card-title">Ajouter un tracteur</h5>
          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <input type="text" class="form-control" name="chrono" aria-describedby="helpId" placeholder="Chrono" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="text" class="form-control" name="immatriculation" aria-describedby="helpId" placeholder="Immatriculation" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="text" class="form-control" name="ancienne_immatriculation" aria-describedby="helpId" placeholder="Ancienne immatriculation">
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="text" class="form-control" name="marque" aria-describedby="helpId" placeholder="Marque" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <select class="form-select" name="chassis" required>
                  <option hidden value="" selected>Sélectionner un chassis</option>
                  <option value="">Laisser vide</option>
                  <?php foreach ($rs as $r) : ?>
                    <option value="<?= $r['chrono'] ?>"><?= $r['chrono'] . ' / ' . $r['immatriculation'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="text" class="form-control" name="modele" aria-describedby="helpId" placeholder="Modele" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="date" class="form-control" name="fin_vt" aria-describedby="helpId" placeholder="Date de fin vt">
                <span class="text-sm text-muted">Date de fin visite technique, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="date" class="form-control" name="fin_as" aria-describedby="helpId" placeholder="Date de fin as">
                <span class="text-sm text-muted">Date de fin assurrance, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <textarea class="form-control" name="remarque" rows="3" placeholder="remarque"></textarea>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              <button type="reset" class="btn btn-secondary">Effacer</button>
            </div>
          </div>
        </div>
        <?= csrf_field() ?>
        <?= form_close() ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title">Liste des tracteurs</h5>
            <form action="<?= base_url(session()->root . '/tracteurs/recherche') ?>" method="post">
              <?= csrf_field() ?>
              <div class="mb-3 d-flex">
                <input type="search" class="form-control" name="r" id="r" aria-describedby="" placeholder="Rechecher...">
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive p-0">
          <table class="table align-items-center justify-content-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tracteur</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Marque</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Modèle</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Visite technique</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Assurrances</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 gap-2">
                    <div>
                      <i class="fa fa-truck px-2" aria-hidden="true"></i>
                    </div>
                    <div class="my-auto">
                      <h6 class="mb-0 text-sm">Spotify</h6>
                      <h5 class="mb-0 text-sm text-secondary">Spotify</h5>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-sm font-weight-bold mb-0">$2,500</p>
                </td>
                <td>
                  <span class="text-xs font-weight-bold">working</span>
                </td>
                <td class="align-middle text-center">
                  <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">60%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="align-middle">
                  <button class="btn btn-link text-secondary mb-0">
                    <i class="fa fa-ellipsis-v text-xs"></i>
                  </button>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>