		<div class="row">
			
			<?php
			if ($ar['password'] == $this->session->nis || empty($ar['pertanyaan']) && empty($ar['jawaban'])): ?>
			<div class="col-sm-12">
				<div class="alert alert-danger">
					<h4><i class="icon fa fa-warning"></i> Selamat Datang</h4>
					<ul>
						<li><h5>Ubah password default anda dengan yang baru !</h5></li>
						<li><h5>Atur pertanyaan dan jawaban untuk mereset password !</h5></li>
						<li><h5>Silahkan <a href="<?=base_url('setting');?>">klik disini !</a></h5></li>
					</ul>
				</div>
			</div>
			<?php else: ?>

			<div class="col-sm-3">
				<div class="alert bg-green">
					<h4>Kelas <i class="pull-right fa fa-building-o"></i></h4>
					<span class="d-block"><?=$this->session->kelas;?></span>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="alert bg-blue">
					<h4>NIS <i class="pull-right fa fa-graduation-cap"></i></h4>
					<span class="d-block"><?=$this->session->nis;?></span>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="alert bg-yellow">
					<h4>Tanggal <i class="pull-right fa fa-calendar"></i></h4>
					<span class="d-block"><?=strftime('%A, %d %B %Y')?></span>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="alert bg-red">
					<h4>Jam <i class="pull-right fa fa-clock-o"></i></h4>
					<span class="d-block"> <span class="live-clock"><?=date('H:i:s')?></span></span>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="box box-solid">
					<div class="box-header bg-blue">
						<h3 class="box-title">Jadwal Ujian</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<?php if(count($jdwlujian) > 0) { ?>
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Ujian</th>
									<th>Mata Pelajaran</th>
									<th>Waktu</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1; 
								foreach($jdwlujian as $ju){ 
									if ($ju->sudah_ikut < 1) { ?>
								<tr>
									<td><?=$no++;?>.</td>
									<td><?=$ju->nama_ujian;?></td>
									<td><?=$ju->mapel;?></td>
									<td><?=$ju->waktu;?> Menit</td>
									<td><button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalUjian<?=$ju->id_ujian;?>"><i class="fa fa-send"></i> Ikuti Ujian</button></td>
								</tr>
								<!-- Modal ujian -->
								<div class="modal fade" id="modalUjian<?=$ju->id_ujian;?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title"><?=$ju->mapel;?></h4>
											</div>
											<div class="modal-body">
												<h4>Anda akan mengerjakan <?=$ju->nama_ujian;?> <?=$ju->mapel;?></h4>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
												<a href="<?=base_url($ju->id_ujian);?>" class="btn btn-success">Mulai Mengerjakan</a>
											</div>
										</div>
									</div>
								</div>
								<?php }									
								} ?>
							</tbody>
						</table>
						<?php }
							  else{ ?>
						<div>
							<h1 class="text-center text-red"><i class="fa fa-warning"></i></h1>
							<h4 class="text-center">Tidak Ada Ujian !</h4>
						</div>
							<?php } ?>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="box box-solid">
					<div class="box-header bg-red">
						<h4 class="box-title">Riwayat Ujian</h4>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<?php if(count($jdwlujian) > 0) { ?>
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Ujian</th>
									<th>Mata Pelajaran</th>
									<th>Waktu</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1; 
								foreach($jdwlujian as $ju){ 
								if ($ju->sudah_ikut > 0) { ?>
								<tr>
									<td><?=$no++;?>.</td>
									<td><?=$ju->nama_ujian;?></td>
									<td><?=$ju->mapel;?></td>
									<td><?=$ju->waktu;?> Menit</td>
								<?php if ($ju->status == 'Y') { ?>
									<td><a href="<?=base_url($ju->id_ujian);?>" class="btn btn-xs btn-success"><i class="fa fa-spin fa-spinner"></i> Sedang Ujian</a></td>
								<?php }
									if ($ju->status == 'N') { ?>
									<td><a href="<?=base_url($ju->id_ujian);?>" class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Sudah Ujian</a></td>
								<?php } ?>
								</tr>
								<?php 
									}
								} ?>
							</tbody>
						</table>
						<?php }
							  else{ ?>
						<div>
							<h1 class="text-center text-red"><i class="fa fa-warning"></i></h1>
							<h4 class="text-center">Tidak Ada Ujian !</h4>
						</div>
							<?php } ?>
					</div>
				</div>
			</div>

		<?php endif;?>

		</div>