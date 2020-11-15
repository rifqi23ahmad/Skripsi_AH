<?php

function Uploadgambar($fupload_name){
    //direktori gambar
    $vdir_upload = "../../assets/icon/";
    $vfile_upload = $vdir_upload . $fupload_name;

    //Simpan gambar dalam ukuran sebenarnya
move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
    //
}

function Uploadimages($fupload_name){
    //direktori gambar
    $vdir_upload = "../img/";
    $vfile_upload = $vdir_upload . $fupload_name;

    //Simpan gambar dalam ukuran sebenarnya
    move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);




}

function Uploadimages2($fupload_name){
    //direktori gambar
    $vdir_upload = "img/";
    $vfile_upload = $vdir_upload . $fupload_name;

    //Simpan gambar dalam ukuran sebenarnya
    move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);




}


function Uploadvideo($fupload_name){
    //direktori video
    $vdir_upload = "../../assets/video/";
    $vfile_upload = $vdir_upload . $fupload_name;

    //Simpan video dalam ukuran sebenarnya
    move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

}




?>
