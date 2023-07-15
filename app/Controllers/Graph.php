<?php

namespace App\Controllers;

use App\Models\Transferts;
use App\Controllers\BaseController;

class Graph extends BaseController
{
    public function line()
    {
        //Transferts
        $modelTransfert = new Transferts();
        $query = $modelTransfert->select('MONTH(created_at) AS mois, COUNT(*) AS nombre_Transferts')
            ->where('created_at >= DATE_FORMAT(NOW(), "%Y-01-01")')
            ->groupBy('MONTH(created_at)')
            ->get();
        $resultats = $query->getResultArray();
        $tableauResultatsTransfert = array_fill(1, 12, 0);
        foreach ($resultats as $resultat) {
            $mois = intval($resultat['mois']);
            $nombreTransferts = intval($resultat['nombre_Transferts']);
            $tableauResultatsTransfert[$mois] = $nombreTransferts;
        }

        $res = [
            'Jan' => $tableauResultatsTransfert[1],
            'Fév' => $tableauResultatsTransfert[2],
            'Mar' => $tableauResultatsTransfert[3],
            'Avr' => $tableauResultatsTransfert[4],
            'Mai' => $tableauResultatsTransfert[5],
            'Jui' => $tableauResultatsTransfert[6],
            'Jlt' => $tableauResultatsTransfert[7],
            'Aou' => $tableauResultatsTransfert[8],
            'Sep' => $tableauResultatsTransfert[9],
            'Oct' => $tableauResultatsTransfert[10],
            'Nov' => $tableauResultatsTransfert[11],
            'Déc' => $tableauResultatsTransfert[12],
        ];

        $donnee = [
            't' => $res
        ];
        $this->response->setJSON($donnee);
        $this->response->send();
    }
}
