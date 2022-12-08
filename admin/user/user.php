<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-chalkboard-teacher"></i> Data User</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=tambah-user" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Nama</th>
						<TH>Username</TH>
					    <th>Password</th>
					    <th>Level</th>
						<th><center>aksi</center></th>
					</tr>
				</thead>
				<tbody>
					<?php
              $no = 1;
			  $sql = $koneksi->query("select * from tb_pengguna");
              while ($data= $sql->fetch_assoc()) {
            ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $data['nama_pengguna'] ?></td>
						<td><?php echo $data['username'] ?></td>
					    <td><?php echo $data['password'] ?></td>
					    <td><?php echo $data['level'] ?></td>						
						<td>
							<a href="?page=edit-user&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=hapus-user&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
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