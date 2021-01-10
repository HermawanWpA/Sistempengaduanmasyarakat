<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card" style="width: 15rem;">
                <img class="card-img-top" src="<?= base_url('/img/' . user()->user_image); ?>" alt="<?= user()->username; ?>">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <?= user()->username ?>
                        </li>
                        <?php if (user()->fullname) : ?>
                            <li class="list-group-item">
                                <?= user()->fullname; ?>
                            </li>
                        <?php endif; ?>
                        <li class="list-group-item">
                            <?= user()->email ?>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>