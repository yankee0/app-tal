<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Livraisons rapport
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Livraisons rapport
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Livraisons rapport
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title"><?= $filename ?></h5>
          </div>
          <div class="table-responsive p-0">
            <table id="tableau" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de BL</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de validité</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de livraison</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Conteneur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Armateur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type TC</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tracteur Aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tracteur Retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MVT aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adresse</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zone</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MVT retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Retour remorque</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remorque Aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remorque retour</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ls as $l) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['type'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['transporteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_depot_bl'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_validite'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_livraison'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['conteneur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['armateur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['type_tc'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['tracteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['cam_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['chauffeur_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['mvt_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['adresse'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['zone'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['client'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['date_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['chauffeur_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['mvt_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['retour_rem'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['rem_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['rem_retour'] ?>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center gap-3">
                        <span>
                          <a href="<?= base_url(session()->root . '/livraisons/supprimer?id=' . $l['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'livraison">
                            Supprimer
                          </a>
                        </span>
                        <span>
                          <a href="<?= base_url(session()->root . '/livraisons/modifier/' . $l['id']) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'livraison">
                            Modifier
                          </a>
                        </span>
                      </div>
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
  <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
  <script>
    function exportTableToExcel(tableID, filename = 'Rapport') {
      // Récupérer le tableau par son ID
      var table = document.getElementById(tableID);

      // Créer un classeur Excel
      var workbook = XLSX.utils.book_new();

      // Convertir le tableau en feuille de calcul
      var worksheet = XLSX.utils.table_to_sheet(table);

      // Ajouter la feuille de calcul au classeur
      XLSX.utils.book_append_sheet(workbook, worksheet, 'Feuille1');

      // Générer le binaire du fichier Excel
      var excelBinary = XLSX.write(workbook, {
        bookType: 'xlsx',
        type: 'binary'
      });

      // Convertir le binaire en tableau de bytes
      var excelBytes = new Uint8Array(excelBinary.length);
      for (var i = 0; i < excelBinary.length; i++) {
        excelBytes[i] = excelBinary.charCodeAt(i) & 0xff;
      }

      // Créer un objet Blob avec le tableau de bytes
      var blob = new Blob([excelBytes], {
        type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      });

      // Créer un lien de téléchargement
      var link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = filename + '.xlsx';

      // Simuler un clic sur le lien pour démarrer le téléchargement
      link.click();
    }
  </script>

  <?= $this->endSection(); ?>