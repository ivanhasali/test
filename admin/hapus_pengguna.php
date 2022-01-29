<?php
// Panggil koneksi database
include "../config/koneksi.php";

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	// perintah query untuk menghapus data pada tabel guru
	$query = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: daftar_pengguna.php?alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: daftar_pengguna.php?alert=1');
	}	
}							
?>