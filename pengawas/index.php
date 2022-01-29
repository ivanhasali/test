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
                            <h1 >Daftar <span class="table-project-n">Binaan</span></h1>
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
                                    <th data-field="nip_pengawas">Pengawas</th>
                                    <th data-field="npsn_sekolah">Sekolah Binaan</th>
                                    <th data-field="nip_pengawas">Semester</th>
                                    <th data-field="12312">Tahun</th>
                                    <th data-field="nip_guru">Guru</th>

                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $ni = $_SESSION['username'];

                                $bina = mysqli_query($conn, 
                                    "SELECT pembinaan.*,pengawas.nama_pengawas,sekolah.nama_sekolah from pembinaan JOIN pengawas on pembinaan.nip_pengawas = pengawas.nip_pengawas JOIN sekolah on pembinaan.npsn_sekolah = sekolah.npsn where pembinaan.nip_pengawas='$ni' AND pembinaan.status='DISETUJUI' ");
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
                                                <p><?php echo $gu['nama_guru'] ?> <a href="#" data-toggle="modal" data-target="#Show<?php echo $gu['nip_guru'] ?>"><i style="color: green;" class="fa fa-edit fa-2x"></i></a></p>
                                            <?php endforeach; ?>

                                        </td>
                                        <td class="datatable-ct">
                                            <a href="proses_jadwal.php?semester=<?php echo $_GET['semester'] ?>&tahun=<?php echo $_GET['tahun'] ?>&nip=<?php echo $_SESSION['username'] ?>&idhapus=<?php echo $bin['id'] ?>" class="btn btn-custon-four btn-danger"><i class="fa fa-trash edu-informatio" aria-hidden="true"></i> Hapus</a href="#">
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
$lah = mysqli_query($conn,"SELECT guru.*,sekolah.nama_sekolah from guru INNER JOIN sekolah on guru.mengajar_sekolah = sekolah.npsn");
foreach ($lah as $la){
    ?>
    <div id="Show<?php echo $la['nip_guru'] ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title" align="center">Detail Guru</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <p>Profil Guru</p>
                    <hr>


                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">NIP</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $la['nip_guru'] ?>"  disabled class="form-control" />
                            </div>  
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Nama</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $la['nama_guru'] ?>" disabled class="form-control" />
                            </div>
                        </div>
                    </div>  
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Tanggal Lahir</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $la['tanggal_lahir'] ?>" disabled class="form-control" />
                            </div>
                        </div>
                    </div>  
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Tempat Lahir</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $la['tempat_lahir'] ?>" disabled class="form-control" />
                            </div>
                        </div>
                    </div>   
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Jenis Kelamin</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $la['jenis_kelamin'] ?>" disabled class="form-control" />
                            </div>
                        </div>
                    </div>    
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Mata Pelajaran</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $la['mata_pelajaran'] ?>" disabled class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Golongan</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $la['golongan'] ?>" disabled class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Status</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $la['status_guru'] ?>" disabled class="form-control" />
                            </div>
                        </div>
                    </div> 
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Asal Sekolah</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $la['mengajar_sekolah'] ?>" disabled class="form-control" />
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button class="btn btn-custon-four btn-primary btn-md" type="button" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php 
	include '../layout/footer.php'; 
?>
