<?php

namespace App\Models;

use CodeIgniter\Model;

class Exports extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'exports';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'date_posit',
        'conteneur',
        'type',
        'client',
        'mv_aller',
        'lieu_posit',
        'type_posit',
        'camion_aller',
        'remorque',
        'date_retour',
        'camion_retour',
        'mv_retour',
        'remarques',
        'chauffeur_aller',
        'chauffeur_retour',
        'type_operation',
        'transporteur',
        'retour_rem',
        'rem_aller',
        'rem_retour',
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
