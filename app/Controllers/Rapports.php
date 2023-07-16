<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Carburant;
use App\Models\Chauffeurs;
use App\Models\Exports;
use App\Models\Garage;
use App\Models\Livraisons;
use App\Models\Tracteurs;
use App\Models\Transferts;

class Rapports extends BaseController
{
    public function index()
    {
        session()->p = 'rapports';
        return view('utils/rapports/dashboard');
    }

    public function genOps()
    {
        $type = $this->request->getVar('type');
        $m = $this->request->getVar('m');
        $y = $this->request->getVar('y');
        if ($type == 'livraison') {
            $r = $this->genLiv($m, $y);
            return view('utils/livraisons/rapports', $r);
        } else if ($type == 'transfert') {
            $r = $this->genTrans($m, $y);
            return view('utils/transferts/rapports', $r);
        } else {
            $r = $this->genExp($m, $y);
            return view('utils/exports/rapports', $r);
        }
    }

    public function genLiv($m, $y)
    {
        if ($m == 'x') {
            // Récupération des livraisons du mois courant
            $livraisons = (new Livraisons())
                // ->where('date_retour IS NOT NULL')
                ->where('YEAR(date_livraison)', $y)
                ->findAll();
            $filename = "RAPPORT_LIVRAISONS_ANNUEL_" . $y;
        } else {

            // Récupération des livraisons du mois courant
            $livraisons = (new Livraisons())
                // ->where('date_retour IS NOT NULL')
                ->where('MONTH(date_livraison)', $m)
                ->where('YEAR(date_livraison)', $y)
                ->findAll();
            $filename = "RAPPORT_LIVRAISONS_MENSUEL_" . $m . "_" . $y;
        }

        for ($i = 0; $i < sizeof($livraisons); $i++) {
            $ca = (new Chauffeurs())->where('matricule', $livraisons[$i]['chauffeur_aller'])->first();
            $cr = (new Chauffeurs())->where('matricule', $livraisons[$i]['chauffeur_retour'])->first();

            if (!empty($ca)) {
                $livraisons[$i]['chauffeur_aller'] = $ca['nom'];
            }

            if (!empty($cr)) {
                $livraisons[$i]['chauffeur_retour'] = $cr['nom'];
            }
        }
        $data = [
            'ls' => $livraisons,
            'filename' => $filename
        ];
        return $data;
    }

    public function genTrans($m, $y)
    {
        if ($m == 'x') {
            // Récupération des transferts du mois courant
            $transferts = (new Transferts())
                ->where('YEAR(date_mvt)', $y)
                ->findAll();
            $filename = "RAPPORT_TRANSFERT_ANNUEL_" . $y;
        } else {

            // Récupération des transferts du mois courant
            $transferts = (new Transferts())
                ->where('MONTH(date_mvt)', $m)
                ->where('YEAR(date_mvt)', $y)
                ->findAll();
            $filename = "RAPPORT_TRANSFERT_MENSUEL_" . $m . "_" . $y;
        }
        for ($i = 0; $i < sizeof($transferts); $i++) {
            try {
                $c = (new Chauffeurs())->where('matricule', $transferts[$i]['chauffeur'])->first();
                $transferts[$i]['chauffeur'] .= ' - ' . $c['nom'];
            } catch (\Throwable $th) {
                continue;
            }
        }
        // dd($transferts);
        for ($i = 0; $i < sizeof($transferts); $i++) {
            $ca = (new Chauffeurs())->where('matricule', $transferts[$i]['chauffeur'])->first();

            if (!empty($ca)) {
                $transferts[$i]['chauffeur'] = $ca['nom'];
            }
        }
        $data = [
            'ts' => $transferts,
            'filename' => $filename
        ];
        return $data;
    }

    public function genExp($m, $y)
    {
        if ($m == 'x') {
            // Récupération des exports du mois courant
            $exports = (new Exports())
                ->where('YEAR(date_posit)', $y)
                ->findAll();
            $filename = "RAPPORT_EXPORTS_ANNUEL_" . $y;
        } else {

            // Récupération des exports du mois courant
            $exports = (new Exports())
                ->where('MONTH(date_posit)', $m)
                ->where('YEAR(date_posit)', $y)
                ->findAll();
            $filename = "RAPPORT_EXPORTS_MENSUEL_" . $m . "_" . $y;
        }
        for ($i = 0; $i < sizeof($exports); $i++) {
            $ca = (new Chauffeurs())->where('matricule', $exports[$i]['chauffeur_aller'])->first();
            $cr = (new Chauffeurs())->where('matricule', $exports[$i]['chauffeur_retour'])->first();

            if (!empty($ca)) {
                $exports[$i]['chauffeur_aller'] = $ca['nom'];
            }

            if (!empty($cr)) {
                $exports[$i]['chauffeur_retour'] = $cr['nom'];
            }
        }
        $data = [
            'es' => $exports,
            'filename' => $filename
        ];
        return $data;
    }

