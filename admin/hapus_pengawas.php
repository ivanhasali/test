<?php
// Panggil koneksi database
include "../config/koneksi.php";

if (isset($_GET['nip'])) {

	$nip = $_GET['nip'];
	$id = $_GET['id'];
	// perintah query untuk menghapus data pada tabel guru
	$query1 = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id'");
	$query2 = mysqli_query($conn, "DELETE FROM pengawas WHERE nip_pengawas='$nip'");
	// cek hasil query
	if ($query1 && $query2) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: daftar_pengawas.php?alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: daftar_pengawas.php?alert=1');
	}	
}							
?>