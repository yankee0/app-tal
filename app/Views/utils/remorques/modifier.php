<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Remorques
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Remorques / Modifier
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Remorques
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/remorques/modifier')) ?>
        <div class="card-body">
          <h5 class="card-title">Modifier le remorque <?= $r['chrono'] ?></h5>
          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <input type="text" value="<?= set_value('chrono', $r['chrono']) ?>" class="form-control" name="chrono" aria-describedby="helpId" placeholder="Chrono" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="text" value="<?= set_value('immatriculation', $r['immatriculation']) ?>" class="form-control" name="immatriculation" aria-describedby="helpId" placeholder="Immatriculation" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="text" value="<?= set_value('ancienne_immatriculation', $r['ancienne_immatriculation']) ?>" class="form-control" name="ancienne_immatriculation" aria-describedby="helpId" placeholder="Ancienne immatriculation">
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <div class="mb-3">
                  <input type="text" value="<?= set_value('chassis', $r['chassis']) ?>" class="form-control" name="chassis" aria-describedby="helpId" placeholder="Chassis" required>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="date" value="<?= set_value('fin_vt', $r['fin_vt']) ?>" class="form-control" name="fin_vt" aria-describedby="helpId" placeholder="Date de fin VT">
                <span class="text-sm text-muted">Date de fin visite technique, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="date" value="<?= set_value('fin_as', $r['fin_as']) ?>" class="form-control" name="fin_as" aria-describedby="helpId" placeholder="Date de fin AS">
                <span class="text-sm text-muted">Date de fin assurrance, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <input type="date" value="<?= set_value('fin_cats', $r['fin_cats']) ?>" class="form-control" name="fin_cats" aria-describedby="helpId" placeholder="Date de fin C.A.T.s">
                <span class="text-sm text-muted">Date de C.A.T.s, à laisser vide en cas d'indisponibilité.</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <textarea class="form-control" name="remarque" rows="3" placeholder="Remarque"><?= set_value('remarque', $r['remarque']) ?></textarea>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" name="id" value="<?= $r['id'] ?>" class="btn btn-primary">Enregistrer</button>
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