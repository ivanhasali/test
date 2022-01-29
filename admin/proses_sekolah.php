<?php
    include 'sekolah.php';
    include '../config/koneksi.php';
    if (isset($_POST['submit_simpan'])) {
        $npsn  = $_POST['npsn'];
        $nama = $_POST['nama_sekolah'];
        $no = $_POST['nomortlp_sekolah'];
        $ala = $_POST['alamat_sekolah'];
        $kepala = $_POST['kepala_sekolah'];
        $stat = $_POST['status_sekolah'];

        $cek = mysqli_query($conn,"SELECT * from sekolah where npsn='$npsn' ")->fetch_assoc();
        if($cek){
            header('location: daftar_sekolah.php?alert=6');
        }
        else{
            $sekolah1 = new Sekolah();
            $sekolah1->insert($npsn, $nama, $no, $ala, $kepala, $stat);
            header('location: daftar_sekolah.php?alert=2');
        }
        
    }
    if (isset($_POST['submit_update'])) {
        $npsn_lama  = $_POST['npsn_lama'];
        $npsn_baru  = $_POST['npsn_baru'];
        $nama = $_POST['nama_sekolah'];
        $no = $_POST['nomortlp_sekolah'];
        $ala = $_POST['alamat_sekolah'];
        $kepala = $_POST['kepala_sekolah'];
        $stat = $_POST['status_sekolah'];

        $sekolah2 = new Sekolah();
        $sekolah2->update($npsn_lama, $npsn_baru, $nama, $no, $ala, $kepala, $stat);
        header('location: daftar_sekolah.php?alert=3');
    }
    if (isset($_GET['npsn'])) {
        $npsn = $_GET['npsn'];
        $sekolah3 = new Sekolah();
        $sekolah3->delete($npsn);
        header('location: daftar_sekolah.php?alert=4');
    }
?>