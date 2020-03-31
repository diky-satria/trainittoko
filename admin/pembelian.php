<h2>halaman pembelian</h2>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
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
			<td><?php echo $data['tanggal_pembelian'] ?></td>
			<td><?php echo $data['total_pembelian'] ?></td>
			<td>
				<a href="" class="btn btn-info">Detail</a>
			</td>
		</tr>

		<?php } ?>

	</tbody>
</table>