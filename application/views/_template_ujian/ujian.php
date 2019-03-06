<?php
$jam_mulai_pc = explode(" ", $detil_tes->tgl_mulai);
$jam_selesai_pc = explode(" ", $detil_tes->tgl_selesai);
?>

		<div class="row">
			
			<div class="col-sm-9">
				<div class="box box-primary">
					<form name="_form" method="post" id="_form">
					<div class="box-header with-border">
						<h4 class="box-title">Soal</h4>
					</div>
					
					<?php
					$no = 1;
					$jawaban = array('A','B','C','D','E');
					if (!empty($data)) :
						# code...
						foreach ($data as $d):
							echo '<input type="hidden" name="id_soal_'.$no.'" value="'.$d->id_soal.'">';
					?>
					<div class="box-body box-ujian">
						<?php
							$exmedia = explode(".", $d->media);
							$exmedia = strtolower(end($exmedia));
							if ($exmedia == 'jpg') {
								echo '<img src="'.base_url('media/'.$d->media).'" alt="" class="img-responsive img-ujian">';
							}
							if ($exmedia == 'mp3') {
								echo '<audio src="'.base_url('media/'.$d->media).'" class="" controls=""></audio>';
							}
						?>

						<div><?=$d->soal;?></div>

						<?php
							for ($j=0; $j < sizeof($jawaban); $j++) { 
								# jawaban
								$kecil_jawaban = strtolower($jawaban[$j]);
								$opsijwb = 'opsi_'.$kecil_jawaban;
								$opsi = $d->$opsijwb;

								if ($jawaban[$j] == $d->jawaban) { ?>
									<div class="radio">
										<label><input checked type="radio" id="opsi_<?=$jawaban[$j].'_'.$d->id_soal;?>" name="opsi_<?=$no;?>" value="<?=$jawaban[$j];?>"> <span><?=$opsi;?></span></label>
									</div>
						<?php }
							else{ ?>
									<div class="radio">
										<label><input type="radio" id="opsi_<?=$jawaban[$j].'_'.$d->id_soal;?>" name="opsi_<?=$no;?>" value="<?=$jawaban[$j];?>"> <span><?=$opsi;?></span></label>
									</div>
						<?php
								}
							}			
						?>
					</div>
					<?php
						endforeach;
					endif;
					?>
					<div class="box-footer">
						<div class="pull-left">
							<button class="btn back btn-warning">Sebelumnya</button>
						</div>
						<div class="pull-right">
							<button class="btn next btn-warning">Selanjutnya</button>
						</div>
					</div>
					</form>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">Sisa Waktu</h4>
					</div>
					<div class="box-body">
						<div class="waktu bg-info" id="clock"></div>
					</div>
					<div class="box-footer">
						<a href="#" class="btn btn-block btn-danger">Akhiri Ujian</a>
					</div>
				</div>
			</div>

		</div>

		<script>
			$(document).ready(function(){
				var jam_selesai = '<?=$detil_tes->tgl_selesai;?>';

				$('div#clock').countdown(jam_selesai)
					.on('update.countdown', function(event){
						$(this).html(event.strftime('%H:%M:%S'));
					})
					.on('finish.countdown', function(event){
						alert('Waktu telah selesai !');

						return false;
					});

					var current = 1;

					btnback = $('.back');
					btnnext = $('.next');
					btnsubmit = $('.submit');

			})
		</script>