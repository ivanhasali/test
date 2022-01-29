<?php 
	include '../config/koneksi.php';
	include 'binaan.php';
	if (isset($_POST['npsnnya'])) {
     	$x = $_POST['npsnnya'];
     	$day = mysqli_query($conn,"SELECT * FROM guru where mengajar_sekolah='$x'");
     	
     		
                                      
            echo '<div  class="chosen-select-single mg-b-20 ">';                    
     		echo " <label >Guru (Pilih Lebih dari 1) </label>";
	        echo '<select id="userRequest_activity" data-placeholder="Pilih Sekolah..." name="nip_guru[]" multiple class="chosen-select npsnnya" tabindex="-1">';
	        foreach($day as $row){
	            echo "<option value='".$row['nip_guru']."'>". $row['nama_guru'] . "</option>";
	        }
	        echo "</select>";
    		echo "</div> ";

   	}
   	
    if (isset($_POST['submit_simpan'])) {

        $sem  = $_POST['sem'];
        $thn  = $_POST['thn'];
        $nip  = $_POST['nip_pengawas'];
        $npsn  = $_POST['npsn_sekolah'];
        $nip_gr = $_POST['nip_guru'];
        
        $cari = mysqli_query($conn,"SELECT * from pembinaan where nip_pengawas='$nip' AND npsn_sekolah='$npsn' AND semester='$sem' AND tahun_pendidikan='$thn' ")->fetch_assoc();
        if ($cari) {
        	$yo = $cari['id'];
        	$cari2 = mysqli_query($conn,"SELECT count(*) as total from detail_binaan where id_pembinaan='$yo' ")->fetch_assoc();
        	if ($cari2['total'] >= 6) {
        		header('location: daftar_binaan.php?semester='.$sem.'&tahun='.$thn.'&nip='.$nip.'&alert=5');
        	}
        	else {
        		foreach($nip_gr as $val2){
        			$cari3 = mysqli_query($conn,"SELECT * from detail_binaan where id_pembinaan='$yo' AND nip_guru='$val2' ")->fetch_assoc();
        			if(!$cari3){
        				if($cari2['total'] < 6) {
        					$sql4 = "INSERT INTO detail_binaan (id_pembinaan, nip_guru)	VALUES ('$yo', '$val2')";
        					$coba = mysqli_query($conn,$sql4);
        				}
        			}
        		}
        		header('location: daftar_binaan.php?semester='.$sem.'&tahun='.$thn.'&nip='.$nip.'&alert=2');
        	}
        }
        else{
        	$bina = new Binaan();
	        $bina->insert($sem, $thn, $nip, $npsn, $nip_gr);
	        header('location: daftar_binaan.php?semester='.$sem.'&tahun='.$thn.'&nip='.$nip.'&alert=2');
        }
    }
    if (isset($_GET['idhapus'])) {
    	$sem  = $_GET['semester'];
        $thn  = $_GET['tahun'];
        $nip  = $_GET['nip'];
        $id = $_GET['idhapus'];
        $bina2 = new Binaan();
        $bina2->delete($id);
        header('location: daftar_binaan.php?semester='.$sem.'&tahun='.$thn.'&nip='.$nip.'&alert=4');
    }
?>