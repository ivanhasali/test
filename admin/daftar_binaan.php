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
                                        <li><span class="bread-blod">Data Binaan</span>
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
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Binaan berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Binaan berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Binaan berhasil dihapus.
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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="sparkline10-list mg-tb-30 responsive-mg-t-0 table-mg-t-pro-n dk-res-t-pro-0 nk-ds-n-pro-t-0">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1>Cari Data</h1>
                        </div>
                    </div>
                    <form action="" method="GET">
                    <div class="sparkline10-graph">
                        <div class="input-knob-dial-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="chosen-select-single mg-b-20">
                                        <label>Semester :</label>
                                        <select data-placeholder="Choose a Country..." name="semester" class="chosen-select" tabindex="-1">
                                                <option selected disabled>Pilih</option>
                                                <?php if(isset($_GET['tahun']) && isset($_GET['semester']) && isset($_GET['nip'])) : ?>
                                                <option><?php echo $_GET['semester'] ?></option>
                                                <?php endif ?>
                                                <option value="Genap">Genap</option>
                                                <option value="Ganjil">Ganjil</option>     
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="input-knob-dial-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="chosen-select-single mg-b-20">
                                        <label>Tahun :</label>
                                        <select data-placeholder="Pilih Tahun..." name="tahun" class="chosen-select" tabindex="-1">
                                                <option selected disabled>Pilih</option>
                                                <?php if(isset($_GET['tahun']) && isset($_GET['semester']) && isset($_GET['nip'])) : ?>
                                                <option><?php echo $_GET['tahun'] ?></option>
                                                <?php endif ?>
                                                <?php $tara = mysqli_query($conn, "SELECT DISTINCT tahun_pendidikan FROM pembinaan ORDER BY tahun_pendidikan") ?>
                                                <?php foreach($tara as $tar) : ?>
                                                    <option><?php echo $tar['tahun_pendidikan'] ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php $data = mysqli_query($conn, "SELECT * from pengawas");  ?>
                        <div class="input-knob-dial-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="chosen-select-single mg-b-20">
                                        <label>Pengawas :</label>
                                        <select data-placeholder="Choose a Country..." name="nip" class="chosen-select" tabindex="-1">
                                                <option value="">Pilih</option>
                                                <?php  foreach ($data as $row1){ ?>
                                                <option value="<?php echo $row1['nip_pengawas'] ?>"><?php echo $row1['nama_pengawas'] ?></option> 
                                                <?php } ?>    
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="width: 100%;" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                        <br>
                    </form>
                <?php if(isset($_GET['tahun']) && isset($_GET['semester']) && isset($_GET['nip'])) : ?>
                    <br>
                    <form target="_blank" action="proses_binaan.php" method="POST">
                        <input type="hidden" name="ctk_sem" value="<?php echo $_GET['semester'] ?>">
                        <input type="hidden" name="ctk_th" value="<?php echo $_GET['tahun'] ?>">
                        <input type="hidden" name="ctk_nip" value="<?php echo $_GET['nip'] ?>">
                        <button type="submit" name="cetak_submit" style="width: 100%;" class="btn btn-custon-four btn-success"><i class="fa fa-print edu-informatio" aria-hidden="true"></i> Cetak Data</button href="#">
                    </form>
                <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- Static Table Start -->
    <?php if(isset($_GET['tahun']) && isset($_GET['semester']) && isset($_GET['nip'])) : ?>
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1 >Daftar <span class="table-project-n">Binaan :</span> <?php echo $_GET['semester'] ?> <?php echo $_GET['tahun'] ?></h1>
                                    
                                    <div class="add-product">
                                        <a s href="#"  data-toggle="modal" data-target="#PrimaryModalhdbgcl" class="btn btn-custon-four btn-primary"><i class="fa fa-plus edu-informatio" aria-hidden="true"></i> Tambah Binaan</a href="#">
                                        <br>
                                        
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
                                                <th data-field="nip_guru">Guru</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sem = $_GET['semester'];
                                                $tah = $_GET['tahun'];
                                                $ni = $_GET['nip'];

                                                  $bina = mysqli_query($conn, 
                                                    "SELECT pembinaan.*,pengawas.nama_pengawas,sekolah.nama_sekolah from pembinaan JOIN pengawas on pembinaan.nip_pengawas = pengawas.nip_pengawas JOIN sekolah on pembinaan.npsn_sekolah = sekolah.npsn where pembinaan.semester='$sem' AND pembinaan.tahun_pendidikan='$tah' AND pembinaan.nip_pengawas='$ni' AND pembinaan.status='DISETUJUI' ");
                                                  $no=0;
                                                  foreach ($bina as $bin){
                                                  $no++;
                                            ?>
                                            <tr>
                                   
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $bin['nama_pengawas'] ?></td>
                                                <td><?php echo $bin['nama_sekolah'] ?></td>
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
                                                    <a href="proses_binaan.php?semester=<?php echo $_GET['semester'] ?>&tahun=<?php echo $_GET['tahun'] ?>&nip=<?php echo $_GET['nip'] ?>&idhapus=<?php echo $bin['id'] ?>" class="btn btn-custon-four btn-danger"><i class="fa fa-trash edu-informatio" aria-hidden="true"></i> Hapus</a href="#">
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
    <?php endif; ?>
        <!-- Static Table End -->
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
        <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title" align="center">Tambahkan Data Binaan</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>ISI DETAIL BINAAN</p>
                        <hr>
                        <form action="proses_binaan.php" method="POST" enctype="multipart/form-data">
                        <div class="input-knob-dial-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="chosen-select-single mg-b-20">
                                        <label >Semester </label>
                                        <input type="text"  required value="<?php echo $_GET['semester'] ?>" class="form-control" name="semesternya">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="input-knob-dial-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="chosen-select-single mg-b-20">
                                        <label >Tahun </label>
                                        <input type="text" required value="<?php echo $_GET['tahun'] ?>" class="form-control" name="tahun_pendidikannya">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="input-knob-dial-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="chosen-select-single mg-b-20">
                                        <?php
                                            $ya = $_GET['nip'];
                                            $peng = mysqli_query($conn, "SELECT * from pengawas where nip_pengawas='$ya'");
                                            $pe = mysqli_fetch_row($peng);
                                          ?>
                                        <label >Pengawas </label>
                                        <input type="hidden" name="sem" value="<?php echo $_GET['semester'] ?>">
                                        <input type="hidden" name="thn" value="<?php echo $_GET['tahun'] ?>">
                                        <input type="hidden" name="nip_pengawas" value="<?php echo $_GET['nip'] ?>">
                                        <input type="text" disabled="" value="<?php echo $pe[2] ?>" class="form-control" name="pengawas">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="input-knob-dial-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="chosen-select-single mg-b-20">
                                        <label >Sekolah </label>
                                        <?php $sekolah1 = mysqli_query($conn, "SELECT * from sekolah"); ?>
                                        <select required data-placeholder="Pilih Sekolah..." name="npsn_sekolah" class="chosen-select npsnnya" tabindex="-1">

                                                <?php foreach ($sekolah1 as $sek1){ ?>
                                                <option value="<?php echo $sek1['npsn'] ?>"><?php echo $sek1['nama_sekolah'] ?></option>
                                                <?php } ?>  
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="input-knob-dial-wrap ">
                            <div class="row">
                                <div id="response" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">               
                                    
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
    include '../layout/footer.php'; 
?>
    <script type="text/javascript">
    $(document).ready(function(){
        $("select.npsnnya").change(function(){
            var selectedCountry = $(".npsnnya option:selected").val();
            $.ajax({
                type: "POST",
                url: "proses_binaan.php",
                data: { npsnnya : selectedCountry } 
            }).done(function(data){
                $("#response").html(data);
            });
        });
    });
    </script>

     <script type="text/javascript">


        $(document).ready(function() {

          var last_valid_selection = null;

          $('#userRequest_activity').change(function(event) {

            if ($(this).val().length > 3) {

              $(this).val(last_valid_selection);
            } else {
              last_valid_selection = $(this).val();
            }
          });
        });
        </script>