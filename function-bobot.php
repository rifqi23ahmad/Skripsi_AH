<?php
class BobotKriteria
{
    private $tb_bobot = 'tb_bobot';
    private $tb_kriteria = 'tb_kriteria';
    private $tb_nilai = 'tb_nilai';

    public function __construct()
    {
        $this->saveBobot();
        $this->removeBobot();
    }

    public function saveBobot(){
		$kode_kriteria = ( isset( $_POST['kriteria'] ) ) ? $_POST['kriteria'] : '' ;
        $bobot =( isset( $_POST['bobot'] ) ) ? $_POST['bobot'] : '';
		$tahun =( isset( $_POST['tahun'] ) ) ? $_POST['tahun'] : '';
        
		$id = ( isset( $_POST['ids'] ) ) ? $_POST['ids'] : '';
		$aksi = ( isset( $_POST['aksi'] ) ) ? $_POST['aksi'] : '';
		if ($aksi == 'edit') {		
			$simpan = $this->updateBobot($id,$tahun,$kode_kriteria,$bobot);

		}else if ($aksi == 'tambah') {
            
			$tambah = $this->addBobot($tahun,$kode_kriteria,$bobot);
		}	
    }
    
    public function addBobot($tahun,$kode_kriteria,$bobot){
		include 'koneksi.php';
		$sql = "INSERT INTO ".$this->tb_bobot." (`tahun`, `id_kriteria`,`nilai`) VALUES ('$tahun','$kode_kriteria','$bobot')";
		$query = mysqli_query($konek,$sql);
		return $query;
    }
    
    public function updateBobot($id,$tahun,$kode_kriteria,$bobot){
		include 'koneksi.php';
		$sql = "UPDATE ".$this->tb_bobot." SET tahun='$tahun', id_kriteria='$kode_kriteria', nilai='$bobot' WHERE id_bobot='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
    }
    
    public function removeBobot(){
		$id = (isset($_POST['id'])) ? $_POST['id'] : '';
		$delete =  $this->removeBobotDB($id);
    }
    
    public function removeBobotDB($id){
		include 'koneksi.php';
		$sql = "DELETE FROM ".$this->tb_bobot." WHERE id_bobot='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}

    public function showBobot()
    {
       include 'koneksi.php';
       $sql = "SELECT a.*,b.*,c.id_nilai as nilai_id, c.tahun as nilai_tahun, 
                c.id_kriteria as kriteria_id, c.id_ormawa as ormawaid, c.nilai as nilai_tb_nilai
                FROM ".$this->tb_bobot." a 
                LEFT JOIN ".$this->tb_kriteria." b ON b.kode_kriteria = a.id_kriteria
                LEFT JOIN ".$this->tb_nilai." c ON c.id_nilai = a.nilai";
       $query =  selcetGeneralDB($konek,$sql);
       return $query;
    }

    public function selectTahun()
	{
		include 'koneksi.php';
		$sql = "SELECT * FROM ".$this->tb_nilai." GROUP BY tahun";
		$query = selcetGeneralDB($konek,$sql);
		$tahun = (isset($_GET['tahun'])) ? $_GET['tahun'] : '' ;

		$opt = '';
		foreach ($query as $key => $value) {
			$selected = ( $value['tahun'] == $tahun ) ?  'selected' : '' ;	

			$opt .= '<option value="'.$value['tahun'].'" '.' '.$selected.'>'.$value['tahun'].'</option>';
		}

		return $opt;
	}
}

$BobotKriteria = new BobotKriteria();

?>