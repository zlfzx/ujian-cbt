<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/adminlte/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/adminlte/dist/css/skins/skin-blue.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/ujian.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Load Javascript -->
  <script src="<?=base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>
  <script src="<?=base_url('assets/js/jquery.countdown.min.js');?>"></script>
  <script src="<?=base_url('assets/js/sweetalert2.all.min.js');?>"></script>
  <script src="<?=base_url('assets/js/app.js');?>"></script>
  <script>
    var base_url = '<?=base_url();?>';
  </script>
</head>
<body class="hold-transition skin-blue layout-top-nav" oncontextmenu="return false;" style="-moz-user-select: none; cursor: default;">
<div class="wrapper">

  <header class="main-header">
    <?php require_once('menu.php');?>
  </header>
  <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?=$judul?>
          </h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> <?=$detil_soal->nama_ujian;?></a></li>
            <li><?=$detil_soal->kelas;?></li>
            <li><?=$judul;?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">