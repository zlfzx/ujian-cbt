  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        Selamat Datang <?= $this->session->nama;?>!
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php
    if($this->session->status == 'guru'){

      if($passwdguru['username'] == $this->session->nama || $passwdguru['password'] == $this->session->nama){
      ?>
      <div class="alert alert-danger alert-dismissable">
        <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-lock"></i> Password Default</h4>
        Anda masih menggunakan username dan password default, silahkan ubah demi kenyamanan anda. 
        <a href="<?=base_url('setting');?>">Klik Disini !</a>
      </div>
      <?php } 
    } ?>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$jmlmapel;?></h3>

              <p>Mata Pelajaran</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="<?=base_url('mapel');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$jmljurusan;?></h3>

              <p>Jurusan</p>
            </div>
            <div class="icon">
              <i class="fa fa-th-large"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$jmlsiswa;?></h3>

              <p>Siswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?=base_url('siswa');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$jmlkelas;?></h3>

              <p>Kelas</p>
            </div>
            <div class="icon">
              <i class="fa fa-th"></i>
            </div>
            <a href="<?=base_url('kelas');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->