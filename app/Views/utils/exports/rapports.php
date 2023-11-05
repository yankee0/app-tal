<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Exports
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Exports
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Exports
<?= $this->endSection(); ?>
<?= $this->section('main'); ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-body">
          <div class="d-block d-md-flex justify-content-between">
            <h5 class="card-title"><?= $filename ?></h5>
            <button onclick="exportTableToExcel('tableau', '<?= $filename ?>')" type="button" class="btn btn-success d-flex align-items-center justify-content-center gap-2">
              <i class="align-middle" data-feather="download"></i>
              <span>Télécharger en Excel</span>
            </button>
          </div>
          <div class="table-responsive p-0">
            <table id="tableau" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type Op.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Conteneur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lieu</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type Positionnement</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mv Aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Camion Aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur Aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remorque Aller</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mv Retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Camion Retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeur Retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remorque Retour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de retour remorque</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remarques</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($es as $e) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['type_operation'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['transporteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['conteneur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['type'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['client'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['lieu_posit'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['type_posit'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['date_posit'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['mv_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['camion_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['chauffeur_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['rem_aller'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['date_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['mv_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['camion_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['chauffeur_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['rem_retour'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['retour_rem'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $e['remarques'] ?>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center gap-3">
                        <span>
                          <a href="<?= base_url(session()->root . '/exports/supprimer?id=' . $e['id'] . '&' . csrf_token() . '=' . csrf_hash()) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'export">
                            Supprimer
                          </a>
                        </span>
                        <span>
                          <a href="<?= base_url(session()->root . '/exports/modifier/' . $e['id']) ?>" class="link text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'export">
                            Modifier
                          </a>
                        </span>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
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