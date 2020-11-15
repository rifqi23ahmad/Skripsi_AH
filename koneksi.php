<?php
// $link = mysqli_connect('localhost', 'root', '');
// if (!$link) {
//     die('Not connected : ' . mysqli_error());
// }
// $db_selected = mysqli_select_db('aha', $link);
// if (!$db_selected) {
//     die ('Can\'t use foo : ' . mysqli_error());
// }

$server = 'localhost';
$user 	= 'root';
$pass 	= '';
$db 	= 'aha';

$konek = mysqli_connect($server,$user,$pass,$db);

if (!$konek) {
	die('Error Koneksi Bosku : ' . mysqli_error());
}

?>

