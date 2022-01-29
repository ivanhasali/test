<?php 
	include "../config/koneksi.php";
	$username   = $_POST['username'];
	$nama   = $_POST['nama'];
	$level   = $_POST['level'];
    $password   = sha1($_POST['password']);

    $query = mysqli_query($conn, "INSERT INTO user(username,
													 nama,
													 password,
													 level)	
											  VALUES('$username',
													 '$nama',
													 '$password',
													 '$level')");
    if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: daftar_pengguna.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: daftar_pengguna.php?alert=1');
	}	
?>