<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title;?> | Aplikasi Ujian Berbasis Komputer</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/dist/css/skins/skin-blue.min.css');?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css');?>"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">   -->
  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="<?=base_url('./../assets/adminlte/bower_components/select2/dist/css/select2.min.css');?>"> -->
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?=base_url('./../assets/css/sweetalert2.min.css');?>">
  <!-- CSS -->
  <link rel="stylesheet" href="<?=base_url('./../assets/css/style-admin.css');?>">
  <!-- jQuery 3 -->
  <script src="<?= base_url('./../assets/adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>
  <!-- DataTables -->
  <script src="<?= base_url('./../assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
  <script src="<?= base_url('./../assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <!-- <script src="<?= base_url('./../assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js');?>"></script> -->
  <!-- Sweetalert -->
  <script src="<?=base_url('./../assets/js/sweetalert2.all.min.js');?>"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CBT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>C</b>omputer <b>B</b>ased <b>T</b>est</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('./../assets/adminlte/dist/img/avatar5.png');?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?=$this->session->nama;?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('./../assets/adminlte/dist/img/avatar5.png');?>" class="img-circle" alt="User Image">
                <p>
                  <?= $this->session->nama;?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('setting');?>" class="btn btn-warning btn-flat"><i class="fa fa-gear"></i> Setting</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('admin/logout');?>" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('./../assets/adminlte/dist/img/avatar5.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->username;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header text-aqua">MENU NAVIGASI</li>
    <?php
      //Menu navigasi admin
      if($this->session->status == 'admin'){ ?>
        <li>
        <a href="<?= base_url('guru');?>"><i class="fa fa-users text-aqua"></i><span>Guru</span></a>
        </li>
        <li>
        <a href="<?= base_url('mapel');?>"><i class="fa fa-clone text-aqua"></i><span>Mapel</span></a>
        </li>
        <li>
        <a href="<?= base_url('tsoal');?>"><i class="fa fa-list-alt text-aqua"></i><span>Tambah Soal</span></a>
        </li>
        <!-- Menu Soal -->
        <li class="treeview">
        <a href="#">
        <i class="fa fa-list text-aqua"></i> <span>Soal</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
          <ul class="treeview-menu">
            <?php foreach($perkelas as $pk){ ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Kelas <?=$pk->kelas;?> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
              <ul class="treeview-menu">
                <?php
                  $where = array('kelas' => $pk->kelas); 
                  $perkelasjurusan = $this->m_admin->perkelasjurusan($where)->result();
                  foreach($perkelasjurusan as $pkj){ ?>
                <li><a href="<?=base_url('soal/'.$pkj->id_kelas);?>"><?=$pkj->kode_kelas;?></a></li>
                <?php } ?>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </li> <!-- End Menu Soal -->
        <!-- Menu Nilai -->
        <li class="treeview">
        <a href="#">
        <i class="fa fa-table text-aqua"></i> <span>Nilai</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
          <ul class="treeview-menu">
            <?php foreach($perkelas as $pk){ ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Kelas <?=$pk->kelas;?> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
              <ul class="treeview-menu">
                <?php
                  $where = array('kelas' => $pk->kelas); 
                  $perkelasjurusan = $this->m_admin->perkelasjurusan($where)->result();
                  foreach($perkelasjurusan as $pkj){ ?>
                <li><a href="<?= base_url('nilai/'.$pkj->id_kelas);?>"><i class="fa fa-circle-o"></i> <?=$pkj->kode_kelas;?></a></li>
                <?php } ?>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </li> <!-- End Menu Nilai -->
        <li>
        <a href="<?= base_url('siswa');?>"><i class="fa fa-user text-aqua"></i><span>Siswa</span></a>
        </li>
        <li>
        <a href="<?= base_url('kelas');?>"><i class="fa fa-th text-aqua"></i><span>Kelas / Jurusan</span></a>
        </li>
        <li>
        <a href="<?= base_url('ujian');?>"><i class="fa fa-th-list text-aqua"></i><span>Ujian</span></a>
        </li>
    <?php } ?>
    <?php 
      // Menu navigasi guru
      if($this->session->status == 'guru'){ ?>
        <li>
        <a href="<?= base_url('tsoal');?>"><i class="fa fa-list-alt text-aqua"></i><span>Tambah Soal</span></a>
        </li>
        <!-- Menu Soal -->
        <li class="treeview">
        <a href="#">
        <i class="fa fa-list text-aqua"></i> <span>Soal</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
          <ul class="treeview-menu">
            <?php foreach($perkelas as $pk){ ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Kelas <?=$pk->kelas;?> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
              <ul class="treeview-menu">
                <?php
                  //$where = array('kelas' => $pk->kelas, 'id_guru' => $this->session->id); 
                  $perkelasjurusan = $this->m_admin->perkelasjurusan_g($pk->kelas, $this->session->id)->result();
                  foreach($perkelasjurusan as $pkj){ ?>
                <li><a href="<?=base_url('soal/'.$pkj->id_kelas);?>"><?=$pkj->kode_kelas;?></a></li>
                <?php } ?>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </li> <!-- End Menu Soal -->
        <!-- Menu Nilai -->
        <li class="treeview">
        <a href="#">
        <i class="fa fa-table text-aqua"></i> <span>Nilai</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
          <ul class="treeview-menu">
            <?php foreach($perkelas as $pk){ ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Kelas <?=$pk->kelas;?> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
              <ul class="treeview-menu">
                <?php
                  //$where = array('kelas' => $pk->kelas, 'id_guru' => $this->session->id); 
                  $perkelasjurusan = $this->m_admin->perkelasjurusan_g($pk->kelas, $this->session->id)->result();
                  foreach($perkelasjurusan as $pkj){ ?>
                <li><a href="<?= base_url('nilai/'.$pkj->id_kelas);?>"><i class="fa fa-circle-o"></i> <?=$pkj->kode_kelas;?></a></li>
                <?php } ?>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </li> <!-- End Menu Nilai -->
    <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>