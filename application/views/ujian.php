<?php
echo $this->uri->segment(1);
?>
<!-- main -->
	<div id="masuk" class="row w91 mgratas3 mgrbawah3">
	<main class="col s9">
		<div class="card upbiru">
			<form name="_form" method="post" id="_form">
				<?php
					$jawaban = array('A','B','C','D','E');
				?>
			<div class="card-content">
				<!-- <?=print_r($ujian);?> -->
				<audio src="#" class="" controls=""></audio>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae laborum fugit saepe distinctio accusantium cum delectus odit, modi, sit consectetur sed esse dolores laudantium magnam doloribus deleniti, itaque. Fugiat, minus.</p>
				<section>
			      <label>
			        <input class="with-gap" name="group1" type="radio">
			        <span>A Lorem ipsum dolor sit.</span>
			      </label>
			    </section>
			    <section>
			      <label>
			        <input class="with-gap" name="group1" type="radio">
			        <span>B Lorem ipsum dolor sit amet.</span>
			      </label>
			    </section>
			    <section>
			      <label>
			        <input class="with-gap" name="group1" type="radio">
			        <span>C Lorem ipsum dolor.</span>
			      </label>
			    </section>
		   </div>
		   <div class="card-action flxspacebetween">
			   <a href="" class="btn waves-effect blue ligten-1">sebelumnya</a>
			   <a href="" class="btn waves-effect blue lighten-1">selanjutnya</a>
		   </div>
		</form>
		</div>
	</main>

	<!-- aside -->
	<aside class="col s3">
		<!-- pagination -->
		<div class="card upbiru">
			<div class="container">
			<ul class="flxctr time">
				<li><span id="menit"></span>Menit</li>
			    <li><span id="detik"></span>Detik</li>
			</ul>
			</div>
			<div class="w93 center-align">
			<div class="card-action">
				<ul id="pagination" class="flxstart">
				 <li><a href="" class="waves-effect waves-light active">1</a></li>
				 <li><a href="" class="waves-effect waves-light">2</a></li>
				 <li><a href="" class="waves-effect waves-light">3</a></li>
				 <li><a href="" class="waves-effect waves-light">4</a></li>
				 <li><a href="" class="waves-effect waves-light">5</a></li>
				 <li><a href="" class="waves-effect waves-light">6</a></li>
				 <li><a href="" class="waves-effect waves-light">7</a></li>
				 <li><a href="" class="waves-effect waves-light">8</a></li>
				 <li><a href="" class="waves-effect waves-light">9</a></li>
				 <li><a href="" class="waves-effect waves-light">10</a></li>
				 <li><a href="" class="waves-effect waves-light">11</a></li>
				 <li><a href="" class="waves-effect waves-light">12</a></li>
				 <li><a href="" class="waves-effect waves-light">13</a></li>
				 <li><a href="" class="waves-effect waves-light">14</a></li>
				 <li><a href="" class="waves-effect waves-light">15</a></li>
				</ul>
			</div>
			<button class="btn modal-trigger waves-effect waves-light red mgrbawah3" data-target="modal1">Akhiri Ujian</button>
			
			<!-- isi modal -->
			<div class="modal" id="modal1">
				<div class="modal-content">
					<span><img src="<?=base_url('assets/img/warningbullet.png');?>" alt=""></span>
					<p class="mgratas3">Apakah anda yakin ingin mengakhiri ujian ?</p>
				</div>
				<div class="modal-footer flxspacearround">
					<a href="index.html"><button class="modal-close waves-effect waves-orange btn-flat">ya</button></a>
					<a href="#"><button class="modal-close waves-effect waves-orange btn-flat">tidak</button></a>					
				</div>
			</div>
			</div>
	</aside>
	</div>

	<script>
		const time = document.getElementById('masuk');
		var timer = <?=$ujian['waktu'];?> * 60;
		var min = 0;
		var sec = 0;

		function startTimer() {
			min = parseInt(timer/60);
			sec = parseInt(timer%60);

			if(timer<1) {
			 	window.location = 'waktuHabis.html'
			}

			document.getElementById('menit').innerHTML = min.toString();
			document.getElementById('detik').innerHTML = sec.toString();
			timer--;

			setTimeout(function() {
				startTimer();
			}, 1000);
		};
		time.addEventListener('load', startTimer());

		//Countdown
		// function waktuHabis(){
		// 	alert('habis');
		// 	var frmSoal = document.getElementById('frmSoal');
		// 	frmSoal.submit();
		// }
		// function hampirHabis(periods){
		// 	if ($.countdown.periodsToSeconds(periods) == 60) {
		// 		$(this).css({color: 'red'});
		// 	}
		// }
		// $(function(){
		// 	var waktu = 180;
		// 	var sisa_waktu = waktu - <?=time();?>;
		// 	var longWayOff = sisa_waktu;
		// 	$('#timer').countdown({
		// 		until: longWayOff,
		// 		compact: true,
		// 		onExpiry: waktuHabis,
		// 		onTick: hampirHabis
		// 	});
		// })
	</script>