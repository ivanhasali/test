<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>APLIKASI PENJADWALAN PEMBINAAN SEKOLAH</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/owl.carousel.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.css">
    <link rel="stylesheet" href="../assets/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../assets/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../assets/css/calendar/fullcalendar.print.min.css">
    <!-- x-editor CSS
        ============================================ -->
    <link rel="stylesheet" href="../assets/css/editor/select2.css">
    <link rel="stylesheet" href="../assets/css/editor/datetimepicker.css">
    <link rel="stylesheet" href="../assets/css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="../assets/css/editor/x-editor-style.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="../assets/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../assets/css/data-table/bootstrap-editable.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/modals.css">
    <!-- select2 CSS
        ============================================ -->
    <link rel="stylesheet" href="../assets/css/select2/select2.min.css">
    <!-- chosen CSS
        ============================================ -->
    <link rel="stylesheet" href="../assets/css/chosen/bootstrap-chosen.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <br>
                <a href="index.php"><img class="main-logo" src="../assets/img/kab.png" style="width: 100px;" alt="" /><br>
                    
                    KABUPATEN SIJUNJUNG
                </a>   
                <strong><a href="index.html"><img src="../assets/img/kab.png" style="width: 100px;" alt="" /></a></strong>
            </div>
            <hr>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <?php if($_SESSION['level'] == 'ADMIN') : ?>
                            <li class="<?php if ($first_part=="daftar_pengguna.php") {echo "active"; }?>">
                                <a title="Landing Page" href="daftar_pengguna.php" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Pengguna</span></a>
                            </li>
                            <li class="<?php if ($first_part=="daftar_pengawas.php") {echo "active"; }?>">
                                <a title="Landing Page" href="daftar_pengawas.php" aria-expanded="false"><span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Pengawas</span></a>
                            </li>
                            <li class="<?php if ($first_part=="daftar_sekolah.php") {echo "active"; }?>">
                                <a title="Landing Page" href="daftar_sekolah.php" aria-expanded="false"><span class="educate-icon educate-home icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Sekolah</span></a>
                            </li>
                            <li class="<?php if ($first_part=="daftar_guru.php") {echo "active"; }?>">
                                <a title="Landing Page" href="daftar_guru.php" aria-expanded="false"><span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Guru</span></a>
                            </li>
                            <li class="<?php if ($first_part=="daftar_mapel.php") {echo "active"; }?>">
                                <a title="Landing Page" href="daftar_mapel.php" aria-expanded="false"><span class="educate-icon educate-course icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Mata Pelajaran</span></a>
                            </li>   
                            <li class="<?php if ($first_part=="daftar_binaan.php") {echo "active"; }?>">
                                <a title="Landing Page" href="daftar_binaan.php" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Data Binaan</span></a>
                            </li>
                        <?php elseif($_SESSION['level'] == 'PENGAWAS') : ?> 
                            <li class="<?php if ($first_part=="daftar_permohonan.php") {echo "active"; }?>">
                                <a title="Landing Page" href="daftar_permohonan.php" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Status Permohonan</span></a>
                            </li>
                            <li class="<?php if ($first_part=="lihat_sekolah.php") {echo "active"; }?>">
                                <a title="Landing Page" href="lihat_sekolah.php" aria-expanded="false"><span class="educate-icon educate-home icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Sekolah dan Guru</span></a>
                            </li>
                            <li class="<?php if ($first_part=="daftar_jadwal.php") {echo "active"; }?>">
                                <a title="Landing Page" href="daftar_jadwal.php" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Binaan</span></a>
                            </li>
                            <li class="<?php if ($first_part=="kegiatan.php") {echo "active"; }?>">
                                <a title="Landing Page" href="kegiatan.php" aria-expanded="false"><span class="educate-icon educate-event icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Jadwal</span></a>
                            </li>
                        <?php endif; ?>          
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->