<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM produk_wisata WHERE id_produk='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>
                alert('Data Berhasil Dihapus');
                        window.location = 'index.php?page=data-produk';
                    </script>";
                }else{
                echo "<script>
                alert('Data Gagal Dihapus');
                        window.location = 'index.php?page=data-produk';
                    </script>";
            }
        }

