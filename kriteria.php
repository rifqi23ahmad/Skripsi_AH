<?php
$aksi="$_GET[aksi]";
$caption = "Data";
if ($aksi=="tambah") {$caption = "Tambah";}
if ($aksi=="edit") {$caption = "Edit";}
$tabel="tb_kriteria";
$c_tabel="Kriteria";
$pk="kode_kriteria";
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
e_text("kode_kriteria","Kriteria",3,"");
e_text("nama_kriteria","Nama Kriteria",50,"");
// e_simpan($pg);
?>
	<div class="row clearfix">
    	<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
    		<button type="button" class="btn btn-success m-t-15 waves-effect kriteria-tambah" name="simpan">Simpan</button>
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
e_text("kode_kriteria","Kriteria",3,$r['kode_kriteria']);
e_text("nama_kriteria","Nama Kriteria",50,$r['nama_kriteria']);
// e_update($pg);
?>
	<div class="row clearfix">
    	<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
    		<button type="button" class="btn btn-success m-t-15 waves-effect kriteria-update" name="simpan">Simpan</button>
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
				<td><?=$r['kode_kriteria']?></td>
				<td><?=$r['nama_kriteria']?></td>
				<td> <a href="?pg=pengguna&aksi=hapus" class="btn btn-primary btn-xs glyphicon glyphicon-remove remove-kriteria" data-id="<?=$r['kode_kriteria']; ?>"></a>
				<a href="?pg=<?=$pg?>&aksi=edit&ids=<?=$r[$pk]?>" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a>
				</td>
			</tr>

		<?php }?>

		</tbody>
	</table>
</div> <!-- div.table -->

</div>
 <?php }?>
</div>
</div>
</div>
</div>
</section>
