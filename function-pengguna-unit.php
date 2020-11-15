<?php 

class Pengguna_unit
{
	
	private $tb_unit = 'tb_unit';
	private $tb_pengguna_unit = 'tb_pengguna_unit';

	public function __construct()
	{
		$this->savePengguna();
		$this->removePengguna();
	}

	public function getUnit()
	{
		include 'koneksi.php';
		return $query = selectedDB($konek,$this->tb_unit);
	}

	public function savePengguna()
	{
		include 'koneksi.php';

		$pg = isset($_GET['pg']) ? $_GET['pg'] : '';
		$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';
		$edit = isset($_GET['edit']) ? $_GET['edit'] : '';
		$id = isset($_GET['id']) ? $_GET['id'] : ''; 

		if ($pg == 'pengguna_unit' AND $aksi == 'tambah') {
			$nama = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] :'';
			$email = isset($_POST['email']) ? $_POST['email'] : '';
			$unit = isset($_POST['unit']) ? $_POST['unit'] : '';
			$jabatan = isset($_POST['jabatan']) ? $_POST['jabatan'] : '';
			$kata_sandi = isset($_POST['kata_sandi']) ? $_POST['kata_sandi'] : '';

			// ambil data file
			if (isset($_FILES['photo'])) {	
				$file = isset($_FILES['photo']) ? $_FILES['photo'] : '' ;
				$namaFile = $file['name'];
				$namaSementara = $file['tmp_name'];

				// tentukan lokasi file akan dipindahkan
				$dirUpload = "images/";

				// pindahkan file
				$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
				
				// $url_image = $dirUpload.$namaFile;
				$sql = "INSERT INTO ".$this->tb_pengguna_unit." (id_unit, nama_lengkap,kata_sandi,email,gambar,jabatan) VALUES ('$unit','$nama','$kata_sandi','$email','$namaFile','$jabatan')";
				$query = mysqli_query($konek,$sql);
			}
		}else if ( $pg == 'pengguna_unit' AND $aksi == 'edit' ){
			// $button = isset($_POST['update']) ? $_POST['update'] : '' ;
			// if ($button) {
				

			$nama = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] :'';
			$email = isset($_POST['email']) ? $_POST['email'] : '';
			$unit = isset($_POST['unit']) ? $_POST['unit'] : '';
			$jabatan = isset($_POST['jabatan']) ? $_POST['jabatan'] : '';
			$kata_sandi = isset($_POST['kata_sandi']) ? $_POST['kata_sandi'] : '';
			$hid_image = isset($_POST['hid_image']) ? $_POST['hid_image'] : '';

			// ambil data file
			if (isset($_FILES['photo']) ) {	
				$file = isset($_FILES['photo']) ? $_FILES['photo'] : '' ;
				$namaFile = $file['name'];
				$namaSementara = $file['tmp_name'];

				// tentukan lokasi file akan dipindahkan
				$dirUpload = "images/";

				// pindahkan file
				$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

				
				$sql = "UPDATE ".$this->tb_pengguna_unit." SET id_unit='$unit', nama_lengkap='$nama',kata_sandi='$kata_sandi',email='$email',gambar='$namaFile',jabatan='$jabatan' WHERE id_pengguna_unit='$id'";

				$query = mysqli_query($konek,$sql);
			}
		}
	}

	public function removePengguna(){
		$pg = isset($_GET['pg']) ? $_GET['pg'] : '';
		$hapus = isset($_GET['aksi']) ? $_GET['aksi'] : '';
		$id = isset($_GET['id']) ? $_GET['id'] : ''; 
		if ($pg == 'pengguna_unit' AND $hapus == 'hapus') {
			$delete =  $this->removePenggunaDB($id);
		}
	}

	public function removePenggunaDB($id){
		include 'koneksi.php';
		$sql = "DELETE FROM ".$this->tb_pengguna_unit." WHERE id_pengguna_unit='$id'";
		$query = mysqli_query($konek,$sql);
		return $query;
	}
}

$pengguna_unit = new Pengguna_unit();
?>