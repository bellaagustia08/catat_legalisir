<?php

namespace App\Models;

use CodeIgniter\Model;

class KelolaModel extends Model
{
    protected $table = "kelola";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['id', 'nama_pegawai', 'tanggal_legalisir', 'keterangan', 'created_at' , 'updated_at'];

    public function insertKelola($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getAllData()
    {
        return $this->db->table('kelola')
        ->join('gambar','kelola.id=gambar.data_id')
        ->get()->getResultArray();  
    }
}
