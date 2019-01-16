<?php 
	$mapel = ['matematika', 'Indonesia', 'Inggris'];
?>
	<!-- main -->

	<main class="w84 mgratas3">

		<?php
		if ($ar['password'] == $this->session->nis || empty($ar['pertanyaan']) && empty($ar['jawaban'])): ?>
		<div class="card uporen">
			<div class="container alert-pass">
				<img src="./../assets/img/warsegitiga.jpg" style="width: 75px;">
				<ul>
					<li><h6><i class="fa fa-caret-right"></i> Ubah password default anda dengan yang baru !</h6></li>
					<li><h6><i class="fa fa-caret-right"></i> Atur pertanyaan dan jawaban untuk mereset password !</h6></li>
					<li><h6><i class="fa fa-caret-right"></i> Silahkan <a href="/setting">klik disini !</a></h6></li>
				</ul>
			</div>
		</div>
		<?php else:?>

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
		   	</div>
		</div>
		<?php endif;?>
	</main>
