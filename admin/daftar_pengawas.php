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
                                        <li><span class="bread-blod">Daftar Pengawas</span>
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
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Pengawas berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Pengawas berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Pengawas berhasil dihapus.
          </div>";
  }
  elseif ($_GET['alert'] == 6) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> NIP Sudah Terdaftar.
          </div>";
  }
?>
            <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1 >Daftar <span class="table-project-n">Pengawas</span></h1>
                                    
                                    <div class="add-product">
                                        <a href="#"  data-toggle="modal" data-target="#PrimaryModalhdbgcl" class="btn btn-custon-four btn-primary"><i class="fa fa-plus edu-informatio" aria-hidden="true"></i> Tambahkan Pengawas</a href="#">
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
                                                <th data-field="nip_pengawas">NIP</th>
                                                <th data-field="nama_pengawas" data-editable="false">Nama</th>
                                                <th data-field="username">Username</th>
                                                <th data-field="tanggal_lahir_pengawas" data-editable="false">Tanggal Lahir</th>
                                                <th data-field="tempat_lahir_pengawas" data-editable="false">Tempat Lahir</th>
                                                <th data-field="jenis_kelamin_pengawas" data-editable="false">Jenis Kelamin</th>
                                                <th data-field="golongan_pengawas" data-editable="false">Golongan</th>
                                                <th data-field="mata_pelajaran" data-editable="false">Mata Pelajaran</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
                                                $mapels = mysqli_query($conn, "SELECT * from mata_pelajaran");
                                        		  $pengawas = mysqli_query($conn, "SELECT pengawas.*,user.username from pengawas INNER JOIN user on pengawas.id_user = user.id_user");
                                                  $no=0;
                                                  foreach ($pengawas as $row){
                                                  $no++;
                                        	?>
                                            <tr>
                                              
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row['nip_pengawas'] ?></td>
                                                <td><?php echo $row['nama_pengawas'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><?php echo $row['tanggal_lahir_pengawas'] ?></td>
                                                <td><?php echo $row['tempat_lahir_pengawas'] ?></td>
                                                <td><?php echo $row['jenis_kelamin_pengawas'] ?></td>
                                                <td><?php echo $row['golongan_pengawas'] ?></td>
                                                <td><?php echo $row['mata_pelajaran'] ?></td>
                                                <td class="datatable-ct">
                                                    <a href="#"  data-toggle="modal" data-target="#ModalEdit<?php echo $row['nip_pengawas'] ?>" class="btn btn-custon-four btn-warning"><i class="fa fa-edit edu-informatio" aria-hidden="true"></i> Edit</a href="#">
                                                    <a href="hapus_pengawas.php?nip=<?php echo $row['nip_pengawas'] ?>&id=<?php echo $row['id_user'] ?>" class="btn btn-custon-four btn-danger"><i class="fa fa-trash edu-informatio" aria-hidden="true"></i> Hapus</a href="#">
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
        <!-- Static Table End -->
        <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title" align="center">Tambahkan Data Pengawas</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>ISI DETAIL AKUN</p>
                        <hr>
                        <form action="tambah_pengawas.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nip Pengawas</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="nip_pengawas" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nama Pengawas</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="nama_pengawas" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Password</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="password" name="password" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Tempat Lahir</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="tempat_lahir_pengawas" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Tanggal Lahir</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="date" name="tanggal_lahir_pengawas" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Jenis Kelamin</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-select-list">
                                        <select name="jenis_kelamin_pengawas" class="form-control custom-select-value" name="account" required >
                                                <option>Laki-laki</option>
                                                <option>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Golongan</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="golongan_pengawas" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Mata Pelajaran</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-select-list">
                                        <select name="mata_pelajaran" class="form-control custom-select-value" name="account" required >
                                                <?php foreach ($mapels as $map) { ?>
                                                    <option><?php echo $map['mata_pelajaran']; ?></option>
                                                <?php } ?>
                                                
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-custon-four btn-primary btn-md" type="button" data-dismiss="modal">Cancle</button>
                        <button class="btn btn-custon-four btn-primary btn-md" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
              foreach ($pengawas as $row){
        ?>
        <div id="ModalEdit<?php echo $row['nip_pengawas'] ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title" align="center">Edit Data Pengawas</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>ISI DETAIL AKUN</p>
                        <hr>
                        <form action="edit_pengawas.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="nip" value="<?php echo $row['nip_pengawas']  ?>">
                        <input type="hidden" name="id" value="<?php echo $row['id_user']  ?>">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nip Pengawas</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['nip_pengawas']  ?>" name="nip_pengawas" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nama Pengawas</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['nama_pengawas']  ?>" name="nama_pengawas" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Tempat Lahir</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['tempat_lahir_pengawas']  ?>" name="tempat_lahir_pengawas" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Tanggal Lahir</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="date" value="<?php echo $row['tanggal_lahir_pengawas']  ?>" name="tanggal_lahir_pengawas" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Jenis Kelamin</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-select-list">
                                        <select name="jenis_kelamin_pengawas" class="form-control custom-select-value" name="account">
                                                <option><?php echo $row['jenis_kelamin_pengawas'] ?></option>
                                                <option>Laki-laki</option>
                                                <option>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Golongan</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['golongan_pengawas']  ?>" name="golongan_pengawas" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Mata Pelajaran</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-select-list">
                                        <select name="mata_pelajaran" class="form-control custom-select-value" name="account">
                                                <option><?php echo $row['mata_pelajaran'] ?></option>
                                                <?php foreach ($mapels as $map) { ?>
                                                    <option><?php echo $map['mata_pelajaran']; ?></option>
                                                <?php } ?>
                                                
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-custon-four btn-primary btn-md" type="button" data-dismiss="modal">Cancle</button>
                        <button class="btn btn-custon-four btn-warning btn-md" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
<?php 
	include '../layout/footer.php'; 
?>
