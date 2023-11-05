<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Chauffeurs
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Chauffeurs
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Chauffeurs
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/chauffeurs')) ?>
        <div class="card-body">
          <h5 class="card-title">Ajouter un chauffeur</h5>
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <select required class="form-select " name="societe" id="societe">
                  <option hidden value="" selected>Sélectionnez la société</option>
                  <option value="TAL">TAL</option>
                  <?php foreach ($ss as $s) : ?>
                    <option value="<?= $s['nom'] ?>"><?= $s['nom'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <select required class="form-select " name="statut" id="societe">
                  <option hidden value="" selected>Statut</option>
                  <option value="EMBAUCHÉ">EMBAUCHÉ</option>
                  <option value="STAGIAIRE">STAGIAIRE</option>
                  <option value="PRESTATAIRE">PRESTATAIRE</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" class="form-control" name="nom" aria-describedby="helpId" placeholder="Nom complet" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="text" class="form-control" name="matricule" aria-describedby="helpId" placeholder="Matricule" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <input type="tel" class="form-control" name="tel" aria-describedby="helpId" placeholder="Téléphone">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Ajouter le chauffeur</button>
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
            <h5 class="card-title">Liste des chauffeurs</h5>
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">chauffeurs</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Société</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Statut</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matricule</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Téléphone</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cs as $c) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1 gap-2">
                        <div class="d-flex flex-column justify-content-center">
                          <i class="fa fa-user text-dark px-2" aria-hidden="true"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $c['nom'] ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="">
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $c['societe'] ?>
                      </div>
                    </td>
                    <td class="">
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $c['statut'] ?>
                      </div>
                    </td>
                    <td class="">
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $c['matricule'] ?>
                      </div>
                    </td>
                    <td class="">
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $c['tel'] ?>
                      </div>
                    </td>
                    <td class="align-middle d-flex gap-3 align-items-center">
                      <span>
  
                        <a href="<?= base_url(session()->root . '/chauffeurs/supprimer?id=' . $c['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'chauffeur">
                          Supprimer
                        </a>
                      </span>
                      <span>
  
                        <a href="<?= base_url(session()->root . '/chauffeurs/modifier/' . $c['id']) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'chauffeur">
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