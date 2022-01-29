<?php 
	include '../config/konek.php';
	/**
	 * 
	 */
	class Permohonan extends Connection
	{
		
		function __construct()
		{
			$this->conn = $this->get_connection();
		}
		public function insert($sem, $thn, $nip, $npsn, $nip_gr)
		{
		    
		    $sql = "INSERT INTO pembinaan (nip_pengawas, npsn_sekolah, semester, tahun_pendidikan, status)	VALUES ('$nip', '$npsn', '$sem', '$thn', 'MENUNGGU PERSETUJUAN')";
		    $this->conn->query($sql);

		    $id = $this->conn->insert_id;
		    foreach ($nip_gr as $val) {
		    	$sql2 = "INSERT INTO detail_binaan (id_pembinaan, nip_guru)	VALUES ('$id', '$val')";
		    	$this->conn->query($sql2);
		    }
		}

		public function delete($id)
		{
		    $sql = "DELETE FROM pembinaan WHERE id='$id'";
		    $this->conn->query($sql);
		}

	}
?>