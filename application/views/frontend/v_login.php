<div class="container" style="min-height: 80vh; display: flex; align-items: center;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center" style="background-color: #0A2647; color: white;">
                    <h3 class="my-4">LOGIN</h3>
                </div>
                <div class="card-body p-4">
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