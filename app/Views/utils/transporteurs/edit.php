<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Transporteurs
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Transporteurs
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Transporteurs
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/transporteurs')) ?>
        <div class="card-body">
          <h5 class="card-title">Modifier un transporteur</h5>
          <div class="row">
            <div class="col-md">
              <div class="mb-3">
                <input type="text" class="form-control" name="nom" value="<?= $nom ?>" aria-describedby="helpId" placeholder="Nom complet" required>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <input type="tel" class="form-control" name="contact" value="<?= $contact ?>" aria-describedby="helpId" placeholder="Contact">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <input type="email" class="form-control" name="email" value="<?= $email ?>" aria-describedby="helpId" placeholder="Email">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <button type="submit" name="id" value="<?= $id ?>" class="btn btn-primary">Enregistrer les modifications</button>
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