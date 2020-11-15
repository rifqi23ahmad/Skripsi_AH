$(document).ready(function(){
	simpan_unit();
	simpan_unit_tambah();
	removeUnit();
	//====== Ormawa ======//
	simpan_ormawa_tambah();
	simpan_ormawa_update();
	removeOrmawa();

	//===== Kriteria ===//
	simpan_kriteria_tambah();
	simpan_kriteria_update();
	removeKriteria();

	//===== Nilai =====//
	simpan_nilai_tambah();
	simpan_nilai_update();
	removeNilai();

	// ==== BOBOT ====//
	simpan_bobot_tambah();
	simpan_bobot_update();
	removeBobot();

	loadtb();
});

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
}

function simpan_unit(){
	$('body').on('click','.form-horizontal .unit', function(){
		var $nama = $('input[name="nama_unit"]').val();
		var $singkatan = $('input[name="singkatan"]').val();

		if ($nama.length == 0) {
			alert('Maaf Belum Diisi');
		} 

		if($singkatan.length == 0){
			alert('Maaf Belum Diisi Full');
		}

		var id = getUrlParameter('ids');
		var aksi = getUrlParameter('aksi');
		var data = { action:'saveUnit','nama':$nama,'singkatan':$singkatan, 'ids': id,'aksi':aksi };
		

		$.ajax({
			url:'function-unit.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				location.reload();
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});
	});
}

