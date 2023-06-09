<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Rapports
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Rapports
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Rapports
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>
<div class="container-fluid py-4">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Rapport opération</h6>
    </div>
    <div class="card-body">
      <form class="col-md" action="<?= base_url(session()->root.'/rapports/operations') ?>" method="post">
        <div class="mb-3">
          <label for="report-type" class="form-label">Type de rapport : <br> <span class=" text-xs text-warning">(date mvt pour les transfert et date de livraison pour les livraisons)</span></label>
          <select id="report-type" name="type" class="form-select" required>
            <option value="" selected disabled hidden>Choisir un type de rapport...</option>
            <option value="livraison">Livraison</option>
            <option value="transfert">Transfert</option>
            <option value="export">Export</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="month" class="form-label">Mois : <br> <span class=" text-xs text-warning">(cocher ignorer pour gérer du rapport annuel)</span> </label>
          <select id="month" name="m" class="form-select" required>
            <option value="" selected disabled hidden>Choisir un mois...</option>
            <option value="x">Ignorer le mois</option>
            <option value="01">Janvier</option>
            <option value="02">Février</option>
            <option value="03">Mars</option>
            <option value="04">Avril</option>
            <option value="05">Mai</option>
            <option value="06">Juin</option>
            <option value="07">Juillet</option>
            <option value="08">Août</option>
            <option value="09">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="year" class="form-label">Année :</label>
          <input type="number" name="y" id="year" class="form-control" min="2000" max="2100" required>
        </div>
        <button type="submit" class="btn btn-primary">Générer le rapport</button>
      </form>

    </div>
  </div>

  <?php if (session()->u['profil'] == 'SUPERADMIN') : ?>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rapport classement</h6>
      </div>
      <div class="card-body">
        <form class="col-md" action="<?= base_url(session()->root.'/rapports/class') ?>" method="post">
          <div class="mb-3">
            <label for="report-type" class="form-label">Type de rapport : <br> </label>
            <select id="report-type" name="type" class="form-select" required>
              <option value="" selected disabled hidden>Choisir un type de rapport...</option>
              <option value="chauffeur">Classement chauffeur selon le nombre de TEUs transfert</option>
              <option value="tracteur">Classement camion selon le nombre d'opérations</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="month" class="form-label">Mois : <br> </label>
            <select id="month" name="m" class="form-select" required>
              <option selected disabled hidden>Choisir un mois...</option>
              <option value="01">Janvier</option>
              <option value="02">Février</option>
              <option value="03">Mars</option>
              <option value="04">Avril</option>
              <option value="05">Mai</option>
              <option value="06">Juin</option>
              <option value="07">Juillet</option>
              <option value="08">Août</option>
              <option value="09">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Année :</label>
            <input type="number" name="y" id="year" class="form-control" min="2000" max="2100" required>
          </div>
          <button type="submit" class="btn btn-primary">Générer le rapport</button>
        </form>

      </div>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rapport garage</h6>
      </div>
      <div class="card-body">
        <form class="col-md" action="<?= base_url(session()->root.'/rapports/garage') ?>" method="post">
          <div class="mb-3">
            <label for="month" class="form-label">Mois : <br> </label>
            <select id="month" name="m" class="form-select" required>
              <option selected disabled hidden>Choisir un mois...</option>
              <option value="01">Janvier</option>
              <option value="02">Février</option>
              <option value="03">Mars</option>
              <option value="04">Avril</option>
              <option value="05">Mai</option>
              <option value="06">Juin</option>
              <option value="07">Juillet</option>
              <option value="08">Août</option>
              <option value="09">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Année :</label>
            <input type="number" name="y" id="year" class="form-control" min="2000" max="2100" required>
          </div>
          <button type="submit" class="btn btn-primary">Générer le rapport</button>
        </form>

      </div>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rapport carburant</h6>
      </div>
      <div class="card-body">
        <form class="col-md" action="<?= base_url(session()->root.'/rapports/carburant') ?>" method="post">
          <div class="mb-3">
            <label for="month" class="form-label">Mois : <br> </label>
            <select id="month" name="m" class="form-select" required>
              <option selected disabled hidden>Choisir un mois...</option>
              <option value="01">Janvier</option>
              <option value="02">Février</option>
              <option value="03">Mars</option>
              <option value="04">Avril</option>
              <option value="05">Mai</option>
              <option value="06">Juin</option>
              <option value="07">Juillet</option>
              <option value="08">Août</option>
              <option value="09">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Année :</label>
            <input type="number" name="y" id="year" class="form-control" min="2000" max="2100" required>
          </div>
          <button type="submit" class="btn btn-primary">Générer le rapport</button>
        </form>

      </div>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rapport tracteur</h6>
      </div>
      <div class="card-body">
        <form class="col-md" action="<?= base_url(session()->root.'/rapports/tracteurs') ?>" method="post">
          <div class="mb-3">
            <label for="month" class="form-label">Mois : <br> </label>
            <select id="month" name="m" class="form-select" required>
              <option selected disabled hidden>Choisir un mois...</option>
              <option value="01">Janvier</option>
              <option value="02">Février</option>
              <option value="03">Mars</option>
              <option value="04">Avril</option>
              <option value="05">Mai</option>
              <option value="06">Juin</option>
              <option value="07">Juillet</option>
              <option value="08">Août</option>
              <option value="09">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Année :</label>
            <input type="number" name="y" id="year" class="form-control" min="2000" max="2100" required>
          </div>
          <button type="submit" class="btn btn-primary">Générer le rapport</button>
        </form>

      </div>
    </div>
</div>
<?php endif; ?>

<?= $this->endSection(); ?>