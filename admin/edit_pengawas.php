<?php  
	include "../config/koneksi.php";
	if (isset($_POST['id'])) {
		$id           = $_POST['id'];
		$nama   = $_POST['nama_pengawas'];
		$nip_lama   = $_POST['nip'];
		$nip_baru   = $_POST['nip_pengawas'];
		$tanggal   = $_POST['tanggal_lahir_pengawas'];
		$tempat   = $_POST['tempat_lahir_pengawas'];
		$jk   = $_POST['jenis_kelamin_pengawas'];
		$gol   = $_POST['golongan_pengawas'];
		$map   = $_POST['mata_pelajaran'];

		// perintah query untuk mengubah data pada tabel guru
		$query1 = mysqli_query($conn, "UPDATE user SET username='$nip_baru', nama='$nama' WHERE id_user='$id'
		");

		$query2 = mysqli_query($conn, "UPDATE pengawas SET nip_pengawas='$nip_baru', nama_pengawas='$nama', tanggal_lahir_pengawas='$tanggal', tempat_lahir_pengawas='$tempat', jenis_kelamin_pengawas='$jk',golongan_pengawas = '$gol', mata_pelajaran='$map' WHERE nip_pengawas='$nip_lama'
		");

	// cek query
		if ($query1 && $query2) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: daftar_pengawas.php?alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: daftar_pengawas.php?alert=1');
		}	
	}
?>