    public function genGarage()
    {
        $m = $this->request->getVar('m');
        $y = $this->request->getVar('y');
        $gs = (new Garage())->where('MONTH(date)', $m)->where('YEAR(date)', $y)->findAll();
        $filename = 'RAPPORT_GARAGE_MENSUEL_' . $m . '_' . $y;
        $data = [
            'gs' => $gs,
            'filename' => $filename
        ];
        return view('utils/garage/rapports', $data);
    }

    public function genCarb()
    {
        $m = $this->request->getVar('m');
        $y = $this->request->getVar('y');
        $cs = (new Carburant())->where('MONTH(date)', $m)->where('YEAR(date)', $y)->findAll();
        $filename = 'RAPPORT_CARBURANT_MENSUEL_' . $m . '_' . $y;
        $data = [
            'cs' => $cs,
            'filename' => $filename
        ];
        return view('utils/carburant/rapports', $data);
    }

    public function genTrac()
    {
        $m = $this->request->getVar('m');
        $y = $this->request->getVar('y');

        $trs = (new Tracteurs())
            ->findAll();
        $tab = [];
        // dd($trs);
        foreach ($trs as $tr) {

            //carburant
            $carbs = (new Carburant())
                ->where('chrono', $tr['chrono'])
                ->where('MONTH(date)', $m)
                ->where('YEAR(date)', $y)
                ->find();
            // dd($carbs);
            $sumCarbs = 0;
            foreach ($carbs as $carb) {
                $sumCarbs += $carb['litres'];
            }
            // dd($sumCarbs);

            //garages
            $gars = (new Garage())
                ->where('chrono', $tr['chrono'])
                ->where('MONTH(date)', $m)
                ->where('YEAR(date)', $y)
                ->find();
            $sumGars = 0;
            foreach ($gars as $gar) {
                $sumGars += intval($gar['total']);
            }
            // dd($sumGars);

            //teus
            $teuss = (new Transferts())
                ->where('tracteur', $tr['chrono'])
                ->where('MONTH(date_mvt)', $m)
                ->where('YEAR(date_mvt)', $y)
                ->find();
            $sumTeus = 0;
            foreach ($teuss as $teus) {
                $sumTeus += $teus['type_conteneur'] == '20' ? 1 : 2;
            }
            // dd($sumTeus);

            //livraisons
            $sumLiv = 0;
            $sumLiv = (new Livraisons())
                ->where('tracteur', $tr['chrono'])
                ->where('MONTH(date_livraison)', $m)
                ->where('YEAR(date_livraison)', $y)
                ->find();
            $sumLiv = sizeof($sumLiv);


            //exports
            $sumExp = 0;
            $sumExp = (new Exports())
                ->where('camion_aller', $tr['chrono'])
                ->where('MONTH(date_posit)', $m)
                ->where('YEAR(date_posit)', $y)
                ->find();
            $sumExp = sizeof($sumExp);

            array_push($tab, [
                'chrono' => $tr['chrono'],
                'carburant' => $sumCarbs,
                'garage' => $sumGars,
                'teus' => $sumTeus,
                'livraisons' => $sumLiv,
                'exports' => $sumExp
            ]);
        }
        return view('utils/tracteurs/rapports', [
            'ls' => $tab,
            'filename' => 'RAPPORT_MENSUEL_TRACTEURS_' . $m . '_' . $y
        ]);
    }

    public function genClass()
    {
        $type = $this->request->getVar('type');
        $m = $this->request->getVar('m');
        $y = $this->request->getVar('y');

        switch ($type) {
            case 'chauffeur':
                $data = (new SuperAdmin)->tcm($m, $y,false);
                return view('utils/rapports/tmc', [
                    'cs' => $data,
                    'filename' => 'CLASSEMENT_CHAUFFEUR_TEUS_TRANSFERT_MENSUEL_' . $m . '_' . $y
                ]);
                // dd($data);
                break;

            default:
                $data = (new SuperAdmin)->mcm($m, $y,false);
                // dd($data);
                return view('utils/rapports/mcm', [
                    'ts' => $data,
                    'filename' => 'CLASSEMENT_TRACTEURS_OPERATION_MENSUEL_' . $m . '_' . $y
                ]);
                break;
        }
    }
}
