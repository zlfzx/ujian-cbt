<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Mata Pelajaran
        </h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
                <button type="button" data-toggle="modal" data-target="#tambah-mapel" class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus"></i> Tambah Mapel</button>

                <!-- Modal Tambah Pelajaran -->
                <div class="modal fade" id="tambah-mapel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-clone"></i> Tambah Mata Pelajaran</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_mapel');?>" method="post" role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="MataPelajaran">Mata Pelajaran :</label>
                                            <input type="text" name="mapel" class="form-control" placeholder="Masukkan Mata Pelajaran...">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Modal Tambah Pelajaran -->
            </div>
            <div class="box-body">
                <table id="tabelMapel" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Mata Pelajaran</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($mapel as $d){
                        ?>
                        <tr>
                            <td><?= $no++;?>.</td>
                            <td><?= $d->mapel; ?></td>
                            <td>
                                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editMapel<?= $d->id_mapel;?>"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapusMapel<?= $d->id_mapel;?>"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal Edit Mapel -->
                        <div class="modal fade" id="editMapel<?= $d->id_mapel;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-clone"></i> Edit Data Mata Pelajaran</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/edit_mapel/'.$d->id_mapel);?>" method="post">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="MataPelajaran">Mata Pelajaran :</label>
                                                    <input type="text" name="mapel" class="form-control" value="<?= $d->mapel; ?>">
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
                        <!-- Modal Hapus Mata Pelajaran -->
                        <div class="modal fade" id="hapusMapel<?= $d->id_mapel;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Mata Pelajaran</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin akan menghapus mata pelajaran <b><?= $d->mapel;?></b> ?</h4>
                                            <p class="text-danger">*Menghapus mata pelajaran terpilih dapat menghapus semua data yang terkait termasuk guru, soal, maupun nilai</p>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?= base_url('admin/hapus_mapel/'.$d->id_mapel);?>" class="btn btn-danger">Ya</a> &nbsp;
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