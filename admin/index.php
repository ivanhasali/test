<?php 
	include '../config/koneksi.php';
	include '../config/cek_admin.php';
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
                                        <li><span class="bread-blod">Dashboard</span>
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
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Permohonan Binaan berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Permohonan Binaan berhasil Disetujui.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Permohonan Binaan berhasil dihapus.
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
    <div class="edu-accordion-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>~ SELAMAT DATANG ~</h2>
                            <img style="width: 10%;display: block;
  margin-left: auto;
  margin-right: auto;" src="../assets/img/kab.png">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1 >Daftar <span class="table-project-n">Permohonan Binaan :</span></h1>
                                
                                <div class="add-product">
                                    
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
                                            <th data-field="123">Pengawas</th>
                                            <th data-field="npsn_sekolah">Sekolah Binaan</th>
                                            <th data-field="nip_pengawas">Semester</th>
                                            <th data-field="npsn_sekolah">Tahun</th>    
                                            <th data-field="nip_guru">Guru Binaan</th>
                                            <th data-field="status">Status Permohonan</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $ni = $_SESSION['username'];

                                              $bina = mysqli_query($conn, 
                                                "SELECT pembinaan.*,pengawas.nama_pengawas,sekolah.nama_sekolah from pembinaan JOIN pengawas on pembinaan.nip_pengawas = pengawas.nip_pengawas JOIN sekolah on pembinaan.npsn_sekolah = sekolah.npsn where pembinaan.status='MENUNGGU PERSETUJUAN' ORDER BY tahun_pendidikan");
                                              $no=0;
                                              foreach ($bina as $bin){
                                              $no++;
                                        ?>
                                        <tr>
                                    
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $bin['nama_pengawas'] ?></td>
                                            <td><?php echo $bin['nama_sekolah'] ?></td>
                                            <td><?php echo $bin['semester'] ?></td>
                                            <td><?php echo $bin['tahun_pendidikan'] ?></td>
                                            <?php 
                                            $id = $bin['id'];
                                            $guru = mysqli_query($conn, 
                                                "SELECT detail_binaan.*,guru.nama_guru from detail_binaan INNER JOIN guru on detail_binaan.nip_guru = guru.nip_guru where detail_binaan.id_pembinaan='$id' "); ?>
                                            <td>
                                            <?php foreach($guru as $gu) : ?>
                                                <p><?php echo $gu['nama_guru'] ?> </p>
                                            <?php endforeach; ?>
                                                
                                            </td>
                                            <td><?php echo $bin['status'] ?></td>
                                            <td class="datatable-ct">
                                                <a href="proses_binaan.php?idkonfir=<?php echo $bin['id'] ?>" class="btn btn-custon-four btn-success"><i class="fa fa-check edu-informatio" aria-hidden="true"></i> Setujui</a href="#">

                                                <a href="proses_binaan.php?idhapus2=<?php echo $bin['id'] ?>" class="btn btn-custon-four btn-danger"><i class="fa fa-trash edu-informatio" aria-hidden="true"></i> Tolak</a href="#">
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
<?php 
	include '../layout/footer.php'; 
?>
