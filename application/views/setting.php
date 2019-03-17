		<div class="row">
			
			<div class="col-sm-6">
				<div class="box box-solid">
					<div class="box-header bg-red">
						<h3 class="box-title">Ganti Password</h3>
					</div>
					<div class="box-body">
						<?php if ($ar['password'] == $this->session->nis): ?>
						<h4 class="text-center text-red">*Anda belum mengubah password !</h4>
						<?php endif ?>
						<?php if ($this->session->flashdata('repass')): ?>
							<script>
								Swal.fire('Ganti Password', '<?=$this->session->flashdata("repass");?>', 'info');
							</script>
						<?php endif ?>
						<form action="<?=base_url('user/gantipass');?>" method="POST">
							<div class="form-group">
								<label for="PasswordLama">Password Lama :</label>
								<input class="form-control" type="password" name="passLama" placeholder="Masukkan Password Lama">
							</div>
							<div class="form-group">
								<label for="PasswordBaru">Password Baru :</label>
								<input type="password" name="passBaru" class="form-control" placeholder="Masukkan Password Baru">
							</div>
							<div class="form-group">
								<label for="KonfirmasiPassword">Konfirmasi Password :</label>
								<input type="password" name="konfirPass" class="form-control" placeholder="Masukkan Kembali Password">
							</div>
							<button type="submit" class="btn btn-success">Ubah Password</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="box box-solid">
					<div class="box-header bg-red">
						<h3 class="box-title">Ganti Pertanyaan</h3>
					</div>
					<div class="box-body">
						<?php if (empty($ar['pertanyaan']) && empty($ar['jawaban'])): ?>
						<h4 class="text-center text-red">*Anda belum membuat pertanyaan !</h4>
						<?php endif ?>
						<?php if ($this->session->flashdata('reper')): ?>
							<script>
								Swal.fire('Ganti Pertanyaan', '<?=$this->session->flashdata("reper");?>', 'info');
							</script>
						<?php endif ?>
						<form action="<?=base_url('user/gantiprtnyan');?>" method="POST">
							<div class="form-group">
								<label for="PasswordLama">Pertanyaan :</label>
								<input type="text" name="pertanyaan" class="form-control" placeholder="Masukkan Pertanyaan" value="<?=$ar['pertanyaan'];?>">
							</div>
							<div class="form-group">
								<label for="PasswordBaru">Jawaban :</label>
								<input type="text" name="jawaban" class="form-control" placeholder="Masukkan Jawaban">
							</div>
							<div class="form-group">
								<label for="KonfirmasiPassword">Konfirmasi Jawaban :</label>
								<input type="text" name="konfirJawaban" class="form-control" placeholder="Masukkan Kembali Jawaban">
							</div>
							<button type="submit" class="btn btn-success">Ubah Pertanyaan</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="callout callout-info">
					<h4><i class="fa fa-info"></i> Info</h4>
					<p>Pertanyaan dan jawaban yang telah dibuat digunakan untuk mereset password login.</p>
				</div>
			</div>

		</div>