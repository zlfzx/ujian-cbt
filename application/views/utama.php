<?php 
	$mapel = ['matematika', 'Indonesia', 'Inggris', 'PPKn'];
?>
	<!-- main -->

	<main class="w84 mgratas3">
		<div class="card uporen">
			<h4 class="center-align">Jadwal Hari ini</h4>
			<div class="container white">
				<?php foreach ($mapel as $m): ?>
				<div class="parent">
					<div id="<?=$m;?>" class="jadwal orange white-text waves-effect waves-light"><p class="kiri center-align"><?=$m;?></p></div>
					<div class="spek"><p>jumlah soal : 20 <br>waktu : 60 menit</p>
					<a href="index(1).html">
					<button class="btn mulai">mulai</button></a>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						//Saat di klik
						$('#<?=$m;?>').click(function(){
							$('#<?=$m;?>').css({
								'width': '50%',
								'transition': '1s all'
							});
						})

						$(document).on('mouseup', function(event){
							var j = $('#<?=$m;?>');
							if (event != j){
								j.css({'width': '100%'});
							}
						})
					})
				</script>
			<?php endforeach; ?>

				<!--<div class="parent">
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
				</div>-->
		   	</div>
		</div>
	</main>
