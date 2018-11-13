<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Pengaturan</h1>
    </section>
    <section class="content">
        <div class="row">
            
            <!--Ganti Password-->
            <div class="col-md-6">
            <?php if($this->session->status == 'admin'){ ?>
                <form action="<?=base_url('admin/ganti_passwd_admin');?>" class="box box-info" method="post">
            <?php }
                if($this->session->status == 'guru'){ ?>
                <form action="<?=base_url('admin/ganti_passwd_guru');?>" class="box box-warning" method="post">
            <?php } ?>
                    <div class="box-header">
                        <i class="fa fa-lock"></i> Ganti Username dan Password
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username..." required>
                            <?php if($this->session->flashdata('username') == true){ ?>
                            <h5 class="text-danger"><i class="fa fa-warning"></i> <?=$this->session->flashdata('username');?></h5> <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="PasswordLama">Password Lama :</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password Lama..." required>
                            <?php if($this->session->flashdata('passwdlama') == true){ ?>
                            <h5 class="text-danger"><i class="fa fa-warning"></i> <?=$this->session->flashdata('passwdlama');?></h5> <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="PasswordBaru">Password Baru :</label>
                            <input type="password" name="passwordbaru" class="form-control" placeholder="Masukkan Password Baru..." required>
                        </div>
                        <div class="form-group">
                            <label for="ConfrmPassword">Konfirmasi Password :</label>
                            <input type="password" name="konfirmpassword" class="form-control" placeholder="Konfirmasi Password Baru..." required>
                            <?php if($this->session->flashdata('passwdbaru') == true){ ?>
                            <h5 class="text-danger"><i class="fa fa-warning"></i> <?=$this->session->flashdata('passwdbaru');?></h5> <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-warning">Ganti</button>
                    </div>
                </form>
            </div>

            <!--Ganti Foto-->
            <div class="col-md-6">
                <form action="" class="box box-info">
                    <div class="box-header">
                        Ganti Foto
                    </div>
                    <div class="box-body">
                        <div class="form-group" align="center">
                        <img src="<?= base_url('assets/adminlte/dist/img/avatar5.png');?>" class="img-circle">
                        </div>
                        <div class="form-group">
                            <label for="PilihFile">Pilih File :</label>
                            <input type="file" name="" id="">
                        </div>
                        <button type="submit" class="btn btn-info">Upload</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>