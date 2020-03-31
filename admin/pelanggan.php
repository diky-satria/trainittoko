<h2>halaman pelanggan</h2>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Email</th>
			<th>Nama</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

	<?php 

		$no = 1;
		$sql = $koneksi->query("SELECT * FROM pelanggan");
		while($data = $sql->fetch_assoc()){

	 ?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $data['email_pelanggan'] ?></td>
			<td><?php echo $data['nama_lengkap'] ?></td>
			<td><?php echo $data['telepon_pelanggan'] ?></td>
			<td>
				<a href="" class="btn btn-success">Ubah</a>
				<a href="" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

		<?php } ?>

	</tbody>
</table>