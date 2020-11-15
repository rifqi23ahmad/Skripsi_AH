<?php
$aksi="$_GET[aksi]";
$caption = "Data";
if ($aksi=="tambah") {$caption = "Tambah";}
if ($aksi=="edit") {$caption = "Edit";}
?>
<section class="content">
<div class="container-fluid">
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
<h2><?= $caption ?> Unit Kerja</h2>
</div>
<?php
switch ($aksi) {
case "tambah":
?>
<div class="body">
<form class="form-horizontal">
<?php
e_text("nama_unit","Nama Unit",50,"");
e_text("singkatan","Singkatan",30,"");
// e_simpan($pg)
?>
	<div class="row clearfix">
    	<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
    		<button type="button" class="btn btn-success m-t-15 waves-effect unit-tambah" name="simpan">Simpan</button>
    		<a href="?pg=<?=$pg?>"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
    	</div>
    </div>

</form>
</div>

<?php
break;
case "edit":
$s = "SELECT *  FROM tb_unit WHERE id_unit='$_GET[ids]'";
$q = mysqli_query($konek,$s);
$r = mysqli_fetch_array($q);
?>
<div class="body">
<form class="form-horizontal">
<?php
    e_text("nama_unit","Nama Unit",50,$r['nama_unit']);
    e_text("singkatan","Singkatan",30,$r['singkatan']);
    // e_update($pg);
?>
	<div class="row clearfix">
    	<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
    		<button type="button" class="btn btn-success m-t-15 waves-effect unit" name="simpan">Simpan</button>
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
<th>Nama Unit Kerja</th>
<th>Singkatan</th>
<th width="50">Aksi</th>
</tr>
</thead>
<tbody>
<?php
$no=0;
$s = "SELECT *  FROM tb_unit";
$q = mysqli_query($konek,$s);
while ($r=mysqli_fetch_array($q)){
$no++;
?>
<tr>
<td><?=$no?></td>
<td><?=$r['nama_unit']?></td>
<td><?=$r['singkatan']?></td>
<td> <a href="#" class="btn btn-primary btn-xs glyphicon glyphicon-remove remove-unit" data-id="<?=$r['id_unit']?>" ></a>
<a href="?pg=<?=$pg?>&aksi=edit&ids=<?=$r['id_unit']?>" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a>
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
