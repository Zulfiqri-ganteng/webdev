<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary"><?= $ujian['judul_ujian']; ?></h6>
            <div id="timer" class="font-weight-bold text-danger bg-light p-2 rounded">
                Sisa Waktu: 00:00
            </div>
        </div>
        <div class="card-body">
            <form id="form-ujian" action="<?= base_url('siswa/ujian/submit_jawaban'); ?>" method="post">
                <input type="hidden" name="id_ujian" value="<?= $ujian['id']; ?>">
                
                <ol>
                    <?php foreach($soal as $s) : ?>
                    <li class="mb-4">
                        <p><?= $s['pertanyaan']; ?></p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" id="opsi_a_<?= $s['id']; ?>" value="A" required>
                            <label class="form-check-label" for="opsi_a_<?= $s['id']; ?>"><?= $s['opsi_a']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" id="opsi_b_<?= $s['id']; ?>" value="B" required>
                            <label class="form-check-label" for="opsi_b_<?= $s['id']; ?>"><?= $s['opsi_b']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" id="opsi_c_<?= $s['id']; ?>" value="C" required>
                            <label class="form-check-label" for="opsi_c_<?= $s['id']; ?>"><?= $s['opsi_c']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" id="opsi_d_<?= $s['id']; ?>" value="D" required>
                            <label class="form-check-label" for="opsi_d_<?= $s['id']; ?>"><?= $s['opsi_d']; ?></label>
                        </div>
                        <div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" id="opsi_e_<?= $s['id']; ?>" value="E" required>
    <label class="form-check-label" for="opsi_e_<?= $s['id']; ?>"><?= $s['opsi_e']; ?></label>
</div>
                    </li>
                    <?php endforeach; ?>
                </ol>

                <hr>
                <button type="submit" class="btn btn-primary">Kumpulkan Jawaban</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Ambil elemen timer
    const timerElement = document.getElementById('timer');
    // Ambil durasi ujian dari PHP (dalam menit)
    const durationInMinutes = <?= $ujian['waktu_menit']; ?>;
    // Hitung waktu akhir
    const endTime = new Date().getTime() + durationInMinutes * 60 * 1000;

    // Update timer setiap 1 detik
    const timerInterval = setInterval(() => {
        const now = new Date().getTime();
        const distance = endTime - now;

        // Hitung menit dan detik
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Tampilkan di elemen timer
        timerElement.innerHTML = `Sisa Waktu: ${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

        // Jika waktu habis
        if (distance < 0) {
            clearInterval(timerInterval);
            timerElement.innerHTML = "Waktu Habis!";
            alert('Waktu pengerjaan telah habis! Jawaban Anda akan dikumpulkan secara otomatis.');
            // Submit form secara otomatis
            document.getElementById('form-ujian').submit();
        }
    }, 1000);
</script>