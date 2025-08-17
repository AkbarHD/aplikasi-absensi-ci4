<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin/jabatan/create') ?>" class="btn btn-primary">Tambah Data</a>
<table id="datatable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($jabatan as $jab): ?>
        <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $jab['jabatan'] ?></td> 
                <td>
                    <a href="<?= base_url('admin/jabatan/edit/' . $jab['id']) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('admin/jabatan/delete/' . $jab['id']) ?>" class="btn btn-danger tombol-hapus">Delete</a>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
    </thead>
</table>
<?= $this->endSection() ?>