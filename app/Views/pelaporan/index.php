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
                            <th>Edit</th>
                            <th>Del</th>
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
                            <th>Edit</th>
                            <th>Del</th>
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
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modaltambah" id="btn-edit" class="btn btn-sm btn-warning" data-id_pengaduan="<?= $row['id_pengaduan']; ?>" data-nama="<?= $row['nama']; ?>" data-tanggal_pengaduan="<?= $row['tanggal_pengaduan']; ?>" data-nik="<?= $row['nik']; ?>" data-isi_laporan="<?= $row['isi_laporan']; ?>" data-poto="<?= $row['poto']; ?>" data-status="<?= $row['status']; ?>">
                                    <i class="fa fa-edit"></i></button>
                            <td>
                                <a href="<?php echo base_url('pelaporan/hapus/' . $row['id_pengaduan']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                    <i class="fa fa-trash"></i>
                                </a></td>
                            </td>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- modal Ubah data -->
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pelaporan/ubah'); ?>" method="post">
                    <input type="text" name="id_pengaduan" id="id-pengaduan" <?php echo $row['id_pengaduan'] ?>>

                    <div class="form-grup mb-0">
                        <label for="nama"></label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo $row['nama'] ?>">
                    </div>
                    <div class="form-grup mb-0">
                        <label for="tanggal_pengaduan"></label>
                        <input type="date" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control" placeholder="Masukan Tanggal Pengaduan" value="<?php echo $row['tanggal_pengaduan'] ?>">
                    </div>
                    <div class="form-grup mb-0">
                        <label for="nik"></label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Nik" value="<?php echo $row['nik'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="description"></label><textarea name="isi_laporan" class="form-control" id="isi_laporan" cols="66" rows="2" placeholder="Isi Laporan" value="<?php echo $row['isi_laporan'] ?>"></textarea></div>
                    <div class="col-md-12">
                        <select id="status" name="status" class="form-select" value="<?php echo $row['status'] ?>">
                            <option value="<?php echo $row['status'] ?>">Bahaya</option>
                            <option value="<?php echo $row['status'] ?>">Tidak Bahaya</option>
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