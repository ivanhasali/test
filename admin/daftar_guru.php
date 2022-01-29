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
                                        <li><span class="bread-blod">Daftar Guru</span>
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
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Guru berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Guru berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Guru berhasil dihapus.
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
                                    <h1 >Daftar <span class="table-project-n">Guru</span></h1>
                                    
                                    <div class="add-product">
                                        <a href="#"  data-toggle="modal" data-target="#PrimaryModalhdbgcl" class="btn btn-custon-four btn-primary"><i class="fa fa-plus edu-informatio" aria-hidden="true"></i> Tambahkan Guru</a href="#">
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
                                                <th data-field="nip_guru">NIP</th>
                                                <th data-field="nama_guru" data-editable="false">Nama Guru</th>
                                                <th data-field="tanggal_lahir">Tanggal Lahir</th>
                                                <th data-field="tempat_lahir" data-editable="false">Tempat Lahir</th>
                                                <th data-field="jenis_kelamin" data-editable="false">Jenis Kelamin</th>
                                                <th data-field="mengajar_sekolah" data-editable="false">Sekolah</th>
                                                <th data-field="mata_pelajaran" data-editable="false">Mapel</th>
                                                <th data-field="golongan" data-editable="false">Golongan</th>
                                                <th data-field="status_guru" data-editable="false">Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
                                                  $mapels = mysqli_query($conn, "SELECT * from mata_pelajaran");
                                                  $sekolah = mysqli_query($conn, "SELECT * from sekolah");
                                        		  $guru = mysqli_query($conn, "SELECT guru.*,sekolah.nama_sekolah from guru INNER JOIN sekolah on guru.mengajar_sekolah=sekolah.npsn");
                                                  $no=0;
                                                  foreach ($guru as $row){
                                                  $no++;
                                        	?>
                                            <tr>
                                     
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row['nip_guru'] ?></td>
                                                <td><?php echo $row['nama_guru'] ?></td>
                                                <td><?php echo $row['tanggal_lahir'] ?></td>
                                                <td><?php echo $row['tempat_lahir'] ?></td>
                                                <td><?php echo $row['jenis_kelamin'] ?></td>
                                                <td><?php echo $row['nama_sekolah'] ?></td>
                                                <td><?php echo $row['mata_pelajaran'] ?></td>
                                                <td><?php echo $row['golongan'] ?></td>
                                                <td><?php echo $row['status_guru'] ?></td>
                                                <td class="datatable-ct">
                                                    <a href="#"  data-toggle="modal" data-target="#Edit<?php echo $row['nip_guru'] ?>" class="btn btn-custon-four btn-warning"><i class="fa fa-edit edu-informatio" aria-hidden="true"></i> Edit</a href="#">
                                                    <a href="proses_guru.php?nip=<?php echo $row['nip_guru'] ?>" class="btn btn-custon-four btn-danger"><i class="fa fa-trash edu-informatio" aria-hidden="true"></i> Hapus</a href="#">
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
                        <h4 class="modal-title" align="center">Tambahkan Data Guru</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>ISI DETAIL GURU</p>
                        <hr>
                        <form action="proses_guru.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nip Guru</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="nip_guru" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nama Guru</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="nama_guru" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Tempat Lahir</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="tempat_lahir" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Tanggal Lahir</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="date" name="tanggal_lahir" class="form-control"  required />
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
                                        <select name="jenis_kelamin" class="form-control custom-select-value" required  name="account">
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
                                    <input type="text" name="golongan" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Asal Sekolah</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-select-list">
                                        <select name="mengajar_sekolah" class="form-control custom-select-value" name="account" required >
                                                <?php foreach ($sekolah as $sek) { ?>
                                                    <option value="<?php echo $sek['npsn'] ?>"><?php echo $sek['nama_sekolah']; ?></option>
                                                <?php } ?>
                                                
                                        </select>
                                    </div>
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
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Status</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="status_guru" class="form-control"  required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-custon-four btn-primary btn-md" type="button" data-dismiss="modal">Cancle</button>
                        <input class="btn btn-custon-four btn-primary btn-md" name="submit_simpan" value="Simpan" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
              foreach ($guru as $row){

        ?>
        <div id="Edit<?php echo $row['nip_guru'] ?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title" align="center">Edit Data Guru</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>ISI DETAIL GURU</p>
                        <hr>
                        <form action="proses_guru.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="nip_lama" value="<?php echo $row['nip_guru']  ?>">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nip Guru</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['nip_guru'] ?>" name="nip_guru" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Nama Guru</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['nama_guru'] ?>" name="nama_guru" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Tempat Lahir</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['tempat_lahir'] ?>" name="tempat_lahir" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Tanggal Lahir</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="date" value="<?php echo $row['tanggal_lahir'] ?>" name="tanggal_lahir" class="form-control" />
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
                                        <select name="jenis_kelamin" class="form-control custom-select-value" name="account">
                                                <option><?php echo $row['jenis_kelamin'] ?></option>
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
                                    <input type="text" value="<?php echo $row['golongan'] ?>" name="golongan" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Asal Sekolah</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-select-list">
                                        <select name="mengajar_sekolah" class="form-control custom-select-value" name="account">
                                                <?php foreach ($sekolah as $sek) { ?>
                                                    <option value="<?php echo $sek['npsn'] ?>"><?php echo $sek['nama_sekolah']; ?></option>
                                                <?php } ?>
                                                
                                        </select>
                                    </div>
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
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Status</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $row['status_guru'] ?>" name="status_guru" class="form-control" />
                                </div>
                            </div>
                        </div>
                        

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-custon-four btn-primary btn-md" type="button" data-dismiss="modal">Cancle</button>
                        <input class="btn btn-custon-four btn-primary btn-md" name="submit_update" value="Update" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
<?php 
	include '../layout/footer.php'; 
?>
