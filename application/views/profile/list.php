<!-- Account  -->
<section class="account py-5">
    <div class="container">
        <div class="welcome p-3">
            <h2>My Profile</h2>
            <p>Welcome Back, <a href="<?php echo base_url('profile') ?>"><?php echo $this->session->userdata('nama_pelanggan'); ?></a></p>
            <hr>
        </div>
        <div class="row p-3">
            <div class="col-md-4 p-3">
                <div class="card profile">
                    <div class="card-body text-center mx-4 my-2">
                        <h5 class="card-title">User Profile</h5>
                        <hr>
                        <img src="<?php echo base_url() ?>assets/pelanggan/assets/img/user1.jpg" class="img-fluid mb-3" alt="user">
                        <p class="text-muted"><?php echo $this->session->userdata('nama_pelanggan'); ?></p>
                        <p class=""><?php echo date('d M Y') ?></p>
                        <a href="#" class="btn btn-shop shadow-none" role="button" aria-pressed="true">Shop Now</a>
                        <a href="<?php echo base_url('login/logout') ?>" class="btn btn-logout shadow-none" role="button" aria-pressed="true">Log out</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 p-3">
                <div class="card address mb-3">
                    <div class="card-body mx-4 my-2">
                        <h5 class="card-title">Primary Address</h5>
                        <hr>
                        <p class="card-text"><?php echo $this->session->userdata('nama_pelanggan'); ?></p>
                        <p class="card-text"><?php echo $this->session->userdata('alamat'); ?></p>
                        <p class="card-text"><?php echo $this->session->userdata('nomor'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Account -->