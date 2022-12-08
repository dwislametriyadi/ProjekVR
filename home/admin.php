<?php
//untuk menampilkan berapa data yang masuk dimasing masing menu yang ada dbagian dashboard
$sql = $koneksi->query("SELECT COUNT(id_produk) as produk  from produk_wisata ");
while ($data= $sql->fetch_assoc()){
	$produk_wisata=$data['produk'];
}
$sql = $koneksi->query("SELECT COUNT(id_pengguna) as tb_pengguna  from tb_pengguna ");
while ($data= $sql->fetch_assoc()) {
    $login=$data['tb_pengguna'];
}

 
?>


<!-- ./col -->
<div class="row">

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>
					<?php echo $login;  ?>
				</h3>

				<p>User</p>
			</div>
			<div class="icon">
				<i class="fas fa-chalkboard-teacher"></i>
			</div>
			<a href="index.php?page=data-user" class="small-box-footer">View Details
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

<!-- ./col -->	
	<div class="col-lg-3 col-6">
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
					<?php echo $produk_wisata;  ?>
				</h3>

				<p>Produk Wisata</p>
			</div>
			<div class="icon">
				<i class="fas far fa-chart-pie"></i>
			</div>
			<a href="index.php?page=data-produk" class="small-box-footer">View Details
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>

