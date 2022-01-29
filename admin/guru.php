<?php 
	include '../config/konek.php';
	/**
	 * 
	 */
	class Guru extends Connection
	{
		
		function __construct()
		{
			$this->conn = $this->get_connection();
		}
		public function insert($nip, $nama, $tgl, $tmp, $jk, $sek, $map, $gol, $stat)
		{
		    
		    $sql = "INSERT INTO guru (nip_guru, nama_guru, tanggal_lahir, tempat_lahir, jenis_kelamin, mengajar_sekolah, mata_pelajaran, golongan, status_guru)	VALUES ('$nip', '$nama', '$tgl', '$tmp', '$jk', '$sek','$map','$gol','$stat')";
		    $this->conn->query($sql);
		}
		public function update($nip_lama, $nip_baru, $nama, $tgl, $tmp, $jk, $sek, $map, $gol, $stat)
		{
		    $sql = "UPDATE guru SET nip_guru='$nip_baru', nama_guru='$nama', tanggal_lahir='$tgl', tempat_lahir='$tmp', jenis_kelamin='$jk', mengajar_sekolah='$sek', mata_pelajaran='$map', golongan='$gol', status_guru='$stat' WHERE nip_guru='$nip_lama'";
		    $this->conn->query($sql);
		}
		public function delete($nip)
		{
		    $sql = "DELETE FROM guru WHERE nip_guru='$nip'";
		    $this->conn->query($sql);
		}

	}
?>