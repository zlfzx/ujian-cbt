<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Pengaturan</h1>
    </section>
    <section class="content">
        <div class="row">
            <!--info admin-->
            <?php if ($this->session->status != 'guru') { ?>
            <div class="col-sm-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <button data-toggle="modal" data-target="#tambah-admin" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Tambah Admin</button>
                        <div class="modal fade" id="tambah-admin">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                        <h4><i class="fa fa-users"></i> Tambah Admin</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?=base_url('admin/tambah_admin');?>" method="post">
                                            <div class="form-group">
                                                <label for="Nama">Nama Admin</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Admin">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                                            </div>
                                            <button type="submit" class="btn btn-success">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admin as $a) { ?>
                                <tr>
                                    <td><?=$a->nama;?></td>
                                    <td><?=$a->username;?></td>
                                    <td><button class="btn btn-xs btn-danger" id="hapus<?=$a->id_admin;?>"><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <script>
                                    $(document).ready(function(){
                                        $('#hapus<?=$a->id_admin;?>').on('click', function(e){
                                            e.preventDefault();

                                            Swal.fire({
                                                title: 'Hapus <?=$a->username;?>',
                                                text: 'Anda yakin akan menghapus <?=$a->nama;?> sebagai admin?',
                                                type: 'question',
                                                showCancelButton: true,
                                                confirmButtonText: 'Hapus'
                                            }).then((result) => {
                                                if (result.value) {
                                                    location.href='<?=base_url("admin/hapus_admin/".$a->id_admin);?>';
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            <!--Ganti Password-->
            <div class="col-sm-4">
                <form action="<?=base_url('admin/ganti_user');?>" class="box box-danger" method="post">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user"></i> Ganti Username</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Nama">Nama :</label>
                            <input type="text" name="nama" class="form-control" value="<?=$this->session->nama;?>" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text" name="username" value="<?=$this->session->username;?>" class="form-control" placeholder="Masukkan Username..." required>
                            <?php if($this->session->flashdata('username') == true){ ?>
                            <h5 class="text-danger"><i class="fa fa-warning"></i> <?=$this->session->flashdata('username');?></h5> <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                </form>
            </div>

            <div class="col-sm-4">
                <?php if($this->session->status == 'admin'){ ?>
                <form action="<?=base_url('admin/ganti_passwd_admin');?>" class="box box-danger" method="post">
            <?php }
                if($this->session->status == 'guru'){ ?>
                <form action="<?=base_url('admin/ganti_passwd_guru');?>" class="box box-danger" method="post">
            <?php } ?>
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-lock"></i> Ganti Password</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="PasswordLama">Password Lama :</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Masukkan Password Lama">
                        </div>
                        <div class="form-group">
                            <label for="PasswordBaru">Password Baru :</label>
                            <input type="password" name="passwordbaru" id="" class="form-control" placeholder="Masukkan Password Baru">
                        </div>
                        <button type="submit" class="btn btn-danger">Ganti Password</button>
                    </div>
                </form>
            </div>

            <?php if ($this->session->status != 'guru') { ?>
            <div class="col-sm-12">
                <div class="box box-danger box-solid">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-warning"></i> Reset Aplikasi</h3>
                    </div>
                    <div class="box-body">
                        <p>Mereset aplikasi akan menghapus semua data kecuali admin.</p>
                        <button class="reset btn btn-danger btn-flat"><i class="fa fa-trash"></i> RESET</button>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </section>
</div>

<?php
if ($this->session->flashdata('passwd')) { ?>
    <script>
        Swal.fire('Sukses!', '<?=$this->session->flashdata("passwd");?>', 'success');
    </script>
<?php }
if ($this->session->flashdata('error')) { ?>
     <script>
         Swal.fire('Gagal!', '<?=$this->session->flashdata("error");?>', 'error');
     </script>
<?php }
if ($this->session->flashdata('tambahadmin')) { ?>
     <script>
         Swal.fire('Sukses!', '<?=$this->session->flashdata("tambahadmin");?>', 'success');
     </script>
<?php  } ?>
<script>
    $(document).ready(function(){
        $('.reset').on('click', function(e){
            e.preventDefault();
            Swal.fire({
                type: 'question',
                title: 'Reset Aplikasi',
                text: 'Anda yakin akan menghapus semua data ?',
                showCancelButton: true,
                confirmButtonText: 'RESET'
            }).then((result) => {
                if (result.value) {
                    location.href = '<?=base_url("admin/teser");?>';
                }
            });
        });
    });
</script>