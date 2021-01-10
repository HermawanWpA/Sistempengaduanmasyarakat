<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTanggapan extends Model
{
    public function __construct()
    {
        $this->connect = db_connect();
        // $this->validation = \Config\Services::validation();
        // $this->session = session();
    }
    public function getAllData()
    {
        return $this->connect->table('tbltanggapan')->get();
    }

    public function tambah($data)
    {
        return $this->connect->table('tbltanggapan')->insert($data);
    }
    public function hapus($id)
    {
        return $this->connect->table('tanggapan')->delete(['id_tanggapan' => $id]);
    }
}
