<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Siswa
        </h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
                <button type="button" data-toggle="modal" data-target="#tambahSiswa" class="btn btn-sm btn-flat btn-success"><i class="fa fa-user-plus"></i> Tambah Siswa</button>
                <!-- Modal Tambah Siswa -->
                <div class="modal fade" id="tambahSiswa">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-user"></i> Tambah Data Siswa</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_siswa');?>" method="post" role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="NamaSiswa">Nama Siswa :</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa...">
                                        </div>
                                        <div class="form-group">
                                            <label for="NamaSiswa">NIS :</label>
                                            <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS Siswa...">
                                        </div>
                                        <div class="form-group">
                                            <label for="NamaSiswa">Kelas :</label>
                                            <select name="kelas" id="" class="form-control" required>
                                                <option value="">Pilih Kelas...</option>
                                                <?php foreach($listkelas as $lk){ ?>
                                                <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="NoHP">No. HP :</label>
                                            <input type="text" name="nohp" class="form-control" placeholder="Masukkan Nomor HP...">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Modal -->
            </div>
            <div class="box-body">
                <table id="tabelSiswa" class="table table-bordered table-striped table-hover" id="tabelSiswa">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>No HP</th>
                            <th>Info</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($siswa as $s){
                        ?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $s->nama;?></td>
                            <td><?= $s->nis;?></td>
                            <td><?= $s->kode_kelas;?></td>
                            <td><?= $s->nohp;?></td>
                            <td>
                                <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#lihatPassword<?= $s->id_siswa;?>"><i class="fa fa-eye"></i> Lihat</button>
                            </td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#editSiswa<?= $s->id_siswa;?>" class="btn btn-xs btn-warning" href="#"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button type="button" data-toggle="modal" data-target="#hapusSiswa<?= $s->id_siswa;?>" class="btn btn-xs btn-danger" href="#"><i class="fa fa-user-times"></i> Hapus</button> 
                            </td>
                        </tr>
                        <!-- Modal Lihat Password Siswa -->
                        <div class="modal fade" id="lihatPassword<?= $s->id_siswa;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="fa fa-user"></i> <?= $s->nama;?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="password">Password :</label>
                                            <input value="<?= $s->password;?>" type="text" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="Pertanyaan">Pertanyaan :</label>
                                            <input type="text" value="<?= $s->pertanyaan;?>" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="Jawaban">Jawaban :</label>
                                            <input type="text" value="<?= $s->jawaban;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Modal -->
                        <!-- Modal Edit Siswa -->
                        <div class="modal fade" id="editSiswa<?= $s->id_siswa;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-user"></i> Edit Data Siswa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/edit_siswa/'.$s->id_siswa);?>" method="post">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="Nama">Nama :</label>
                                                    <input type="text" name="nama" value="<?=$s->nama;?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama">NIS :</label>
                                                    <input type="text" name="nis" value="<?=$s->nis;?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama">Kelas :</label>
                                                    <select name="kelas" id="" class="form-control">
                                                        <option value="<?=$s->kelas;?>" selected><?=$s->kode_kelas;?></option>
                                                        <?php foreach($listkelas as $lk){ ?>
                                                        <option value="<?=$lk->id_kelas;?>"><?=$lk->kode_kelas;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="NoHP">No. HP :</label>
                                                    <input type="text" name="nohp" value="<?=$s->nohp;?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password :</label>
                                                    <input type="text" name="password" value="<?=$s->password;?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pertanyaan">Pertanyaan :</label>
                                                    <input type="text" name="pertanyaan" value="<?=$s->pertanyaan;?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Jawaban">Jawaban :</label>
                                                    <input type="text" name="jawaban" value="<?=$s->jawaban;?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus Siswa -->
                        <div class="modal fade" id="hapusSiswa<?= $s->id_siswa;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Data Siswa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin untuk menghapus siswa <b><?=$s->nama;?></b> ?</h4>
                                            <p class="text-danger">*Menghapus data siswa terpilih akan menghapus semua data yang terkait seperti nilai dan yang lainnya...</p>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?=base_url('admin/hapus_siswa/'.$s->id_siswa);?>" class="btn btn-danger">Ya</a> &nbsp;
                                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Modal -->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<script>
$(function(){
    $('#tabelSiswa').DataTable({
      'paging' : true,
      'lengthChange' : true,
      'searching' : true,
      'ordering' : true,
      'info' : true,
      'autoWidth' : false
    });
})
</script>