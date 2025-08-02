<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white" style="background-color: #0A2647;">
                    <h3 class="my-3 text-center"><?= $judul; ?></h3>
                    <h5 class="text-center">Tahun Ajaran <?= $tahun_ajaran_aktif['tahun_ajaran']; ?></h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('ppdb/register_action'); ?>" method="post">
                        <input type="hidden" name="tahun_ajaran_id" value="<?= $tahun_ajaran_aktif['id']; ?>">
                        
                        <h5 class="mb-3" style="color: #0A2647;">Data Diri Calon Siswa</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NISN</label>
                                <input type="text" name="nisn" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                             <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </div>
                             <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sekolah Asal</label>
                                <input type="text" name="sekolah_asal" class="form-control" required>
                            </div>
                             <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>

                        <h5 class="mt-4 mb-3" style="color: #0A2647;">Data Orang Tua</h5>
                        <hr>
                         <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control" required>
                            </div>
                             <div class="col-md-6 mb-3">
                                <label class="form-label">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" class="form-control" required>
                            </div>
                             <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control" required>
                            </div>
                             <div class="col-md-6 mb-3">
                                <label class="form-label">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" class="form-control" required>
                            </div>
                        </div>

                         <h5 class="mt-4 mb-3" style="color: #0A2647;">Kontak & Pilihan Jurusan</h5>
                        <hr>
                        <div class="row">
                             <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor HP (WhatsApp)</label>
                                <input type="tel" name="nomor_hp" class="form-control" required>
                            </div>
                             <div class="col-md-6 mb-3">
                                <label class="form-label">Pilihan Jurusan</label>
                                <select name="pilihan_jurusan" class="form-select" required>
                                    <option value="">-- Pilih Jurusan --</option>
                                    <option value="Teknik Komputer & Jaringan">Teknik Komputer & Jaringan</option>
                                    <option value="Multimedia">Multimedia</option>
                                    <option value="Akuntansi & Keuangan">Akuntansi & Keuangan</option>
                                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                    <option value="Manajemen Perkantoran (MP)">Manajemen Perkantoran (MP)</option>
                                    <option value="Farmasi">Farmasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Daftar Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>