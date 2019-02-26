<!-- main -->

	<main class="w96 mgratas3 flxctr profil">
		<div class="col s5 g-passwd uporen">
			<h5 class="center-align">Ganti Password</h5>
			<?php if ($ar['password'] == $this->session->nis): ?>
			<h6 class="center-align red-text">*Anda belum mengubah password !</h6>
			<?php endif ?>
			<?php if ($this->session->flashdata('repass')): ?>
				<h6 class="center-align red-text"><?=$this->session->flashdata('repass');?></h6>
			<?php endif ?>
			<form action="<?=base_url('user/gantipass');?>" method="POST">
				<div class="form-group">
					<label for="PasswordLama">Password Lama :</label>
					<input type="password" name="passLama" placeholder="Masukkan Password Lama">
				</div>
				<div class="form-group">
					<label for="PasswordBaru">Password Baru :</label>
					<input type="password" name="passBaru" placeholder="Masukkan Password Baru">
				</div>
				<div class="form-group">
					<label for="KonfirmasiPassword">Konfirmasi Password :</label>
					<input type="password" name="konfirPass" placeholder="Masukkan Kembali Password">
				</div>
				<div class="btn-gnt mgratas2">
			    	<button class="btn waves-effect waves-light orange">Ubah Password</button>
			    </div>
			</form>
		</div>
		<div class="col s5 g-pertanyaan uporen">
			<h5 class="center-align">Ganti Pertanyaan</h5>
			<?php if (empty($ar['pertanyaan']) && empty($ar['jawaban'])): ?>
			<h6 class="center-align red-text">*Anda belum membuat pertanyaan !</h6>
			<?php endif ?>
			<?php if ($this->session->flashdata('reper')): ?>
				<h6 class="center-align red-text"><?=$this->session->flashdata('reper');?></h6>
			<?php endif ?>
			<form action="<?=base_url('user/gantiprtnyan');?>" method="POST">
				<div class="form-group">
					<label for="PasswordLama">Pertanyaan :</label>
					<input type="text" name="pertanyaan" placeholder="Masukkan Pertanyaan" value="<?=$ar['pertanyaan'];?>">
				</div>
				<div class="form-group">
					<label for="PasswordBaru">Jawaban :</label>
					<input type="text" name="jawaban" placeholder="Masukkan Jawaban">
				</div>
				<div class="form-group">
					<label for="KonfirmasiPassword">Konfirmasi Jawaban :</label>
					<input type="text" name="konfirJawaban" placeholder="Masukkan Kembali Jawaban">
				</div>
				<div class="btn-gnt mgratas2">
			    	<button class="btn waves-effect waves-light orange">Ubah Pertanyaan</button>
			    </div>
			</form>
		</div>
	</main>