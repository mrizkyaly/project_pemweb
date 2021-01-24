<?php  
	// Notifikasi error
	echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
	echo form_open(base_url('admin/pelanggan/tambah'),' class="form_horizontal"');
?>

<div class="card card-primary">
	<div class="card-header"></div>
	<form role="form">
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Nama Pelanggan</label>
				<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="<?php echo set_value('nama_pelanggan') ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Alamat</label>
				<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Nomor</label>
				<input type="text" name="nomor" class="form-control" placeholder="Nomor" value="<?php echo set_value('nomor') ?>" required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
	</form>
</div>

<?php echo form_close(); ?>