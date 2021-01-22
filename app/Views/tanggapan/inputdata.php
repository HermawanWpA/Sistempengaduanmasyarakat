<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <?php if (session()->getFlashdata('massage')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('massage') ?>
        </div>
    <?php endif; ?>


    <!-- Page Heading -->


    <h1 class="h3 mb-2 text-gray-800">Input Tanggapan</h1>
    <div class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah">
            <i class="fa fa-plus"> Tambah Data Tanggapan</i>
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
                            <th>ID Tanggapan</th>
                            <th>ID Pengaduan</th>
                            <th>Tanggal Tanggapan</th>
                            <th>Tanggapan</th>
                            <th>Edit</th>
                            <th>Del</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID Tanggapan</th>
                            <th>ID Pengaduan</th>
                            <th>Tanggal Tanggapan</th>
                            <th>Tanggapan</th>
                            <th>Edit</th>
                            <th>Del</th>

                        </tr>
                    </tfoot>
                    <?php
                    $i = 1; ?>
                    <?php foreach ($tbltanggapan->getResultArray() as $row) : ?>

                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['id_tanggapan']; ?></td>
                            <td><?= $row['id_pengaduan']; ?></td>
                            <td><?= $row['tanggal_tanggapan']; ?></td>
                            <td><?= $row['tanggapan']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalubah" id="btn-edit" class="btn btn-sm btn-warning" data-id_tanggapan="<?= $row['id_tanggapan']; ?>" data-id_pengaduan="<?= $row['id_pengaduan']; ?>" data-tanggal_tanggapan="<?= $row['tanggal_tanggapan']; ?>" data-tanggapan="<?= $row['tanggapan']; ?>">
                                    <i class="fa fa-edit"></i></button>
                            <td>
                                <a href="<?php echo base_url('tanggapan/hapus/' . $row['id_tanggapan']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                    <i class="fa fa-trash"></i>
                                </a></td>
                            </td>
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
                <form action="<?= base_url('tanggapan/tambah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-grup mb-0">
                        <label for="id_pengaduan"></label>
                        <input type="number" name="id_tanggapan" id="id_tanggapan" class="form-control" placeholder="Masukan ID Tanggapan">
                    </div>
                    <div class="form-grup mb-0">
                        <label for="nama"></label>
                        <input type="text" name="id_pengaduan" id="id_pengaduan" class="form-control" placeholder="Masukan ID Pengaduan">
                    </div>
                    <div class="form-grup mb-0">
                        <label for="tanggal_pengaduan"></label>
                        <input type="date" name="tanggal_tanggapan" id="tanggal_tanggapan" class="form-control" placeholder="Masukan Tanggal Tanggapan">
                    </div>
                    <br>
                    <div class="col-md-12">
                        <select id="tanggapan" name="tanggapan" class="form-select">
                            <option selected>Tanggapan</option>
                            <option>Selesai</option>
                            <option>Tidak Selesai</option>
                        </select>
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

<!-- ubah data -->
<div class="modal fade" id="modalubah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('tanggapan/ubah'); ?>" method="post">
                    <input type="hidden" name="id" id="id-tanggapan">

                    <div class="form-grup mb-0">
                        <label for="id_tanggapan"></label>
                        <input type="text" name="id_tanggapan" id="id_tanggapan" class="form-control" placeholder="Masukan ID" value="<?php echo $row['id_tanggapan'] ?>">
                    </div>
                    <div class="form-grup mb-0">
                        <label for="nama"></label>
                        <input type="text" name="id_pengaduan" id="id_pengaduan" class="form-control" placeholder="Masukan ID Pengaduan" <?php echo $row['id_pengaduan'] ?>>
                    </div>
                    <div class="form-grup mb-0">
                        <label for="tanggal_pengaduan"></label>
                        <input type="date" name="tanggal_tanggapan" id="tanggal_tanggapan" class="form-control" placeholder="Masukan Tanggal Tanggapan" <?php echo $row['tanggal_tanggapan'] ?>>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <select id="tanggapan" name="tanggapan" class="form-select" <?php echo $row['tanggapan'] ?>>
                            <option <?php echo $row['tanggapan'] ?>>Selesai</option>
                            <option <?php echo $row['tanggapan'] ?>>Tidak Selesai</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
            </div>
        </div>
        </form>
    </div>
</div>





<?= $this->endSection(); ?>