<?php
namespace App\Models;

use CodeIgniter\Model;

class TouristCentre extends Model
{
    protected $table = 'tourist_centres'; // Replace with your actual table name
    protected $primaryKey = 'id'; // Primary key column name
    protected $allowedFields = ['name', 'description', 'visible', 'image', 'date_posted'];

    // Add other model-related code if needed
    protected $DBGroup          = 'default';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

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

    public function filterAndSortData($search, $orderColumn, $orderDir, $start, $length)
    {
        // Add your database queries here for filtering, sorting, and pagination
        // Example:
        $this->select('*');
        if (!empty($search)) {
            $this->groupStart()
                 ->like('name', $search)
                 ->orLike('description', $search)
                 ->groupEnd();
        }
        $this->orderBy($orderColumn, $orderDir);
        $this->limit($length, $start);

        return $this->findAll();
    }

    public function countFilteredData($search)
    {
        // Add your database query here to count the filtered records
        // Example:
        if (!empty($search)) {
            $this->groupStart()
                 ->like('name', $search)
                 ->orLike('description', $search)
                 ->groupEnd();
        }
        return $this->countAllResults();
    }
}
