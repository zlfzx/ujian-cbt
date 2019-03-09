	<div class="row">
			<div class="box box-danger">
				<div class="box-body">
					<h1 class="text-center ujian-sls text-red"><i class="fa fa-minus-circle"></i></h1>
					<h1 class="text-center ujian-sls2">Ujian Telah Selesai !</h1>
					<p class="text-center">Anda telah menyeleseikan <?=$detil_soal->nama_ujian.' '.$detil_soal->mapel;?> dengan nilai <u><?=$detil_tes->nilai;?></u></p>
				</div>
				<div class="box-footer">
					<a href="<?=base_url();?>" class="pull-right btn btn-primary"><i class="fa fa-sign-out"></i> Kembali</a>
				</div>
			</div>
	</div>