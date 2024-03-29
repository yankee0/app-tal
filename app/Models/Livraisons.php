<?php

namespace App\Models;

use CodeIgniter\Model;

class Livraisons extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'livraisons';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'date_depot_bl',
        'date_livraison',
        'conteneur',
        'armateur',
        'type_tc',
        'tracteur',
        'chauffeur_aller',
        'mvt_aller',
        'adresse',
        'zone',
        'client',
        'date_retour',
        'chauffeur_retour',
        'mvt_retour',
        'type',
        'transporteur',
        'retour_rem',
        'cam_aller',
        'cam_retour',
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
