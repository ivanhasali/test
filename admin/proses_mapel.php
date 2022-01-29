<?php
    include 'mapel.php';
    if (isset($_POST['submit_simpan'])) {
        $kode  = $_POST['kode_mapel'];
        $mapel = $_POST['mata_pelajaran'];

        $sekolah1 = new Mapel();
        $sekolah1->insert($kode, $mapel);
        header('location: daftar_mapel.php?alert=2');
    }
    if (isset($_POST['submit_update'])) {
        $id  = $_POST['id_pelajaran'];
        $kode  = $_POST['kode_mapel'];
        $mapel = $_POST['mata_pelajaran'];


        $sekolah2 = new Mapel();
        $sekolah2->update($id, $kode, $mapel);
        header('location: daftar_mapel.php?alert=3');
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sekolah3 = new Mapel();
        $sekolah3->delete($id);
        header('location: daftar_mapel.php?alert=4');
    }
?>