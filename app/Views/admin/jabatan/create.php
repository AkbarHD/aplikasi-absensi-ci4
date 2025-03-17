<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<form method="post" action="<?= base_url('admin/jabatan/store') ?>">
    <div class="row">
        <div class="col-lg-6">
            <!-- input style start -->
            <div class="card-style mb-30">
                <div class="input-style-1">
                    <label>Nama Jabatan</label>
                    <input type="text"
                        class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : '' ?>"
                        name="jabatan" value="<?= old('jabatan') ?>" placeholder="Nama Jabatan" />
                    <div class="text-danger">
                        <?= $validation->getError('jabatan') ?>
                    </div>
                </div>

                <button class="main-btn primary-btn btn-hover w-100" type="submit">Submit</button></button>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection() ?>