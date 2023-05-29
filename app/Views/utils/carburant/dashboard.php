<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Carburant
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Carburant
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Carburant
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/carburant/')) ?>
        <?= csrf_field() ?>
        <div class="card-body">
          <form id="carburant-form" method="post" action="<?= base_url('garagiste') ?>">
            <div class="row">
              <div class="form-group col-md">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
                <small class="form-text text-muted">Veuillez saisir la date de remplissage.</small>
              </div>
              <div class="form-group col-md">
                <label for="litres">Nombre de litres:</label>
                <input type="number" class="form-control" id="litres" name="litres" step="0.01" required>
                <small class="form-text text-muted">Veuillez saisir le nombre de litres.</small>
              </div>
              <div class="form-group col-md">
                <div class="form-group">
                  <label for="chrono">Chrono</label>
                  <select class="form-control" name="chrono" id="chrono" required>
                    <option hidden value="" selected>Selectionnez</option>
                    <?php foreach ($trs as $tr) : ?>
                      <option value="<?= $tr['chrono'] ?>"><?= $tr['chrono'] ?></option>
                    <?php endforeach ?>
                    <?php foreach ($rms as $rm) : ?>
                      <option value="<?= $rm['chrono'] ?>"><?= $rm['chrono'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-muted">Veuillez choisir le chrono du camion ou hammar.</small>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
          </form>
        </div>
      </div>
      <?= csrf_field() ?>
      <?= form_close() ?>
    </div>
  </div>
</div>
</div>
<?= $this->endSection(); ?>