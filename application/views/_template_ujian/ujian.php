<?php
$jam_mulai_pc = explode(" ", $detil_tes->tgl_mulai);
$jam_selesai_pc = explode(" ", $detil_tes->tgl_selesai);
?>

		<div class="row">
			
			<div class="col-sm-9">
				<div class="box box-primary">
					<form name="_form" method="post" id="_form">
										
					<?php
					$no = 1;
					$jawaban = array('A','B','C','D','E');
					if (!empty($data)) :
						# code...
						foreach ($data as $d):
							echo '<input type="hidden" name="id_soal_'.$no.'" value="'.$d->id_soal.'">';
					?>
					<div class="box-body box-ujian step">
						<div style="margin-bottom: 20px;">
							<h4 class="label bg-blue" style="font-size: 15px;">Soal nomor <?=$no;?></h4>
						</div>
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
						$no++;
						endforeach;
					endif;
					?>
					<div class="box-footer">
						<div class="col-sm-4 bf-kri">
							<a class="action btn back btn-warning"><i class="fa fa-chevron-left"></i> SEBELUMNYA</a>
						</div>
						<div class="col-sm-4 bf-tengah">
							<a class="action btn simpan btn-default">SIMPAN</a>
						</div>
						<div class="col-sm-4 bf-kanan">
							<a class="action btn next btn-warning">SELANJUTNYA <i class="fa fa-chevron-right"></i></a>
						</div>
						<div class="col-sm-4 bf-kanan">
							<a class="action submit btn btn-success"><i class="fa fa-check"></i> SELESAI</a>
						</div>
					</div>
					<input type="hidden" name="jml_soal" value="<?=$no;?>">
					</form>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">Sisa Waktu</h4>
					</div>
					<div class="box-body">
						<div class="waktu bg-blue" id="clock"></div>
					</div>
					<div class="box-footer">
						<a class="btn btn-selesai btn-block btn-danger">SELESAI UJIAN</a>
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
						var f_asal = $('#_form');
						var form = getFormData(f_asal);
						simpan_akhir(<?=$detil_tes->id_tes;?>);
						window.location.assign("<?=base_url();?>selesai/<?=$detil_tes->id_tes;?>");

						return false;
					});

					var current = 1;

					widget = $('.step');
					btnback = $('.back');
					btnnext = $('.next');
					btnsimpan = $('.simpan');
					btnsubmit = $('.submit');
					btnselesai = $('.btn-selesai');

					//Init button and UI
					widget.not(':eq(0)').hide();
					hideButtons(current);

					//aksi klik simpan
					btnsimpan.click(function(){
						simpan(<?=$detil_tes->id_tes;?>);
					})

					//Next button click action
					btnnext.click(function(){
						if (current < widget.length) {
							widget.show();
							widget.not(':eq('+(current++)+')').hide();
							console.log(current);
							simpan(<?=$detil_tes->id_tes;?>);
						}
						hideButtons(current);
					})

					//Back button click action
					btnback.click(function(){
						if (current > 1) {
							current = current - 2;
							if (current < widget.length) {
								widget.show();
								widget.not(':eq('+(current++)+')').hide();
							}
							hideButtons(current);
						}
						hideButtons(current);
					})

					btnsubmit.click(function(){
						simpan_akhir(<?=$detil_tes->id_tes;?>);
					});

					btnselesai.click(function(){
						simpan_akhir(<?=$detil_tes->id_tes;?>);
					})

			});

			simpan = function(id){
				var f_asal = $('#_form');
				var form = getFormData(f_asal);

				$.ajax({
					type: 'POST',
					url: base_url+'user/ujian_simpan/'+id,
					data: JSON.stringify(form),
					dataType: 'json',
					contentType: 'application/json; charset=utf-8'
				}).done(function(response){ });
				return false;
			}

			simpan_akhir = function(id){
				if (confirm('Anda yakin akan mengakhiri ujian ini ?')) {
					var f_asal = $('#_form');
					var form = getFormData(f_asal);

					$.ajax({
						type: 'POST',
						url: base_url+'user/ujian_akhir/'+id,
						data: JSON.stringify(form),
						dataType: 'json',
						contentType: 'application/json; charset=utf-8'
					}).done(function(response){
						if (response.status == 'ok') {
							window.location.assign("<?=base_url();?>selesai/<?=$detil_tes->id_tes;?>");
						}
					});
					return false;
				}
			}

			//Hide buttons according to the curent step
			hideButtons = function(current){
				var limit = parseInt(widget.length);
				$('.action').hide();

				if (current < limit) btnnext.show();
				if (current > 1) btnback.show();
				if (current == limit) {btnnext.hide(); btnsubmit.show();}
				btnsimpan.show();
			}
		</script>