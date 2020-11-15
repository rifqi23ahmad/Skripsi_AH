<?php
    class Pelaporan
    {
        private $tb_ormawa = 'tb_ormawa';
        private $tb_pelaporan = 'tb_pelaporan';

       

        public function ShowPelaporan($tahun="")
        {
            include 'koneksi.php';
            $sql = "SELECT * FROM ".$this->tb_pelaporan."
                    WHERE tahun='".$tahun."' LIMIT 1";
            $query = selcetGeneralDB($konek,$sql);
            
            return $query;
        }

        public function getnameOrmawa($singkatan)
        {
            include 'koneksi.php';
            $sql = "SELECT * FROM ".$this->tb_ormawa."
                    WHERE singkatan='".$singkatan."'";
            $query = selcetGeneralDB($konek,$sql);
            
            return $query;
        }

        
    }

    $pelaporan = new Pelaporan();
?>