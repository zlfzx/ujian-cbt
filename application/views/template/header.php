<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title;?></title>
	<!-- materialize -->
    <link rel="stylesheet" href="<?=base_url('assets/materialize/css/materialize.css');?>">
	<!-- css -->
    <link rel="stylesheet" href="<?=base_url('assets/css/css.css');?>">	
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.css');?>">
	<!-- Jquery -->
	<script src="<?=base_url('assets/js/jquery.js');?>"></script>


</head>
<body class="blue-grey lighten-5">
	<!-- navbar -->	
	  <nav class="blue">
	  	<div class="w97">
	    <div class="nav-wrapper">
	      <a href="<?=base_url();?>" class="brand-logo">UjianCBT</a>
	      <ul class="right">
	        <li><a href="#"><p><?=$this->session->nama;?></p><i class="fa fa-caret-down"></i></a>
				<div id="dropdown" class="card">
					<div class="arrow"></div>
					<div class="w98 mgratas0">
						<div class="card-content blue flxctr user">
							<div class="icon"><img src="<?=base_url('assets/img/user.png');?>" alt=""></div>
							<p><?=$this->session->nama;?></p>
							<p><?=$this->session->nis;?></p>
							<p><?=$this->session->kelas;?></p>
						</div>
						<div class="card-action flxspacebetween">
							<a href="/setting" class="btn waves-effect waves-light orange">Setting</a>
							<a href="logout" class="btn waves-effect waves-light red">Keluar</a>
						</div>
					</div>
				</div>
	        </li>
	      </ul>
	    </div>
	    </div>
	  </nav>