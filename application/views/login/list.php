<!-- login -->
    <div class="login">
        <div class="container p-5 d-flex justify-content-center">
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title text-center">Log in</h4>
                    <p class="text-center">Please enter your e-mail and password :</p>
                    <?php 
                        // Motifikasi eror
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">','</div>');
                        
                        // form open login
                        echo form_open(base_url('login'));

                        // Notifikasi gagal login
                        if ($this->session->flashdata('warning')) {
                            echo '<div class="alert alert-danger alert-dismissible">';
                            echo $this->session->flashdata('warning');
                            echo '</div';
                        }
                        // Notifikasi logout
                        if ($this->session->flashdata('sukses')) {
                            echo '<div class="alert alert-success">';
                            echo $this->session->flashdata('sukses');
                            echo '</div';
                        }
                    ?>
                    <form class="">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" class="form-control shadow-none" placeholder="Username" type="text">
                        </div> 
                        <div class="form-group">
                            <a class="float-right" href="#">Forgot?</a>
                            <label for="password">Password</label>
                            <input name="password" class="form-control shadow-none" placeholder="Password" type="password">
                        </div> 
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-login"> Login </button>
                        </div> 
                        <p class="text-center register">Don't have an account ? <a href="<?php echo base_url('register') ?>"> Create one</a>
                        </p>
                    </form>
                </article>
            </div>
        </div>
    </div>
    <!-- end login -->