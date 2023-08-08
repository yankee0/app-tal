<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Remorques
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Remorques
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Remorques
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/remorques')) ?>
        <div class="card-body">
          <h5 class="card-title">Ajouter un remorque</h5>
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
                <select class="form-select" name="type" required>
                  <option hidden selected value="">Sélectionner un type</option>
                  <option value="HAMMAR">HAMMAR</option>
                  <option value="REMORQUE">REMORQUE</option>
                  <option value="SEMI-REMORQUE">SEMI-REMORQUE</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <div class="mb-3">
                  <input type="text" class="form-control" name="chassis" aria-describedby="helpId" placeholder="Chassis" required>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="date" class="form-control" name="fin_vt" aria-describedby="helpId" placeholder="Date de fin VT">
                <span class="text-sm text-muted">Date de fin visite technique, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="date" class="form-control" name="fin_as" aria-describedby="helpId" placeholder="Date de fin AS">
                <span class="text-sm text-muted">Date de fin assurrance, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-3">
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
            <h5 class="card-title">Liste des remorques</h5>
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remorques</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Immatriculation</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Chassis</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Visite technique</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Assurances</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">CATs</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Remarque</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs as $r) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 gap-2 d-flex align-items-center ">
                        <div>
                          <i class="fa fa-truck px-2" aria-hidden="true"></i>
                        </div>
                        <div class="my-auto">
                          <h6 class="mb-0 text-sm"><?= $r['chrono'] ?></h6>
                          <h5 class="mb-0 text-sm text-secondary"><?= $r['immatriculation'] ?></h5>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $r['immatriculation'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $r['chassis'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $r['type'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $r['fin_vt'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $r['fin_as'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $r['fin_cats'] ?></span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold"><?= $r['remarque'] ?></span>
                    </td>
                    <td class="align-middle">
                      <a class="btn btn-link text-secondary mb-0" href="<?= base_url(session()->root . '/remorques/modifier/' . $r['id']) ?>">
                        <i class="fa fa-edit text-xs"></i> Modifier
                      </a>
                      <a class="btn btn-link text-secondary mb-0" href="<?= base_url(session()->root . '/remorques/supprimer?id=' . $r['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>">
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