<?php 
	include '../config/konek.php';
	/**
	 * 
	 */
	class Sekolah extends Connection
	{
		
		function __construct()
		{
			$this->conn = $this->get_connection();
		}
		public function insert($npsn, $nama, $no, $ala, $kepala, $stat)
		{
		    
		    $sql = "INSERT INTO sekolah (npsn, nama_sekolah, nomortlp_sekolah, alamat_sekolah, kepala_sekolah, status_sekolah) VALUES ('$npsn', '$nama',
		            '$no', '$ala', '$kepala', '$stat')";
		    $this->conn->query($sql);
		}
		public function update($npsn_lama, $npsn_baru, $nama, $no, $ala, $kepala, $stat)
		{

		    $sql = "UPDATE sekolah SET npsn='$npsn_baru', nama_sekolah='$nama', nomortlp_sekolah='$no', alamat_sekolah='$ala', kepala_sekolah='$kepala',status_sekolah='$stat' WHERE npsn='$npsn_lama'";
		    $this->conn->query($sql);
		}
		public function delete($npsn)
		{
		    $sql = "DELETE FROM sekolah WHERE npsn='$npsn'";
		    $this->conn->query($sql);
		}

	}
?>