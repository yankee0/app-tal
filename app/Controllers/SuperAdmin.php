<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Chauffeurs;
use App\Models\Exports;
use App\Models\Livraisons;
use App\Models\Tracteurs;
use App\Models\Transferts;

class SuperAdmin extends BaseController
{
    public function index()
    {
        session()->p = 'dashboard';
        return view('superadmin/dashboard', [
            'l' => (new Livraisons())->countAll(),
            't' => (new Transferts())->countAll(),
            'e' => (new Exports())->countAll(),
            'c' => (new Tracteurs())->countAll(),
            'tcm' => $this->tcm(),
            'mcm' => $this->mcm()
        ]);
    }

    // mvt camion mensu
    public function mcm($m = null , $y = null, $stop = true)
    {
        $cs = (new Tracteurs())->findAll();
        $ts = (new Transferts())
            ->where('MONTH(date_mvt)', (empty($m)) ? date('m') : $m)
            ->where('YEAR(date_mvt)', (empty($y)) ? date('Y') : $y)
            ->find();
        $ls = (new Livraisons())
            ->where('MONTH(date_livraison)', (empty($m)) ? date('m') : $m)
            ->where('YEAR(date_livraison)', (empty($y)) ? date('Y') : $y)
            ->find();
        $es = (new Exports())
            ->where('MONTH(date_posit)', (empty($m)) ? date('m') : $m)
            ->where('YEAR(date_posit)', (empty($y)) ? date('Y') : $y)
            ->find();

        $rs = [];

        for ($i = 0; $i < sizeof($cs); $i++) {
            $rs[$i]['chrono'] = $cs[$i]['chrono'];
            $rs[$i]['ops'] = 0;
        }
        // dd($rs);
        if (sizeof($ts) > 0) {
            foreach ($ts as $t) {
                for ($i = 0; $i < sizeof($rs); $i++) {
                    try {
                        if ($rs[$i]['chrono'] == $t['chrono']) {
                            $rs[$i]['ops']++;
                        }
                    } catch (\Throwable $th) {
                        continue;
                    }
                }
            }
        }

        if (sizeof($ls) > 0) {
            foreach ($ls as $l) {
                for ($i = 0; $i < sizeof($rs); $i++) {
                    try {
                        if ($rs[$i]['chrono'] == $l['camion']) {
                            $rs[$i]['ops']++;
                        }
                    } catch (\Throwable $th) {
                        continue;
                    }
                }
            }
        }

        if (sizeof($es) > 0) {
            foreach ($es as $e) {
                for ($i = 0; $i < sizeof($rs); $i++) {
                    try {
                        if ($rs[$i]['chrono'] == $e['camion_aller'] or $rs[$i]['chrono'] == $e['camion_retour']) {
                            $rs[$i]['ops']++;
                        }
                    } catch (\Throwable $th) {
                        continue;
                    }
                }
            }
        }

        $tab = $this->trierParOps($rs);
        if($stop){
            while (sizeof($tab) > 6) {
                array_pop($tab);
            }
        }
        return $tab;
    }

    //teus chauffeur mensuel
    public function tcm($m = null , $y = null,$stop = true)
    {

        $cs = (new Chauffeurs())->findAll();
        $ts = (new Transferts())
        ->where('MONTH(date_mvt)',(empty($m)) ? date('m') : $m)
        ->where('YEAR(date_mvt)',(empty($y)) ? date('Y') : $y)
        ->find();
        $rs = [];

        for ($i = 0; $i < sizeof($cs); $i++) {
            $rs[$i]['matricule'] = $cs[$i]['matricule'];
            $rs[$i]['nom'] = $cs[$i]['nom'];
            $rs[$i]['teus'] = 0;
        }

        if (sizeof($ts) == 0) {
            return $rs;
        }

        foreach ($ts as $t) {
            foreach ($cs as $c) {
                if ($t['chauffeur'] == $c['matricule']) {
                    for ($i = 0; $i < sizeof($rs); $i++) {
                        if ($rs[$i]['matricule'] == $c['matricule']) {
                            $rs[$i]['teus'] += $t['teus'];
                        }
                    }
                };
            }
        }

        $tab = $this->trierParTeus($rs);
        if($stop){
            while (sizeof($tab) > 6) {
                array_pop($tab);
            }
        }
        return $tab;
    }

    function trierParTeus($tableau)
    {
        if (isset($tableau[0]['teus'])) {
            usort($tableau, function ($a, $b) {
                return $b['teus'] - $a['teus'];
            });
        }

        return $tableau;
    }

    function trierParOps($tableau)
    {
        if (isset($tableau[0]['ops'])) {
            usort($tableau, function ($a, $b) {
                return $b['ops'] - $a['ops'];
            });
        }

        return $tableau;
    }
}
