<?php 

	$id = $_GET['id'];
	$sql = $koneksi->query("SELECT * FROM pembelian
							JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
							WHERE pembelian.id_pembelian='$id'");
	$data = $sql->fetch_assoc();

 ?>
<h2>Data detail</h2>

<pre><?php print_r($data); ?></pre>

<strong><?php echo $data['nama_lengkap'] ?></strong>
<p>
	<?php echo $data['telepon_pelanggan'] ?><br>
	<?php echo $data['email_pelanggan'] ?>
</p>
<p>
	Tanggal : <?php echo date('d-M-Y', strtotime($data['tanggal_pembelian'])) ?><br>
	Total   : Rp.&nbsp;&nbsp;<?php echo number_format($data['total_pembelian'], '0','.','.') ?>
</p>

<table class="table table-bordered table-stripped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Sub-Total</th>
		</tr>
	</thead>
	<tbody>

		<?php 

			$no =1;
			$sql2 = $koneksi->query("SELECT * FROM pembelian_produk
									JOIN produk ON pembelian_produk.id_produk=produk.id_produk
									WHERE pembelian_produk.id_pembelian='$id'");
			while($data2 = $sql2->fetch_assoc()){
				$subTotal = $data2['harga_produk']*$data2['jumlah']
		 ?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $data2['nama_produk'] ?></td>
			<td><?php echo number_format($data2['harga_produk'], '0','.','.') ?></td>
			<td><?php echo $data2['jumlah'] ?></td>
			<td><?php echo number_format($subTotal, '0','.','.') ?></td>
		</tr>

		<?php } ?>

	</tbody>
</table>