<?php 
class Kriteria{

	private $table = 'tb_kriteria';

	public function __construct()
	{
		$this->saveKriteria();
		$this->removeKriteria();
	}
	public function saveKriteria(){
		$kode_kriteria = $_POST['kode_kriteria'];
		$nama_kriteria = $_POST['nama_kriteria'];
		$id = $_POST['ids'];
		$aksi = $_POST['aksi'];

		if ($aksi == 'edit') {		
			$simpan = $this->updateKriteria($id,$kode_kriteria,$nama_kriteria);
			// print_r($id);
			// print_r($aksi);
		}else if ($aksi == 'tambah') {
			$tambah = $this->addKriterias($kode_kriteria,$nama_kriteria);
		}	
	}

	public function updateKriteria($id,$kode_kriteria,$nama_kriteria){
		include 'koneksi.php';
		$sql = "UPDATE ".$this->table." SET kode_kriteria='$kode_kriteria', nama_kriteria='$nama_kriteria' WHERE kode_kriteria='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

	public function addKriterias($kode_kriteria,$nama_kriteria){
		include 'koneksi.php';
		$sql = "INSERT INTO ".$this->table." (`kode_kriteria`, `nama_kriteria`) VALUES ('$kode_kriteria','$nama_kriteria')";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

	public function removeKriteria(){
		$id = $_POST['id'];
		$delete =  $this->removeKriteriaDB($id);
	}

	public function removeKriteriaDB($id){
		include 'koneksi.php';
		$sql = "DELETE FROM ".$this->table." WHERE kode_kriteria='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

}

$kriteriaClass = new Kriteria();

?>