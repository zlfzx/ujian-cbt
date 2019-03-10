<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center"><?=$judul;?> | <small><?=$kls;?></small></h1>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="MataPelajaran">Mata Pelajaran :</label>
                        <select id="pilihmapel" class="form-control">
                            <option selected>Pilih Mata Pelajaran...</option>
                            <?php foreach($listmapel as $lm){ ?>
                            <option value="<?= $lm->id_mapel;?>"><?= $lm->mapel;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-flat btn-warning"><i class="fa fa-download"></i> Export</a>
                    </div>
                </form>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Mapel</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody id="datanilai">
                        <?php
                        $no = 1;
                        if (!empty($nilai)) {
                        foreach($nilai as $n){ ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$n->nis;?></td>
                            <td><?=$n->nama;?></td>
                            <td><?=$n->mapel;?></td>
                            <td><?=$n->nilai;?></td>
                            <td><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script src="<?=base_url('./../assets/js/datatable/dataTables.buttons.min.js');?>"></script>
<script src="<?=base_url('./../assets/js/datatable/buttons.flash.min.js');?>"></script>
<script src="<?=base_url('./../assets/js/datatable/jszip.min.js');?>"></script>
<script src="<?=base_url('./../assets/js/datatable/pdfmake.min.js');?>"></script>
<script src="<?=base_url('./../assets/js/datatable/vfs_fonts.js');?>"></script>
<script src="<?=base_url('./../assets/js/datatable/buttons.html5.min.js');?>"></script>
<script src="<?=base_url('./../assets/js/datatable/buttons.print.min.js');?>"></script>

<script>
$(document).ready(function(){
    $('#pilihmapel').on('change', function(){
        var id = $(this).val();
        location.href = '<?=base_url("nilai/".$kelas['id_kelas']."/");?>'+id;
    });
    $('.table').DataTable({
        dom: 'Bfrtip',
        buttons: ['csv', 'excel', 'pdf', 'print']
    });
})
</script>