<p>
    <a href="<?php echo base_url('admin/kategori/tambah')?>" class="btn btn-success btn-sm">
        <i class="nav-icon fa fa-plus"></i> 
		Tambah Kategori
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
			<th>USERNAME</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($kategori as $kategori) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $kategori->nama_kategori ?></td>
				<td>
					<a href="<?php echo base_url('admin/kategori/edit/'.$kategori->id_kategori) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php include('delete.php') ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>