<p>
    <a href="<?php echo base_url('admin/produk/tambah')?>" class="btn btn-success btn-sm">
        <i class="nav-icon fa fa-plus"></i> 
		Tambah Produk
    </a>
</p>

<?php 
    // Notifikasi sukses
    if ($this->session->flashdata('sukses')) {
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
    }
?>

<table id="example2" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>NO</th>
			<th>GAMBAR</th>
			<th>NAMA</th>
			<th>KATEGORI</th>
			<th>SIZE</th>
			<th>HARGA</th>
			<th>USER</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($produk as $produk) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td>
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail" width="70">
				</td>
				<td><?php echo $produk->nama_produk ?></td>
				<td><?php echo $produk->nama_kategori ?></td>
				<td><?php echo $produk->size ?></td>
				<td><?php echo number_format($produk->harga,'0',',','.') ?></td>
				<td><?php echo $produk->username ?></td>
				<td>
					<a href="<?php echo base_url('admin/produk/edit/'.$produk->id_produk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php include('delete.php') ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>