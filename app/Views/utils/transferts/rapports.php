<?= $this->extend('layouts/ui'); ?>
<?= $this->section('title'); ?>
Tranferts
<?= $this->endSection(); ?>
<?= $this->section('bctitle'); ?>
Tranferts
<?= $this->endSection(); ?>
<?= $this->section('ptitle'); ?>
Tranferts
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type de transfert</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transporteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date MVT</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Conteneur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type conteneur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TEUS</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ligne</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rame</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mouvement</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">P/V</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chauffeurs</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tracteur</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EIRS</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ts as $t) : ?>
                  <tr>


                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['type_transfert'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $l['transporteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['type'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['date_mvt'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['conteneur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['type_conteneur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['teus'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['ligne'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['rame'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['mouvement'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['p_v'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['chauffeur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['tracteur'] ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-3 py-1 gap-2">
                        <?= $t['eirs'] ?>
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