    <div class="content-wrapper">

        <section class="content-header">
            <h1 class="text-center">
                Daftar Guru
            </h1>
        </section>

        <section class="content">
            <div class="box box-warning">
                <div class="box-header">
                    <button type="button" data-toggle="modal" data-target="#tambah-guru" class="btn btn-sm btn-flat btn-success"><i class="fa fa-user-plus"></i> Tambah Guru</button>

                    <!-- Modal Tambah Guru -->
                    <div class="modal fade" id="tambah-guru">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title"><i class="fa fa-users"></i> Tambah Guru</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('admin/tambah_guru');?>" method="post" role="form">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="NamaGuru">Nama Guru :</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Guru...">
                                            </div>
                                            <div class="form-group">
                                                <label for="MataPelajaran">Mata Pelajaran :</label>
                                                <select class="form-control" name="mapel" required>
                                                    <option selected>Pilih Mata Pelajaran...</option>
                                                    <?php foreach($listmapel as $lm){ ?>
                                                    <option value="<?= $lm->id_mapel;?>"><?= $lm->mapel;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="User">User :</label>
                                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username Guru...">
                                            </div>
                                            <div class="form-grou">
                                                <label for="Password">Password :</label>
                                                <input type="password" name="password" id="" class="form-control" placeholder="Masukkan Password Guru...">
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Modal Tambah Guru -->
                </div>

                <div class="box-body">
                    <table id="tabelGuru" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Mata Pelajaran</th>
                                <th>Login</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($guru as $g){
                            ?>
                            <tr>
                                <td><?= $no++;?>.</td>
                                <td><?= $g->nama;?></td>
                                <td><?= $g->mapel;?></td>
                                <td><button class="btn btn-xs btn-info" data-toggle="modal" data-target="#lihatLogin<?= $g->id_guru;?>"><i class="fa fa-eye"></i> Lihat</button></td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#editGuru<?= $g->id_guru;?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                    <button type="button" data-toggle="modal" data-target="#hapusGuru<?= $g->id_guru;?>" class="btn btn-xs btn-danger"><i class="fa fa-user-times"></i> Hapus</button>
                                </td>
                            </tr>
                                <!-- Modal Lihat Login Guru -->
                                <div class="modal fade" id="lihatLogin<?= $g->id_guru;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-eye"></i> Informasi Login</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="Username">Username :</label>
                                                    <input type="text" value="<?= $g->username;?>" class="form-control" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Password">Password :</label>
                                                    <input type="text" value="<?= $g->password;?>" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Edit Data Guru -->
                                <div id="editGuru<?= $g->id_guru;?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title"><i class="fa fa-users"></i> Edit Data Guru</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('admin/edit_guru/'.$g->id_guru);?>" method="post" role="form">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="NamaGuru">Nama :</label>
                                                            <input type="text" name="nama" id="" class="form-control" value="<?= $g->nama;?>" placeholder="Masukkan Nama Guru...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="MataPelajaran">Mata Pelajaran :</label>
                                                            <select class="form-control" name="mapel" required>
                                                                <option value="<?= $g->id_mapel;?>" selected><?= $g->mapel;?></option>
                                                                <?php
                                                                foreach($listmapel as $lm){
                                                                ?>
                                                                <option value="<?= $lm->id_mapel;?>"><?= $lm->mapel;?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="User">User :</label>
                                                            <input type="text" name="username" value="<?=$g->username;?>" class="form-control" placeholder="Masukkan Username Guru...">
                                                        </div>
                                                        <div class="form-grou">
                                                            <label for="Password">Password :</label>
                                                            <input type="password" name="password" value="<?=$g->password;?>" class="form-control" placeholder="Masukkan Password Guru...">
                                                        </div>
                                                    </div>
                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End Modal -->
                                <!-- Modal Hapus Data Guru -->
                                <div class="modal fade" id="hapusGuru<?= $g->id_guru;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Data Guru</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <h4>Anda yakin akan menghapus <b><?= $g->nama;?></b> ?</h4>
                                                    <p class="text-danger">*Menghapus data terpilih dapat menghapus semua data yang terkait seperti soal dan lainnya...</p>
                                                </div>
                                                <div class="box-footer">
                                                    <a href="<?= base_url('admin/hapus_guru/'.$g->id_guru);?>" class="btn btn-danger">Ya</a> &nbsp;
                                                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End Modal-->
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Mata Pelajaran</th>
                                <th>#</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(function(){
            $('#tabelGuru').DataTable({
            'paging' : true,
            'lengthChange' : true,
            'searching' : true,
            'ordering' : true,
            'info' : true,
            'autoWidth' : false
            });
        })
    </script>