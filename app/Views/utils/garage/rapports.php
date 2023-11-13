<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Garages
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Garages
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Garages
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chrono</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Commentaire</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Durée d'intervention</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Intervenant 1</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Intervenant 2</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($gs as $g) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $g['date'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $g['chrono'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $g['commentaire'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $g['total'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $g['intervention'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $g['intervenants'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $g['intervenant2'] ?>
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