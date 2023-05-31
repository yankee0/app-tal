<?php

namespace App\Models;

use CodeIgniter\Model;

class Transferts extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transferts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "type_transfert",
        "date_mvt",
        "conteneur",
        "type_conteneur",
        "teus",
        "ligne",
        "rame",
        "mouvement",
        "p_v",
        "chauffeur",
        "tracteur",
        "eirs",
        "remarque_sous_traitant",
        "tracteur",
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
