
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Produk Wisata</h3>
	</div>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-6">
					<input type="hidden" class="form-control" id="id_produk" name="id_produk"  required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Produk </label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="nama produk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Deskripsi </label>
				<div class="col-sm-6">
        <textarea  name="deskripsi_produk" id="deskripsi_produk" cols="70" rows="10"></textarea>
				</div>
			</div>

			<div>
        <label>Gambar Produk</label>
        <input type="file" id="gambar_produk" name="gambar_produk" required="" />
      </div>

			
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-produk" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>
<?php

    if (isset ($_POST['Simpan'])){
    // membuat variabel untuk menampung data dari form
  $nama_produk   = $_POST['nama_produk'];
  $deskripsi_produk = $_POST['deskripsi_produk'];
  $ukuranFile = $_FILES['gambar_produk']['size'];
  $gambar_produk = $_FILES['gambar_produk']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_produk != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $ukuranFile = $_FILES['gambar_produk']['size'];
  $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)
  {
    //uji jika ukuran file dibawah 5mb
	if($ukuranFile < 5999999){
	//jika ukuran sesuai
	move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
    $query = "INSERT INTO produk_wisata (nama_produk, deskripsi_produk,  gambar_produk) VALUES ('$nama_produk', '$deskripsi_produk',  '$nama_gambar_baru')";
    $result = mysqli_query($koneksi, $query);
	if($result){
		echo "<script>alert('Data berhasil ditambah.');window.location='index.php?page=data-produk';</script>";
		}
	}else{
	//ukuran tidak sesuai
		echo "<script>alert('UKURAN FILE TERLALU BESAR, MAX. 5MB');window.location='index.php?page=tambah-produk';</script>";
		}
	} else {    
    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
      	echo "<script>alert('Ekstensi gambar yang boleh hanya png, jpg, dan png.');window.location='index.php?page=tambah-produk';</script>";
    	}
  } 
}
//selesai proses tambah data