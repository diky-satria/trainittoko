<h2>halaman pembelian</h2>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Status</th>
			<th>Tanggal Pembelian</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

	<?php 

		$no = 1;
		$sql = $koneksi->query("SELECT * FROM pembelian
								JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
		while($data = $sql->fetch_assoc()){

	 ?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $data['nama_lengkap'] ?></td>
			<td><?php echo $data['status_pembelian'] ?></td>
			<td><?php echo $data['tanggal_pembelian'] ?></td>
			<td>Rp. <?php echo number_format($data['total_pembelian']) ?></td>
			<td>
			<?php 

				if($data['status_pembelian'] != 'pending'):
			 ?>
				<a href="index.php?halaman=detail&id=<?php echo $data['id_pembelian'] ?>" class="btn btn-info">Detail</a>
				<a href="index.php?halaman=konfirmasi&id=<?php echo $data['id_pembelian'] ?>" class="btn btn-success">Konfirmasi</a>
			<?php else: ?>
				<a href="index.php?halaman=detail&id=<?php echo $data['id_pembelian'] ?>" class="btn btn-info">Detail</a>
			<?php endif; ?>
			</td>
		</tr>

		<?php } ?>

	</tbody>
</table>