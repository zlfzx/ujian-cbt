<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title;?></title>

	<!-- css -->
    <link rel="stylesheet" href="<?=base_url('assets/css/css.css');?>">

	<!-- materialize -->
    <link rel="stylesheet" href="<?=base_url('assets/materialize/css/materialize.css');?>">

	<!-- fontawesome -->
	<link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.css');?>">

</head>
<body class="blue-grey lighten-5">
	<!-- navbar -->	
	  <nav class="blue darken-2">
	  	<div class="w97">
	    <div class="nav-wrapper">
	      <a href="<?=base_url();?>" class="brand-logo">UjianCBT</a>
	      <ul class="right">
	        <li><a href="#"><p>M.Afakhan Saifudin Alwi</p><i class="fa fa-caret-down"></i></a>
				<div id="dropdown" class="card">
					<div class="arrow"></div>
					<div class="w98 mgratas0">
						<div class="card-content blue flxctr user">
							<div class="icon"><img src="<?=base_url('assets/img/user.png');?>" alt=""></div>
							<p>Muhammad Zulfi Izzulhaq</p>
							<p>16.10853</p>
							<p>12 TKJ 2</p>
						</div>
						<div class="card-action flxspacebetween">
							<a href="/profil" class="btn waves-effect waves-light green">Profile</a>
							<button class="btn waves-effect waves-light red">Keluar</button>
						</div>
					</div>
				</div>
	        </li>
	      </ul>
	    </div>
	    </div>
	  </nav>