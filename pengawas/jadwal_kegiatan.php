<?php 
include '../config/koneksi.php';
include '../config/cek_pengawas.php';
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[3];
?>
<?php 
include '../layout/sidebar.php';
include '../layout/header.php';

?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <p style="font-weight: 600;">APLIKASI PENJADWALAN PEMBINAAN SEKOLAH</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Dashboard</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Data Jadwal</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php  
if (empty($_GET['alert'])) {
    echo "";
} elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
    </div>";
} elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Kegiatan berhasil disimpan.
    </div>";
} elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Kegiatan berhasil diubah.
    </div>";
} elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Kegiatan berhasil dihapus.
    </div>";
}
elseif ($_GET['alert'] == 5) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Sudah Mencapai Batas Guru Binaan.
    </div>";
}
elseif ($_GET['alert'] == 6) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Harap Memilih Maksimal 6 Guru Binaan.
    </div>";
}
?>
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 >Daftar <span class="table-project-n">Jadwal Kegiatan</span></h1>
                            <?php 
                            $idlagi = $_GET['id'];
                            $cus = mysqli_query($conn,"SELECT pembinaan.*,pengawas.nama_pengawas,sekolah.nama_sekolah from pembinaan JOIN pengawas on pembinaan.nip_pengawas = pengawas.nip_pengawas JOIN sekolah on pembinaan.npsn_sekolah = sekolah.npsn where pembinaan.id='$idlagi'   ")->fetch_assoc(); ?>
                            <p>Pengawas : <?php echo $cus['nama_pengawas'] ?></p>
                            <p>Sekolah : <?php echo $cus['nama_sekolah'] ?></p>
                            <p>Semester : <?php echo $cus['semester'] ?></p>
                            <p>Tahun : <?php  echo $cus['tahun_pendidikan'] ?></p>
                            <div class="add-product">
                                <a href="#"  data-toggle="modal" data-target="#PrimaryModalhdbgcl" class="btn btn-custon-four btn-primary"><i class="fa fa-plus edu-informatio" aria-hidden="true"></i> Tambahkan Jadwal</a href="#"> 
                                <form target="_blank" action="proses_jadwal.php" method="POST">
                                    <input type="hidden" name="idnya" value="<?php echo $_GET['id'] ?>">
                                    <button type="submit" name="cetak_jadwal"  class="btn btn-custon-four btn-success"><i class="fa fa-print edu-informatio" aria-hidden="true"></i> Cetak Data</button href="#">
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                           
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                            data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                            <thead>
                                <tr>
                  
                                    <th data-field="no">No</th>
                                    <th data-field="kegiatan_binaan">Kegiatan</th>
                                    <th data-field="penjelasan">Penjelasan</th>
                                    <th data-field="tanggal">Tanggal</th>
                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $idno = $_GET['id'];

                                $bina = mysqli_query($conn, "SELECT * from penjadwalan_binaan where id_pembinaan='$idno' ORDER BY tanggal");
                                $no=0;
                                foreach ($bina as $bin){
                                  $no++;
                                  ?>
                                <tr>
                         
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $bin['kegiatan_binaan'] ?></td>
                                    <td><?php echo $bin['penjelasan'] ?></td>
                                    <td><?php echo $bin['tanggal'] ?></td>
                                    
                                    <td class="datatable-ct">
                                        <a href="#"  data-toggle="modal" data-target="#Edit<?php echo $bin['id_penjadwalan'] ?>" class="btn btn-custon-four btn-warning"><i class="fa fa-edit edu-informatio" aria-hidden="true"></i> Edit</a href="#">

                                        <a href="proses_jadwal.php?hapus_kegiatan=<?php echo $bin['id_penjadwalan'] ?>&before=<?php echo $_GET['id'] ?>" class="btn btn-custon-four btn-danger"><i class="fa fa-trash edu-informatio" aria-hidden="true"></i> Hapus</a href="#">
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title" align="center">Tambahkan Jadwal Kegiatan</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <p>ISI DETAIL JADWAL</p>
                <hr>
                <form action="proses_jadwal.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_pembinaan" value="<?php echo $_GET['id'] ?>">
                <div class="form-group-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label class="login2 pull-right pull-right-pro">Nama Kegiatan</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <select data-placeholder="Pilih Kegiatan..." name="kegiatan_binaan" class="chosen-select" tabindex="-1">
                                <optgroup label="Pengawasan Akademik">
                                    <option>Pembinaan Guru</option>    
                                    <option>Pemantauan Pelaksanaan Staandar Nasional Pendidikan di sekolah</option>
                                    <option>Penilaian Kinerja Guru</option>
                                    <option>Pembimbingan dan Pelatihan Professional Guru</option>
                                    <option>Penilaian Kinerja Guru Pemula dalam Program Induksi Guru Pemula</option>
                                    <option>Pengawasan Pelaksanaan Program Induksi Guru Pemula</option>
                                </optgroup>
                                <optgroup label="Pengawasan Manajerial">
                                    <option>Pembinaan Kepala Sekolah</option>
                                    <option>Pemantauan Pelaksanaan Staandar Nasional Pendidikan</option>
                                    <option>Penilaian Kinerja Kepala Sekolah</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label class="login2 pull-right pull-right-pro">Deskripsi Kegiatan</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" name="penjelasan" required ></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label class="login2 pull-right pull-right-pro">Tanggal Kegiatan</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="date" name="tanggal" class="form-control"  required />
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-custon-four btn-primary btn-md" type="button" data-dismiss="modal">Cancle</button>
                <input class="btn btn-custon-four btn-primary btn-md" name="simpan_kegiatan" value="Simpan" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
     foreach ($bina as $bin){
      $no++;
      ?>
 ?>
<div id="Edit<?php echo $bin['id_penjadwalan'] ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title" align="center">Edit Jadwal Kegiatan</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <p>ISI DETAIL JADWAL</p>
                <hr>
                <form action="proses_jadwal.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="before" value="<?php echo $_GET['id'] ?>">
                <input type="hidden" name="id_penjadwalan" value="<?php echo $bin['id_penjadwalan'] ?>">
                <div class="form-group-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label class="login2 pull-right pull-right-pro">Nama Kegiatan</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo $bin['kegiatan_binaan'] ?>" name="kegiatan_binaan" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="form-group-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label class="login2 pull-right pull-right-pro">Deskripsi Kegiatan</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" name="penjelasan"><?php echo $bin['penjelasan'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label class="login2 pull-right pull-right-pro">Tanggal Kegiatan</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="date" value="<?php echo $bin['tanggal'] ?>" name="tanggal" class="form-control" />
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-custon-four btn-primary btn-md" type="button" data-dismiss="modal">Cancle</button>
                <input class="btn btn-custon-four btn-primary btn-md" name="edit_kegiatan" value="Update" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php 
include '../layout/footer.php'; 
?>
