<?php 
	include '../config/koneksi.php';
	include 'penjadwalan.php';


    if (isset($_POST['simpan_kegiatan'])) {
        $id_pembinaan = $_POST['id_pembinaan'];
        $nake = $_POST['kegiatan_binaan'];
        $ket = $_POST['penjelasan'];
        $tgl = $_POST['tanggal'];

        $tambah = new Penjadwalan;
        $tambah->insert($id_pembinaan,$nake,$ket,$tgl);
        header('location: jadwal_kegiatan.php?id='.$id_pembinaan.'&alert=2');
    }
    if (isset($_POST['edit_kegiatan'])) {
        $id_penjadwalan = $_POST['id_penjadwalan'];
        $before = $_POST['before'];
        $nake = $_POST['kegiatan_binaan'];
        $ket = $_POST['penjelasan'];
        $tgl = $_POST['tanggal'];

        $edit = new Penjadwalan;
        $edit->update($id_penjadwalan,$nake,$ket,$tgl);
        header('location: jadwal_kegiatan.php?id='.$before.'&alert=3');
    }
   	


    if (isset($_GET['id_penjadwalan'])) {
        $id = $_GET['id_penjadwalan'];
        
        header('location: jadwal_kegiatan.php?id='.$id);
    }
    if (isset($_POST['cetak_submit'])) {
       	$sem  = $_POST['ctk_sem'];
        $thn  = $_POST['ctk_th'];
        $nip  = $_POST['ctk_nip'];
        header('location: ../laporan/laporan_binaan.php?sem='.$sem.'&thn='.$thn.'&nip='.$nip);
    }

    if (isset($_POST['cetak_jadwal'])) {
        $id_pembinaan  = $_POST['idnya'];
        header('location: ../laporan/laporan_jadwal.php?id_pembinaan='.$id_pembinaan);
    }

    if (isset($_GET['idhapus'])) {
        $sem  = $_GET['semester'];
        $thn  = $_GET['tahun'];
        $nip  = $_GET['nip'];
        $id = $_GET['idhapus'];
        $bina2 = new Penjadwalan();
        $bina2->deleteBinaan($id);
        header('location: daftar_jadwal.php?alert=4');
    }	
    if (isset($_GET['hapus_kegiatan'])) {
        $id  = $_GET['hapus_kegiatan'];
        $bef = $_GET['before'];
        $bina3 = new Penjadwalan();
        $bina3->deleteKegiatan($id);
        header('location: jadwal_kegiatan.php?id='.$bef.'&alert=4');
    }   
?>