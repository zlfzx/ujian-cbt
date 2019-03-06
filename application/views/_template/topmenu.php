
    <!-- Logo -->
    <a href="<?=base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b><b>B</b><b>T</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>C</b>omputer <b>B</b>ased <b>T</b>est</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('assets/img/user1.png');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->nama;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('assets/img/user1.png');?>" class="img-circle" alt="User Image">

                <p><?=$this->session->nama;?><br>
                   <?=$this->session->nis;?><br>
                   <?=$this->session->kelas;?></p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div>
                  <a href="<?=base_url('logout');?>" class="btn btn-danger btn-block btn-flat"><i class="fa fa-sign-out"></i> Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>