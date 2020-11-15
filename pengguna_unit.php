<?php

include('koneksi.php');
global $pengguna_unit;

$aksi="$_GET[aksi]";
$caption = "Data";
if ($aksi=="tambah") {$caption = "Tambah";}
if ($aksi=="edit") {$caption = "Edit";}
$tabel="tb_pengguna_unit";
$c_tabel="Pengguna Unit";
$pk="id_pengguna_unit";
?>
<section class="content">
<div class="container-fluid">
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
<h2><?= $caption ?> <?=$c_tabel?></h2>
</div>
<?php
switch ($aksi) {
case "tambah":
?>
<div class="body">
<form class="form-horizontal"  enctype="multipart/form-data" action="" method="post">
<?php
e_text("nama_lengkap","Nama Lengkap",50,"");
e_email("email","Email",""); 
e_password('kata_sandi','Kata Sandi','');
?>
 
  <div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
      <label>Unit</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
      <div class="form-group">
        <div class="form-line">
        <select name='unit' class='form-control'>
          <option value=''>Silahkan Pilih</option>
           <?php 
              foreach ($pengguna_unit->getUnit() as $key => $value) { ?>
                <option value='<?php echo $value['id_unit'] ?>'><?php echo $value['nama_unit']; ?></option> 
            <?php } ?>
        </select>

        </div>
      </div>
    </div>
  </div> 

<?php 
e_text("jabatan","Jabatan",50,"");
// e_foto("Foto",""); ?>
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
      <label>File Foto</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
      <div class="form-group">
        <div class="form-line">
			<input type="file" name="photo" class="form-control">
        </div>
      </div>
    </div>


    <div class="row clearfix">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
          <button type="submit" class="btn btn-success m-t-15 waves-effect" name="simpan">Simpan</button>
          <a href="?pg=<?=$pg?>"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
        </div>
      </div>
</form>
</div>

<?php

break;
case "edit":

$ids = isset($_GET['id']) ? $_GET['id'] : '';
$s = "SELECT *
FROM  tb_pengguna_unit
INNER JOIN tb_unit
ON tb_pengguna_unit.id_unit = tb_unit.id_unit WHERE $pk='".$ids."'";
$q = mysqli_query($konek,$s);
$r=mysqli_fetch_array($q);
?>
<div class="body">
<form class="form-horizontal"  enctype="multipart/form-data" action="" method="post">
<?php
e_text("nama_lengkap","Nama Lengkap",50,$r['nama_lengkap']);
e_email("email","Email",$r['email']);
e_password('kata_sandi','Kata Sandi',$r['kata_sandi']);
// e_select_db("unit","Unit","SELECT * FROM tb_unit","id_unit","nama_unit",$r['id_unit']); ?>
 <div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
      <label>Unit</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
      <div class="form-group">
        <div class="form-line">
        <select name='unit' class='form-control'>
          <option value=''>Silahkan Pilih</option>
           <?php 
              foreach ($pengguna_unit->getUnit() as $key => $value) { ?>
              	<?php $selected = ( $value['id_unit'] == $r['id_unit'] ) ? 'selected' : ''; ?>
                <option value='<?php echo $value['id_unit'] ?>' <?php echo $selected; ?>><?php echo $value['nama_unit']; ?></option> 
            <?php } ?>
        </select>

        </div>
      </div>
    </div>
  </div> 
<?php
e_text("jabatan","Jabatab",50,"$r[jabatan]");
// e_foto("Photo",$r['gambar']);
// e_update($pg);
?>
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
      <label>File Foto</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
      <div class="form-group">
        <div class="form-line">
        	<img src="images/<?php echo $r['gambar'] ?>" width='100px'  >
			<input type="file" name="photo" class="form-control">
			<input type="hidden" name="hid_image" value="<?php echo $r['gambar']; ?>">
        </div>
      </div>
    </div>

	<div class="row clearfix">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
          <button type="submit" class="btn btn-success m-t-15 waves-effect" name="update">Simpan</button>
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
<th width="150">Nama Lengkap</th>
<th>Email</th>
<th>Unit Kerja</th>
<th>Jabatan</th>
<th>Gambar</th>
<th width="50">Aksi</th>

</tr>

</thead>

<tbody>
<?php
$no=0;
$s = "SELECT *
FROM  tb_pengguna_unit
INNER JOIN tb_unit
ON tb_pengguna_unit.id_unit = tb_unit.id_unit";
$q = mysqli_query($konek,$s);
while ($r=mysqli_fetch_array($q)){
$no++;
?>
<tr>

<td><?=$no?></td>
<td><?=$r['nama_lengkap']?></td>
<td><?=$r['email']?></td>
<td><?=$r['nama_unit']?></td>
<td><?=$r['jabatan']?></td>
<td><img src="images/<?=$r['gambar']?>" width="30" height="30" alt="User" /></td>

<td> <a href="?pg=pengguna_unit&aksi=hapus&id=<?=$r[$pk]?>" class="btn btn-primary btn-xs glyphicon glyphicon-remove"></a>
<a href="?pg=<?=$pg?>&aksi=edit&id=<?=$r[$pk]?>" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a>
</td>

</tr>
<?php }?>

</tbody>
</table>
</div>
</div>
<?php }?>
</div>
</div>
</div>
<!-- #END# Basic Examples -->

</div>
</section>
