<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Exports
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Exports
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Exports
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/exports')) ?>
        <div class="card-body">
          <h5 class="card-title">Ajouter un export</h5>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="type_operation" class="form-label">Type d'opération</label>
              <select class="form-select" name="type_operation" id="type_operation" required>
                <option value="" hidden selected>Sélectionner</option>
                <option hidden>Sélectionnez le type</option>
                <option value="TOM">TOM</option>
                <option value="TIER">TIER</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="transporteur" class="form-label">Transporteur</label>
              <select class="form-select" name="transporteur" id="transporteur">
                <option selected value="TAL">TAL</option>
                <?php foreach ($transporteur as $item) : ?>
                  <option value="<?= $item['nom'] ?>"><?= $item['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_posit" class="form-label">Date Posit</label>
              <input type="date" class="form-control" name="date_posit">
            </div>
            <div class="mb-3 col-md-4">
              <label for="conteneur" class="form-label">Conteneur</label>
              <input maxlength="11" minlength="11" type="text" class="form-control" name="conteneur" required>
            </div>
            <div class="mb-3 col-md-4">
              <label for="type" class="form-label">Type</label>
              <select class="form-select" name="type" id="type">
                <option value="" hidden selected>Sélectionner</option>
                <option hidden>Sélectionnez le type</option>
                <option value="1">20'</option>
                <option value="2">40'</option>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="client" class="form-label">Client</label>
              <input type="text" class="form-control" name="client">
            </div>
            <div class="mb-3 col-md-4">
              <label for="mv_aller" class="form-label">Mouvement Aller</label>
              <input type="text" class="form-control" name="mv_aller">
            </div>
            <div class="mb-3 col-md-4">
              <label for="lieu_posit" class="form-label">Lieu Posit</label>
              <input type="text" class="form-control" name="lieu_posit">
            </div>
            <div class="mb-3 col-md-4">
              <label for="type_posit" class="form-label">Type Posit</label>
              <input type="text" class="form-control" name="type_posit">
            </div>
            <div class="mb-3 col-md-4">
              <label for="camion_aller" class="form-label">Camion Aller</label>
              <select class="form-select " name="camion_aller" id="camion_aller">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($trac as $t) : ?>
                  <option value="<?= $t['chrono'] ?>"><?= $t['immatriculation'] . ' / ' . $t['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="camion_retour" class="form-label">Camion Retour</label>
              <select class="form-select " name="camion_retour" id="camion_retour">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($trac as $t) : ?>
                  <option value="<?= $t['chrono'] ?>"><?= $t['immatriculation'] . ' / ' . $t['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="chauffeur_aller" class="form-label">Chauffeur Aller</label>
              <select class="form-select " name="chauffeur_aller" id="chauffeur_aller">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($chauf as $c) : ?>
                  <option value="<?= $c['matricule'] ?>"><?= $c['societe'] . ' - ' . $c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="chauffeur_retour" class="form-label">Chauffeur Retour</label>
              <select class="form-select " name="chauffeur_retour" id="chauffeur_retour">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($chauf as $c) : ?>
                  <option value="<?= $c['matricule'] ?>"><?= $c['societe'] . ' - ' . $c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="rem_aller" class="form-label">Remorque Aller</label>
              <select class="form-select " name="rem_aller" id="rem_aller">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($rem as $r) : ?>
                  <option value="<?= $r['chrono'] ?>"><?= $r['immatriculation'] . ' / ' . $r['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="rem_retour" class="form-label">Remorque retour</label>
              <select class="form-select " name="rem_retour" id="rem_retour">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($rem as $r) : ?>
                  <option value="<?= $r['chrono'] ?>"><?= $r['immatriculation'] . ' / ' . $r['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_retour" class="form-label">Date Retour</label>
              <input type="date" class="form-control" name="date_retour">
            </div>
            <div class="mb-3 col-md-4">
              <label for="mv_retour" class="form-label">Mouvement Retour</label>
              <input type="text" class="form-control" name="mv_retour">
            </div>
            <div class="mb-3 col-md-4">
              <label for="remarques" class="form-label">Remarques</label>
              <textarea class="form-control" name="remarques"></textarea>
            </div>
            <div class="mb-3 col-md-4">
              <label for="retour_rem" class="form-label">Retour Remorque</label>
              <input type="date" class="form-control" name="retour_rem" id="retour_rem" aria-describedby="helpId">
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>

          </div>
          <?= csrf_field() ?>
          <?= form_close() ?>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title">Exports en attente des informations de retour</h5>
            <form action="<?= base_url(session()->root . '/exports/recherche') ?>" method="post">
              <?= csrf_field() ?>
              <div class="mb-3">
                <input type="search" class="form-control" name="r" id="r" aria-describedby="" placeholder="Rechecher...">
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>

                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type Op.</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Conteneur</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lieu</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type Positionnement</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mv Aller</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Camion Aller</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur Aller</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remorque Aller</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mv Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Camion Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remorque Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de retour remorque</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remarques</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($es as $e) : ?>
                <tr>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['type_operation'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['transporteur'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['conteneur'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['type'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['client'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['lieu_posit'] ?>
                    </div>
                  </td>
                  <div class="d-flex px-3 py-1 gap-2">
                    <?= $e['type_posit'] ?>
                  </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['date_posit'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['mv_aller'] ?>
                    </div>
                  </td>
                  <td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['camion_aller'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['chauffeur_aller'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['rem_aller'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['date_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['mv_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['camion_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['chauffeur_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['rem_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['retour_rem'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['remarques'] ?>
                    </div>
                  </td>
                  <td class="align-middle">
                    <div class="d-flex align-items-center gap-3">
                      <span>
                        <a href="<?= base_url(session()->root . '/exports/supprimer?id=' . $e['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'export">
                          Supprimer
                        </a>
                      </span>
                      <span>
                        <a href="<?= base_url(session()->root . '/exports/modifier/' . $e['id']) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'export">
                          Modifier
                        </a>
                      </span>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title">Exports du mois</h5>
            <form action="<?= base_url(session()->root . '/exports/recherche') ?>" method="post">
              <?= csrf_field() ?>
              <div class="mb-3">
                <input type="search" class="form-control" name="r" id="r" aria-describedby="" placeholder="Rechecher...">
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type Op.</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Conteneur</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lieu</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type Positionnement</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mv Aller</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Camion Aller</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur Aller</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remorque Aller</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mv Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Camion Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remorque Retour</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de retour remorque</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remarques</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($de as $e) : ?>
                <tr>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['type_operation'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['transporteur'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['conteneur'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['type'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['client'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['lieu_posit'] ?>
                    </div>
                  </td>
                  <div class="d-flex px-3 py-1 gap-2">
                    <?= $e['type_posit'] ?>
                  </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['date_posit'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['mv_aller'] ?>
                    </div>
                  </td>
                  <td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['camion_aller'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['chauffeur_aller'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['rem_aller'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['date_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['mv_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['camion_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['chauffeur_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['rem_retour'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['retour_rem'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['remarques'] ?>
                    </div>
                  </td>
                  <td class="align-middle">
                    <div class="d-flex align-items-center gap-3">
                      <span>
                        <a href="<?= base_url(session()->root . '/exports/supprimer?id=' . $e['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'export">
                          Supprimer
                        </a>
                      </span>
                      <span>
                        <a href="<?= base_url(session()->root . '/exports/modifier/' . $e['id']) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'export">
                          Modifier
                        </a>
                      </span>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>