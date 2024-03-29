<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Tranferts
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Tranferts
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Tranferts
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/transferts')) ?>
        <div class="card-body">
          <h5 class="card-title">Ajouter un transfert</h5>
          <div class="row">
            <div class="mb-3 col-md-4">
              <label for="type_transfert" class="form-label">Type de transfert</label>
              <select class="form-select " name="type_transfert" id="type_transfert">
                <option selected>Selectionner</option>
                <option value="FULL IMPORT">FULL IMPORT</option>
                <option value="FULL EXPORT">FULL EXPORT</option>
                <option value="POSIT">POSIT</option>
                <option value="VIDE">VIDE</option>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="type" class="form-label">Type</label>
              <select class="form-select " name="type" id="type" required>
                <option selected hidden value="">Selectionner</option>
                <option value="TOM">TOM</option>
                <option value="TOM 1">TOM 1</option>
                <option value="WALL 1">WALL 1</option>
                <option value="WALL 2">WALL 2</option>
                <option value="WALL 3">WALL 3</option>
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
              <label for="date_mvt" class="form-label">Date MVT</label>
              <input type="datetime-local" class="form-control" name="date_mvt" id="date_mvt" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="conteneur" class="form-label">Conteneur</label>
              <input type="text" maxlength="11" required minlength="11" class="form-control" name="conteneur" required id="conteneur" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="type_conteneur" class="form-label">Type conteneur</label>
              <select class="form-select " name="type_conteneur" id="type_conteneur">
                <option selected disabled>Selectionner</option>
                <option class="teus1" value="20">20 DV</option>
                <option class="teus2" value="40">40 DV</option>
                <option class="teus2" value="40">40 HC</option>
                <option class="teus2" value="40">40 RF</option>
                <option class="teus2" value="40">40 FL</option>
                <option class="teus2" value="40">40 OT</option>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="teus" class="form-label">TEUS</label>
              <input type="number" required class="form-control" name="teus" id="teus" min="1" max="2" required aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="ligne" class="form-label">Ligne</label>
              <input type="text" class="form-control" name="ligne" id="ligne" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="rame" class="form-label">Rame</label>
              <input type="text" class="form-control" name="rame" id="rame" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="mouvement" class="form-label">Mouvement</label>
              <input type="text" class="form-control" name="mouvement" id="mouvement" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="p_v" class="form-label">P/V</label>
              <input type="text" class="form-control" name="p_v" id="p_v" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="chauffeur_aller" class="form-label">Chauffeurs</label>
              <select class="form-select tal" required name="chauffeur" id="chauffeur_aller">
                <option selected hidden value="">Chauffeur TAL</option>
                <?php foreach ($chauf as $c) : ?>
                  <option value="<?= $c['matricule'] ?>"><?= $c['societe'] . ' - ' .$c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4 tal">
              <label for="tracteur" class="form-label">Tracteur</label>
              <select class="form-select " required name="tracteur" id="tracteur">
                <option value="" selected hidden>Selectionnez un tracteur</option>
                <?php foreach ($trac as $t) : ?>
                  <option value="<?= $t['chrono'] ?>"><?= $t['immatriculation'] . ' / ' . $t['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="eirs" class="form-label">EIRS</label>
              <select class="form-select " name="eirs" id="eirs">
                <option value="NON OK">NON OK</option>
                <option value="OK">OK</option>
              </select>
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
            <h5 class="card-title">Tranferts en attente des informations EIRS</h5>
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type de transfert</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
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
                <?php foreach ($ts as $t) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['type_transfert'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['type'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['transporteur'] ?>
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
    </div>
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title">Tranferts du mois</h5>
          </div>
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type de transfert</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
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
              <?php foreach ($dt as $t) : ?>
                <tr>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $t['type_transfert'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $t['type'] ?>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $t['transporteur'] ?>
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
        <div class="table-responsive p-0">
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#type_transfert').change(function(e) {
        e.preventDefault();

        if ($(this).val() == 'FULL IMPORT') {
          $('#ligne').val('MSC');
          $('#p_v').val('PLEIN');
          $('#mouvement').val('ENTREE PORTE');
        }

        if ($(this).val() == 'VIDE') {
          $('#ligne').val('MSC');
          $('#p_v').val('VIDE');

        }

        if ($(this).val() == 'FULL EXPORT') {
          $('#ligne').val('MSC');
          $('#p_v').val('PLEIN');
          $('#mouvement').val('SORTIE PORTE');
        }
      });

      $('#type_conteneur').change(function(e) {
        e.preventDefault();

        if ($(this).val() == 20) {
          $('#teus').val(1);
        } else {
          $('#teus').val(2);

        }
      });

    });
  </script>

  <?= $this->endSection(); ?>