function simpan_unit_tambah(){
	$('body').on('click','.form-horizontal .unit-tambah', function(){
		var $nama = $('input[name="nama_unit"]').val();
		var $singkatan = $('input[name="singkatan"]').val();
		var id = getUrlParameter('ids');
		var aksi = getUrlParameter('aksi');
		var data = { action:'saveUnit','nama':$nama,'singkatan':$singkatan, 'id': id,'aksi':aksi };
		

		$.ajax({
			url:'function-unit.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				window.location.href= '?pg=unit';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});
	});
}

function removeUnit(){
	$('body').on('click','.remove-unit', function(e){
		
		e.preventDefault();

		var $id = $(this).data('id');

		var data = { action:'removeUnit','id': $id};

		$.ajax({
			url:'function-unit.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				window.location.href= '?pg=unit';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});

	});
}

//============= ORMAWA ==================//
function simpan_ormawa_tambah(){
	$('body').on('click','.form-horizontal .ormawa-tambah', function(){
		var $nama = $('input[name="nama_ormawa"]').val();
		var $singkatan = $('input[name="singkatan"]').val();
		var id = getUrlParameter('id');
		var aksi = getUrlParameter('aksi');
		var data = { action:'saveOrmawa','nama':$nama,'singkatan':$singkatan, 'id': id,'aksi':aksi };
		

		$.ajax({
			url:'function-ormawa.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				window.location.href= '?pg=ormawa';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});
	});
}

function simpan_ormawa_update(){
	$('body').on('click','.form-horizontal .ormawa-update', function(){
		var $nama = $('input[name="nama_ormawa"]').val();
		var $singkatan = $('input[name="singkatan"]').val();

		if ($nama.length == 0) {
			alert('Maaf Belum Diisi');
		} 

		if($singkatan.length == 0){
			alert('Maaf Belum Diisi Full');
		}

		var id = getUrlParameter('ids');
		var aksi = getUrlParameter('aksi');
		var data = { action:'saveOrmawa','nama':$nama,'singkatan':$singkatan, 'ids': id,'aksi':aksi };
		

		$.ajax({
			url:'function-ormawa.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				window.location.href= '?pg=ormawa';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});
	});
}

function removeOrmawa(){
	$('body').on('click','.remove-ormawa', function(e){
		
		e.preventDefault();

		var $id = $(this).data('id');

		var data = { action:'removeOrmawa','id': $id};

		$.ajax({
			url:'function-ormawa.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				window.location.href= '?pg=ormawa';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});

	});
}

//============= Kriteria ==================//
function simpan_kriteria_tambah(){
	$('body').on('click','.form-horizontal .kriteria-tambah', function(){
		var $kode_kriteria = $('input[name="kode_kriteria"]').val();
		var $nama_kriteria = $('input[name="nama_kriteria"]').val();
		var id = getUrlParameter('id');
		var aksi = getUrlParameter('aksi');
		var data = { action:'saveKriteria','kode_kriteria':$kode_kriteria,'nama_kriteria':$nama_kriteria, 'id': id,'aksi':aksi };
		

		$.ajax({
			url:'function-kriteria.php',
			data:data,
			type:'POST',
			success: function(response){
				console.log(response);
				window.location.href= '?pg=kriteria';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});
	});
}

function simpan_kriteria_update(){
	$('body').on('click','.form-horizontal .kriteria-update', function(){
		var $kode_kriteria = $('input[name="kode_kriteria"]').val();
		var $nama_kriteria = $('input[name="nama_kriteria"]').val();

		if ($kode_kriteria.length == 0) {
			alert('Maaf Belum Diisi');
		} 

		if($nama_kriteria.length == 0){
			alert('Maaf Belum Diisi Full');
		}

		var id = getUrlParameter('ids');
		var aksi = getUrlParameter('aksi');
		var data = { action:'saveKriteria','kode_kriteria':$kode_kriteria,'nama_kriteria':$nama_kriteria, 'ids': id,'aksi':aksi };
		

		$.ajax({
			url:'function-kriteria.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				window.location.href= '?pg=kriteria';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});
	});
}

function removeKriteria(){
	$('body').on('click','.remove-kriteria', function(e){
		
		e.preventDefault();

		var $id = $(this).data('id');

		var data = { action:'removeKriteria','id': $id};

		$.ajax({
			url:'function-kriteria.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				window.location.href= '?pg=kriteria';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});

	});
}

	//============= Nilai ==================//
function simpan_nilai_tambah(){
	$('body').on('click','.form-horizontal .nilai-tambah', function(){
		var $tahun 		= $('input[name="tahun"]').val();
		var $ormawa 	= $('select[name="ormawa"]').val();
		var $kriteria 	= $('select[name="kriteria"]').val();
		var $nilai 		= $('input[name="nilai"]').val();
		
		var id = getUrlParameter('id');
		var aksi = getUrlParameter('aksi');
		var data = { action:'saveNilai',
					'tahun':$tahun,
					'ormawa':$ormawa, 
					'kriteria':$kriteria,
					'nilai' : $nilai,
					'id': id,
					'aksi':aksi 
				};
		

		$.ajax({
			url:'function-nilai.php',
			data:data,
			type:'POST',
			success: function(response){
				console.log(response);
				window.location.href= '?pg=n_kriteria';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});
	});
}

function simpan_nilai_update(){
	$('body').on('click','.form-horizontal .nilai-edit', function(){
		var $tahun 		= $('input[name="tahun"]').val();
		var $ormawa 	= $('select[name="ormawa"]').val();
		var $kriteria 	= $('select[name="kriteria"]').val();
		var $nilai 		= $('input[name="nilai"]').val();
		
		var id = getUrlParameter('ids');
		var aksi = getUrlParameter('aksi');
		var data = { action:'saveNilai',
					'tahun':$tahun,
					'ormawa':$ormawa, 
					'kriteria':$kriteria,
					'nilai' : $nilai,
					'ids': id,
					'aksi':aksi 
				};

		$.ajax({
			url:'function-nilai.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				window.location.href= '?pg=n_kriteria';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});
	});
}

function removeNilai(){
	$('body').on('click','.remove-nilai', function(e){
		
		e.preventDefault();

		var $id = $(this).data('id');

		var data = { action:'removeNilai','id': $id};

		$.ajax({
			url:'function-nilai.php',
			data:data,
			type:'POST',
			success: function(response){
				// console.log(response);
				window.location.href= '?pg=n_kriteria';
			},
			error: function(xhr, error, status){
				alert(' AHA Error - ' + xhr.status);
			}

		});

	});
}


	//============= Bobot ==================//
	function simpan_bobot_tambah(){
		$('body').on('click','.form-horizontal .bobot-tambah', function(){
			var $tahun 		= $('input[name="tahun"]').val();
			var $kriteria 	= $('select[name="kriteria"]').val();
			var $bobot 		= $('input[name="bobot"]').val();
			
			var id = getUrlParameter('ids');
			var aksi = getUrlParameter('aksi');
			var data = { action:'saveBobot',
						'tahun':$tahun,
						'kriteria':$kriteria,
						'bobot' : $bobot,
						'ids': id,
						'aksi':aksi 
					};
			
	
			$.ajax({
				url:'function-bobot.php',
				data:data,
				type:'POST',
				success: function(response){
					// console.log(response);
					window.location.href= '?pg=bobotkriteria';
				},
				error: function(xhr, error, status){
					alert(' AHA Error - ' + xhr.status);
				}
	
			});
		});
	}
	
	function simpan_bobot_update(){
		$('body').on('click','.form-horizontal .bobot-edit', function(){
			var $tahun 		= $('input[name="tahun"]').val();
			var $kriteria 	= $('select[name="kriteria"]').val();
			var $bobot 		= $('input[name="bobot"]').val();
			
			var id = getUrlParameter('ids');
			var aksi = getUrlParameter('aksi');
			var data = { action:'saveBobot',
						'tahun':$tahun,
						'kriteria':$kriteria,
						'bobot' : $bobot,
						'ids': id,
						'aksi':aksi 
					};
	
			$.ajax({
				url:'function-bobot.php',
				data:data,
				type:'POST',
				success: function(response){
					// console.log(response);
					window.location.href= '?pg=bobotkriteria';
				},
				error: function(xhr, error, status){
					alert(' AHA Error - ' + xhr.status);
				}
	
			});
		});
	}
	
	function removeBobot(){
		$('body').on('click','.remove-bobot', function(e){
			
			e.preventDefault();
	
			var $id = $(this).data('id');
	
			var data = { action:'removeBobot','id': $id};
	
			$.ajax({
				url:'function-bobot.php',
				data:data,
				type:'POST',
				success: function(response){
					// console.log(response);
					window.location.href= '?pg=bobotkriteria';
				},
				error: function(xhr, error, status){
					alert(' AHA Error - ' + xhr.status);
				}
	
			});
	
		});
	}

function loadtb(){
	$('body').find('.ikhsandt').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pdf', 'print'
        ]
    } );
}