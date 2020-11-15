<?php

function tgl($tgl){
      $date=date_create($tgl);
return date_format($date,"d-m-Y");
}

function hari($tgl){
$day = date('D', strtotime($tgl));
$dayList = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);

return $dayList[$day];
}

function ribuan($angka){
$hasil= number_format($angka,0,".",".");
return $hasil;
}


function e_select_db($name,$caption,$sql,$value,$option,$current){?>
<div class="row clearfix">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
<label for="<?=$name?>"><?=$caption?></label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
<div class="form-group">
<div class="form-line">

<?php  echo "<select name='$name' size='1' class='form-control' >";
  if ($current==""){
      echo "<option value='' selected></option>";
  }
  $q=mysql_query($sql);
  while ($r=mysql_fetch_array($q)){
        if ($r[$value]==$current){
            $selected="selected";                      ;
        }
        else{
           $selected="";
        }
        echo "<option value='$r[$value]' $selected>$r[$option]</option>";
  }
  echo "</select>";
?>
</div>
</div>
</div>
</div>

  <?php }


function e_hidden($name,$value){
         echo "<input type='hidden' name='$name' value='$value'>";
}

function e_select($name,$option,$current){?>
<div class="row clearfix">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
<label for="<?=$name?>"><?=$caption?></label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
<div class="form-group">
<div class="form-line">

<?php echo "<select name='$name' size='1' class='form-control' >";
  $arr_option=explode("|",$option);
   if ($current==""){
      echo "<option value='' selected></option>";
  }
  foreach ($arr_option as $x) {
        if ($x==$current){
            $selected="selected";                      ;
        }
        else{
           $selected="";
        }
        echo "<option value='$x' $selected>$x</option>";
  }?>
</div>
</div>
</div>
</div>

  <?php }

function e_date($name,$caption,$value){?>
<div class="row clearfix">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
<label for="<?=$name?>"><?=$caption?></label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
<div class="form-group">
<div class="form-line">
<input type='date' class='form-control' name='<?=$name?>' value='<?=$value?>' required >";
</div>
</div>
</div>
</div>
 <?php }

function e_text($name,$caption, $maxlength,$value, $option='required'){?>
<div class="row clearfix">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
<label for="<?=$name?>"><?=$caption?></label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
<div class="form-group">
<div class="form-line">
<input type='text' class='form-control' name='<?=$name?>'
maxlength='<?=$maxlength?>' value='<?=$value?>' <?=$option?> >
</div>
</div>
</div>
</div>


<?php }
  function e_simpan($pg){?>
 <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" class="btn btn-success m-t-15 waves-effect">Simpan</button>
										<a href="?pg=<?=$pg?>"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
                                    </div>
                                </div>

<?php }

function e_update($pg){?>
    <div class="row clearfix">
    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
    <button type="button" class="btn btn-success m-t-15 waves-effect" name="simpan">Simpan</button>
    <a href="?pg=<?=$pg?>"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
    </div>
    </div>
<?php }

function e_textarea($name,$value,$option){

     echo "<textarea class='form-control' name='$name' $option>$value</textarea>";

}


function e_view($value){

     echo "<input type='text' class='form-control' readonly
           value='$value' required >";

}

function e_view_text($value){

     echo "<textarea class='form-control' readonly>$value</textarea>";

}

function e_number($name,$caption,$value,$maxlength){
     echo "<div class='form-group'>";
     echo "<label>$caption</label>";
     echo "<input type='number' class='form-control' name='$name'
                  maxlength='$maxlength' required >";
     echo " </div>";
}

function e_number_limit($name,$caption,$value,$min,$max){

     echo "<input type='number' class='form-control' name='$name'
                  max='$max' min='$min' value='$value' required >";

}


function e_email($name,$caption, $value){?>
<div class="row clearfix">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
<label for="<?=$name?>"><?=$caption?></label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
<div class="form-group">
<div class="form-line">
<input type='email' class='form-control' name='<?=$name?>' value='<?=$value?>' required >
</div>
</div>
</div>
</div>
<?php }

function e_time($name,$caption,$value){
     echo "<div class='form-group'>";
     echo "<label>$caption</label>";
     echo "<input type='time' class='form-control' name='$name' value='$value' required >";
     echo " </div>";
 }
function e_password($name,$caption,$value){?>
<div class="row clearfix">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
<label for="<?=$name?>"><?=$caption?></label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
<div class="form-group">
<div class="form-line">
<input type='password' class='form-control' name='<?=$name?>' value='<?=$value?>'
                  autocomplete='new-password' required >
</div>
</div>
</div>
</div>
<?php }
 function e_foto($name,$caption,$value){ ?>
    <div class="row clearfix">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
<label for="<?=$name?>"><?=$caption?></label>
</div>
<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
<div class="form-group">
<div class="form-line">
<?php
if ($value<>""){
         echo "<img src='images/$value' width='100px'  >";
     }
     echo "<input type='file' class='form-control' name='fupload' value='$value' >";


 ?>
 </div>
</div>
</div>
</div>
<?php }

function modal_foto($judul,$id,$foto){?>
<!-- Trigger the modal with a button -->
<button type="button"  class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?= $id ?>">Lihat</button>

<!-- Modal -->
<div id="myModal<?= $id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?= $judul ?></h4>
      </div>
      <div class="modal-body">
           <img src="../img/<?= $foto ?>" style="max-width: 100%" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php }?>