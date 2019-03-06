<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Pengaturan</h1>
    </section>
    <section class="content">
        <div class="row">
            <!--Ganti Foto-->
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                        <button data-toggle="modal" data-target="#tambah-admin" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Admin</button>
                        <div class="modal fade" id="tambah-admin">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                        <h4><i class="fa fa-users"></i> Tambah Admin</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="Nama">Nama Admin</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama Admin">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Password</label>
                                                <input type="password" name="" id="" class="form-control" placeholder="Masukkan Password">
                                            </div>
                                            <button type="submit" class="btn btn-success">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Nama</th>
                                <th>Info</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                                <td>Admin</td>
                                <td><button class="btn btn-info btn-xs">Info</button></td>
                                <td><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
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

        </div>
    </section>
</div>