<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ujian yang Tersedia</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ujian</th>
                            <th>Mata Pelajaran</th>
                            <th>Waktu (Menit)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($ujian_tersedia as $u) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $u['judul_ujian']; ?></td>
                            <td><?= $u['mapel']; ?></td>
                            <td><?= $u['waktu_menit']; ?> Menit</td>
                            <td>
                                <a href="<?= base_url('siswa/ujian/kerjakan/' . $u['id']); ?>" class="btn btn-primary btn-sm">
                                    Kerjakan
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>