<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTanggapan extends Model
{
    protected $table = 'tbltanggapan';

    public function __construct()
    {

        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
        // $this->validation = \Config\Services::validation();
        // $this->session = session();
    }
    public function getAllData()
    {
        return $this->builder->get();
    }

    public function getDataById($id)
    {
        $this->builder->where('id_tanggapan', $id);
        return $this->builder->get()->getRowArray();
    }
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
    public function hapus($id)
    {
        return $this->builder->delete(['id_tanggapan' => $id]);
    }
    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_tanggapan' => $id]);
    }
}
