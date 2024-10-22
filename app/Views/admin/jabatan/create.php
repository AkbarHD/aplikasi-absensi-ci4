<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<form method="post" action="<?= base_url('admin/jabatan/store') ?>">
    <div class="row">
        <div class="col-lg-6">
            <!-- input style start -->
            <div class="card-style mb-30">
                <div class="input-style-1">
                    <label>Nama Jabatan</label>
                    <input type="text" placeholder="Full Name" />
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection() ?>