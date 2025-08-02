<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-lg text-white" style="background: rgba(10, 38, 71, 0.85); backdrop-filter: blur(10px);">
                <div class="card-body p-5 text-center">
                    
                    <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo Sekolah" width="80" class="mb-4">

                    <h3 class="fw-bold mb-4">LOGIN AREA</h3>
                    <p class="text-muted text-warning text-center mb-4">SMK Galajuara Kota Bekasi</p>
                    <?= $this->session->flashdata('message'); ?>
                    
                    <form action="<?= base_url('auth'); ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                                           <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Login</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>