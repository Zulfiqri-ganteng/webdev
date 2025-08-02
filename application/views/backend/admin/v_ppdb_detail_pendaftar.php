<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?>: <?= $pendaftar['nama_lengkap']; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">No. Pendaftaran: <?= $pendaftar['nomor_pendaftaran']; ?></h6>
        </div>
        <div class="card-body">
            <h5>Data Diri</h5>
            <table class="table table-bordered">
                <tr><th width="30%">Nama Lengkap</th><td><?= $pendaftar['nama_lengkap']; ?></td></tr>
                <tr><th>NISN</th><td><?= $pendaftar['nisn']; ?></td></tr>
                <tr><th>Jenis Kelamin</th><td><?= $pendaftar['jenis_kelamin']; ?></td></tr>
                <tr><th>TTL</th><td><?= $pendaftar['tempat_lahir']; ?>, <?= date('d M Y', strtotime($pendaftar['tanggal_lahir'])); ?></td></tr>
                <tr><th>Alamat</th><td><?= $pendaftar['alamat']; ?></td></tr>
                <tr><th>Sekolah Asal</th><td><?= $pendaftar['sekolah_asal']; ?></td></tr>
            </table>

            <h5 class="mt-4">Data Orang Tua</h5>
            <table class="table table-bordered">
                <tr><th width="30%">Nama Ayah</th><td><?= $pendaftar['nama_ayah']; ?></td></tr>
                <tr><th>Pekerjaan Ayah</th><td><?= $pendaftar['pekerjaan_ayah']; ?></td></tr>
                <tr><th>Nama Ibu</th><td><?= $pendaftar['nama_ibu']; ?></td></tr>
                <tr><th>Pekerjaan Ibu</th><td><?= $pendaftar['pekerjaan_ibu']; ?></td></tr>
            </table>

             <h5 class="mt-4">Pilihan Jurusan & Kontak</h5>
             <table class="table table-bordered">
                <tr><th width="30%">Nomor HP</th><td><?= $pendaftar['nomor_hp']; ?></td></tr>
                <tr><th>Pilihan Jurusan</th><td><?= $pendaftar['pilihan_jurusan']; ?></td></tr>
            </table>

             <h5 class="mt-4">Ubah Status Pendaftaran</h5>
            <form action="<?= base_url('admin/ppdb/ubah_status_pendaftar/' . $pendaftar['id']); ?>" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <select name="status_pendaftaran" class="form-select">
                            <option value="Menunggu Verifikasi" <?= $pendaftar['status_pendaftaran'] == 'Menunggu Verifikasi' ? 'selected' : ''; ?>>Menunggu Verifikasi</option>
                            <option value="Diterima" <?= $pendaftar['status_pendaftaran'] == 'Diterima' ? 'selected' : ''; ?>>Diterima</option>
                            <option value="Ditolak" <?= $pendaftar['status_pendaftaran'] == 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                         <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('admin/ppdb/pendaftar'); ?>" class="btn btn-secondary">Kembali ke Daftar Pendaftar</a>
        </div>
    </div>
</div>