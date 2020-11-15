<?php 
function selectedDB($konek,$table){
	$sql = "SELECT * FROM ".$table;
	$query = mysqli_query($konek,$sql);
	return $query;
}

function selcetGeneralDB($konek,$sql){
	$query = mysqli_query($konek,$sql);
	return $query;
}

function cekNumberlength($num){ 
	return $numlength = strlen((string)$num);
}

function changeformatNumber($num){
	return number_format($num,3);
}

?>