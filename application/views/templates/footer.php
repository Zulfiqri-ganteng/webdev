<footer class="text-white pt-5 pb-4 mt-5" style="background-color: #0A2647;">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">

            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold" style="color: #FFD700;">SMK Galajuara</h5>
                <p>
                    Lembaga pendidikan kejuruan yang berdedikasi untuk mencetak generasi muda yang kompeten, kreatif, dan berakhlak mulia.
                </p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold" style="color: #FFD700;">Tautan Cepat</h5>
                <p><a href="<?= base_url('guru'); ?>" class="text-white" style="text-decoration: none;">Staf Guru</a></p>
                <p><a href="<?= base_url('gallery'); ?>" class="text-white" style="text-decoration: none;">Galeri</a></p>
                <p><a href="<?= base_url('pengumuman'); ?>" class="text-white" style="text-decoration: none;">Pengumuman</a></p>
            </div>
            
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold" style="color: #FFD700;">Kontak</h5>
                <p><i class="fas fa-home me-3"></i>Jl. Pendidikan No. 123, Bekasi</p>
                <p><i class="fas fa-envelope me-3"></i>info@smkgalajuara.sch.id</p>
                <p><i class="fas fa-phone me-3"></i>(021) 1234 5678</p>
            </div>
        </div>

        <hr class="mb-4">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
                <p>&copy; <?= date('Y'); ?> SMK Galajuara Kota Bekasi, Design By <a href="https://www.instagram.com/zufieee/" target="_blank" rel="noopener noreferrer">Zulfiqri,S.Kom</a>.</p>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="text-center text-md-end">
                    <a href="#" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-4"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-4"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<?php if (isset($judul) && $judul == 'Login'): ?>
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script>
            particlesJS("particles-js", {
              "particles": {
                "number": {"value": 80, "density": {"enable": true, "value_area": 800}},
                "color": {"value": "#ffffff"},
                "shape": {"type": "circle"},
                "opacity": {"value": 0.5, "random": false},
                "size": {"value": 3, "random": true},
                "line_linked": {"enable": true, "distance": 150, "color": "#ffffff", "opacity": 0.4, "width": 1},
                "move": {"enable": true, "speed": 2, "direction": "none", "random": false, "straight": false, "out_mode": "out", "bounce": false}
              },
              "interactivity": {
                "detect_on": "canvas", "events": {"onhover": {"enable": true, "mode": "repulse"},"onclick": {"enable": true, "mode": "push"},"resize": true},
                "modes": {"repulse": {"distance": 100, "duration": 0.4},"push": {"particles_nb": 4}}
              },
              "retina_detect": true
            });
        </script>
    <?php endif; ?>

</body>
</html>
</body>
</html>