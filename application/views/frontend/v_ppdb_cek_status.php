<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm p-4">
                <h2 class="text-center section-title"><?= $judul; ?></h2>
                <p class="text-center text-muted">Masukkan nomor pendaftaran yang Anda dapatkan saat mendaftar.</p>
                <hr>

                <form action="<?= base_url('ppdb/cek_status'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="nomor_pendaftaran" class="form-control" placeholder="Contoh: PPDB-2025-0001" required>
                        <button class="btn btn-primary" type="submit">Cek Status</button>
                    </div>
                </form>

                <?php if ($this->session->flashdata('error_message')): ?>
                    <div class="alert alert-danger mt-3"><?= $this->session->flashdata('error_message'); ?></div>
                <?php endif; ?>

                <?php if (isset($pendaftar) && $pendaftar): ?>
                    <div class="alert alert-light mt-4 border">
                        <h4 class="alert-heading">Hasil Pencarian</h4>
                        <p><strong>Nama:</strong> <?= $pendaftar['nama_lengkap']; ?></p>
                        <p><strong>No. Pendaftaran:</strong> <?= $pendaftar['nomor_pendaftaran']; ?></p>
                        <hr>
                        <p class="mb-0"><strong>Status Pendaftaran Anda:</strong> 
                            <?php 
                                $status = $pendaftar['status_pendaftaran'];
                                $badge_class = 'bg-warning text-dark';
                                if($status == 'Diterima') $badge_class = 'bg-success text-white';
                                if($status == 'Ditolak') $badge_class = 'bg-danger text-white';
                            ?>
                            <span class="badge <?= $badge_class; ?> fs-6"><?= $status; ?></span>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>