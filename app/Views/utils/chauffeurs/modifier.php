<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Chauffeurs
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Modifer Chauffeurs
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Chauffeurs
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/chauffeurs/modifier')) ?>
        <div class="card-body">
          <h5 class="card-title">Modifier info chauffeur</h5>
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <select class="form-select " name="societe" id="societe">
                  <option value="TAL">TAL</option>
                  <?php foreach ($ss as $s) : ?>
                    <option <?= $s['nom'] == $c['societe'] ? 'selected' : '' ?> value="<?= $s['nom'] ?>"><?= $s['nom'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <select required class="form-select " name="statut" id="societe">
                  <!-- <option hidden value="" selected>Statut</option> -->
                  <option <?= $c['statut'] == 'EMBAUCHÉ' ? 'selected' : '' ?> value="EMBAUCHÉ">EMBAUCHÉ</option>
                  <option <?= $c['statut'] == 'STAGIAIRE' ? 'selected' : '' ?> value="STAGIAIRE">STAGIAIRE</option>
                  <option <?= $c['statut'] == 'PRESTATAIRE' ? 'selected' : '' ?> value="PRESTATAIRE">PRESTATAIRE</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" value="<?= set_value('nom', $c['nom']) ?>" class="form-control" name="nom" aria-describedby="helpId" placeholder="Nom complet" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" value="<?= set_value('matricule', $c['matricule']) ?>" class="form-control" name="matricule" aria-describedby="helpId" placeholder="Matricule" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="tel" value="<?= set_value('tel', $c['tel']) ?>" class="form-control" name="tel" aria-describedby="helpId" placeholder="Téléphone">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <button type="submit" name="id" value="<?= $c['id'] ?>" class="btn btn-primary">Modifier info chauffeur</button>
              </div>
            </div>
          </div>
        </div>
        <?= csrf_field() ?>
        <?= form_close() ?>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection(); ?>