<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <p class="mb-4">Kelola semua cerita yang pernah kamu tulis dan publikasikan.</p>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Cerita Saya</h6>
            <a href="<?= base_url('siswa/ebook/tambah'); ?>" class="btn btn-primary btn-sm float-end" style="margin-top: -25px;">
                <i class="fas fa-plus"></i> Tulis Cerita Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Cerita</th>
                            <th>Tanggal Publikasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($ebooks)): $i = 1; foreach($ebooks as $ebook) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $ebook['judul']; ?></td>
                            <td><?= date('d F Y', strtotime($ebook['tgl_publish'])); ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('siswa/ebook/edit/' . $ebook['id']); ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="<?= base_url('siswa/ebook/hapus/' . $ebook['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus cerita ini?');">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Kamu belum menulis cerita apapun.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>