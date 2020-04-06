<?php 

	$tglm = '-';
	$tgls = '-';

	if(isset($_POST['lihat'])){
		$tglm = $_POST['tglm'];
	 	$tgls = $_POST['tgls'];
		
	}
	

 ?>

 <h2>Laporan penjualan dari <?php echo $tglm ?> sampai <?php echo $tgls ?></h2>

 <div class="row">
 	<div class="col-md">
 		
 		<table class="table table-bordered">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Nama Pelanggan</th>
 					<th>Status</th>
 					<th>Tanggal</th>
 					<th>Total</th>
 				</tr>
 			</thead>
 			<tbody>

 			<?php 

 				$total = 0;
 				$no=1;
 				$sql = $koneksi->query("SELECT * FROM pembelian
 										JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
 										WHERE pembelian.tanggal_pembelian between '$tglm' AND '$tgls'");
 				while($data = $sql->fetch_assoc()){

 			 ?>

 				<tr>
 					<td><?php echo $no++ ?></td>
 					<td><?php echo $data['nama_lengkap'] ?></td>
 					<td><?php echo $data['status_pembelian'] ?></td>
 					<td><?php echo $data['tanggal_pembelian'] ?></td>
 					<td><?php echo number_format($data['total_pembelian']) ?></td>
 				</tr>

 				<?php 

 					$total = $total+$data['total_pembelian'];

 				 ?>

 			<?php } ?>

 				<tr>
 					<th colspan="4">Total</th>
 					<td><?php echo number_format($total) ?></td>
 				</tr>

 			</tbody>
 		</table>

 	</div>
 </div>