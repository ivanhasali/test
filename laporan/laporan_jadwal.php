<?php include '../config/koneksi.php';
session_start();
    $s = $_GET['id_pembinaan'];
    $nip = $_SESSION['username'];
    $diri = mysqli_query($conn,"SELECT * from pengawas where nip_pengawas='$nip' ")->fetch_assoc();

    $bina = mysqli_query($conn,"SELECT pembinaan.*,pengawas.nama_pengawas,sekolah.nama_sekolah from pembinaan JOIN pengawas on pembinaan.nip_pengawas = pengawas.nip_pengawas JOIN sekolah on pembinaan.npsn_sekolah = sekolah.npsn where pembinaan.id='$s'   ")->fetch_assoc();
    $kegiatan = mysqli_query($conn, "SELECT * from penjadwalan_binaan where id_pembinaan='$s' ");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cetak_Laporan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        @page { size: A4 }
      
        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }
      
        table {
            border-collapse: collapse;
            width: 100%;
        }
      
        .table th {
            padding: 8px 8px;
            border:1px solid #000000;
            text-align: center;
        }
      
        .table td {
            padding: 3px 3px;
            border:1px solid #000000;
        }
      
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
        <img style="width: 20%;display: block;
              margin-left: auto;
              margin-right: auto;" src="../assets/img/kab.png">
        <p align="center">PEMERINTAH KABUPATEN SIJUNJUNG <br> <font size="5em">DINAS PENDIDIKAN DAN KEBUDAYAAN</font> <br>Jl. Prof Muhammad Yamin,SH no.104 Telp (0754) 20111 Fax. (0754) 20865 <br>Muaro Sijunjung 27511</p>

        <hr>
        <h4 align="center">LAPORAN DATA KEGIATAN</h4>
        <p>NIP Pengawas : <?php echo $diri['nip_pengawas']; ?></p>
        <p>Nama Pengawas : <?php echo $diri['nama_pengawas']; ?></p>
        <p>Sekolah : <?php echo $bina['nama_sekolah'] ?></p>
        <p>Semester : <?php echo $bina['semester'] ?></p>
        <p>Tahun : <?php echo $bina['tahun_pendidikan'] ?></p>
        <hr>    
        <table class="table">
            <thead>
                <tr>
                    <th>NO.</th>
                    
                    <th>SEKOLAH</th>
                    <th>TANGGAL</th>
                    <th>KEGIATAN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=0;
                 foreach($kegiatan as $dat): ?>
                <tr>
                    <td class="text-center" width="20"><?php echo $no+=1; ?></td>
                    
                    <td align="center"><?php echo $bina['nama_sekolah'] ?></td>
                    <td align="center"><?php echo $dat['tanggal'] ?></td>
                    <td align="center"><?php echo $dat['kegiatan_binaan'] ?></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>
</html>