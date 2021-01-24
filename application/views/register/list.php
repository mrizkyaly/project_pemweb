<!-- Register -->
	<div class="register">
		<div class="container p-5 d-flex justify-content-center">
			<div class="card">
				<article class="card-body">	
					<h4 class="card-title text-center">Register</h4>
					<p class="text-center">Please fill in the information below :</p>
					<?php 
						// Notifikasi error
						echo validation_errors('<div class="alert alert-warning">','</div>');

						// Form Open
						echo form_open(base_url('register'),' class="form_horizontal"');
					?>
					<?php
						if ($this->session->flashdata('sukses')) {
							echo '<div class="alert alert-success">';
							echo $this->session->flashdata('sukses');
							echo '</div';
						}
					?>
					<form class="">
						<div class="form-group">
							<label for="username">Username</label>
							<input name="username" class="form-control shadow-none" placeholder="Username" type="text" value="<?php echo set_value('username') ?>" required >
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input name="password" class="form-control shadow-none" placeholder="Password" type="password" value="<?php echo set_value('password') ?>" required>
						</div>
						<div class="form-group">
							<label for="nama_pelanggan">Nama Pelanggan</label>
							<input name="nama_pelanggan" class="form-control shadow-none" placeholder="Nama Pelanggan" type="text" value="<?php echo set_value('nama_pelanggan') ?>" required >
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input name="alamat" class="form-control shadow-none" placeholder="Alamat" type="text" value="<?php echo set_value('alamat') ?>" required>
						</div>
						<div class="form-group">
							<label for="nomor">Nomor</label>
							<input name="nomor" class="form-control shadow-none" placeholder="Nomor" type="text" value="<?php echo set_value('nomor') ?>" required>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-login"> Register Now </button>
						</div>
						<p class="text-center register">Already have an account ? <a href="<?php echo base_url('login') ?>"> Log in</a>
						</p>
					</form>
				</article>
			</div>
		</div>
	</div>
	<!-- end register -->
<?php echo form_close(); ?>