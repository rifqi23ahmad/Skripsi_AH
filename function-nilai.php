<?php 
class Nilai{

	private $table = 'tb_nilai';
	private $tb_ormawa = 'tb_ormawa';

	public function __construct()
	{
		$this->saveNilai();
		$this->removeNilai();
	}
	public function saveNilai(){
		
		$tahun = (isset($_POST['tahun'])) ? $_POST['tahun'] : '';
		$ormawa = (isset($_POST['ormawa'])) ? $_POST['ormawa'] : '';
		$kriteria = (isset($_POST['kriteria'])) ? $_POST['kriteria'] : '';
		$nilai = (isset($_POST['nilai'])) ? $_POST['nilai'] : '';

		$id = (isset($_POST['ids'])) ? $_POST['ids'] : '';
		$aksi = (isset($_POST['aksi'])) ? $_POST['aksi'] : '';

		if ($aksi == 'edit') {		
			$simpan = $this->updateNilai($id,$tahun,$ormawa,$kriteria,$nilai);
		}else if ($aksi == 'tambah') {
			$tambah = $this->addNilai($tahun,$ormawa,$kriteria,$nilai);
		}	
	}

	public function updateNilai($id,$tahun,$ormawa,$kriteria,$nilai){
		include 'koneksi.php';
		$sql = "UPDATE ".$this->table." SET tahun='$tahun', id_ormawa='$ormawa', id_kriteria='$kriteria',nilai='$nilai' WHERE id_nilai='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

	public function addNilai($tahun,$ormawa,$kriteria,$nilai){
		include 'koneksi.php';
		$sql = "INSERT INTO ".$this->table." (tahun,id_ormawa,id_kriteria,nilai) VALUES ('$tahun','$ormawa','$kriteria','$nilai')";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

	public function removeNilai(){
		$id = (isset($_POST['id'])) ? $_POST['id'] : '';
		$delete =  $this->removeNilaiDB($id);
	}

	public function removeNilaiDB($id){
		include 'koneksi.php';
		$sql = "DELETE FROM ".$this->table." WHERE id_nilai='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

	public function getSearch()
	{
		include 'koneksi.php';
		if(isset($_GET['act']) AND $_GET['act'] == 's'){
			$tahun = (isset($_GET['tahun'])) ? $_GET['tahun'] : '';
			$ormawa = (isset($_GET['ormawa'])) ? $_GET['ormawa'] : '';
			
			if (empty($tahun)) { 
				// $sql = "SELECT * FROM ".$this->table." WHERE id_ormawa = '".$ormawa."'";
				$sql = "SELECT * FROM ".$this->table." a 
                LEFT JOIN tb_ormawa b ON b.id_ormawa = a.id_ormawa
				LEFT JOIN tb_kriteria c ON c.kode_kriteria = a.id_kriteria
				WHERE a.id_ormawa='".$ormawa."'";
			}elseif(empty($ormawa)){
				$sql = "SELECT * FROM ".$this->table." WHERE tahun = '".$tahun."'";
				$sql = "SELECT * FROM ".$this->table." a 
                LEFT JOIN tb_ormawa b ON b.id_ormawa = a.id_ormawa
				LEFT JOIN tb_kriteria c ON c.kode_kriteria = a.id_kriteria
				WHERE a.tahun='".$tahun."'";
			}elseif(empty($tahun) AND empty($ormawa)){
				$sql = "SELECT * FROM ".$this->table ." WHERE id_nilai";
			}else{
				// $sql = "SELECT * FROM ".$this->table." WHERE tahun = '".$tahun."' AND id_ormawa = '".$ormawa."'";
				$sql = "SELECT * FROM ".$this->table." a 
                LEFT JOIN tb_ormawa b ON b.id_ormawa = a.id_ormawa
				LEFT JOIN tb_kriteria c ON c.kode_kriteria = a.id_kriteria
				WHERE a.id_ormawa='".$ormawa."' AND a.tahun='".$tahun."'";
			}
			
			$query = selcetGeneralDB($konek,$sql);

			return $query;
		}
	}

	public function selectTahun()
	{
		include 'koneksi.php';
		$sql = "SELECT tahun FROM tb_nilai GROUP BY tahun";
		$query = selcetGeneralDB($konek,$sql);
		  
		$tahuns = (isset($_GET['tahun'])) ? $_GET['tahun'] : '' ;

		$opt = '';
		foreach ($query as $key => $value) {
			$selected = ( $value['tahun'] == $tahuns ) ?  'selected' : '' ;	
			$opt .= '<option value="'.$value['tahun'].'" '.' '.$selected.'>'.$value['tahun'].'</option>';
		}

		return $opt;
	}

	public function selectOrmawa()
	{
		include 'koneksi.php';
		$sql = "SELECT a.*,b.id_ormawa as ormawa_id, b.nama_ormawa FROM ".$this->table." a LEFT JOIN ".$this->tb_ormawa." b ON b.id_ormawa = a.id_ormawa GROUP BY b.nama_ormawa";
		$query = selcetGeneralDB($konek,$sql);
		$ormawas = (isset($_GET['ormawa'])) ? $_GET['ormawa'] : '' ;

		$opt = '';
		foreach ($query as $key => $value) {
			$selected = ( $value['id_ormawa'] == $ormawas ) ?  'selected' : '' ;	

			$opt .= '<option value="'.$value['id_ormawa'].'" '.' '.$selected.'>'.$value['nama_ormawa'].'</option>';
		}

		return $opt;
	}

}

$nilaiClass = new Nilai();

?>