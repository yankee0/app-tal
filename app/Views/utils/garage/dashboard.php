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
            <div class="col-md-6 col-xl-3 mb-3">
              <label for="date">Date:</label>
              <input type="date" class="form-control" id="date" name="date" required>
              <small class="form-text text-muted">Veuillez saisir la date.</small>
            </div>
            <div class="col-md-6 col-xl-3 mb-3">
              <label>Chrono du véhicule</label>
              <select class="form-control" name="chrono" id="chrono" required>
                <option hidden selected value="">Selectionner le chrono</option>
                <?php foreach ($trs as $tr) : ?>
                  <option value="<?= $tr['chrono'] ?>"><?= $tr['chrono'] ?> / TRACTEUR </option>
                <?php endforeach ?>
                <?php foreach ($rms as $rm) : ?>
                  <option value="<?= $rm['chrono'] ?>"><?= $rm['chrono'] ?> / <?= $rm['type'] ?> </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-md-6 col-xl-3 mb-3">
              <label for="total">Montant total:</label>
              <input type="number" step="0.01" class="form-control" id="total" name="total" required>
            </div>
            <div class="col-md-6 col-xl-3">
            <label for="intervention">Durée d'intervention:</label>
              <input type="text" step="0.01" class="form-control" id="intervention" name="intervention" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="intervenants">Intervenant 1:</label>
              <textarea class="form-control" id="intervenants" name="intervenants"></textarea>
              <small class="form-text text-muted">Veuillez saisir le nom de l'intervenant 1.</small>
            </div>
            <div class="col-md-6 mb-3">
              <label for="intervenant2">Intervenant 2:</label>
              <textarea class="form-control" id="intervenant2" name="intervenant2"></textarea>
              <small class="form-text text-muted">Veuillez saisir le nom de l'intervenant 2.</small>
            </div>
            <div class="col-md-6 mb-3">
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
                      <h5 class="modal-title" id="modalTitleId">Confirmation</h5>
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
                        Durée d'intervention: <span class="mDur font-weight-bold text-primary"></span>
                      </p>
                      <p>
                        Commentaire: <span class="mCom font-weight-bold text-primary"></span>
                      </p>
                      <p>
                        Intervenants: <span class="mInt font-weight-bold text-primary"></span>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button type="Submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="card mt-4">
                  <div class="card-body">
                    <div class="d-block d-md-flex justify-content-between">
                      <h5 class="card-title">Derniers enregistrements</h5>
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
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Véhicule</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Montant</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Durée d'intervention</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Intervenant 1</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Intervenant 2</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Commentaires</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($gs as $g) : ?>
                          <tr>
                            <td><?= $g['date'] ?></td>
                            <td><?= $g['chrono'] ?></td>
                            <td><?= $g['total'] ?></td>
                            <td><?= $g['intervention'] ?></td>
                            <td><?= $g['intervenants'] ?></td>
                            <td><?= $g['intervenant2'] ?></td>
                            <td><?= $g['commentaire'] ?></td>
                            <td>
                              <span>
                                <a href="<?= base_url(session()->root . '/garage/supprimer/' . $g['id'])?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'export">
                                  Supprimer
                                </a>
                              </span>
                            </td>
                          </tr>
                        <?php endforeach ?>


                      </tbody>
                    </table>
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
    $('#intervention').change(function(e) {
      e.preventDefault();
      $('.mDur').html($('#intervention').val());
    });
    $('#intervenants').change(function(e) {
      e.preventDefault();
      $('.mInt').html($('#intervenants').val());
    });
  });
</script>
<?= $this->endSection(); ?>