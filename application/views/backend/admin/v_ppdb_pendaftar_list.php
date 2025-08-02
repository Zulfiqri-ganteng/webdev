<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Pendaftar PPDB</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Filter Data</h6>
        </div>
        <div class="card-body">
            <form method="get" action="<?= base_url('admin/ppdb/pendaftar'); ?>">
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label>Pilih Tahun Ajaran</label>
                        <select name="tahun_id" class="form-control">
                            <option value="">-- Tampilkan Semua --</option>
                            <?php foreach($tahun_ajaran_list as $ta): ?>
                                <option value="<?= $ta['id']; ?>" <?= ($this->input->get('tahun_id') == $ta['id']) ? 'selected' : ''; ?>><?= $ta['tahun_ajaran']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
         <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Pendaftar</h6>
            
            <?php $filter_tahun = $this->input->get('tahun_id'); ?>
            <a href="<?= base_url('admin/ppdb/export_pendaftar/' . $filter_tahun); ?>" class="btn btn-success btn-sm">
                <i class="fas fa-file-excel"></i> Export ke Excel
            </a>
         </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Pendaftaran</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Pilihan Jurusan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach($pendaftar as $p): ?>
                        <tr>
                            <td><?= $p['nomor_pendaftaran']; ?></td>
                            <td><?= $p['nama_lengkap']; ?></td>
                            <td><?= $p['nisn']; ?></td>
                            <td><?= $p['pilihan_jurusan']; ?></td>
                            <td>
                                <?php 
                                    $badge_class = 'bg-warning text-dark';
                                    if($p['status_pendaftaran'] == 'Diterima') $badge_class = 'bg-success text-white';
                                    if($p['status_pendaftaran'] == 'Ditolak') $badge_class = 'bg-danger text-white';
                                ?>
                                <span class="badge <?= $badge_class; ?>"><?= $p['status_pendaftaran']; ?></span>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/ppdb/detail_pendaftar/' . $p['id']); ?>" class="btn btn-info btn-sm">Detail</a>
                                <a href="<?= base_url('admin/ppdb/hapus_pendaftar/' . $p['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>