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
		<?php if (count($jdwlujian) > 0) { ?>
			<h4 class="center-align">Jadwal Hari ini</h4>
			<div class="container white">
				<?php foreach ($jdwlujian as $ju){ ?>
				<div class="parent">
					<div id="<?=$ju->id_ujian;?>" class="jadwal orange white-text waves-effect waves-light"><p class="kiri center-align"><?=$ju->mapel;?></p></div>
					<div class="spek"><p>waktu : <?=$ju->waktu;?> menit</p>
					<a href="#">
					<button data-target="mulai<?=$ju->id_ujian;?>" class="btn mulai modal-trigger">mulai</button></a>
					</div>
				</div>
				<!-- modal mulai ujian -->
				<div id="mulai<?=$ju->id_ujian;?>" class="modal modal-ujian">
					<div class="modal-content">
						<h4><?=$ju->mapel;?></h4>
						<p>Anda yakin akan mengerjakan soal <?=$ju->mapel;?>?</p>
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-close waves-effect btn-flat">Batal</a>
						<a href="<?=$ju->id_ujian;?>" class="modal-close waves-effect waves-green btn">Mulai</a>
					</div>
				</div>
				<!-- end modal mulai ujian -->
				<script type="text/javascript">
					$(document).ready(function(){
						$('#mulai<?=$ju->id_ujian;?>').modal();
						//Saat di klik
						$('#<?=$ju->id_ujian;?>').click(function(){
							$('#<?=$ju->id_ujian;?>').css({
								'width': '50%',
								'transition': '1s all'
							});
						})

						$(document).on('mouseup', function(event){
							var j = $('#<?=$ju->id_ujian;?>');
							if (event != j){
								j.css({'width': '100%'});
							}
						})
					})
				</script>
			<?php }; ?>
		   	</div>
		<?php }
		else{ ?>
			<div class="noujian">
				<h4 class="center-align">Tidak ada ujian !</h4>
				<img src="<?=base_url('assets/img/warsegitiga.jpg');?>" class="center-align" alt="">
			</div>	
		<?php } ?>
		</div>
		<?php endif;?>
	</main>