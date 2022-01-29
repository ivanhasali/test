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
                                        <li><span class="bread-blod">Daftar Pengguna</span>
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
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Pengguna berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Pengguna berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Pengguna berhasil dihapus.
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
                                    <h1 >Daftar <span class="table-project-n">Pengguna</span> Aplikasi</h1>
                                    
                                    <div class="add-product">
                                        <a href="#"  data-toggle="modal" data-target="#PrimaryModalhdbgcl" class="btn btn-custon-four btn-primary"><i class="fa fa-plus edu-informatio" aria-hidden="true"></i> Tambahkan Pengguna</a href="#">
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
                                                <th data-field="nama">Nama</th>
                                                <th data-field="username" data-editable="false">Username</th>
                                                 <th data-field="password" data-editable="false">Password</th>
                                                <th data-field="level" data-editable="false">Level</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
                                        		  $pengguna = mysqli_query($conn, "SELECT * FROM user where level='ADMIN'");
                                                  $no=0;
                                                  foreach ($pengguna as $row){
                                                  $no++;
                                        	?>
                                            <tr>
                                      
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row['nama'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><?php echo $row['password'] ?></td>
                                                <td><?php echo $row['level'] ?></td>
                                                <td class="datatable-ct">
                                                    <a href="#"  data-toggle="modal" data-target="#ModalEdit<?php echo $row['id_user'] ?>" class="btn btn-custon-four btn-warning"><i class="fa fa-edit edu-informatio" aria-hidden="true"></i> Edit</a href="#">
                                                    <a href="hapus_pengguna.php?id=<?php echo $row['id_user'] ?>" class="btn btn-custon-four btn-danger"><i class="fa fa-trash edu-informatio" aria-hidden="true"></i> Hapus</a href="#">
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
                        <h4 class="modal-title" align="center">Tambahkan Data Pengguna</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>ISI DETAIL AKUN</p>
                        <hr>
                        <form action="tambah_pengguna.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Username</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="username" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nama Pengguna</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="nama" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Konfirmasi Password</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="password" name="password" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Level</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-select-list">
                                        <select name="level" class="form-control custom-select-value" name="account" required >
                                                <option>ADMIN</option>
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
              foreach ($pengguna as $row){
        ?>
        <div id="ModalEdit<?php echo $row['id_user'] ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title" align="center">Edit Data Pengguna</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>ISI DETAIL AKUN</p>
                        <hr>
                        <form action="edit_pengguna.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" value="<?php echo $row['id_user']  ?>">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Username</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['username'] ?>" name="username" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nama Pengguna</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['nama'] ?>" name="nama" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Level</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-select-list">
                                        <select name="level" class="form-control custom-select-value" name="account">
                                                <option>ADMIN</option>
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
