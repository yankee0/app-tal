<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Archives
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Archives
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Archives
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open() ?>
        <?= csrf_field() ?>
        <div class="card-body">
          <div class="row">
            <div class="col-md">
              <div class="mb-3">
                <label for="archive" class="form-label">Archives</label>
                <select class="form-select " name="archive" id="archive">
                  <option value="t">Transferts</option>
                  <option value="l">Livraisons</option>
                  <option value="e">Exports</option>
                </select>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <label for="date" class="form-label">Mois</label>
                <input type="date" class="form-control" name="date" id="date" placeholder="">
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Générer</button>
            </div>
          </div>
        </div>
      </div>
      <?= form_close() ?>
    </div>
  </div>

  <div class="row ">

    <?php if (isset($exports)) : ?>
      <div class="col-md">
        <div class="card mt-4">
          <div class="card-body">
            <div class="d-block d-md-flex justify-content-between">
              <h5 class="card-title">Résultats exports</h5>
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
                <?php foreach ($exports as $e) : ?>
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

    <?php endif ?>

    <?php if (isset($transferts)) : ?>
      <div class="col-md">
        <div class="card mt-4">
          <div class="card-body">
            <div class="d-block d-md-flex justify-content-between">
              <h5 class="card-title">Résultats transferts</h5>
              <form action="<?= base_url(session()->root . '/tranferts/recherche') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3 d-flex">
                  <input type="search" class="form-control" name="r" id="r" aria-describedby="" placeholder="Rechecher...">
                </div>
              </form>
            </div>
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type de transfert</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date MVT</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Conteneur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type conteneur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TEUS</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ligne</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rame</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mouvement</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">P/V</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeurs</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tracteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EIRS</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($transferts as $t) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['type_transfert'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['transporteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['type'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['date_mvt'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['conteneur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['type_conteneur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['teus'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['ligne'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['rame'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['mouvement'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['p_v'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['chauffeur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['tracteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['eirs'] ?>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center gap-3">
                        <span>
                          <a href="<?= base_url(session()->root . '/transferts/supprimer?id=' . $t['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'transfert">
                            Supprimer
                          </a>
                        </span>
                        <span>
                          <a href="<?= base_url(session()->root . '/transferts/modifier/' . $t['id']) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'transfert">
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
    <?php endif ?>

    <?php if (isset($livraisons)) : ?>
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title">Résultat livraisons</h5>
            <form action="<?= base_url(session()->root . '/livraisons/recherche') ?>" method="post">
              <?= csrf_field() ?>
              <div class="mb-3 d-flex">
                <input type="search" class="form-control" name="r" id="r" aria-describedby="" placeholder="Rechecher...">
              </div>
            </form>
          </div>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Retour remorque</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($livraisons as $l) : ?>
                <tr>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $l['type'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $e['transporteur'] ?>
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
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $l['retour_rem'] ?>
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
    <?php endif ?>

  </div>
</div>

<?= $this->endSection(); ?>