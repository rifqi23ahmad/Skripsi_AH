
<section class="content">
        <div class="container-fluid">
<?php
   // session_start();
   
   $s = "SELECT COUNT(*) AS jum FROM tb_unit";
   $q = mysqli_query($konek,$s);
   $r = mysqli_fetch_assoc($q);
   $n_unit = $r['jum'];

   
   $s = "SELECT COUNT(*) AS jum FROM tb_ormawa ";
   $q = mysqli_query($konek,$s);
   $r = mysqli_fetch_assoc($q);
   $n_ormawa = $r['jum'];
   
   $s = "SELECT COUNT(*) AS jum FROM tb_kriteria ";
   $q = mysqli_query($konek,$s);
   $r = mysqli_fetch_assoc($q);
   $n_kriteria = $r['jum'];
   
   $s = "SELECT count(*) as jum FROM tb_pengguna_unit ";
   $q = mysqli_query($konek,$s);
   $r = mysqli_fetch_assoc($q);
   $n_pengguna = $r['jum'];
   

?>   
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">work</i>
                        </div>
                        <div class="content">
                            <div class="text">Unit Kerja</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$n_unit?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">sports_handball</i>
                        </div>
                        <div class="content">
                            <div class="text">Ormawa</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?=$n_ormawa?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">view_list</i>
                        </div>
                        <div class="content">
                            <div class="text">Kriteria</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?=$n_kriteria?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people_alt</i>
                        </div>
                        <div class="content">
                            <div class="text">Pengguna</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?=$n_pengguna?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            
         
          
             
            </div>
        </div>
    </section>
