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
        <?= form_open(base_url(session()->root . '/tracteurs')) ?>
        <div class="card-body">
          <h5 class="card-title">Ajouter un tracteur</h5>
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <select class="form-select " name="societe" id="societe">
                  <option selected>Sélectionnez la société</option>
                  <option value="TAL">TAL</option>
                  <?php foreach ($ss as $s) : ?>
                    <option value="<?= $s['nom'] ?>"><?= $s['nom'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" class="form-control" name="chrono" aria-describedby="helpId" placeholder="Chrono" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" class="form-control" name="immatriculation" aria-describedby="helpId" placeholder="Immatriculation" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" class="form-control" name="ancienne_immatriculation" aria-describedby="helpId" placeholder="Ancienne immatriculation">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" class="form-control" name="marque" aria-describedby="helpId" placeholder="Marque" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <div class="mb-3">
                  <input type="text" class="form-control" name="chassis" aria-describedby="helpId" placeholder="Chassis" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" class="form-control" name="modele" aria-describedby="helpId" placeholder="Modele" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="date" class="form-control" name="fin_vt" aria-describedby="helpId" placeholder="Date de fin VT">
                <span class="text-sm text-muted">Date de fin visite technique, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="date" class="form-control" name="fin_as" aria-describedby="helpId" placeholder="Date de fin AS">
                <span class="text-sm text-muted">Date de fin assurrance, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="date" class="form-control" name="fin_cats" aria-describedby="helpId" placeholder="Date de fin C.A.T.s">
                <span class="text-sm text-muted">Date de C.A.T.s, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <textarea class="form-control" name="remarque" rows="3" placeholder="Remarque"></textarea>
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
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tracteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Societe</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Marque</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Modèle</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Immatriculation</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Chassis</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Visite technique</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Assurances</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">CATs</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Remarque</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ts as $t) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 gap-2 d-flex align-items-center ">
                        <div>
                          <i class="fa fa-truck px-2" aria-hidden="true"></i>
                        </div>
                        <div class="my-auto">
                          <h6 class="mb-0 text-sm"><?= $t['chrono'] ?></h6>
                          <h5 class="mb-0 text-sm text-secondary"><?= $t['immatriculation'] ?></h5>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0"><?= $t['societe'] ?></p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0"><?= $t['marque'] ?></p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $t['modele'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $t['immatriculation'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $t['chassis'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $t['fin_vt'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $t['fin_as'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $t['fin_cats'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $t['remarque'] ?></span>
                    </td>
                    <td class="align-middle">
                      <a class="btn btn-link text-secondary mb-0" href="<?= base_url(session()->root . '/tracteurs/modifier/' . $t['id']) ?>">
                        <i class="fa fa-edit text-xs"></i> Modifier
                      </a>
                      <a class="btn btn-link text-secondary mb-0" href="<?= base_url(session()->root . '/tracteurs/supprimer?id=' . $t['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>">
                        <i class="fa fa-trash text-danger text-xs"></i> Supprimer
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>