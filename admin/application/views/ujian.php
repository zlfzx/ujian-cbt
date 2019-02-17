<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Ujian</h1>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
                <button class="btn btn-success" data-toggle="modal" data-target="#tambahUjian"><i class="fa fa-plus"></i> Tambah Ujian</button>

                <div class="modal fade" id="tambahUjian">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-list"></i> Tambah Ujian</h4>
                            </div>
                            <div class="modal-body">
                                <form action="admin/tambah_ujian" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="NamaUjian">Nama Ujian :</label>
                                            <input type="text" name="nmujian" class="form-control" placeholder="Masukkan Nama Ujian">
                                        </div>
                                        <div class="form-group">
                                            <label for="Kelas">Kelas :</label>
                                            <select name="kelas" class="form-control select2">
                                                <option selected>Pilih Kelas...</option>
                                                <?php foreach ($listkelas as $lk) { ?>
                                                <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Mapel">Mapel :</label>
                                            <select name="mapel" class="form-control">
                                                <option value="">Pilih Mapel...</option>
                                                <?php foreach($listmapel as $lm){ ?>
                                                <option value="<?= $lm->id_mapel;?>"><?= $lm->mapel;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Guru">Guru :</label>
                                            <select name="guru" class="form-control">
                                                <option value="">Pilih Guru...</option>
                                                <?php foreach($listguru as $lg){ ?>
                                                <option value="<?= $lg->id_guru;?>"><?= $lg->nama;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Waktu">Waktu :</label>
                                            <input type="text" name="waktu" class="form-control" placeholder="Menit">
                                        </div>
                                        <div class="form-group">
                                            <label for="Tanggal">Tanggal :</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="tanggal" class="form-control pull-right" id="tanggalujian" placeholder="Pilih Tanggal">
                                            </div>
                                        </div>
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

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Ujian</th>
                            <th>Kelas</th>
                            <th>Mapel</th>
                            <th>Guru</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($listujian as $lu) { ?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            <td><?=$lu->nama_ujian;?></td>
                            <td><?=$lu->kode_kelas;?></td>
                            <td><?=$lu->mapel;?></td>
                            <td><?=$lu->nama;?></td>
                            <td><?=$lu->waktu;?> Menit</td>
                            <td><?=$lu->tanggal;?></td>
                            <td>
                                <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="box box-warning">
            <div class="box-header">
                <h4 class="text-center">Terlaksana</h4>
            </div>
        </div>
    </section>
</div>

<script>
$(function(){
    $('#tanggalujian').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    })
})
</script>