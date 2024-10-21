<?= $this->extend('pegawai/layout') ?>

<?= $this->section('content') ?>
<style>
    .parent-clock {
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        font-size: 35px;
        font-weight: bold;
        justify-content: center;
    }
</style>
<div class="row">
    <div class="col-2"></div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                Presensi Masuk
            </div>
            <div class="card-body text-center">
                <div class="fw-bold tanggal"><?= date('d F Y') ?></div>
                <div class="parent-clock">
                    <div id="jam-masuk"></div>
                    <div>:</div>
                    <div id="menit-masuk"></div>
                    <div>:</div>
                    <div id="detik-masuk"></div>
                </div>
                <form action="">
                    <button class="btn btn-primary mt-3">Masuk</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                Presensi Keluar
            </div>
            <div class="card-body text-center">
                <div class="fw-bold tanggal"><?= date('d F Y') ?></div>
                <div class="parent-clock">
                    <div id="jam-keluar"></div>
                    <div>:</div>
                    <div id="menit-keluar"></div>
                    <div>:</div>
                    <div id="detik-keluar"></div>
                </div>
                <form action="">
                    <button class="btn btn-danger mt-3">Keluar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>

<script>
    // Memanggil WaktuMasuk setiap 1 detik
    window.setInterval(WaktuMasuk, 1000);

    // Fungsi untuk mendapatkan waktu real-time
    function WaktuMasuk() {
        const waktu = new Date();
        document.getElementById('jam-masuk').innerHTML = formatWaktu(waktu.getHours());
        document.getElementById('menit-masuk').innerHTML = formatWaktu(waktu.getMinutes());
        document.getElementById('detik-masuk').innerHTML = formatWaktu(waktu.getSeconds());
    }

    window.setInterval(WaktuKeluar, 1000);

    // Fungsi untuk mendapatkan waktu real-time
    function WaktuKeluar() {
        const waktu = new Date();
        document.getElementById('jam-keluar').innerHTML = formatWaktu(waktu.getHours());
        document.getElementById('menit-keluar').innerHTML = formatWaktu(waktu.getMinutes());
        document.getElementById('detik-keluar').innerHTML = formatWaktu(waktu.getSeconds());
    }

    // Fungsi untuk format jam agar menampilkan 2 digit
    function formatWaktu(waktu) {
        return waktu < 10 ? '0' + waktu : waktu;
    }
</script>
<?= $this->endSection() ?>