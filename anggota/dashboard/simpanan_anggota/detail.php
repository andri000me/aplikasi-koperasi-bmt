<?php
$id_anggota=mysqli_real_escape_string($con,$_GET['id_anggota']);
$sql=mysqli_query($con,"select SUM(simpanan_anggota.jumlah) AS jumlah, anggota.id_anggota AS id_anggota, anggota.nama_lengkap AS nama_lengkap, produk_bmt.nama_produk AS nama_produk from simpanan_anggota INNER JOIN anggota on simpanan_anggota.id_anggota = anggota.id_anggota INNER join produk_bmt ON simpanan_anggota.id_produk = produk_bmt.id_produk WHERE simpanan_anggota.id_anggota = '$id_anggota' AND produk_bmt.nama_produk='Simpanan Wajib Anggota' ") or die (mysqli_error($con));
$data=mysqli_fetch_array($sql);
$total_simpanan = $data['jumlah'];

?>
<h3><i class="fa fa-angle-right"></i> Detail Simpanan Wajib</h3>

<!-- BASIC FORM ELELEMNTS -->
<hr>
	<div class="row mt">
		<div class="col-lg-12">
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Id Anggota</th>
        				<th>Nama</th>
                                        <th>Priode Bulan</th>
        				<th>Tgl Setor</th>
        				<th class="text-right">Nominal</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php
        			$no = 1;
        			$sql=mysqli_query($con,"select * from simpanan_anggota a inner join anggota b on a.id_anggota = b.id_anggota inner join produk_bmt c on a.id_produk = c.id_produk where a.id_anggota = '$id_anggota' and c.nama_produk='Simpanan Wajib Anggota' ORDER BY Tglsetor DESC ") or die (mysqli_error($con));
        			while($data = mysqli_fetch_array($sql)){
        			
        			 ?>
        			<tr>
        				<td><?php echo $no++ ?></td>
        				<td><?php echo $data['id_anggota'] ?></td>
        				<td><?php echo $data['nama_lengkap'] ?></td>
                                        <td><?php echo $data['periode_bulan'] ?></td>
        				<td><?php echo date('d-m-Y H:i:s', strtotime($data['Tglsetor'])) ?></td>
        				<td class="text-right"><?php echo 'Rp.'. number_format($data['jumlah']) ?></td>
        			</tr>
        			<?php } ?>
        			<tr>
        				<td colspan="5" align="center"><strong>Total</strong></td>
        				<td class="text-right"><strong><?php echo 'Rp.'. number_format($total_simpanan) ?></strong></td>
        			</tr>
        		</tbody>
        	</table>
		</div><!-- col-lg-12-->      	
	</div><!-- /row -->
	<div class="row mt-2 text-right" style="margin-right: 5px;">
		<a href="?page=simpanan_anggota" class="btn btn-warning">Kembali</a>
	</div>
</div>