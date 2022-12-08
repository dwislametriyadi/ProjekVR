<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM produk_wisata WHERE id_produk='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }     
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<input type='hidden' class="form-control" name="id_produk" value="<?php echo $data_cek['id_produk']; ?>"
			 readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Produk</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_produk" name="nama_produk"value="<?php echo $data_cek['nama_produk']; ?>" required=""
					/>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Deskripsi Produk</label>
				<div class="col-sm-6">
                    <textarea type="text" class="form-control" name="deskripsi_produk" id="deskripsi_produk" cols="70" rows="10" value="<?php echo $data_cek['deskripsi_produk']; ?>"></textarea>
					
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Gambar Produk</label>
				<img src="gambar/<?php echo $data_cek['gambar_produk']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                <div class="col-sm-6">
					<input type="file" class="form-control" id="gambar_produk" name="gambar_produk" />
                    <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak ingin merubah gambar produk</i>
				</div>
			</div>

			
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-produk" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>



<?php


if (isset ($_POST['Ubah'])){
// membuat variabel untuk menampung data dari form
$id_produk = $_POST['id_produk'];
$nama_produk   = $_POST['nama_produk'];
$deskripsi_produk     = $_POST['deskripsi_produk'];
$ukuranFile = $_FILES['gambar_produk']['size'];
$gambar_produk = $_FILES['gambar_produk']['name'];
//cek dulu jika merubah gambar produk jalankan coding ini
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
    $query  = "UPDATE produk_wisata SET nama_produk = '$nama_produk', deskripsi_produk = '$deskripsi_produk'";
    $query .= "WHERE id_produk = '$id_produk'";
    $result = mysqli_query($koneksi, $query);
	if($result){
		echo "<script>alert('Data berhasil diubah.');window.location='index.php?page=data-produk';</script>";
		}
	}else{
	//ukuran tidak sesuai
		echo "<script>alert('UKURAN FILE TERLALU BESAR, MAX. 5MB');window.location='index.php?page=edit-produk';</script>";
		}
	} else {    
    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
      	echo "<script>alert('Ekstensi gambar yang boleh hanya png, jpg, dan png.');window.location='index.php?page=edit-produk';</script>";
    	}
    } else {
        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query  = "UPDATE produk_wisata SET nama_produk = '$nama_produk', deskripsi_produk = '$deskripsi_produk'";
        $query .= "WHERE id_produk = '$id_produk'";
        $result = mysqli_query($koneksi, $query);
        // periska query apakah ada error
        if(!$result){
    
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                 " - ".mysqli_error($koneksi));
        } else {
    
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
              echo "<script>alert('Data berhasil diubah.');window.location='index.php?page=data-produk';</script>";
        }
    } 
}
//selesai proses edit data