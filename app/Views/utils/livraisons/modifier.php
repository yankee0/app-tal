<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Livraisons
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Livraisons / Modifier
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Livraisons
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/livraisons/modifier')) ?>
        <div class="card-body">
          <h5 class="card-title">Modifier livraison</h5>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="type" class="form-label">Type de livraisons</label>
              <select class="form-select" name="type" id="type">
                <!-- <option selected hidden>Sélectionner</option> -->
                <option <?= $l['type'] == 'TOM' ? 'selected' : '' ?> value="TOM">TOM</option>
                <option <?= $l['type'] == 'TIERS' ? 'selected' : '' ?> value="TIERS">TIERS</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="transporteur" class="form-label">Transporteur</label>
              <select class="form-select" name="transporteur" id="transporteur">
                <option selected value="TAL">TAL</option>
                <?php foreach ($transporteur as $item) : ?>
                  <option <?= $l['transporteur'] == $item['nom'] ? 'selected' : '' ?> value="<?= $item['nom'] ?>"><?= $item['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_depot_bl" class="form-label">Date de BL</label>
              <input value="<?= set_value('date_depot_bl', $l['date_depot_bl']) ?>" type="date" class="form-control" name="date_depot_bl" id="date_depot_bl" aria-describedby="helpId" required>
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_validite" class="form-label">Date de validité</label>
              <input value="<?= set_value('date_validite', $l['date_validite']) ?>" type="date" class="form-control" name="date_validite" id="date_validite" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_livraison" class="form-label">Date de livraison</label>
              <input value="<?= set_value('date_livraison', $l['date_livraison']) ?>" type="date" class="form-control" name="date_livraison" id="date_livraison" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="conteneur" class="form-label">Conteneur</label>
              <input value="<?= set_value('conteneur', $l['conteneur']) ?>" type="text" maxlength="11" minlength="11" class="form-control" name="conteneur" required id="conteneur" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="armateur" class="form-label">Armateur</label>
              <input value="<?= set_value('armateur', $l['armateur']) ?>" type="text" class="form-control" name="armateur" id="armateur" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="type_tc" class="form-label">Type TC</label>
              <select class="form-select" name="type_tc" id="type_tc">
                <option value="" hidden selected>Sélectionner</option>
                <option hidden>Sélectionnez le type</option>
                <option <?= ($l['type_tc'] == '1') ? 'selected' : '' ?> value="1">20'</option>
                <option <?= ($l['type_tc'] == '2') ? 'selected' : '' ?> value="2">40'</option>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="tracteur" class="form-label">Tracteur</label>
              <select class="form-select " name="tracteur" id="tracteur">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($trac as $t) : ?>
                  <option <?= ($l['tracteur'] == $t['chrono']) ? 'selected' : '' ?> value="<?= $t['chrono'] ?>"><?= $t['immatriculation'] . ' / ' . $t['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="chauffeur_aller" class="form-label">chauffeur aller</label>
              <select class="form-select " name="chauffeur_aller" id="chauffeur_aller">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($chauf as $c) : ?>
                  <option <?= ($l['chauffeur_aller'] == $c['matricule']) ? 'selected' : '' ?> value="<?= $c['matricule'] ?>"><?= $c['societe'] . ' - ' .$c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="mvt_aller" class="form-label">MVT aller</label>
              <input value="<?= set_value('mvt_aller', $l['mvt_aller']) ?>" type="text" class="form-control" name="mvt_aller" id="mvt_aller" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="adresse" class="form-label">Adresse</label>
              <input value="<?= set_value('adresse', $l['adresse']) ?>" type="text" class="form-control" name="adresse" id="adresse" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="zone" class="form-label">Zone</label>
              <input value="<?= set_value('zone', $l['zone']) ?>" type="text" class="form-control" name="zone" id="zone" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="client" class="form-label">Client</label>
              <input value="<?= set_value('client', $l['client']) ?>" type="text" class="form-control" name="client" id="client" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_retour" class="form-label">Date de retour</label>
              <input value="<?= set_value('date_retour', $l['date_retour']) ?>" type="date" class="form-control" name="date_retour" id="date_retour" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="chauffeur_retour" class="form-label">chauffeur retour</label>
              <select class="form-select " name="chauffeur_retour" id="chauffeur_retour">
                <option value="" hidden selected>Sélectionner</option>
                <?php foreach ($chauf as $c) : ?>
                  <option <?= ($l['chauffeur_retour'] == $c['matricule']) ? 'selected' : '' ?> value="<?= $c['matricule'] ?>"><?= $c['societe'] . ' - ' .$c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="mvt_retour" class="form-label">MVT retour</label>
              <input value="<?= set_value('mvt_retour', $l['mvt_retour']) ?>" type="text" class="form-control" name="mvt_retour" id="mvt_retour" aria-describedby="helpId">
            </div>
            <div class="mb-3 col-md-4">
              <label for="retour_rem" class="form-label">Retour Remorque</label>
              <input type="date" value="<?= $l['retour_rem'] ?>" class="form-control" name="retour_rem" id="retour_rem" aria-describedby="helpId">
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" name="id" value="<?= $l['id'] ?>" class="btn btn-primary">Enregistrer</button>
            </div>
          </div>
          <?= csrf_field() ?>
          <?= form_close() ?>
        </div>
      </div>
    </div>

  </div>

  <?= $this->endSection(); ?>