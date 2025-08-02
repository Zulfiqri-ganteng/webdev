<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas Harian</h6>
        </div>
        <div class="card-body">
            <div class="list-group">
                <?php foreach($tugas as $t) : ?>
                    <a href="<?= base_url('siswa/tugas/detail/' . $t['id']); ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?= $t['judul_tugas']; ?></h5>
                            <small>Deadline: <?= date('d F Y H:i', strtotime($t['deadline'])); ?></small>
                        </div>
                        <p class="mb-1 text-muted">Klik untuk melihat detail.</p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>