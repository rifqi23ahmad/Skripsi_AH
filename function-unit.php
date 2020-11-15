<?php 
class Unit{

	private $table = 'tb_unit';

	public function __construct()
	{
		$this->saveUnit();
		$this->removeUnit();
	}
	public function saveUnit(){
		$nama = $_POST['nama'];
		$singkatan = $_POST['singkatan'];
		$id = $_POST['ids'];
		$aksi = $_POST['aksi'];

		if ($aksi == 'edit') {		
			$simpan = $this->updateUnit($id,$nama,$singkatan);
		}else if ($aksi == 'tambah') {
			$tambah = $this->addUnit($nama,$singkatan);
		}	
	}

	public function updateUnit($id,$nama,$singkatan){
		include 'koneksi.php';
		$sql = "UPDATE ".$this->table." SET nama_unit='$nama', singkatan='$singkatan' WHERE id_unit='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

	public function addUnit($nama,$singkatan){
		include 'koneksi.php';
		$sql = "INSERT INTO ".$this->table." (nama_unit, singkatan) VALUES ('$nama','$singkatan')";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

	public function removeUnit(){
		$id = $_POST['id'];
		$delete =  $this->removeUnitDB($id);
	}

	public function removeUnitDB($id){
		include 'koneksi.php';
		$sql = "DELETE FROM ".$this->table." WHERE id_unit='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

}

$unitClass = new Unit();

?>