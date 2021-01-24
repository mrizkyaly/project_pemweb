<p>
    <a href="<?php echo base_url('admin/pelanggan/tambah')?>" class="btn btn-success btn-sm">
        <i class="nav-icon fa fa-plus"></i> 
		Tambah Pelanggan
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
			<th>NAMA PELANGGAN</th>
			<th>ALAMAT</th>
			<th>NOMOR</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($pelanggan as $pelanggan) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $pelanggan->username ?></td>
				<td><?php echo $pelanggan->nama_pelanggan ?></td>
				<td><?php echo $pelanggan->alamat ?></td>
				<td><?php echo $pelanggan->nomor ?></td>
				<td>
					<a href="<?php echo base_url('admin/pelanggan/edit/'.$pelanggan->id_pelanggan) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php include('delete.php') ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>