<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <?php if (session()->getFlashdata('massage')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('massage') ?>
        </div>
    <?php endif; ?>


    <!-- Page Heading -->


    <h1 class="h3 mb-2 text-gray-800">Input Data</h1>
    <div class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah">
            <i class="fa fa-plus"> Tambah Data</i>
        </button>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?php
            if (session()->get('err')) {
                echo "<div class='alert alert-danger p-0 pt-2' role='alert'>" . session()->get('err') . "</div>";
                session()->remove('err');
            }

            ?>
        </div>
    </div>

    <br>
    <br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Pengaduan</th>
                            <th>Nama</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Nik</th>
                            <th>Isi Laporan</th>
                            <th>Photo</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID Pengaduan</th>
                            <th>Nama</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Nik</th>
                            <th>Isi Laporan</th>
                            <th>Photo</th>
                            <th>Status</th>

                        </tr>
                    </tfoot>
                    <?php
                    $i = 1; ?>
                    <?php foreach ($tblpengaduan->getResultArray() as $row) : ?>

                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['id_pengaduan']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['tanggal_pengaduan']; ?></td>
                            <td><?= $row['nik']; ?></td>
                            <td><?= $row['isi_laporan']; ?></td>
                            <td><img width="50" height="50" src="/img/<?= $row['poto'];  ?>" alt="" class="sampul"></td>
                            <td><?= $row['status']; ?></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal simpan data -->
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pelaporan/tambah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-grup mb-0">
                        <label for="id_pengaduan"></label>
                        <input type="number" name="id_pengaduan" id="id_pengaduan" class="form-control" placeholder="Masukan ID Pengaduan">
                    </div>
                    <div class="form-grup mb-0">
                        <label for="nama"></label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-grup mb-0">
                        <label for="tanggal_pengaduan"></label>
                        <input type="date" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control" placeholder="Masukan Tanggal Pengaduan">
                    </div>
                    <div class="form-grup mb-0">
                        <label for="nik"></label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Nik">
                    </div>

                    <div class="form-group">
                        <label for="description"></label><textarea name="isi_laporan" class="form-control" id="isi_laporan" cols="66" rows="2" placeholder="Isi Laporan"></textarea></div>
                    <div class="form-grup mb-0">
                        <select id="status" name="status" class="form-select">
                            <option selected>status</option>
                            <option>Bahaya</option>
                            <option>Tidak Bahaya</option>
                        </select>
                    </div>
                    <div class="form-grup mb-0">
                        <label for="formFileSm" class="form-label"></label>
                        <input class="form-control form-control-sm-3" name="poto" id="poto" type="file">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
        </form>
    </div>
</div>







<?= $this->endSection(); ?>