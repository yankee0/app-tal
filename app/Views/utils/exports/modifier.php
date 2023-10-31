<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Exports
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Exports Modifier
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Exports
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/exports/modifier')) ?>
        <div class="card-body">
          <h5 class="card-title">Modifier un export</h5>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="type_operation" class="form-label">Type d'opération</label>
              <select class="form-select" name="type_operation" id="type_operation" required>
                <option value="" hidden selected>Sélectionner</option>
                <option hidden>Sélectionnez le type</option>
                <option <?= ($e['type_operation'] == 'TOM') ? 'selected' : '' ?> value="TOM">TOM</option>
                <option <?= ($e['type_operation'] == 'TIER') ? 'selected' : '' ?> value="TIER">TIER</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="transporteur" class="form-label">Transporteur</label>
              <select class="form-select" name="transporteur" id="transporteur">
                <option selected value="TAL">TAL</option>
                <?php foreach ($transporteur as $item) : ?>
                  <option <?= $e['transporteur'] == $item['nom'] ?> value="<?= $item['nom'] ?>"><?= $item['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_posit" class="form-label">Date Posit:</label>
              <input type="date" name="date_posit" class="form-control" id="date_posit" value="<?= set_value('date_posit', $e['date_posit']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="conteneur" class="form-label">Conteneur:</label>
              <input type="text" name="conteneur" class="form-control" id="conteneur" value="<?= set_value('conteneur', $e['conteneur']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="type" class="form-label">Type:</label>
              <select class="form-select" name="type" id="type">
                <option value="" hidden selected>Sélectionner</option>
                <option hidden>Sélectionnez le type</option>
                <option <?= ($e['type'] == '1') ? 'selected' : '' ?> value="1">20'</option>
                <option <?= ($e['type'] == '2') ? 'selected' : '' ?> value="2">40'</option>
              </select>
            </div>

            <div class="mb-3 col-md-4">
              <label for="client" class="form-label">Client:</label>
              <input type="text" name="client" class="form-control" id="client" value="<?= set_value('client', $e['client']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="mv_aller" class="form-label">Mv Aller:</label>
              <input type="text" name="mv_aller" class="form-control" id="mv_aller" value="<?= set_value('mv_aller', $e['mv_aller']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="lieu_posit" class="form-label">Lieu Posit:</label>
              <input type="text" name="lieu_posit" class="form-control" id="lieu_posit" value="<?= set_value('lieu_posit', $e['lieu_posit']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="type_posit" class="form-label">Type Posit:</label>
              <input type="text" name="type_posit" class="form-control" id="type_posit" value="<?= set_value('type_posit', $e['type_posit']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="camion_aller" class="form-label">Camion Aller:</label>
              <select class="form-select " name="camion_aller" id="camion_aller">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($trac as $t) : ?>
                  <option <?= ($e['camion_aller'] == $t['chrono']) ? 'selected' : '' ?> value="<?= $t['chrono'] ?>"><?= $t['immatriculation'] . ' / ' . $t['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="mb-3 col-md-4">
              <label for="remorque" class="form-label">Remorque:</label>
              <input type="text" name="remorque" class="form-control" id="remorque" value="<?= set_value('remorque', $e['remorque']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="date_retour" class="form-label">Date Retour:</label>
              <input type="text" name="date_retour" class="form-control" id="date_retour" value="<?= set_value('date_retour', $e['date_retour']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="camion_retour" class="form-label">Camion Retour:</label>
              <select class="form-select " name="camion_retour" id="camion_retour">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($trac as $t) : ?>
                  <option <?= ($e['camion_retour'] == $t['chrono']) ? 'selected' : '' ?> value="<?= $t['chrono'] ?>"><?= $t['immatriculation'] . ' / ' . $t['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="mb-3 col-md-4">
              <label for="mv_retour" class="form-label">Mv Retour:</label>
              <input type="text" name="mv_retour" class="form-control" id="mv_retour" value="<?= set_value('mv_retour', $e['mv_retour']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="remarques" class="form-label">Remarques:</label>
              <input type="text" name="remarques" class="form-control" id="remarques" value="<?= set_value('remarques', $e['remarques']) ?>">
            </div>

            <div class="mb-3 col-md-4">
              <label for="chauffeur_aller" class="form-label">Chauffeur Aller:</label>
              <select class="form-select " name="chauffeur_aller" id="chauffeur_aller">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($chauf as $c) : ?>
                  <option <?= ($e['chauffeur_aller'] == $c['matricule']) ? 'selected' : '' ?> value="<?= $c['matricule'] ?>"><?= $c['societe'] . ' - ' . $c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="mb-3 col-md-4">
              <label for="chauffeur_retour" class="form-label">Chauffeur Retour:</label>
              <select class="form-select " name="chauffeur_retour" id="chauffeur_retour">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($chauf as $c) : ?>
                  <option <?= ($e['chauffeur_retour'] == $c['matricule']) ? 'selected' : '' ?> value="<?= $c['matricule'] ?>"><?= $c['societe'] . ' - ' . $c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="retour_rem" class="form-label">Retour Remorque</label>
              <input type="date" value="<?= $e['retour_rem'] ?>" class="form-control" name="retour_rem" id="retour_rem" aria-describedby="helpId">
            </div>
            <div class="col-md- 12 text-center">
              <button type="submit" name="id" value="<?= $e['id'] ?>" class="btn btn-primary">Enregister</button>
            </div>

          </div>
          <?= csrf_field() ?>
          <?= form_close() ?>
        </div>
      </div>
    </div>


  </div>

  <?= $this->endSection(); ?>