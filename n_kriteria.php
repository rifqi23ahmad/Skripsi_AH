<?php
$aksi="$_GET[aksi]";
$caption = "Data";

$tb_kriteria  = 'tb_kriteria';
$tb_ormawa    = 'tb_ormawa';

if ($aksi=="tambah") {$caption = "Tambah";}
if ($aksi=="edit") {$caption = "Edit";}
?>
<section class="content">
<div class="container-fluid">
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
<h2><?= $caption ?> Nilai Kriteria</h2>
</div>
<?php
switch ($aksi) {
case "tambah":
?>
<div class="body">
  <form class="form-horizontal">
  
  <?php e_text("tahun","Tahun",100,""); ?>
  
  <div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
      <label>Ormawa</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
      <div class="form-group">
        <div class="form-line">
        <?php $select_ormawa = selectedDB($konek,$tb_ormawa); ?>
        <select name='ormawa' class='form-control'>
          <option value=''>Silahkan Pilih</option>
           <?php 
              foreach ($select_ormawa as $key => $value) { ?>
                <option value='<?php echo $value['id_ormawa'] ?>'><?php echo $value['nama_ormawa']; ?></option> 
            <?php } ?>
        </select>

        </div>
      </div>
    </div>
  </div> 

  <div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
      <label>Kriteria</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
      <div class="form-group">
        <div class="form-line">

        <?php $select_kriteria = selectedDB($konek,$tb_kriteria); ?>
        <select name='kriteria' class='form-control'>
            <option value=''>Silahkan Pilih</option>
            <?php 
              foreach ($select_kriteria as $key => $value) { ?>
                <option value='<?php echo $value['kode_kriteria'] ?>'><?php echo $value['kode_kriteria']; ?></option> 
            <?php } ?>
        </select>

        </div>
      </div>
    </div>
  </div>   
  
  <?php e_text("nilai","Nilai",100,"");
  // e_simpan($pg)
  ?>
    <div class="row clearfix">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
          <button type="button" class="btn btn-success m-t-15 waves-effect nilai-tambah" name="simpan">Simpan</button>
          <a href="?pg=<?=$pg?>"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
        </div>
      </div>
  </form>
</div>

<?php
break;
case "edit":
$s = "SELECT *  FROM tb_nilai WHERE id_nilai='$_GET[ids]'";
$q = mysqli_query($konek,$s);
$r = mysqli_fetch_array($q);
?>
<div class="body">
<form class="form-horizontal">
<?php e_text("tahun","Tahun",100,$r['tahun']); ?>
  
  <div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
      <label>Ormawa</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
      <div class="form-group">
        <div class="form-line">

        <select name='ormawa' class='form-control'>
          <option value=''>Silahkan Pilih</option>
         <?php $select_ormawa = selectedDB($konek,$tb_ormawa); ?>
         <?php 
              foreach ($select_ormawa as $key => $value) { 
                $selected = ( $r['id_ormawa'] == $value['id_ormawa'] ) ? 'selected' : '' ;
          ?>
                <option value='<?php echo $value['id_ormawa'] ?>' <?= $selected; ?>><?php echo $value['nama_ormawa']; ?></option> 
            <?php } ?>
        </select>

        </div>
      </div>
    </div>
  </div> 

  <div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
      <label>Kriteria</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
      <div class="form-group">
        <div class="form-line">
          <?php $select_kriteria = selectedDB($konek,$tb_kriteria); ?>
        <select name='kriteria' class='form-control'>
          <option value=''>Silahkan Pilih</option>
            <?php 
              foreach ($select_kriteria as $key => $value) { 
                $selected = ( $r['id_kriteria'] == $value['kode_kriteria'] ) ? 'selected' : '' ;
                ?>
                <option value='<?php echo $value['kode_kriteria'] ?>' <?= $selected; ?>><?php echo $value['kode_kriteria']; ?></option> 
            <?php } ?>
        </select>

        </div>
      </div>
    </div>
  </div>   
  
  <?php e_text("nilai","Nilai",100,$r['nilai']); ?>

  <div class="row clearfix">
      <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
        <button type="button" class="btn btn-success m-t-15 waves-effect nilai-edit" name="simpan">Simpan</button>
        <a href="?pg=<?=$pg?>"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
      </div>
    </div>
</form>
</div>
<?php
break;
default:
?>

<div class="body">

  <?php 
  global $nilaiClass;  
  ?>

  <div class="form-search">
   <form class="form" action="">
    <input type="hidden" name="pg" value="n_kriteria">
    <div class="form-group">
      <label>Tahun</label>
      <select name="tahun">
        <option value="">Pilih Tahun</option>
       <?= $nilaiClass->selectTahun(); ?>
      </select>
    </div>
    <div class="form-group">
      <label>Ormawa</label>
      <select name="ormawa">
        <option value="">Pilih Ormawa</option>
        <?= $nilaiClass->selectOrmawa(); ?>
      </select>
    </div>
    <div class="form-group">
      <input type="hidden" name="act" value="s">
      <input type="submit" value="Search" class="btn btn-prymary"> 
    </div>
   </form>
  </div>
  
  <a href="?pg=<?=$pg?>&aksi=tambah" class="btn btn-success btn-sm">Tambah</a><br/><br/>
  
  <?php if(isset($_GET['act']) AND $_GET['act'] == 's'){ ?>
    
    <div class="table">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <thead>
        <tr>
          <th width="30">No</th>
          <th>Kode Kriteria</th>
          <th>Nama Ormawa</th>
          <th>Nilai</th>
          <th width="50">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no=1;
          $search =  $nilaiClass->getSearch();
          foreach ($search as $key => $r) {
        ?>
        <tr>
          <td><?=$no++; ?></td>
          <td><?=$r['kode_kriteria']?></td>
          <td><?=$r['nama_ormawa']?></td>
          <td><?=$r['nilai']?></td>
          <td> <a href="#" class="btn btn-primary btn-xs glyphicon glyphicon-remove remove-nilai" data-id="<?=$r['id_nilai']?>" ></a>
          <a href="?pg=<?=$pg?>&aksi=edit&ids=<?=$r['id_nilai']?>" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div> <!-- end div table -->
  
  <?php }else{ ?>

  <div class="table">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <thead>
        <tr>
          <th width="30">No</th>
          <th>Kode Kriteria</th>
          <th>Nama Ormawa</th>
          <th>Nilai</th>
          <th width="50">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no=0;
          $s = "SELECT * FROM tb_nilai a 
                LEFT JOIN tb_ormawa b ON b.id_ormawa = a.id_ormawa
                LEFT JOIN tb_kriteria c ON c.kode_kriteria = a.id_kriteria";
          $q = mysqli_query($konek,$s);
          
          while ($r=mysqli_fetch_array($q)){
          $no++;
        
        ?>
        <tr>
          <td><?=$no?></td>
          <td><?=$r['kode_kriteria']?></td>
          <td><?=$r['nama_ormawa']?></td>
          <td><?=$r['nilai']?></td>
          <td> <a href="#" class="btn btn-primary btn-xs glyphicon glyphicon-remove remove-nilai" data-id="<?=$r['id_nilai']?>" ></a>
          <a href="?pg=<?=$pg?>&aksi=edit&ids=<?=$r['id_nilai']?>" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div> <!-- end div table -->
  <?php } ?>
</div> <!-- end body -->

<?php }?>

</div>
</div>
</div>
</div>
</section>
