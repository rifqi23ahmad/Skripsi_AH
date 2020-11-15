<?php
   session_start();
?>
 <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/<?=$gambar?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$nama_lengkap?></div>
                    <div class="email"><?=$email?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="logout.php"><i class="material-icons">input</i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU UTAMA</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Data Master</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="index.php?pg=unit" ><span>Unit</span></a></li>
							<li><a href="index.php?pg=pengguna_unit" ><span>Pengguna Unit</span></a></li>
							<li><a href="index.php?pg=ormawa" ><span>Ormawa</span></a></li>
							<li><a href="index.php?pg=kriteria" ><span>Kriteria</span></a></li>
							
                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Data Perhitungan</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="index.php?pg=n_kriteria" ><span>Data Nilai Kriteria</span></a></li>
							<li><a href="index.php?pg=bobotkriteria" ><span>Data Bobot Kriteria</span></a></li>
                        </ul>
                    </li>
					
					<li>
                        <a href="index.php?pg=perhitungan" >
                            <i class="material-icons">swap_calls</i>
                            <span>Perhitungan</span>
                        </a>
                        
                    </li>
					<li>
                        <a href="index.php?pg=pelaporan" >
                            <i class="material-icons">view_list</i>
                            <span>Pelaporan & Informasi</span>
                        </a>
                       
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date("Y");?> <a href="javascript:void(0);">Ah Rifqi Ubaidillah</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>
