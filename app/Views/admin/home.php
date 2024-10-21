<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon purple">
                <i class="lni lni-users"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Total Pegawai</h6>
                <h3 class="text-bold mb-10">0</h3>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon success">
                <i class="lni lni-checkmark-circle"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Hadir</h6>
                <h3 class="text-bold mb-10">0</h3>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon primary">
                <i class="lni lni-cross-circle"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Alpa</h6>
                <h3 class="text-bold mb-10">0</h3>

            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon orange">
                <i class="lni lni-sad"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Cuti/izin/sakit</h6>
                <h3 class="text-bold mb-10">0</h3>

            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
</div>
<?= $this->endSection() ?>