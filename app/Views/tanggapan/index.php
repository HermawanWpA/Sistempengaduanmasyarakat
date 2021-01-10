<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <?php if (session()->getFlashdata('massage')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('massage') ?>
        </div>
    <?php endif; ?>


    <!-- Page Heading -->


    <h1 class="h3 mb-2 text-gray-800">Tabel Tanggapan</h1>
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
                            <th>ID Tanggapan</th>
                            <th>ID Pengaduan</th>
                            <th>Tanggal Tanggapan</th>
                            <th>Tanggapan</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID Tanggapan</th>
                            <th>ID Pengaduan</th>
                            <th>Tanggal Tanggapan</th>
                            <th>Tanggapan</th>


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

                            </td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
</div>








<?= $this->endSection(); ?>