<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Tracteurs
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Tracteurs / Modifier
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Tracteurs
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/tracteurs/modifier')) ?>
        <div class="card-body">
          <h5 class="card-title">Modifier le tracteur <?= $t['chrono'] ?></h5>
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" value="<?= set_value('chrono', $t['chrono']) ?>" class="form-control" name="chrono" aria-describedby="helpId" placeholder="Chrono" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" value="<?= set_value('immatriculation', $t['immatriculation']) ?>" class="form-control" name="immatriculation" aria-describedby="helpId" placeholder="Immatriculation" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" value="<?= set_value('ancienne_immatriculation', $t['ancienne_immatriculation']) ?>" class="form-control" name="ancienne_immatriculation" aria-describedby="helpId" placeholder="Ancienne immatriculation">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" value="<?= set_value('marque', $t['marque']) ?>" class="form-control" name="marque" aria-describedby="helpId" placeholder="Marque" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <div class="mb-3">
                  <input type="text" value="<?= set_value('chassis', $t['chassis']) ?>" class="form-control" name="chassis" aria-describedby="helpId" placeholder="Chassis" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" value="<?= set_value('modele', $t['modele']) ?>" class="form-control" name="modele" aria-describedby="helpId" placeholder="Modele" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="date" value="<?= set_value('fin_vt', $t['fin_vt']) ?>" class="form-control" name="fin_vt" aria-describedby="helpId" placeholder="Date de fin VT">
                <span class="text-sm text-muted">Date de fin visite technique, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="date" value="<?= set_value('fin_as', $t['fin_as']) ?>" class="form-control" name="fin_as" aria-describedby="helpId" placeholder="Date de fin AS">
                <span class="text-sm text-muted">Date de fin assurrance, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="date" value="<?= set_value('fin_cats', $t['fin_cats']) ?>" class="form-control" name="fin_cats" aria-describedby="helpId" placeholder="Date de fin C.A.T.s">
                <span class="text-sm text-muted">Date de C.A.T.s, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <textarea class="form-control" name="remarque" rows="3" placeholder="Remarque"><?= set_value('remarque', $t['remarque']) ?></textarea>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" name="id" value="<?= $t['id'] ?>" class="btn btn-primary">Enregistrer</button>
              <button type="reset" class="btn btn-secondary">Effacer</button>
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