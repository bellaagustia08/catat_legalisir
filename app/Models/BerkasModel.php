<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasModel extends Model
{
    protected $table = "berkas";
    protected $primaryKey = "id_berkas";
    protected $returnType = "object";
    protected $allowedFields = ['id_berkas', 'id_kelola', 'berkas'];

    public function insertBerkas($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getAllData()
    {
        return $this->db->table('berkas')
            ->join('kelola', 'berkas.id_kelolas=kelola.id')
            ->get()->getResultArray();
    }
}
