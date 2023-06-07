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
        <?= form_open(base_url(session()->root . '/garage')) ?>
        <?= csrf_field() ?>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="date">Date:</label>
              <input type="date" class="form-control" id="date" name="date">
              <small class="form-text text-muted">Veuillez saisir la date.</small>
            </div>
            <div class="col-md-4 mb-3">
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
            <div class="col-md-4 mb-3">
              <label for="total">Montant total:</label>
              <input type="number" step="0.01" class="form-control" id="total" name="total">
            </div>
            <div class="col-md-12 mb-3">
              <label for="commentaire">Commentaire pour la ou les pièces changées:</label>
              <textarea class="form-control" id="commentaire" name="commentaire"></textarea>
              <small class="form-text text-muted">Veuillez saisir le commentaire pour la ou les pièces changées.</small>
            </div>
            <div class="col-md-12 text-center">
              <!-- Modal trigger button -->
              <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
                Enregistrer
              </button>
              <!-- Modal Body -->
              <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
              <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md text-left" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Vous confirmez les informations suivantes:
                      <p>
                        Date: <span class="mDate font-weight-bold text-primary"></span>
                      </p>
                      <p>
                        Chrono du véhicule: <span class="mVeh font-weight-bold text-primary"></span>
                      </p>
                      <p>
                        Montant: <span class="mMontant font-weight-bold text-primary"></span>
                      </p>
                      <p>
                        Commentaire: <span class="mCom font-weight-bold text-primary"></span>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button type="Submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                  </div>
                </div>
              </div>



              <!-- Optional: Place to the bottom of scripts -->
              <script>
                const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
              </script>
            </div>
          </div>
        </div>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
    $('#date').change(function(e) {
      e.preventDefault();
      $('.mDate').html($('#date').val());
    });
    $('#total').change(function(e) {
      e.preventDefault();
      $('.mMontant').html($('#total').val());
    });
    $('#chrono').change(function(e) {
      e.preventDefault();
      $('.mVeh').html($('#chrono').val());
    });
    $('#commentaire').change(function(e) {
      e.preventDefault();
      $('.mCom').html($('#commentaire').val());
    });
  });
</script>
<?= $this->endSection(); ?>