<?php 
class Ormawa{

	private $table = 'tb_ormawa';

	public function __construct()
	{
		$this->saveOrmawa();
		$this->removeOrmawa();
	}
	public function saveOrmawa(){
		$nama = $_POST['nama'];
		$singkatan = $_POST['singkatan'];
		$id = $_POST['ids'];
		$aksi = $_POST['aksi'];

		if ($aksi == 'edit') {		
			$simpan = $this->updateOrmawa($id,$nama,$singkatan);
		}else if ($aksi == 'tambah') {
			$tambah = $this->addOrmawa($nama,$singkatan);
		}	
	}

	public function updateOrmawa($id,$nama,$singkatan){
		include 'koneksi.php';
		$sql = "UPDATE ".$this->table." SET nama_ormawa='$nama', singkatan='$singkatan' WHERE id_ormawa='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

	public function addOrmawa($nama,$singkatan){
		include 'koneksi.php';
		$sql = "INSERT INTO ".$this->table." (nama_ormawa, singkatan) VALUES ('$nama','$singkatan')";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

	public function removeOrmawa(){
		$id = $_POST['id'];
		$delete =  $this->removeOrmawaDB($id);
	}

	public function removeOrmawaDB($id){
		include 'koneksi.php';
		$sql = "DELETE FROM ".$this->table." WHERE id_ormawa='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

}

$ormawaClass = new Ormawa();

?>