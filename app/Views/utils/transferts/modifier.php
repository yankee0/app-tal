<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Tranferts
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Tranferts Modifier
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Tranferts
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/transferts/modifier')) ?>
        <div class="card-body">
          <h5 class="card-title">Modifier un transfert</h5>
          <div class="row">
            <div class="mb-3 col-md-4">
              <label for="type_transfert" class="form-label">Type de transfert</label>
              <select class="form-select " name="type_transfert" id="type_transfert">
                <option selected>Selectionner</option>
                <option <?= ($t['type_transfert'] == "FULL IMPORT") ? 'selected' : '' ?> value="FULL IMPORT">FULL IMPORT</option>
                <option <?= ($t['type_transfert'] == "FULL EXPORT") ? 'selected' : '' ?> value="FULL EXPORT">FULL EXPORT</option>
                <option <?= ($t['type_transfert'] == "FULL VIDE") ? 'selected' : '' ?> value="VIDE">VIDE</option>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="type" class="form-label">Type</label>
              <select class="form-select " name="type" id="type" required>
                <option selected hidden value="">Selectionner</option>
                <option <?= ($t['type'] == "TOM") ? 'selected' : '' ?> value="TOM">TOM</option>
                <option <?= ($t['type'] == "WALL") ? 'selected' : '' ?> value="WALL">WALL</option>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="date_mvt" class="form-label">Date MVT</label>
              <input value="<?= set_value('date_mvt', $t['date_mvt']) ?>" type="datetime-local" class="form-control" name="date_mvt" id="date_mvt" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="conteneur" class="form-label">Conteneur</label>
              <input value="<?= set_value('conteneur', $t['conteneur']) ?>" type="text" maxlength="11" minlength="11" class="form-control" name="conteneur" required id="conteneur" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="type_conteneur" class="form-label">Type conteneur</label>
              <select class="form-select " name="type_conteneur" id="type_conteneur">
                <option selected disabled>Selectionner</option>
                <option <?= ($t['type_conteneur'] == "20") ? 'selected' : '' ?> class="teus1" value="20">20 DV</option>
                <option <?= ($t['type_conteneur'] == "40") ? 'selected' : '' ?> class="teus2" value="40">40 DV</option>
                <option <?= ($t['type_conteneur'] == "40") ? 'selected' : '' ?> class="teus2" value="40">40 HC</option>
                <option <?= ($t['type_conteneur'] == "40") ? 'selected' : '' ?> class="teus2" value="40">40 RF</option>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="teus" class="form-label">TEUS</label>
              <input value="<?= set_value('teus', $t['teus']) ?>" type="number" class="form-control" name="teus" id="teus" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="ligne" class="form-label">Ligne</label>
              <input value="<?= set_value('ligne', $t['date_mvt']) ?>" type="text" class="form-control" name="ligne" id="ligne" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="rame" class="form-label">Rame</label>
              <input value="<?= set_value('rame', $t['rame']) ?>" type="text" class="form-control" name="rame" id="rame" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="mouvement" class="form-label">Mouvement</label>
              <input value="<?= set_value('mouvement', $t['date_mvt']) ?>" type="text" class="form-control" name="mouvement" id="mouvement" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="p_v" class="form-label">P/V</label>
              <input value="<?= set_value('p_v', $t['p_v']) ?>" type="text" class="form-control" name="p_v" id="p_v" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 col-md-4">
              <label for="chauffeur_aller" class="form-label">Chauffeurs</label>
              <select class="form-select tal" name="chauffeur" id="chauffeur_aller">
                <option selected hidden value="">Chauffeur TAL</option>
                <?php foreach ($chauf as $c) : ?>
                  <option <?= ($t['chauffeur'] == $c['matricule']) ? 'selected' : '' ?> value="<?= $c['matricule'] ?>"><?= $c['matricule'] . ' - ' . $c['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4 tal">
              <label for="tracteur" class="form-label">Tracteur</label>
              <select class="form-select " name="tracteur" id="tracteur">
                <option value="" selected hidden>Selectionnez un tracteur</option>
                <?php foreach ($trac as $tr) : ?>
                  <option <?= ($t['tracteur'] == $tr['chrono']) ? 'selected' : '' ?> value="<?= $tr['chrono'] ?>"><?= $tr['immatriculation'] . ' / ' . $tr['chrono'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label for="eirs" class="form-label">EIRS</label>
              <select class="form-select " name="eirs" id="eirs">
                <option <?= ($t['eirs'] == "NON OK") ? 'selected' : '' ?> value="NON OK">NON OK</option>
                <option <?= ($t['eirs'] == "OK") ? 'selected' : '' ?> value="OK">OK</option>
              </select>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" name="id" value="<?= $t['id'] ?>" class="btn btn-primary">Enregistrer</button>
            </div>
          </div>
          <?= csrf_field() ?>
          <?= form_close() ?>
        </div>
      </div>
    </div>

  </div>
  <script>
    $('#type_conteneur').change(function(e) {
      e.preventDefault();
      let vals = ['40 DV', '40 HC', '40 RF'];
      let myVal = $(this).val();
      if (vals.includes(myVal)) {
        $('#teus').val('2');
      } else {
        $('#teus').val('1');
      }
    });
  </script>
  <?= $this->endSection(); ?>