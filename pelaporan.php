<?php 
    global $pelaporan;    
    $tahun = (isset($_GET['act']) AND $_GET['act'] == 's_lapor' ) ? $_GET['tahun'] : '' ;
?>
<style type="text/css">
    body a.dt-button {
        background: #ef6c02 !important;
    }
    .group-tombol a {
        background: #2196F3;
        color: white !important;
    }
</style>

<section class="content">
    <div class="container-fluid">   
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> Pelaporan dan informasi</h2>
                    </div>
                    <div class="body">
                        
                        <div class="form-search">
                            <form class="form" action="">
                                <input type="hidden" name="pg" value="pelaporan">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun">
                                        <option value="">Pilih Tahun</option>
                                         <?= $nilaiClass->selectTahun(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="act" value="s_lapor">
                                    <input type="submit" value="Search" class="btn btn-prymary"> 
                                </div>
                            </form>
                        </div>

                        <div class="table">
                            <table class="table table-bordered table-striped table-hover ikhsandt">
                                <thead>
                                    <tr>
                                        <th>Rangking</th>
                                        <th>Nama Ormawa</th>
                                        <th>Nilai Preferensi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($pelaporan->ShowPelaporan($tahun) as $key => $value) {
                                            $unserial = unserialize($value['data_rangking']);
                                            // print_r($unserial);
                                            sort($unserial);
                                            foreach ($unserial as $keys => $data) {
                                                $ormawa = $pelaporan->getnameOrmawa($data['singkatan']);
                                                
                                     ?>
                                    <tr>
                                        <td><?php echo $data['rank']; ?></td>
                                        <td><?php
                                            foreach ($ormawa as $k => $mawa) {
                                                echo $mawa['nama_ormawa'];
                                            }
                                         ?></td>
                                        <td><?php echo $data['r_prefensi']; ?></td>
                                    </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if (!empty($tahun)): ?>
                                
                            <div class="group-tombol">
                                <div class="form-group">
                                    <a href="index.php?pg=perhitungan&tahun=<?php echo $tahun; ?>&act=s_per" class="btn btn-prymary">Detail Perhitungan</a>    
                                </div>
                            </div>

                            <?php endif ?>
                        </div>
                    </div> <!-- end body -->
                </div>
            </div>
        </div>
    </div>
</section>