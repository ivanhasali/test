<?php
    include 'guru.php';
    include '../config/koneksi.php';
    if (isset($_POST['submit_simpan'])) {
        $nip  = $_POST['nip_guru'];
        $nama = $_POST['nama_guru'];
        $tgl = $_POST['tanggal_lahir'];
        $tmp = $_POST['tempat_lahir'];
        $jk = $_POST['jenis_kelamin'];
        $sek = $_POST['mengajar_sekolah'];
        $map = $_POST['mata_pelajaran'];
        $gol = $_POST['golongan'];
        $stat = $_POST['status_guru'];

        $cek = mysqli_query($conn,"SELECT * from guru where nip_guru='$nip' ")->fetch_assoc();
        if($cek){
            header('location: daftar_guru.php?alert=6');
        }
        else{
            $guru1 = new Guru();
            $guru1->insert($nip, $nama, $tgl, $tmp, $jk, $sek, $map, $gol, $stat);
            header('location: daftar_guru.php?alert=2');
        }
        
    }
    if (isset($_POST['submit_update'])) {
        $nip_lama = $_POST['nip_lama'];
        $nip_baru  = $_POST['nip_guru'];
        $nama = $_POST['nama_guru'];
        $tgl = $_POST['tanggal_lahir'];
        $tmp = $_POST['tempat_lahir'];
        $jk = $_POST['jenis_kelamin'];
        $sek = $_POST['mengajar_sekolah'];
        $map = $_POST['mata_pelajaran'];
        $gol = $_POST['golongan'];
        $stat = $_POST['status_guru'];

        $guru2 = new Guru();
        $guru2->update($nip_lama, $nip_baru, $nama, $tgl, $tmp, $jk, $sek, $map, $gol, $stat);
        header('location: daftar_guru.php?alert=3');
    }
    if (isset($_GET['nip'])) {
        $nip = $_GET['nip'];
        $guru3 = new Guru();
        $guru3->delete($nip);
        header('location: daftar_guru.php?alert=4');
    }
?>