<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">
            Soal
        </h1>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
                <a href="<?= site_url('tsoal');?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Soal</a> &nbsp;&nbsp;
                <button class="btn btn-info" data-toggle="modal" data-target="#importSoal"><i class="fa fa-upload"></i> Import</button>
                <!-- Modal Import Soal -->
                <div class="modal fade" id="importSoal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-upload"></i> Import Soal</h4>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="File">File :</label>
                                            <input type="file">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Import</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <!-- Pilih Kelas-->
                <div class="pad">
                    <div class="callout callout-info">
                        <form action="" class="form-inline">
                            <div class="form-group">
                                <label for="Kelas">Kelas :</label>
                                <select name="" id="pilihKelas" class="form-control">
                                    <option>Pilih Kelas...</option>
                                    <option>12 TKJ 1</option>
                                    <option>12 TKJ 2</option>
                                </select> &nbsp;&nbsp;
                            </div>
                            <div class="form-group">
                                <label for="MataPelajaran">Mata Pelajaran :</label>
                                <select name="" id="pilihKelas" class="form-control">
                                    <option>Pilih Mata Pelajaran...</option>
                                    <option>Matematika</option>
                                    <option>Bahasa Indonesia</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="pad">
                    <div class="well">
                        <h1 class="text-center lead">Silahkan Pilih Kelas dan Mata Pelajaran !</h1>
                    </div>
                </div>
                
                <!-- Tabel Soal -->
                <table class="table table-striped table-bordered table-hover" id="tabelSoal">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Guru</th>
                            <th>Soal</th>
                            <th>Media</th>
                            <th>Opsi A</th>
                            <th>Opsi B</th>
                            <th>Opsi C</th>
                            <th>Opsi D</th>
                            <th>Opsi E</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($this->session->status == 'admin'){
                            $no = 1;
                            foreach($listsoal as $ls): ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$ls->guru;?></td>
                            <td><?=$ls->soal;?></td>
                            <td><?=$ls->media;?></td>
                            <td><?=$ls->opsi_a;?></td>
                            <td><?=$ls->opsi_b;?></td>
                            <td><?=$ls->opsi_c;?></td>
                            <td><?=$ls->opsi_d;?></td>
                            <td><?=$ls->opsi_e;?></td>
                            <td>
                                <button class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>

                        <?php
                            endforeach;
                        }
                        if($this->session->status == 'guru'){
                            $no = 1;
                            foreach($listsoal as $ls):
                        ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$this->session->nama;?></td>
                            <td><?=$ls->soal;?></td>
                            <td><?=$ls->media;?></td>
                            <td><?=$ls->opsi_a;?></td>
                            <td><?=$ls->opsi_b;?></td>
                            <td><?=$ls->opsi_c;?></td>
                            <td><?=$ls->opsi_d;?></td>
                            <td><?=$ls->opsi_e;?></td>
                            <td>
                                <button class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                            <?php endforeach; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
$(function(){
    $('#tabelSoal').DataTable();
    CKEDITOR.replace('fieldSoal');
})
</script>