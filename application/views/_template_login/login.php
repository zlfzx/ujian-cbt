<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Login | Ujian Berbasis Komputer</title>
  <!-- MyCSS -->
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css');?>">
	<!-- FontAwesome -->
    <link rel="stylesheet" href="<?=base_url('assets/adminlte/bower_components/font-awesome/css/font-awesome.css');?>">
  <!-- Jquery -->
    <script src="<?=base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>
</head>

<body>

<?php if($this->session->flashdata('flash')){ ?>
<div class="alert">
  <h3><i class="fa fa-warning"></i> <?=$this->session->flashdata('flash');?></h3>
</div>
<?php } ?>

<section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered div-logo">
        <div class="logo-smk">
          <img src="<?=base_url('assets/img/lsmk.png');?>" style="width: 75px; margin-right: 20px;">
          <h1>SMK N 1 KEDUNGWUNI</h1>
        </div>
        <!-- <h2 class="user_unregistered-title">SMK N 1 Kedungwuni</h2> -->
        <p class="user_unregistered-text">Gunakan NIS dan Passsword untuk masuk,</p>
        <button class="user_unregistered-signup" id="lupa-button">LUPA PASSWORD</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">TUTORIAL</h2>
        <ol>
          <li>Masukkan NIS lalu enter,</li>
          <li>Akan muncul pertanyaan yang sudah anda buat sebelumnya,</li>
          <li>Isi sesuai jawaban yang anda buat</li>
          <li>Klik ok, kemudian lakukan reset password</li>
        </ol>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>
    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="form padding-b" action="<?=base_url('Login/actlogin');?>" method="POST">
  		    <input type="text" name="nis" placeholder="NIS" autofocus required="" />
  		    <i class="fa fa-user"></i>
  		    <input type="password" name="password" placeholder="Password" required="" />
  		    <i class="fa fa-lock"></i>
          <button type="submit">
  		      LOGIN
  		    </button> 
		    </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Lupa Password</h2>
        <form class="form padding-b formnis">
          <input id="fnis" type="text" name="nis" placeholder="NIS" required>
          <i class="fa fa-user"></i>
          <p class="error-redB">NIS Tidak Ditemukan !</p>
          <button class="btnceknis">PROSES</button> 
        </form>
        <form class="form padding-b formjawab">
            <p class="pertanyaan"></p>
            <input type="text" id="fjawab" class="jawab" placeholder="Jawaban" required>
            <i class="fa fa-key"></i>
            <p class="error-redB">Jawaban Anda Salah !</p>
            <button class="btn-jawab">JAWAB</button>
        </form>
        <form method="post" action="<?=base_url('Login/resetpasswd');?>" class="form padding-b formreset">
          <input type="hidden" class="nis" name="nis">
          <input type="password" id="passwd" name="password" placeholder="Masukkan Password Baru" required>
          <i class="fa fa-key"></i>
          <input type="password" id="repasswd" name="repassword" placeholder="Masukkan Kembali Password" required>
          <i class="fa fa-key"></i>
          <p class="error-redB">Password Tidak Cocok !</p>
          <button class="btn-submit">GANTI PASSWORD</button> 
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  var base_url = '<?=base_url();?>';
</script>
<script  src="<?=base_url('assets/js/login.js');?>"></script>
</body>
</html>