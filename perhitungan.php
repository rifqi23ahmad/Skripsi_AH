<style>
.table tr th,.table tr td {
    padding: 10px;
    border: 1px solid #eee !important;
}
.table h4{
    text-align:center;
}

</style>

<?php global $perhitungan; ?>
<?php 
    $tahun = (isset($_GET['act']) AND $_GET['act'] == 's_per' ) ? $_GET['tahun'] : '' ;
 ?>

<section class="content">
    <div class="container-fluid">   
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
    
                    <div class="header">
                        <h2> Nilai Bobot Kriteria</h2>
                    </div>
                    <div class="body">
                        <div class="form-search">
                            <form class="form" action="">
                                <input type="hidden" name="pg" value="perhitungan">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun">
                                        <option value="">Pilih Tahun</option>
                                         <?= $nilaiClass->selectTahun(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="act" value="s_per">
                                    <input type="submit" value="Search" class="btn btn-prymary"> 
                                </div>
                            </form>
                        </div>
                        <div class="table">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="4">Kode Alternatif</th>
                                        <th colspan="6">Kriteria</th>
                                    </tr>
                                    <tr>
                                        <th>K1</th>
                                        <th>K2</th>
                                        <th>K3</th>
                                        <th>K4</th>
                                        <th>K5</th>
                                        <th>K6</th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Bobot Kriteria</th>
                                    </tr>
                                    <tr>
                                        <?php foreach ($perhitungan->get_bobot_by_tahun($tahun) as $bobots) { 
                                        ?>
                                        <th><?php echo $bobots['nilai']; ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $alternatif = $perhitungan->getDataTable_1($tahun);
                                        foreach ($alternatif as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['singkatan']; ?></td>
                                        <?php 
                                            foreach( $perhitungan->getDataNilai($value['id_ormawa'],$tahun) as $nilai){
                                        ?>
                                        <td><?= $nilai['nilai']; ?></td>
                                        <?php } ?>
                                    </tr>
                                    
                                    <?php } ?>
                                
                                </tbody>
                            </table>
                            
                            <div class="table-kuadrat">
                                <h4>Tabel Kuadrat</h4>                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>K1</th>
                                        <th>K2</th>
                                        <th>K3</th>
                                        <th>K4</th>
                                        <th>K5</th>
                                        <th>K6</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($alternatif as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['singkatan']; ?></td>
                                        <?php 
                                            foreach( $perhitungan->getDataNilai($value['id_ormawa'],$tahun) as $nilai){
                                        ?>
                                        <td><?= pow( $nilai['nilai'],2 ); ?></td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>                           
                                </tbody>
                                <tfoot>
                                
                                    <th>Total</th>
                                    <?php
                                    $sumArray = array();
                                    foreach ($alternatif as $key => $value) {
                                        
                                        foreach( $perhitungan->getDataNilai($value['id_ormawa'],$tahun) as $keys => $nilai){
                                            if(isset($sumArray[$keys])) {
                                                $sumArray[$keys] +=  pow( $nilai['nilai'],2 ); 
                                            } 
                                            else {
                                                $sumArray[$keys] =  pow( $nilai['nilai'],2 ); 
                                            }    
                                       }
                                    }
                                    ?>
                                    <?php foreach($sumArray as $total){?>
                                    <th><?= $total; ?></th>
                                    <?php } ?>
                                   
                                </tfoot>
                            </table>
                            </div>

                            <div class="table-normalisasi">
                                <h4>Tabel Normalisasi</h4>                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>K1</th>
                                        <th>K2</th>
                                        <th>K3</th>
                                        <th>K4</th>
                                        <th>K5</th>
                                        <th>K6</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $arr_nama_ormawa = array();
                                        foreach ($alternatif as $key => $value) {
                                        $arr_nama_ormawa[] = array('ormawa'=>$value['nama_ormawa'],'kode'=>$value['singkatan'] );
                                    ?>
                                    <tr>
                                        <td><?= $value['singkatan']; ?></td>
                                        <?php 
                                            foreach( $perhitungan->getDataNilai($value['id_ormawa'],$tahun) as $keys => $nilai){
                                            $normalisasi = pow( $nilai['nilai'],2 ) / sqrt( $sumArray[$keys] );
                                        ?>
                                        <td>
                                            <?php 
                                            if (cekNumberlength($normalisasi) > 5 ) {
                                                echo changeformatNumber($normalisasi); 
                                            }else{
                                                echo $normalisasi;
                                            }
                                            ?>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>                           
                                </tbody>
                            </table>
                            </div>
                            
                            <div class="normalisasi-terbobot">
                                <h4>Normalisasi Terbobot</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="4">Kode Alternatif</th>
                                        <th colspan="6">Kriteria</th>
                                    </tr>
                                    <tr>
                                        <th>K1</th>
                                        <th>K2</th>
                                        <th>K3</th>
                                        <th>K4</th>
                                        <th>K5</th>
                                        <th>K6</th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Bobot Kriteria</th>
                                    </tr>
                                    <tr>
                                        <?php foreach ($perhitungan->get_bobot_by_tahun($tahun) as $bobots) { ?>
                                        <th><?php echo $bobots['nilai']; ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php 
                                        foreach ($alternatif as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['singkatan']; ?></td>
                                        <?php 
                                            foreach( $perhitungan->getDataNilai($value['id_ormawa'],$tahun) as $keys => $nilai){
                                                $normalisasi = pow( $nilai['nilai'],2 ) / sqrt( $sumArray[$keys] );

                                                foreach ($perhitungan->get_bobot_by_tahun_kriteria($nilai['id_kriteria'],$tahun) as $key => $bobot_val) {

                                        ?>
                                        <td>
                                            <?php
                                             $normalisasi_terbobot = $normalisasi * $bobot_val['nilai'];
                                             if (cekNumberlength($normalisasi_terbobot) > 5 ) { 
                                                echo changeformatNumber( $normalisasi_terbobot ); 
                                             }else{
                                                echo $normalisasi_terbobot;
                                             }
                                            ?>        
                                        </td>
                                                
                                        <?php 
                                                } 
                                            } 
                                        ?>
                                    </tr>
                                    <?php } ?>                           
                                </tbody>
                            </table>
                            </div>

                            <div class="table-matrik-ideal">
                                <h4>Matrik Ideal</h4>                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Solusi Ideal</th>
                                        <th>K1</th>
                                        <th>K2</th>
                                        <th>K3</th>
                                        <th>K4</th>
                                        <th>K5</th>
                                        <th>K6</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>
                                    <tr>
                                        <td>Positif</td>
                                    <?php 
                                        $sum = array();
                                        foreach ($alternatif as $key => $value) {
                                   
                                            $normalisasi_terbobot = array();
                                            foreach( $perhitungan->getDataNilai($value['id_ormawa'],$tahun) as $keys => $nilai){

                                                foreach ($perhitungan->get_bobot_by_tahun_kriteria($nilai['id_kriteria'],$tahun) as $keyl => $bobot_val) {
                                                    
                                                    $normalisasi =  pow( $nilai['nilai'],2 ) / sqrt( $sumArray[$keys] ) ;

                                                    $normalisasi_hitung = $normalisasi * $bobot_val['nilai'];
                                                    $normalisasi_terbobot[] = $normalisasi_hitung;

                                                }
                                            } 
                                      
                                        $sum[] = $normalisasi_terbobot;
                                        
                                        ?>
                                    
                                    <?php 

                                    }
                                        //merge
                                        $merge_by_key = array();
                                        foreach ($sum as $k => $value) {
                                            foreach ($value as $key => $data) {
                                                $merge_by_key[$key][] = $data;                                          
                                            }
                                        }
                                        $max_arr = array();
                                        foreach ($merge_by_key as $ks => $max_value) { ?>
                                            <td>
                                                <?php 
                                                    $max =  max($max_value); 
                                                    $max_arr[] = $max;
                                                    if (cekNumberlength($max) > 5 ) { 
                                                        echo changeformatNumber( $max ); 
                                                     }else{
                                                        echo $max;
                                                     }

                                                ?>        
                                            </td>
                                        <?php  } ?>    
                                    </tr>
                                    <tr>
                                        <td>Negatif</td>
                                    <?php       
                                            $min_arr = array();
                                            foreach ($merge_by_key as  $min_value) { ?>
                                            <td>
                                                <?php 
                                                    $min =  min($min_value); 
                                                    $min_arr[] = $min;
                                                    if (cekNumberlength($min) > 5 ) { 
                                                        echo changeformatNumber( $min ); 
                                                     }else{
                                                        echo $min;
                                                     }

                                                ?>        
                                            </td>
                                        <?php  } ?>    
                                    </tr>
                                                               
                                </tbody>
                            </table>
                            </div>

                             <div class="table-Perangkingan">
                                <h4>Tabel Perangkingan</h4>                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        <th>Positif</th>
                                        <th>Negatif</th>
                                        <th>Nilai Preferensi </th>
                                        <th>Rangking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        $rangking_alternatif_positif = array(); 
                                        foreach ($sum as $key => $sum_normalisasi_terbobot) {
                                            // print_r($sum_normalisasi_terbobot);
                                            $kuadrat_D_tambah = 0; 
                                            foreach ($sum_normalisasi_terbobot as $keys => $data) {
                                                // print_r($data);
                                                $hit_pengurangan_D_positif = $max_arr[$keys]-$data;
                                                $kuadrat_D_positif = pow($hit_pengurangan_D_positif, 2);
                                                $kuadrat_D_tambah += $kuadrat_D_positif; 
                                                // print_r($kuadrat_D_positif.'<br>');
                                            }
                                                $akar_D_positif = sqrt($kuadrat_D_tambah);
                                                $rangking_alternatif_positif[] = $akar_D_positif;
                                        }

                                        // print_r($rangking_alternatif_positif);
                                      ?>

                                      <?php
                                        $rangking_alternatif_negatif = array(); 
                                        foreach ($sum as $key => $sum_normalisasi_terbobot) {
                                            // print_r($sum_normalisasi_terbobot);
                                            $kuadrat_D_kurang = 0; 
                                            foreach ($sum_normalisasi_terbobot as $keys => $data) {
                                                // print_r($data);
                                                $hit_pengurangan_D_negatif = $min_arr[$keys]-$data;
                                                $kuadrat_D_negatif = pow($hit_pengurangan_D_negatif, 2);
                                                $kuadrat_D_kurang += $kuadrat_D_negatif; 
                                                // print_r($kuadrat_D_negatif.'<br>');
                                            }
                                                $akar_D_negatif = sqrt($kuadrat_D_kurang);
                                                $rangking_alternatif_negatif[] = $akar_D_negatif;
                                        }

                                        // print_r($rangking_alternatif_negatif);

                                      ?>   

                                      <?php     
                                            // rumus v1 = d Negatif / d Negatif + d Positif
                                            $rank_arr = array();
                                            foreach ($rangking_alternatif_negatif as $key => $rank) {
                                                $d_negatif = ( $rank == 0 ) ? 1 : $rank ;
                                                $d_positif = $rangking_alternatif_positif[$key];
                                                $rumus_rangking = $d_negatif/$d_negatif+$d_positif;
                                                $rank_arr[] = $rumus_rangking; 
                                            }

                                            $data_arrs = array();
                                            $rank = $rank_arr;
                                            rsort($rank);

                                            foreach($rank_arr as $keysort => $sort) {
                                             $sort_value = $sort;
                                             $ranking = (array_search($sort, $rank) + 1);

                                            $r_positif = ( cekNumberlength($rangking_alternatif_positif[$keysort]) > 5 ) ? changeformatNumber( $rangking_alternatif_positif[$keysort] ) : $rangking_alternatif_positif[$keysort] ;
                                            $r_negatif = ( cekNumberlength($rangking_alternatif_negatif[$keysort]) > 5 ) ? changeformatNumber( $rangking_alternatif_negatif[$keysort] ) : $rangking_alternatif_negatif[$keysort] ;
                                             
                                             $r_prfensi = ( cekNumberlength($sort) > 5 ) ? changeformatNumber( $sort ) : $sort ;

                                             $data_arrs[] = array(
                                                    'singkatan' => $arr_nama_ormawa[$keysort]['kode'],
                                                    'r_prefensi' => $r_prfensi,
                                                    'rank' => $ranking
                                                );


                                             ?>   
                                             <tr>
                                                 <td><?php echo $arr_nama_ormawa[$keysort]['kode']; ?></td>
                                                 <td><?php echo $r_positif; ?></td>
                                                 <td><?php echo $r_negatif; ?></td>
                                                 <td><?php echo $r_prfensi; ?></td>
                                                 <td><?php echo $ranking; ?></td>
                                             </tr>                                            
                                            <?php }
                                            if (!empty($data_arrs)) {
                                                $serial = serialize($data_arrs);
                                                
                                                if ($perhitungan->cekDBAvailable($tahun) > 0){
                                                    $perhitungan->updateNilai($tahun,$serial);
                                                }else{
                                                    $perhitungan->addPerhitungan($tahun,$serial);
                                                }
                                            }
                                       ?>
                                    

                                </tbody>
                                
                            </table>
                            </div>

                        </div> <!-- end div table -->
                    </div> <!-- end body -->
                </div>
            </div>
        </div>
    </div>
</section>
