<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<!-- css -->
    <link rel="stylesheet" href="<?=base_url('assets/css/css.css');?>">

	<!-- materialize -->
    <link rel="stylesheet" href="<?=base_url('assets/materialize/css/materialize.css');?>">

	<!-- fontawesome -->
	<link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.css');?>">

</head>
<body class="blue-grey lighten-5">
	<!-- navbar -->	
	  <nav class="blue darken-2">
	  	<div class="w97">
	    <div class="nav-wrapper">
	      <a href="<?=base_url();?>" class="brand-logo">UjianCBT</a>
	      <ul class="right">
	        <li><a href="#"><p>M.Afakhan Saifudin Alwi</p><i class="fa fa-caret-down"></i></a>
				<div id="dropdown" class="card">
					<div class="arrow"></div>
					<div class="w98 mgratas0">
						<div class="card-content blue flxctr user">
							<div class="icon"><img src="<?=base_url('assets/img/user.png');?>" alt=""></div>
							<p>Muhammad Zulfi Izzulhaq</p>
							<p>16.10853</p>
							<p>12 TKJ 2</p>
						</div>
						<div class="card-action flxspacebetween">
							<a href="lupapass.html" class="btn waves-effect waves-light green">Profile</a>
							<button class="btn waves-effect waves-light red">Keluar</button>
						</div>
					</div>
				</div>
	        </li>
	      </ul>
	    </div>
	    </div>
	  </nav>

	  <!-- main -->

	<main class="w84 mgratas3">
		<div class="card uporen">
			<h4 class="center-align">Jadwal Hari ini</h4>
			<div class="container white">
				<div class="parent">
					<div id="jadwal1" class="jadwal orange white-text waves-effect waves-light"><p class="kiri center-align">Matematika</p></div>
					<div class="spek"><p>jumlah soal : 20 <br>waktu : 60 menit</p>
					<a href="index(1).html">
					<button class="btn mulai">mulai</button></a></div>
				</div>
				<div class="parent">
					<div id="jadwal2" class="jadwal orange white-text waves-effect waves-light"><p class="kiri center-align">Bahasa Indonesia</p></div>
					<div class="spek"><p>jumlah soal : 30 <br>waktu : 60 menit</p>
					<a href="#">
					<button class="btn mulai">mulai</button></a></div>
				</div>
				<div class="parent">
					<div id="jadwal3" class="jadwal orange white-text waves-effect waves-light"><p class="kiri center-align">Rancang Bangun Jaringan</p></div>
					<div class="spek"><p>jumlah soal : 50 <br>waktu : 60 menit</p>
					<a href="#">
					<button class="btn mulai">mulai</button></a></div>
				</div>
		   	</div>
		</div>
	</main>
<script type="text/javascript" src="<?=base_url('assets/materialize/js/materialize.js');?>"></script>
<script src="<?=base_url('assets/js/index.js');?>"></script>
<script>
	var ubah = document.getElementsByClassName('jadwal');
	ubah[0].addEventListener('click', function() {
		ubah[0].style.width = '50%';
		ubah[0].style.transition = 'all 1s ease';
	});
//
	ubah[1].addEventListener('click', function() {
		ubah[1].style.width = '50%';
		ubah[1].style.transition = 'all 1s';
	});
//
	ubah[2].addEventListener('click', function() {
		ubah[2].style.width = '50%';
		ubah[2].style.transition = 'all 1s';
	});

var  jadArray = ['jadwal1','jadwal2','jadwal3'];
	window.addEventListener('mouseup', function(event) {
	for (var i = 0; i < jadArray.length; i++) {
		var jad = document.getElementById(jadArray[i]);
		if( event.target != jad || event.target.parentNode != jad) {
				jad.style.width = '100%';
			}
		}
	});

</script>
</body>
</html>
