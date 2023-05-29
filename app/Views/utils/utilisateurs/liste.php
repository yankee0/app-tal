<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Utilisateurs
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Utilisateurs
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Utilisateurs
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <?= form_open(base_url(session()->root . '/utilisateurs')) ?>
        <div class="card-body">
          <h5 class="card-title">Créer un utilisateur</h5>
          <div class="row">
            <div class="col-md">
              <div class="mb-3">
                <select class="form-select" name="profil" id="profil" required>
                  <option hidden value="" selected>Sélectionnez un profil</option>
                  <option value="SUPERADMIN">Super Administrateur</option>
                </select>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <input type="text" class="form-control" name="nom" id="" aria-describedby="helpId" placeholder="Nom complet" required>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <input type="text" class="form-control" name="matricule" id="" aria-describedby="helpId" placeholder="Matricule" required>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Créer le compte</button>
              </div>
            </div>
            <div class="col-md-12">
              <div class="alert alert-primary text-white bg-gradient-faded-primary" role="alert">
                <strong>Important!</strong> Tout nouveau compte a pour mot de passe par défaut <span class="badge bg-primary">Tal1234567</span>.
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
            <h5 class="card-title">Liste des utilisateurs</h5>
            <form action="<?= base_url(session()->root . '/utilisateurs/recherche') ?>" method="post">
              <?= csrf_field() ?>
              <div class="mb-3 d-flex">
                <input type="search" class="form-control" name="r" id="r" aria-describedby="" placeholder="Rechecher...">
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Utilisateurs</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matricule</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($us as $u) : ?>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1 gap-2">
                      <div class="d-flex flex-column justify-content-center">
                        <i class="fa fa-user text-dark px-2" aria-hidden="true"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><?= $u['nom'] ?></h6>
                        <p class="text-xs text-secondary mb-0"><?= $u['profil'] ?></p>
                      </div>
                    </div>
                  </td>
                  <td class="">
                    <div class="d-flex px-3 py-1 gap-2">
                      <?= $u['matricule'] ?>
                    </div>
                  </td>
                  <td class="align-middle ">
                    <a href="<?= base_url(session()->root.'/utilisateurs/supprimer?id='.$u['id'].'&'.csrf_token().'='.csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'utilisateur">
                      Supprimer
                    </a>
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

<?= $this->endSection(); ?>