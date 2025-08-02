<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm p-4">
                <h2><?= $ebook['judul']; ?></h2>
                <p class="text-muted">
                    Ditulis oleh: <strong><?= $ebook['nama_penulis']; ?></strong> | 
                    Dipublikasikan pada: <?= date('d F Y', strtotime($ebook['tgl_publish'])); ?>
                </p>
                <div class="my-3">
                    <span class="badge bg-primary me-2"><i class="fas fa-eye"></i> Dilihat <?= $ebook['views']; ?> kali</span>
                    <span class="badge bg-success"><i class="fas fa-thumbs-up"></i> <?= $ebook['likes']; ?> Suka</span>
                </div>
                <hr>
                <div class="ebook-content" style="line-height: 1.8;">
                    <?= nl2br($ebook['isi_cerita']); ?>
                </div>
                <hr>
                <div class="mt-3">
                    <a href="<?= base_url('ebook/like/' . $ebook['id']); ?>" class="btn btn-success"><i class="fas fa-thumbs-up"></i> Suka Cerita Ini</a>
                    <a href="<?= base_url('ebook'); ?>" class="btn btn-secondary">Kembali ke Koleksi</a>
                </div>
            </div>
        </div>
    </div>
</div>