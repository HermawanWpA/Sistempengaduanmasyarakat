<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelLaporan;

class Pelaporan extends Controller
{

    public function __construct()
    {
        // helper('form');
        // $this->validation = \Config\Services::validation();
        // $this->session = session();


        $this->model = new ModelLaporan;
    }

    public function index()
    {

        $data =
            [
                'title' => 'View Tables',
                'tblpengaduan' => $this->model->getALLData()
            ];
        return view('pelaporan/index', $data);
    }
    public function inputdata()
    {
        $data =
            [
                'title' => 'Input Data',
                'tblpengaduan' => $this->model->getALLData()
            ];
        return view('pelaporan/inputdata', $data);
    }
    public function tambah()
    {

        //validasi input
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'id_pengaduan' => [
                    'label' => 'ID Pengaduan',
                    'rules' => 'required|numeric|max_length[12]|is_unique[tblpengaduan.id_pengaduan]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'numeric' => '{field} hanya boleh angka',
                        'is_unique' => '{field} Sudah terdaftar.'
                    ]

                ],
                'nama' => [
                    'label' => 'Nama Pelapor',
                    'rules' => 'required|min_length[3][tblpengaduan.nama]',
                    'errors' => [
                        'required' => '{field} minimal 3 digit.',
                    ]
                ],
                'tanggal_pengaduan' => [
                    'label' => 'Jenis Tanggal Pengaduan',
                    'rules' => 'required|min_length[1][tblpengaduan.tanggal_pengaduan]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],
                'nik' => [
                    'label' => 'Nomor Induk Keluarga',
                    'rules' => 'required|numeric|max_length[12]|is_unique[tblpengaduan.nik]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'numeric' => '{field} hanya boleh angka',
                        'is_unique' => '{field} Sudah terdaftar.'
                    ]
                ],
                'isi_laporan' => [
                    'label' => 'Isi Laporan',
                    'rules' => 'required[tblpengaduan.isi_laporan]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'valid_date' => '{field} Sesuai dengan data.'
                    ]
                ],
                'poto' => 'uploaded[poto]|max_size[poto,1024]|mime_in[poto,image/png,image/JPG,image/jpg,image/jpeg]',


                'status' => [
                    'label' => 'Status',
                    'rules' => 'required|max_length[12][tblpengaduan.status]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                    ]
                ],

            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data =
                    [
                        'title' => 'Input Data',
                        'tblpengaduan' => $this->model->getALLData()
                    ];
                return view('pelaporan/inputdata', $data);
            } else {
                // ambil gambar
                $fileSampul = $this->request->getFile('poto');
                $namaSampul = $fileSampul->getRandomName();

                $fileSampul->move('img', $namaSampul);
                // dd($namaSampul);
                // pindahkan file
                // // apakah tidak ada file gambar yang di upload
                // if ($fileSampul->getError() == 4) {
                //     $namaSampul = 'newyork.png';
                // } else {
                //     // generate nama random
                // }

                $data = [
                    'id_pengaduan' => $this->request->getPost('id_pengaduan'),
                    'nama' => $this->request->getPost('nama'),
                    'tanggal_pengaduan' => $this->request->getPost('tanggal_pengaduan'),
                    'nik' => $this->request->getPost('nik'),
                    'isi_laporan' => $this->request->getPost('isi_laporan'),
                    'poto' => $namaSampul,
                    'status' => $this->request->getPost('status')
                ];


                //insert data
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setflashdata('massage', 'Data Berhasil Ditambahkan');
                    return redirect()->to(base_url('pelaporan/inputdata'));
                }
            }
        } else {
            return redirect()->to(base_url('pelaporan/inputdata'));
        }
    }
    public function hapus($id_pengaduan)
    {
        $success = $this->model->hapus($id_pengaduan);
        if ($success) {
            session()->setflashdata('massage', 'Data Berhasil Dihapus');
            return redirect()->to(base_url('pelaporan/inputdata'));
        }
    }
    public function ubah()
    {

        //validasi input
        if (isset($_POST['ubah'])) {
            $id = $this->request->getPost('id_pengaduan');
            $db_id = $this->model->getDataById($id);

            if ($id === $db_id) {
                $val = $this->validate([
                    'id_pengaduan' => [
                        'label' => 'ID Pengaduan',
                        'rules' => 'required|numeric|max_length[12]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                            'numeric' => '{field} hanya boleh angka'
                        ]

                    ],
                    'nama' => [
                        'label' => 'Nama Pelapor',
                        'rules' => 'required|min_length[3][tblpengaduan.nama]',
                        'errors' => [
                            'required' => '{field} minimal 3 digit.',
                        ]
                    ],
                    'tanggal_pengaduan' => [
                        'label' => 'Jenis Tanggal Pengaduan',
                        'rules' => 'required|min_length[1][tblpengaduan.tanggal_pengaduan]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                        ]
                    ],
                    'nik' => [
                        'label' => 'Nomor Induk Keluarga',
                        'rules' => 'required|numeric|max_length[12][tblpengaduan.nik]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                            'numeric' => '{field} hanya boleh angka'
                        ]
                    ],
                    'isi_laporan' => [
                        'label' => 'Isi Laporan',
                        'rules' => 'required[tblpengaduan.isi_laporan]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                            'valid_date' => '{field} Sesuai dengan data.'
                        ]
                    ],

                    'status' => [
                        'label' => 'Status',
                        'rules' => 'required|max_length[12][tblpengaduan.status]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                        ]
                    ],

                ]);
            } else {
                $val = $this->validate([
                    'id_pengaduan' => [
                        'label' => 'ID Pengaduan',
                        'rules' => 'required|numeric|max_length[12]|is_unique[tblpengaduan.id_pengaduan]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                            'numeric' => '{field} hanya boleh angka',
                            'is_unique' => '{field} Sudah terdaftar.'
                        ]

                    ],
                    'nama' => [
                        'label' => 'Nama Pelapor',
                        'rules' => 'required|min_length[3][tblpengaduan.nama]',
                        'errors' => [
                            'required' => '{field} minimal 3 digit.',
                        ]
                    ],
                    'tanggal_pengaduan' => [
                        'label' => 'Jenis Tanggal Pengaduan',
                        'rules' => 'required|min_length[1][tblpengaduan.tanggal_pengaduan]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                        ]
                    ],
                    'nik' => [
                        'label' => 'Nomor Induk Keluarga',
                        'rules' => 'required|numeric|max_length[12][tblpengaduan.nik]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                            'numeric' => '{field} hanya boleh angka'
                        ]
                    ],
                    'isi_laporan' => [
                        'label' => 'Isi Laporan',
                        'rules' => 'required[tblpengaduan.isi_laporan]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                            'valid_date' => '{field} Sesuai dengan data.'
                        ]
                    ],


                    'status' => [
                        'label' => 'Status',
                        'rules' => 'required|max_length[12][tblpengaduan.status]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                        ]
                    ],

                ]);
            }

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data =
                    [
                        'title' => 'Input Data',
                        'tblpengaduan' => $this->model->getALLData()
                    ];
                return view('pelaporan/inputdata', $data);
            } else {


                $id = $this->request->getPost('id_pengaduan');
                $data = [
                    'id_pengaduan' => $this->request->getPost('id_pengaduan'),
                    'nama' => $this->request->getPost('nama'),
                    'tanggal_pengaduan' => $this->request->getPost('tanggal_pengaduan'),
                    'nik' => $this->request->getPost('nik'),
                    'isi_laporan' => $this->request->getPost('isi_laporan'),
                    'status' => $this->request->getPost('status')
                ];


                //insert data
                $success = $this->model->tambah($data, $id);
                if ($success) {
                    session()->setflashdata('massage', 'Data Berhasil diubah');
                    return redirect()->to(base_url('pelaporan/index'));
                }
            }
        } else {
            return redirect()->to(base_url('pelaporan/index'));
        }
    }
}
