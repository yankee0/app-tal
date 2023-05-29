<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Garage
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Garage
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Garage
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/garage/')) ?>
        <?= csrf_field() ?>
        <div class="card-body">
          <form id="garage-form" method="post" action="<?= base_url('garagiste') ?>">
            <div class="form-group">
              <div class="form-group">
                <div class="form-group">
                  <div class="form-group">
                    <div class="container">
                      <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date">
                        <small class="form-text text-muted">Veuillez saisir la date.</small>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                          <label>Chrono du véhicule</label>
                          <select class="form-control" name="chrono" id="chrono" required>
                            <option hidden selected value="">Selectionner le chrono</option>
                            <?php foreach ($trs as $tr) : ?>
                              <option value="<?= $tr['chrono'] ?>"><?= $tr['chrono'] ?></option>
                            <?php endforeach ?>
                            <?php foreach ($rms as $rm) : ?>
                              <option value="<?= $rm['chrono'] ?>"><?= $rm['chrono'] ?></option>
                            <?php endforeach ?>

                          </select>
                        </div>

                        <div class="form-group">
                          <label for="commentaire">Commentaire pour la ou les pièces changées:</label>
                          <textarea class="form-control" id="commentaire" name="commentaire"></textarea>
                          <small class="form-text text-muted">Veuillez saisir le commentaire pour la ou les pièces changées.</small>
                        </div class="form-group">
                        <label for="total">Montant total:</label>
                        <input type="number" step="0.01" class="form-control" id="total" name="total">
                        <!-- <small class="form-text text-muted">Veuillez saisir le montant total.</small> -->
                        <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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