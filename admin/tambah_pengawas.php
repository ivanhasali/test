<?php 
	include "../config/koneksi.php";
	$nama   = $_POST['nama_pengawas'];
	$nip   = $_POST['nip_pengawas'];
	$tanggal   = $_POST['tanggal_lahir_pengawas'];
	$tempat   = $_POST['tempat_lahir_pengawas'];
	$jk   = $_POST['jenis_kelamin_pengawas'];
	$gol   = $_POST['golongan_pengawas'];
	$map   = $_POST['mata_pelajaran'];
    $password   = sha1($_POST['password']);
    $cek = mysqli_query($conn,"SELECT * from pengawas where nip_pengawas='$nip' ")->fetch_assoc();

    if($cek){
    	header('location: daftar_pengawas.php?alert=6');
    }

    else{
    	$query1 = mysqli_query($conn, "INSERT INTO user(username,
													 nama,
													 password,
													 level)	
											  VALUES('$nip',
													 '$nama',
													 '$password',
													 'PENGAWAS')");
	    $cari = mysqli_query($conn, "SELECT * from user where nama='$nama'");
	    $row   = mysqli_fetch_row($cari);
	    $idnya = $row[0];
	    $in = "INSERT INTO pengawas(nip_pengawas,id_user, nama_pengawas, tanggal_lahir_pengawas, tempat_lahir_pengawas,jenis_kelamin_pengawas,golongan_pengawas,mata_pelajaran) VALUES('$nip','$idnya', '$nama', '$tanggal', '$tempat','$jk','$gol','$map')";
	    $query2 = mysqli_query($conn, 
	    	$in);
	    if ($query1 && $query2) {
			// jika berhasil tampilkan pesan berhasil insert data
			header('location: daftar_pengawas.php?alert=2');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: daftar_pengawas.php?alert=1');
		}	
    }
    
   
?>