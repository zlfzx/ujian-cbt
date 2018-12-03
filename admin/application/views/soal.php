<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">
            Soal |
            <small><?=$kelas['kode_kelas'];?></small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
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

                <!-- Tabel Soal -->
                <table class="table table-striped table-bordered table-hover" id="tabelSoal">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Guru</th>
                            <th>Soal</th>
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
                    //Jika Admin
                    if($this->session->status == 'admin'){
                        $no = 1;
                        foreach($listsoal as $ls): ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$ls->nama;?></td>
                            <td><?=$ls->soal;?></td>
                            <td><?=$ls->opsi_a;?></td>
                            <td><?=$ls->opsi_b;?></td>
                            <td><?=$ls->opsi_c;?></td>
                            <td><?=$ls->opsi_d;?></td>
                            <td><?=$ls->opsi_e;?></td>
                            <td>
                                <button class="btn btn-info m2px" data-toggle="modal" data-target="#info<?=$ls->id_soal;?>"><i class="fa fa-info"></i> Info</button>
                                <button class="btn btn-warning m2px"><i class="fa fa-edit"></i> Edit</button>
                                <button class="btn btn-danger m2px"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal Info Soal -->
                        <div class="modal fade" id="info<?=$ls->id_soal;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-list-alt"></i> Info Soal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <?php if ($ls->media) { ?>
                                            <img src="./../media/<?=$ls->media;?>" class="img-thumbnail">
                                            <?php } ?>
                                            <div class="well">
                                                <h3>Jawaban : </h3>
                                                <p><?=$ls->jawaban;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        endforeach;
                    }
                    //Jika Guru
                    if($this->session->status == 'guru'){
                        $no = 1;
                        foreach($listsoal as $ls):
                    ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$this->session->nama;?></td>
                            <td><?=$ls->soal;?></td>
                            <td><?=$ls->opsi_a;?></td>
                            <td><?=$ls->opsi_b;?></td>
                            <td><?=$ls->opsi_c;?></td>
                            <td><?=$ls->opsi_d;?></td>
                            <td><?=$ls->opsi_e;?></td>
                            <td>
                                <button class="btn btn-info m2px" data-toggle="modal" data-target="#info<?= $ls->id_soal;?>"><i class="fa fa-info"></i> Info</button>
                                <button class="btn btn-warning m2px"><i class="fa fa-edit"></i> Edit</button>
                                <button class="btn btn-danger m2px"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal Info Soal -->
                        <div class="modal fade" id="info<?=$ls->id_soal;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Info Soal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <img src="./../media/"<?=$ls->media;?> alt="" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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