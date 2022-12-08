<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-chart-pie"></i> Produk wisata</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=tambah-produk" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>						
						<th>Nama Produk</th>
						<th>Deskripsi</th>
						<th>Gambar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from produk_wisata");
              while ($data= $sql->fetch_assoc()) {
            ?>
					<tr>
						<td><?php echo $no++; ?></td>						
						<td><?php echo $data['nama_produk']; ?></td>
						<td><?php echo substr($data['deskripsi_produk'], 0, 20); ?>...</td>
						<!-- <td><?php echo $data['deskripsi_produk']; ?></td> -->

						<td style="text-align: center;"><img src="gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px;"></td>					
						<td>
							<a href="?page=edit-produk&kode=<?php echo $data['id_produk']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=hapus-produk&kode=<?php echo $data['id_produk']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->