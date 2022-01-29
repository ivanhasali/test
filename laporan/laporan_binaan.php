<?php include '../config/koneksi.php';
    $s = $_GET['sem'];
    $t = $_GET['thn'];
    $n = $_GET['nip'];
    $bina = mysqli_query($conn, 
        "SELECT pembinaan.*,pengawas.nama_pengawas,sekolah.nama_sekolah from pembinaan JOIN pengawas on pembinaan.nip_pengawas = pengawas.nip_pengawas JOIN sekolah on pembinaan.npsn_sekolah = sekolah.npsn where pembinaan.semester='$s' AND pembinaan.tahun_pendidikan='$t' AND pembinaan.nip_pengawas='$n' AND pembinaan.status='DISETUJUI' ");
      $no=0;
      $no2=0;
    $diri = mysqli_query($conn,"SELECT * from pengawas where nip_pengawas='$n' ")->fetch_assoc();
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
        <h4 align="center">LAPORAN DATA PEMBINAAN</h4>
        <p>NIP Pengawas : <?php echo $n; ?></p>
        <p>Nama Pengawas : <?php echo $diri['nama_pengawas']; ?></p>
        <p>Semester : <?php echo $s; ?></p>
        <p>Tahun : <?php echo $t; ?></p>
        <hr>    
        <table class="table" style="vertical-align:top;">
            <thead>
                <tr>
                    <th style="background-color: #FFFDD0;" rowspan="">Nama/Nip</th>
                    <th style="background-color: #FFFDD0;" rowspan="">Sekolah Binaan</th>
                    <th style="background-color: #FFFDD0;" colspan="">Guru Yang Dibina</th>
                </tr>

            </thead>
            <tbody>         
               
                <tr>
                    <td style="vertical-align:top;"  align="center"><?php echo $diri['nama_pengawas'] ?></td>
                    <td style="vertical-align:top;" align="center">
                        <table>
                            <?php foreach($bina as $dat): ?>
                            <tr>
                                <td><?php echo $no+=1  ?>.<?php echo $dat['nama_sekolah'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </td>
                    <td align="center">
                        <table>
                            <tr style="background-color: #FFFDD0;">
                                <td>No</td>
                                <td>Nama</td>
                                <td>NUPTK</td>
                                <td>Mapel</td>
                                <td>Sekolah</td>
                            </tr>
                            <?php foreach($bina as $dat): 
                                $id = $dat['id'];
                                $guru = mysqli_query($conn,"SELECT detail_binaan.*,guru.nama_guru,guru.mata_pelajaran,guru.mengajar_sekolah from detail_binaan INNER JOIN guru on detail_binaan.nip_guru = guru.nip_guru where detail_binaan.id_pembinaan='$id' ");
                            ?>
                                <?php foreach($guru as $gu): ?>
                                <tr>
                                    <td><?php echo $no2+=1 ?></td>
                                    <td><?php echo $gu['nama_guru'] ?></td>
                                     <td><?php echo $gu['nip_guru'] ?></td>
                                        <?php 
                                        $np = $gu['mengajar_sekolah']; 
                                        $sek = mysqli_query($conn,"SELECT * from sekolah where npsn='$np' ")->fetch_assoc(); 
                                        ?>
                                      <td><?php echo $gu['mata_pelajaran'] ?></td>
                                       <td><?php echo $sek['nama_sekolah'] ?></td>

                                </tr>
                                <?php endforeach ?>
                            <?php endforeach; ?>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>