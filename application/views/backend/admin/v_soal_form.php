<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Pertanyaan</label>
                    <textarea name="pertanyaan" class="form-control" rows="5" required><?= isset($soal) ? $soal['pertanyaan'] : ''; ?></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Opsi A</label>
                        <input type="text" name="opsi_a" class="form-control" value="<?= isset($soal) ? $soal['opsi_a'] : ''; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Opsi B</label>
                        <input type="text" name="opsi_b" class="form-control" value="<?= isset($soal) ? $soal['opsi_b'] : ''; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Opsi C</label>
                        <input type="text" name="opsi_c" class="form-control" value="<?= isset($soal) ? $soal['opsi_c'] : ''; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Opsi D</label>
                        <input type="text" name="opsi_d" class="form-control" value="<?= isset($soal) ? $soal['opsi_d'] : ''; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Opsi E</label>
                        <input type="text" name="opsi_e" class="form-control" value="<?= isset($soal) ? $soal['opsi_e'] : ''; ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Jawaban Benar</label>
                    <select name="jawaban_benar" class="form-control" required>
                        <option value="A" <?= (isset($soal) && $soal['jawaban_benar'] == 'A') ? 'selected' : ''; ?>>Opsi A</option>
                        <option value="B" <?= (isset($soal) && $soal['jawaban_benar'] == 'B') ? 'selected' : ''; ?>>Opsi B</option>
                        <option value="C" <?= (isset($soal) && $soal['jawaban_benar'] == 'C') ? 'selected' : ''; ?>>Opsi C</option>
                        <option value="D" <?= (isset($soal) && $soal['jawaban_benar'] == 'D') ? 'selected' : ''; ?>>Opsi D</option>
                        <option value="E" <?= (isset($soal) && $soal['jawaban_benar'] == 'E') ? 'selected' : ''; ?>>Opsi E</option>
                    </select>
                </div>
                <a href="<?= base_url('admin/ujian/kelola_soal/' . (isset($soal) ? $soal['ujian_id'] : $id_ujian)); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>