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
                                        <li><span class="bread-blod">Data Sekolah dan Guru</span>
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



    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1 >Daftar <span class="table-project-n">Guru dan Sekolah</span></h1>
                                
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
                                            <th data-field="npsn">NPSN</th>
                                            <th data-field="nama_sekolah" data-editable="false">Nama Sekolah</th>
                                            <th data-field="nomortlp_sekolah">Nomor Telepon</th>
                                            <th data-field="alamat_sekolah" data-editable="false">Alamat</th>
                                            <th data-field="kepala_sekolah" data-editable="false">Kepala Sekolah</th>
                                            <th data-field="status_sekolah" data-editable="false">Status Sekolah</th>
                                            <th data-field="action">Guru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                              $sekolah = mysqli_query($conn, "SELECT * from sekolah");
                                              $no=0;
                                              foreach ($sekolah as $row){
                                              $no++;
                                              $nps = $row['npsn'];
                                              $gurus = mysqli_query($conn, "SELECT * from guru where mengajar_sekolah='$nps' ")
                                        ?>
                                        <tr>

                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row['npsn'] ?></td>
                                            <td><?php echo $row['nama_sekolah'] ?></td>
                                            <td><?php echo $row['nomortlp_sekolah'] ?></td>
                                            <td><?php echo $row['alamat_sekolah'] ?></td>
                                            <td><?php echo $row['kepala_sekolah'] ?></td>
                                            <td><?php echo $row['status_sekolah'] ?></td>
                                            <td class="datatable-ct">
                                                <?php if(empty($gurus) ) : ?>
                                                        <p>Belum Ada Data Guru</p>
                                                <?php endif; ?>
                                                <?php foreach($gurus as $gu) : ?>
                                                        <p><?php echo $gu['nama_guru'] ?> <a href="#" data-toggle="modal" data-target="#Show<?php echo $gu['nip_guru'] ?>"><i style="color: green;" class="fa fa-edit fa-2x"></i></a></p>
                                                    <?php endforeach ?>
                                                
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

<!---START------------------------------------------------------------------------------------------------------------------------MODAL PROFIL GURU----->
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
<!---END------------------------------------------------------------------------------------------------------------------------MODAL PROFIL GURU----->

<?php 
    include '../layout/footer.php'; 
?>
    