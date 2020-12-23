<?php
  //Errro upload
  if (isset($error)) {
   	echo '<p class="alert-warning">';
   	echo $error;
   	echo '</p>';  
  } 
	// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->id_produk),' class="form_horizontal"');
?>

<div class="card card-primary">
	<div class="card-header"></div>
	<form role="form">
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Nama Produk</label>
				<input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo $produk->nama_produk ?>" required>
			</div>
			<div class="form-group">
				<label>Kategri Produk</label>
				<select name="id_kategori"class="form-control">
					<?php foreach ($kategori as $kategori) {?>
						<option value="<?php echo $kategori->id_kategori ?>" <?php if($produk->id_kategori==$kategori->id_kategori) { echo "selected"; } ?>>
							<?php echo $kategori->nama_kategori ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Size Produk</label>
				<input type="text" name="size" class="form-control" placeholder="Size Produk" value="<?php echo $produk->size ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Harga Produk</label>
				<input type="text" name="harga" class="form-control" placeholder="harga Produk" value="<?php echo $produk->harga ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputFile">File input</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="gambar" class="custom-file-input" id="exampleInputFile">
						<label class="custom-file-label" for="exampleInputFile">Choose file</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
	</form>
</div>

<?php echo form_close(); ?>