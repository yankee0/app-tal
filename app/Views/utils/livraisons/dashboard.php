<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Livraisons
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Livraisons
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Livraisons
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/livraisons')) ?>
        <div class="card-body">
          <h5 class="card-title">Ajouter une livraison</h5>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="type" class="form-label">Type de livraisons</label>
              <select class="form-select" name="type" id="type">
                <option selected hidden>Sélectionner</option>
                <option value="TOM">TOM</option>
                <option value="TIERS">TIERS</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="transporteur" class="form-label">Transporteur</label>
              <select class="form-select" name="transporteur" id="transporteur">
                <option selected hidden>Sélectionner</option>
                <?php foreach ($transporteur as $item) : ?>
                  <option value="<?= $item['nom'] ?>"><?= $item['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_depot_bl" class="form-label">Date de BL</label>
              <input type="date" class="form-control" name="date_depot_bl" id="date_depot_bl" aria-describedby="helpId" required>
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_validite" class="form-label">Date de validité</label>
              <input type="date" class="form-control" name="date_validite" id="date_validite" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_livraison" class="form-label">Date de livraison</label>
              <input type="date" class="form-control" name="date_livraison" id="date_livraison" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="conteneur" class="form-label">Conteneur</label>
              <input type="text" maxlength="11" minlength="11" class="form-control" name="conteneur" required id="conteneur" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="armateur" class="form-label">Armateur</label>
              <input type="text" class="form-control" name="armateur" id="armateur" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="type_tc" class="form-label">Type TC</label>
              <select class="form-select" name="type_tc" id="type_tc">
                <option value="" hidden selected>Sélectionner</option>
                <option hidden>Sélectionnez le type</option>
                <option value="1">20'</option>
                <option value="2">40'</option>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="tracteur" class="form-label">Tracteur</label>
              <select class="form-select " name="tracteur" id="tracteur">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($trac as $t) : ?>
                  <option value="<?= $t['chrono'] ?>"><?= $t['immatriculation'] . ' / ' . $t['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="chauffeur_aller" class="form-label">chauffeur aller</label>
              <select class="form-select " name="chauffeur_aller" id="chauffeur_aller">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($chauf as $c) : ?>
                  <option value="<?= $c['matricule'] ?>"><?= $c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="mvt_aller" class="form-label">MVT aller</label>
              <input type="text" class="form-control" name="mvt_aller" id="mvt_aller" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="adresse" class="form-label">Adresse</label>
              <input type="text" class="form-control" name="adresse" id="adresse" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="zone" class="form-label">Zone</label>
              <input type="text" class="form-control" name="zone" id="zone" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="client" class="form-label">Client</label>
              <input type="text" class="form-control" name="client" id="client" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_retour" class="form-label">Date de retour</label>
              <input type="date" class="form-control" name="date_retour" id="date_retour" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="chauffeur_retour" class="form-label">chauffeur retour</label>
              <select class="form-select " name="chauffeur_retour" id="chauffeur_retour">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($chauf as $c) : ?>
                  <option value="<?= $c['matricule'] ?>"><?= $c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="mvt_retour" class="form-label">MVT retour</label>
              <input type="text" class="form-control" name="mvt_retour" id="mvt_retour" aria-describedby="helpId">
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
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title">Livraisons en attente des informations de retour</h5>
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de BL</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de validité</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de livraison</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Conteneur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Armateur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type TC</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tracteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MVT aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adresse</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zone</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MVT retour</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ls as $l) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['type'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['transporteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_depot_bl'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_validite'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_livraison'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['conteneur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['armateur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['type_tc'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['tracteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['chauffeur_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['mvt_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['adresse'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['zone'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['client'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['chauffeur_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['mvt_retour'] ?>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center gap-3">
                        <span>
                          <a href="<?= base_url(session()->root . '/livraisons/supprimer?id=' . $l['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'livraison">
                            Supprimer
                          </a>
                        </span>
                        <span>
                          <a href="<?= base_url(session()->root . '/livraisons/modifier/' . $l['id']) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'livraison">
                            Modifier
                          </a>
                        </span>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title">Livraisons du mois</h5>
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de BL</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de validité</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de livraison</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Conteneur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Armateur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type TC</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tracteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MVT aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adresse</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zone</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MVT retour</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($dl as $l) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['type'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['transporteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_depot_bl'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_validite'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_livraison'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['conteneur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['armateur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['type_tc'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['tracteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['chauffeur_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['mvt_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['adresse'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['zone'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['client'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['chauffeur_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['mvt_retour'] ?>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center gap-3">
                        <span>
                          <a href="<?= base_url(session()->root . '/livraisons/supprimer?id=' . $l['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'livraison">
                            Supprimer
                          </a>
                        </span>
                        <span>
                          <a href="<?= base_url(session()->root . '/livraisons/modifier/' . $l['id']) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'livraison">
                            Modifier
                          </a>
                        </span>
                      </div>
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

  <?= $this->endSection(); ?>