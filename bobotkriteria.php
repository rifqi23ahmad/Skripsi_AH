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
<h2><?= $caption ?> Nilai Bobot Kriteria</h2>
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
  
  <?php e_text("bobot","Bobot",100,"");
  // e_simpan($pg)
  ?>
    <div class="row clearfix">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
          <button type="button" class="btn btn-success m-t-15 waves-effect bobot-tambah" name="simpan">Simpan</button>
          <a href="?pg=<?=$pg?>"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
        </div>
      </div>
  </form>
</div>

<?php
break;
case "edit":
$s = "SELECT *  FROM tb_bobot WHERE id_bobot='$_GET[ids]'";
$q = mysqli_query($konek,$s);
$r = mysqli_fetch_array($q);
?>
<div class="body">
<form class="form-horizontal">
<?php e_text("tahun","Tahun",100, $r['tahun']); ?>

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
              $selected = ( $value['kode_kriteria'] == $r['id_kriteria']) ? 'selected' : '' ;
          ?>
              <option value='<?php echo $value['kode_kriteria'] ?>' <?= $selected; ?> ><?php echo $value['kode_kriteria']; ?></option> 
          <?php } ?>
      </select>

      </div>
    </div>
  </div>
</div>   

<?php e_text("bobot","Bobot",100,$r['nilai']);
// e_simpan($pg)
?>

  <div class="row clearfix">
      <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
        <button type="button" class="btn btn-success m-t-15 waves-effect bobot-edit" name="simpan">Simpan</button>
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
 
 <a href="?pg=<?=$pg?>&aksi=tambah" class="btn btn-success btn-sm">Tambah</a><br/><br/>

  <div class="table">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <thead>
        <tr>
          <th width="30">No</th>
          <th>Kode Kriteria</th>
          <th>Nama Kriteria</th>
          <th>Bobot</th>
          <th width="50">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        global $BobotKriteria;
        $no = 1;
        // print_r($BobotKriteria->showBobot());
        foreach( $BobotKriteria->showBobot() as $bobot ){
      ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $bobot['kode_kriteria']; ?></td>
          <td><?= $bobot['nama_kriteria']; ?></td>
          <td><?= $bobot['nilai']; ?></td>
          <td> <a href="#" class="btn btn-primary btn-xs glyphicon glyphicon-remove remove-bobot" data-id="<?= $bobot['id_bobot']; ?>" ></a>
          <a href="?pg=<?=$pg?>&aksi=edit&ids=<?=$bobot['id_bobot']; ?>" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div> <!-- end div table -->
</div> <!-- end body -->

<?php } ?>

</div>
</div>
</div>
</div>
</section>
