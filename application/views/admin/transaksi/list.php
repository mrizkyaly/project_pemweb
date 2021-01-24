<table id="example2" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>NO</th>
			<th>GAMBAR</th>
			<th>NAMA PRODUK</th>
			<th>PEMBELI</th>
			<th>BAYAR</th>
			<th>TANGGAL</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($transaksi as $transaksi) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td>
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$transaksi->gambar) ?>" class="img img-responsive img-thumbnail" width="70">
				</td>
				<td><?php echo $transaksi->nama_produk ?></td>
				<td><?php echo $transaksi->nama_pelanggan ?></td>
				<td><?php echo $transaksi->bayar ?></td>
				<td><?php echo $transaksi->tgl_transaksi ?></td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>