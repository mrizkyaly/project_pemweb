<?php  
	// Notifikasi error
	echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
	echo form_open(base_url('admin/user/edit/' .$user->id_user), 'class="form-horizontal"');
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title"><?php echo $title ?></h3>
	</div>
	<form role="form">
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo $user->username ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Masukkan Password" value="<?php echo $user->password ?>" required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
				<button type="reset" name="reset" class="btn btn-info"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
	</form>
</div>

<?php echo form_close(); ?>