<h2>Data produk</h2>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Berat Produk</th>
			<th>Foto Produk</th>
			<th>Deskripsi Produk</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

	<?php 

		$no = 1;
		$sql = $koneksi->query("SELECT * FROM produk");
		while($data = $sql->fetch_assoc()){

	 ?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $data['nama_produk'] ?></td>
			<td><?php echo number_format($data['harga_produk'], '0','.','.') ?></td>
			<td><?php echo $data['berat_produk'] ?></td>
			<td>
				<img width="60" src="../foto/<?php echo $data['foto_produk'] ?>">
			</td>
			<td><?php echo $data['deskripsi_produk'] ?></td>
			<td>
				<a href="" class="btn btn-success">Ubah</a>
				<a href="" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

		<?php } ?>

	</tbody>
</table>
<a href="index.php?halaman=tambahProduk" class="btn btn-primary">Tambah</a>