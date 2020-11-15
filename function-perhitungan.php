<?php
    class Perhitungan
    {
        private $tb_nilai = 'tb_nilai';
        private $tb_ormawa = 'tb_ormawa';
        private $tb_bobot = 'tb_bobot';
        private $tb_pelaporan = 'tb_pelaporan';


        public function __construct()
        {
            
        }

        public function getDataTable_1($tahun="")
        {
            include 'koneksi.php';

            $sql = "SELECT a.*,b.id_ormawa as ormawaID, b.nama_ormawa, b.singkatan 
                    FROM ".$this->tb_nilai." a 
                    LEFT JOIN  ".$this->tb_ormawa. " b ON b.id_ormawa = a.id_ormawa
                    WHERE tahun='".$tahun."' GROUP BY a.id_ormawa ";
            $query = selcetGeneralDB($konek,$sql);
            
            return $query;
        }

        public function getDataNilai($id_ormawa,$tahun="")
        {
            include 'koneksi.php';
            $sql = "SELECT * FROM ".$this->tb_nilai." WHERE tahun='".$tahun."' AND id_ormawa='".$id_ormawa."' ";
            $query = selcetGeneralDB($konek,$sql);
            
            return $query;
        }

        public function get_bobot_by_tahun($tahun="")
        {
            include 'koneksi.php';
            $sql = "SELECT * FROM ".$this->tb_bobot." WHERE tahun='".$tahun."'";
            $query = selcetGeneralDB($konek,$sql);
            
            return $query;
        }

        public function get_bobot_by_tahun_kriteria($id_kriteria,$tahun="")
        {
            include 'koneksi.php';
            $sql = "SELECT * FROM ".$this->tb_bobot." WHERE tahun='".$tahun."' AND id_kriteria='".$id_kriteria."'";
            $query = selcetGeneralDB($konek,$sql);
            
            return $query;   
        }
        public function addPerhitungan($tahun,$data_rangking){
            include 'koneksi.php';
            $sql = "INSERT INTO ".$this->tb_pelaporan." (tahun,data_rangking) VALUES ('$tahun','$data_rangking')";
            $query = mysqli_query($konek,$sql);
            return $query;
        }

        public function updateNilai($tahun,$data_rangking){
            include 'koneksi.php';
            $sql = "UPDATE ".$this->tb_pelaporan." SET data_rangking='$data_rangking' WHERE tahun='$tahun'";
            $query = mysqli_query($konek,$sql);
            return $query;
        }

        public function cekDBAvailable($tahun){
            include 'koneksi.php';
            $sql = "SELECT tahun FROM ".$this->tb_pelaporan." WHERE tahun='$tahun' ";
            $query = mysqli_query($konek,$sql);
            return $num_rows = mysqli_num_rows($query);
        }
    }

    $perhitungan = new Perhitungan();
?>