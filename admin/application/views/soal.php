<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">
            Soal |
            <small><?=$kelas['kode_kelas'];?></small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-info box-solid">
            <div class="box-header">
                <?php if ($this->session->status == 'admin') { ?>
                <form class="form-inline">
                    <div class="form-group">
                        <label for="MataPelajaran">Mata Pelajaran :</label>
                        <select name="mapel" id="pilihmapel" class="form-control">
                            <option>Pilih Mata Pelajaran...</option>
                            <?php foreach ($pilihmapel as $pm) { ?>
                            <option value="<?=$pm->id_mapel;?>"><?=$pm->mapel;?></option>
                        <?php } ?>
                        </select>
                    </div>
                </form>
                <?php }
                if ($this->session->status == 'guru') { ?>
                    <h4 class="box-title">Mapel</h4>
                <?php } ?>
            </div>
            <div class="box-body">
                <!-- Tabel Soal -->
                <table class="table table-striped table-bordered table-hover" id="tabelSoal">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Guru</th>
                            <th>Soal</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //Jika Admin
                     if($this->session->status == 'admin'){
                         $no = 1;
                         if(!empty($listsoal)){
                         foreach($listsoal as $ls): ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$ls->nama;?></td>
                            <td><?=$ls->soal;?></td>
                            <td>
                                <button class="btn btn-xs btn-info m2px" data-toggle="modal" data-target="#info<?=$ls->id_soal;?>"><i class="fa fa-info"></i> Info</button>
                                <a href="<?=base_url('editsoal/'.$ls->id_soal);?>" class="btn btn-xs btn-warning m2px"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-xs btn-danger m2px" data-toggle="modal" data-target="#hapus<?=$ls->id_soal;?>"><i class="fa fa-trash"></i> Hapus</button>
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
                                            <?php 
                                            $ex = explode(".", $ls->media);
                                            $ex = strtolower(end($ex));
                                            if ($ex == 'jpg' || $ex == "png") { ?>
                                            <img src="<?=base_url('./../media/'.$ls->media);?>" class="img-thumbnail">
                                            <?php }
                                            if ($ex == 'mp3' || $ex == 'wav') { ?>
                                            <audio src="<?=base_url('./../media/'.$ls->media);?>" controls></audio>
                                            <?php } ?>
                                            <div class="box box-solid with-border info-soal">
                                                <div class="box-body">
                                                    <h5>Soal :</h5>
                                                    <p><?=$ls->soal;?></p>
                                                    <hr>
                                                    <h5>Opsi A :</h5>
                                                    <p><?=$ls->opsi_a;?></p>
                                                    <h5>Opsi B :</h5>
                                                    <p><?=$ls->opsi_b;?></p>
                                                    <h5>Opsi C :</h5>
                                                    <p><?=$ls->opsi_c;?></p>
                                                    <h5>Opsi D :</h5>
                                                    <p><?=$ls->opsi_d;?></p>
                                                    <h5>Opsi E</h5>
                                                    <p><?=$ls->opsi_e;?></p>
                                                    <h4>Jawaban : </h4>
                                                    <p><?=$ls->jawaban;?></p>
                                                </div>
                                                <div class="box-footer">
                                                    <h5>Dibuat oleh : </h5>
                                                    <p><?=$ls->nama;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal hapus soal -->
                        <div class="modal fade" id="hapus<?=$ls->id_soal;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Soal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin akan menghapus soal ?</h4>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?= base_url('admin/hapus_soal/'.$ls->id_soal);?>" class="btn btn-danger">Ya</a> &nbsp;
                                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                         endforeach;
                        }
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
                            <td>
                                <button class="btn btn-xs btn-info m2px" data-toggle="modal" data-target="#info<?= $ls->id_soal;?>"><i class="fa fa-info"></i> Info</button>
                                <a href="<?=base_url('editsoal/'.$ls->id_soal);?>" class="btn btn-xs btn-warning m2px"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-xs btn-danger m2px"><i class="fa fa-trash"></i> Hapus</button>
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
                                            <?php 
                                            $ex = explode(".", $ls->media);
                                            $ex = strtolower(end($ex));
                                            if ($ex == 'jpg' || $ex == "png") { ?>
                                            <img src="<?=base_url('./../media/'.$ls->media);?>" class="img-thumbnail">
                                            <?php }
                                            if ($ex == 'mp3' || $ex == 'wav') { ?>
                                            <audio src="<?=base_url('./../media/'.$ls->media);?>" controls></audio>
                                            <?php } ?>
                                            <div class="box box-solid with-border info-soal">
                                                <div class="box-body">
                                                    <h5>Soal :</h5>
                                                    <p><?=$ls->soal;?></p>
                                                    <hr>
                                                    <h5>Opsi A :</h5>
                                                    <p><?=$ls->opsi_a;?></p>
                                                    <h5>Opsi B :</h5>
                                                    <p><?=$ls->opsi_b;?></p>
                                                    <h5>Opsi C :</h5>
                                                    <p><?=$ls->opsi_c;?></p>
                                                    <h5>Opsi D :</h5>
                                                    <p><?=$ls->opsi_d;?></p>
                                                    <h5>Opsi E</h5>
                                                    <p><?=$ls->opsi_e;?></p>
                                                    <h4>Jawaban : </h4>
                                                    <p><?=$ls->jawaban;?></p>
                                                </div>
                                                <div class="box-footer">
                                                    <h5>Dibuat oleh : </h5>
                                                    <p><?=$ls->nama;?></p>
                                                </div>
                                            </div>
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
$(document).ready(function(){
    $('#pilihmapel').on('change', function(){
        var id = $(this).val();
        location.href = '<?=base_url("soal/".$kelas['id_kelas']."/");?>'+id;
    })
    $('#tabelSoal').DataTable();
})
</script>