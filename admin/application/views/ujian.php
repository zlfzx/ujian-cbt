<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Ujian</h1>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
                <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#tambahUjian"><i class="fa fa-plus"></i> Tambah Ujian</button>

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
                                            <input type="text" name="nmujian" class="form-control" placeholder="Masukkan Nama Ujian" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Kelas">Kelas :</label>
                                            <select name="kelas" id="pilihkelas" class="form-control" required>
                                                <option selected>Pilih Kelas...</option>
                                                <?php foreach ($listkelas as $lk) { ?>
                                                <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Mapel">Mata Pelajaran :</label>
                                            <select name="mapel" id="mapel" class="form-control" required>
                                                <option value="">Pilih Mapel...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Guru">Guru :</label>
                                            <select name="guru" class="form-control" required>
                                                <option value="">Pilih Guru...</option>
                                                <?php foreach($listguru as $lg){ ?>
                                                <option value="<?= $lg->id_guru;?>"><?= $lg->nama;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Waktu">Waktu :</label>
                                            <input type="text" name="waktu" class="form-control" placeholder="Menit" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Tanggal">Tanggal :</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="tanggal" class="form-control pull-right" id="tanggalujian" placeholder="Pilih Tanggal" required>
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

                <table class="table table-bordered table-striped table-hover">
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
                                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit<?=$lu->id_ujian;?>"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapusujian<?=$lu->id_ujian;?>"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="edit<?=$lu->id_ujian;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-list"></i> Edit Ujian</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="admin/edit_ujian/<?=$lu->id_ujian;?>" method="POST">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="NamaUjian">Nama Ujian :</label>
                                                    <input type="text" name="nmujian" class="form-control" placeholder="Masukkan Nama Ujian" value="<?=$lu->nama_ujian;?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Kelas">Kelas :</label>
                                                    <select name="kelas" id="editkelas" class="form-control" required>
                                                        <option value="<?=$lu->id_kelas;?>" selected><?=$lu->kode_kelas;?></option>
                                                        <?php foreach ($listkelas as $lk) { ?>
                                                        <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Mapel">Mata Pelajaran :</label>
                                                    <select name="mapel" id="mapeledit" class="form-control" required>
                                                        <option value="<?=$lu->id_mapel;?>"><?=$lu->mapel;?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Guru">Guru :</label>
                                                    <select name="guru" class="form-control" required>
                                                        <option value="<?=$lu->id_guru;?>"><?=$lu->nama;?></option>
                                                        <?php foreach($listguru as $lg){ ?>
                                                        <option value="<?= $lg->id_guru;?>"><?= $lg->nama;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Waktu">Waktu :</label>
                                                    <input type="text" name="waktu" class="form-control" placeholder="Menit" value="<?=$lu->waktu;?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Tanggal">Tanggal :</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" name="tanggal" class="form-control pull-right" id="tanggalujianedit<?=$lu->id_ujian;?>" placeholder="Pilih Tanggal" value="<?=$lu->tanggal;?>" required>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#tanggalujianedit<?=$lu->id_ujian;?>').datepicker({
                                                                autoclose: true,
                                                                todayHighlight: true,
                                                                format: 'yyyy-mm-dd'
                                                            });
                                                        });
                                                    </script>
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
                        <div class="modal fade" id="hapusujian<?=$lu->id_ujian;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Ujian</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin akan menghapus ujian <?=$lu->nama_ujian;?>?</h4>
                                            <p class="text-danger">*Menghapus ujian terpilih akan menghapus semua data yang terkait seperti nilai dan yang lainnya...</p>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?= base_url('admin/hapus_ujian/'.$lu->id_ujian);?>" class="btn btn-danger">Ya</a> &nbsp;
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
$(document).ready(function(){
    $('#pilihkelas').on('change', function(){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url("admin/mapel_by_kelas/");?>'+id,
            dataType: 'json',
            success: function(data){
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="'+data[i].id_mapel+'">'+data[i].mapel+'</option>';
                }
                if (data) {
                    $('#mapel').html(html);
                }
                 if (data == '') {
                     var html = '<option>-- Belum Ada Soal --</option>';
                     $('#mapel').html(html);
                 }
            }
        })
    });
    $('#editkelas').on('change', function(){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url("admin/mapel_by_kelas/");?>'+id,
            dataType: 'json',
            success: function(data){
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="'+data[i].id_mapel+'">'+data[i].mapel+'</option>';
                }
                if (data) {
                    $('#mapeledit').html(html);
                }
                 if (data == '') {
                     var html = '<option>-- Belum Ada Soal --</option>';
                     $('#mapeledit').html(html);
                 }
            }
        })
    });
    $('#tanggalujian').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });
    $('.table').DataTable();
})
</script>