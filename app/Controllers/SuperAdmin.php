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
        return view('superadmin/dashboard',[
            'l' => (new Livraisons())->countAll(),
            't' => (new Transferts())->countAll(),
            'e' => (new Livraisons())->countAll(),
            'c' => (new Tracteurs())->countAll(),
            'tcm' => $this->tcm(),
            'mcm' => $this->mcm()
        ]);
    }

    // mvt camion mensu
    public function mcm()
    {
        $cs = (new Tracteurs())->findAll();
        $ts = (new Transferts())->where('MONTH(date_mvt)', date('m'))->find();
        $ls = (new Livraisons())->where('MONTH(date_livraison)', date('m'))->find();
        $es = (new Exports())->where('MONTH(date_posit)', date('m'))->find();

        $rs = [];

        for ($i = 0; $i < sizeof($cs); $i++) {
            $rs[$i]['chrono'] = $cs[$i]['chrono'];
            $rs[$i]['ops'] = 0;
        }
        if (sizeof($ts) == 0 or sizeof($ls) == 0) {
            return $rs;
        }

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

        foreach ($ls as $l) {
            for ($i = 0; $i < sizeof($rs); $i++) {
                if ($rs[$i]['chrono'] == $l['camion']) {
                    $rs[$i]['ops']++;
                }
            }
        }

        foreach ($es as $e) {
            for ($i = 0; $i < sizeof($rs); $i++) {
                if ($rs[$i]['chrono'] == $e['camion_aller']) {
                    $rs[$i]['ops']++;
                }
            }
        }

        $tab = $this->trierParOps($rs);
        while(sizeof($tab) > 6){
            array_pop($tab);
        }
        return $tab;
    }

    //teus chauffeur mensuel
    public function tcm()
    {

        $cs = (new Chauffeurs())->findAll();
        $ts = (new Transferts())->where('MONTH(date_mvt)', date('m'))->find();
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
        while(sizeof($tab) > 6){
            array_pop($tab);
        }
        return $tab;
    }

    function trierParTeus($tableau)
    {
        if(isset($tableau[0]['teus'])){
            usort($tableau, function ($a, $b) {
                return $b['teus'] - $a['teus'];
            });
        }
        
        return $tableau;
    }

    function trierParOps($tableau)
    {
        if(isset($tableau[0]['ops'])){
            usort($tableau, function ($a, $b) {
                return $b['ops'] - $a['ops'];
            });
        }
        
        return $tableau;
    }

}
