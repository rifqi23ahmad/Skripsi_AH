    <?php
	
	   $s = "SELECT * AS jum FROM tb_unit";
   $q = mysqli_query($konek,$s);
   $r = mysqli_fetch_assoc($q);
 
   
	   $aksi="$_GET[aksi]"; 
	   $caption = "Data";
	  if ($aksi=="tambah") {$caption = "Tambah";}
	  if ($aksi=="edit") {$caption = "Edit";}
	  
	?>
	<section class="content">
        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?= $caption ?> Pengguna Ormawa
                            </h2>
                            
                        </div>
<?php 
 
 switch ($aksi) {
    case "tambah":
?>
 <div class="body">
<form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address_2" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" id="email_address_2" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Kata Sandi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password_2" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Ulangi Kata Sandi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password_2" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Ormawa</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control">
  <option value="volvo">BEM KM</option>
  <option value="saab">DPM KM</option>
  <option value="opel">UKM Taekwondo</option>
  <option value="audi">UKM Silat</option>
</select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" class="btn btn-success m-t-15 waves-effect">Simpan</button>
										<a href="?pg=pengguna"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
                                    </div>
                                </div>
                            </form>
							</div>
							
<?php
       
        break;
case "edit":
?>
 <div class="body">
<form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address_2" class="form-control" value="nama_lengkap">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" id="email_address_2" class="form-control" value="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Kata Sandi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password_2" class="form-control" value="kata_sandi">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Ormawa</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" class="btn btn-success m-t-15 waves-effect">Update</button>
										<a href="?pg=pengguna"><button type="button" class="btn btn-warning m-t-15 waves-effect">Batal</button></a>
                                    </div>
                                </div>
                            </form>
							</div>
							
<?php
       
        break;
		
    case "label2":
        
        break;
    case "label3":
       
        break;
   
    default:
  ?>

						<div class="body">
						    <a href="?pg=pengguna&aksi=tambah" class="btn btn-success btn-sm">Tambah</a><br/><br/>
						
                            <div class="table">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="30">No</th>
                                            <th>Nama Lengkap</th>
											<th>Email</th>
											<th>Unit Kerja</>
											<th width="50">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        										<tr>
                                            <td>1</td>
                                            <td>Abu Bakar Kumna</td>
											<td>abu@upy.ac.id</td>
											<td>Abu Bakar Kumna</td>
											 
                                            <td> <a href="?pg=pengguna&aksi=hapus" class="btn btn-primary btn-xs glyphicon glyphicon-remove"></a> 
											     <a href="?pg=pengguna&aksi=edit" class="btn btn-warning btn-xs glyphicon glyphicon-edit"></a>
											</td>
                                           
                                        </tr>
										 
                                     
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
