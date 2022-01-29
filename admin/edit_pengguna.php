<?php  
	include "../config/koneksi.php";
	if (isset($_POST['id_user'])) {
		$id           = $_POST['id_user'];
		$username   = $_POST['username'];
		$nama   = $_POST['nama'];
		$level   = $_POST['level'];

		// perintah query untuk mengubah data pada tabel guru
		$query = mysqli_query($conn, " 
			UPDATE user 
			SET username='$username', nama='$nama', level='$level' WHERE id_user='$id'
		");

	// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: daftar_pengguna.php?alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: daftar_pengguna.php?alert=1');
		}	
	}
?>