<?php 
	include '../config/konek.php';
	/**
	 * 
	 */
	class Mapel extends Connection
	{
		
		function __construct()
		{
			$this->conn = $this->get_connection();
		}

		public function insert($kode, $mapel)
		{
		    
		    $sql = "INSERT INTO mata_pelajaran (kode_mapel, mata_pelajaran) VALUES ('$kode', '$mapel')";
		    $this->conn->query($sql);
		}
		public function update($id, $kode, $mapel)
		{

		    $sql = "UPDATE mata_pelajaran SET kode_mapel='$kode', mata_pelajaran='$mapel' WHERE id_pelajaran='$id'";
		    $this->conn->query($sql);
		}
		public function delete($id)
		{
		    $sql = "DELETE FROM mata_pelajaran WHERE id_pelajaran='$id'";
		    $this->conn->query($sql);
		}

	}
?>