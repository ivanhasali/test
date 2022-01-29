<?php 
	include '../config/konek.php';
	/**
	 * 
	 */
	class Penjadwalan extends Connection
	{
		
		function __construct()
		{
			$this->conn = $this->get_connection();
		}
		public function insert($id_pembinaan,$nake,$ket,$tgl)
		{
		    
		    $sql = "INSERT INTO penjadwalan_binaan (id_pembinaan, kegiatan_binaan, penjelasan, tanggal)	VALUES ('$id_pembinaan', '$nake', '$ket', '$tgl')";
		    $this->conn->query($sql);
		}
		public function update($id_penjadwalan,$nake,$ket,$tgl)
		{
		    
		    $sql = "UPDATE penjadwalan_binaan SET kegiatan_binaan='$nake', penjelasan='$ket', tanggal='$tgl' WHERE id_penjadwalan='$id_penjadwalan'";
		    $this->conn->query($sql);
		}

		public function delete($id)
		{
		    $sql = "DELETE FROM penjadwalan_binaan WHERE id_penjadwalan='$id'";
		    $this->conn->query($sql);
		}

		public function deleteBinaan($id)
		{
		    $sql = "DELETE FROM pembinaan WHERE id='$id'";
		    $this->conn->query($sql);
		}
		public function deleteKegiatan($id)
		{
		    $sql = "DELETE FROM penjadwalan_binaan WHERE id_penjadwalan='$id'";
		    $this->conn->query($sql);
		}

	}
?>