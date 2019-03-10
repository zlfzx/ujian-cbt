<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Kelas / Jurusan
        </h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
                <button type="button" data-toggle="modal" data-target="#tambah-kelas" class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus"></i> Tambah Kelas</button>
                <!-- Modal Tambah Kelas -->
                <div class="modal fade" id="tambah-kelas">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                <h4><i class="fa fa-th-large"></i> Tambah Data Kelas</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= site_url('admin/tambah_kelas');?>" method="post" role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Kelas">Kelas :</label>
                                            <input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas...">
                                        </div>
                                        <div class="form-group">
                                            <label for="Kelas">Jurusan :</label>
                                            <select name="jurusan" id="" class="form-control">
                                                <option value="">Pilih Jurusan...</option>
                                                <?php foreach($jurusan as $j){ ?>
                                                <option value="<?= $j->id_jurusan;?>"><?= $j->jurusan;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Kelas">Rombel :</label>
                                            <input type="text" name="rombel" class="form-control" placeholder="Masukkan Rombel...">
                                        </div>
                                        <div class="form-group">
                                            <label for="Kelas">Kode Kelas :</label>
                                            <input type="text" name="kodekelas" class="form-control" placeholder="Masukkan Kode Kelas...">
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
                <table class="table table-bordered table-striped table-hover" id="tabelKelas">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Rombel</th>
                            <th>Kode Kelas</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($kelas as $k){
                        ?>
                        <tr>
                            <td><?= $no++;?>.</td>
                            <td><?= $k->kelas;?></td>
                            <td><?= $k->jurusan;?></td>
                            <td><?= $k->rombel;?></td>
                            <td><?= $k->kode_kelas;?></td>
                            <td>
                                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editKelas<?= $k->id_kelas;?>"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapusKelas<?= $k->id_kelas;?>"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal Edit Kelas -->
                        <div class="modal fade" id="editKelas<?= $k->id_kelas;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-th-large"></i> Edit Data Kelas</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/edit_kelas/'.$k->id_kelas);?>" method="post" role="form">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="Kelas">Kelas :</label>
                                                    <input type="text" name="kelas" class="form-control" value="<?= $k->kelas;?>" placeholder="Masukkan Kelas...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Jurusan">Jurusan :</label>
                                                    <select name="jurusan" id="" class="form-control">
                                                        <option value="<?= $k->id_jurusan;?>" selected><?= $k->jurusan;?></option>
                                                        <?php
                                                        foreach($jurusan as $j){
                                                        ?>
                                                        <option value="<?= $j->id_jurusan;?>"><?= $j->jurusan;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Kelas">Rombel :</label>
                                                    <input type="text" name="rombel" class="form-control" value="<?= $k->rombel;?>" placeholder="Masukkan Rombel...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Kelas">Kode Kelas :</label>
                                                    <input type="text" name="kodekelas" class="form-control" value="<?= $k->kode_kelas;?>" placeholder="Masukkan Kode Kelas...">
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
                        <!-- Modal Hapus Kelas-->
                        <div class="modal fade" id="hapusKelas<?= $k->id_kelas;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Data Kelas</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin akan menghapus kelas <?= $k->kode_kelas;?>?</h4>
                                            <p class="text-danger">*Menghapus data siswa terpilih akan menghapus semua data yang terkait seperti nilai dan yang lainnya...</p>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?= base_url('admin/hapus_kelas/'.$k->id_kelas);?>" class="btn btn-danger">Ya</a> &nbsp;
                                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Modal-->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="box box-warning">
            <div class="box-header with-border">
                <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#tambahJurusan"><i class="fa fa-plus"></i> Tambah Jurusan</button>
                <!-- Modal Tambah Jurusan -->
                <div class="modal fade" id="tambahJurusan">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-th-large"></i> Tambah Jurusan</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_jurusan');?>" method="post" role="form">
                                    <div class="box-body">
                                        <label for="Jurusan">Jurusan :</label>
                                        <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan...">
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jurusan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($jurusan as $j){
                        ?>
                        <tr>
                            <td><?= $no++;?>.</td>
                            <td><?= $j->jurusan;?></td>
                            <td>
                                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editJurusan<?= $j->id_jurusan;?>"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapusJurusan<?= $j->id_jurusan;?>"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal Edit Jurusan -->
                        <div class="modal fade" id="editJurusan<?= $j->id_jurusan;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Jurusan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/edit_jurusan/'.$j->id_jurusan);?>" method="post" role="form">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="Jurusan">Jurusan :</label>
                                                    <input type="text" name="jurusan" class="form-control" value="<?= $j->jurusan;?>">
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
                        <!-- Modal Hapus Jurusan -->
                        <div class="modal fade" id="hapusJurusan<?= $j->id_jurusan;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Hapus Data</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin akan menghapus jurusan <b><?= $j->jurusan;?></b> ?</h4>
                                            <p class="text-danger">*Menghapus data terpilih akan menghapus seluruh data yang terkait seperti kelas dan yang lainnya...</p>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?= base_url('admin/hapus_jurusan/'.$j->id_jurusan);?>" class="btn btn-danger">Ya</a> &nbsp;&nbsp;
                                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<script>
$(function(){
    $('#tabelKelas').DataTable({
      'paging' : true,
      'lengthChange' : true,
      'searching' : true,
      'ordering' : true,
      'info' : true,
      'autoWidth' : false
    });
})
</script>