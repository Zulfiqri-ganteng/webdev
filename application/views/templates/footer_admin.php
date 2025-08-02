</div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SMK Galajuara <?= date('Y'); ?>, Design by <a href="https://www.instagram.com/zufieee/" target="_blank" rel="noopener noreferrer">Zulfiqri,S.Kom</a> </span>
                    </div>
                </div>
            </footer>
            </div>
        </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script>
    $(document).ready(function() {

        // 1. Logika untuk Animasi Latar Belakang
        particlesJS("particles-js", {
            "particles": {
                "number": {"value": 50, "density": {"enable": true, "value_area": 800}},
                "color": {"value": "#ffffff"},
                "shape": {"type": "circle"},
                "opacity": {"value": 0.3, "random": true},
                "size": {"value": 3, "random": true},
                "line_linked": {"enable": true, "distance": 150, "color": "#ffffff", "opacity": 0.1, "width": 1},
                "move": {"enable": true, "speed": 1, "direction": "none", "random": false, "straight": false, "out_mode": "out", "bounce": false}
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {"onhover": {"enable": true, "mode": "grab"},"onclick": {"enable": false},"resize": true},
                "modes": {"grab": {"distance": 140, "line_opacity": 0.3}}
            },
            "retina_detect": true
        });

        // 2. Logika untuk Jam Live
        function updateClock() {
            var now = new Date();
            var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            
            var tanggal = hari[now.getDay()] + ', ' + now.getDate() + ' ' + bulan[now.getMonth()] + ' ' + now.getFullYear();
            var jam = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2) + ':' + ('0' + now.getSeconds()).slice(-2);
            
            // Gabungkan tanggal dan jam
            var dateTimeString = tanggal + ' | ' + jam + ' WIB';
            
            // Tampilkan di elemen yang sudah kita siapkan
            $('#live-clock span').html(dateTimeString);
        }

        // Panggil fungsi updateClock setiap 1 detik
        setInterval(updateClock, 1000);

        // Panggil juga saat halaman pertama kali dimuat
        updateClock(); 
    });
    </script>
</body>
</html>