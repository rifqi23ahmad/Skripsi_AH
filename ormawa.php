<?php
$aksi="$_GET[aksi]";
$caption = "Data";
if ($aksi=="tambah") {$caption = "Tambah";}
if ($aksi=="edit") {$caption = "Edit";}
$tabel="tb_ormawa";
$c_tabel="Ormawa";
$pk="id_ormawa";
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
<form class="form-horizontal">
<?php
e_text("nama_ormawa","Nama Ormawa",50,"");
e_text("singkatan","Singkatan",50,"");
// e_simpan($pg);
?>
	<div class="row clearfix">
    	<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
    		<button type="button" class="btn btn-success m-t-15 waves-effect ormawa-tambah" name="simpan">Simpan</button>
    		<a href="?pg=<?=$pg?>"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
    	</div>
    </div>
</form>
</div>
<?php
break;
case "edit":
  $s = "SELECT *  FROM $tabel WHERE $pk='$_GET[ids]'";
  $q = mysqli_query($konek,$s);
  $r=mysqli_fetch_array($q);
?>
<div class="body">
<form class="form-horizontal">
<?php
e_text("nama_ormawa","Nama Ormawa",50,$r['nama_ormawa']);
e_text("singkatan","Nama Kriteria",50,$r['singkatan']);
// e_update($pg);
?>
	<div class="row clearfix">
    	<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
    		<button type="button" class="btn btn-success m-t-15 waves-effect ormawa-update" name="simpan">Simpan</button>
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
<th>Nama Ormawa</th>
<th>Singkatan</th>
<th width="50">Aksi</th>
</tr>
</thead>
<tbody>
<?php
$no=0;
$s = "SELECT * FROM $tabel";
$q = mysqli_query($konek,$s);
while ($r=mysqli_fetch_array($q)){
$no++;
?>
<tr>
<td><?=$no?></td>
<td><?=$r['nama_ormawa']?></td>
<td><?=$r['singkatan']?></td>
<td> <a href="?pg=<?=$pg?>&aksi=hapus" class="btn btn-primary btn-xs glyphicon glyphicon-remove remove-ormawa" data-id="<?=$r['id_ormawa']; ?>"></a>
<a href="?pg=<?=$pg?>&aksi=edit&ids=<?=$r['id_ormawa']; ?>" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a>
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
</div>
</section>
