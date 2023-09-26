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
          <h5 class="card-title">Ajouter un transporteur</h5>
          <div class="row">
            <div class="col-md">
              <div class="mb-3">
                <input type="text" class="form-control" name="nom" aria-describedby="helpId" placeholder="Nom complet" required>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <input type="tel" class="form-control" name="contact" aria-describedby="helpId" placeholder="Contact">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <input type="email" class="form-control" name="email" aria-describedby="helpId" placeholder="Email">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Ajouter le transporteur</button>
              </div>
            </div>
          </div>
        </div>
        <?= csrf_field() ?>
        <?= form_close() ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title">Liste des transporteurs</h5>
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">transporteurs</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ts as $t) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1 gap-2">
                        <div class="d-flex flex-column justify-content-center">
                          <i class="fa fa-user text-dark px-2" aria-hidden="true"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $t['nom'] ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="">
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['email'] ?>
                      </div>
                    </td>
                    <td class="">
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['contact'] ?>
                      </div>
                    </td>
                    <td class="align-middle d-flex gap-3 align-items-center">
                      <span>

                        <a href="<?= base_url(session()->root . '/transporteurs/supprimer?id=' . $t['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'transporteur">
                          Supprimer
                        </a>
                      </span>
                      <span>

                        <a href="<?= base_url(session()->root . '/transporteurs/modifier/' . $t['id']) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'transporteur">
                          Modifier
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
    </div>
  </div>
</div>

<?= $this->endSection(); ?>