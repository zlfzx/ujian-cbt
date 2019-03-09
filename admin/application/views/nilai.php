<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Nilai | <small><?=$kls;?></small></h1>
    </section>

    <section class="content">
        <div class="box box-info box-solid">
            <div class="box-header">
                <form action="" class="form-inline">
                        <div class="form-group">
                            <label for="MataPelajaran">Mata Pelajaran :</label>
                            <select name="" id="" class="form-control">
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
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="datanilai">
                        <?php
                        $no = 1;
                        foreach($nilai as $n){ ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$n->nis;?></td>
                            <td><?=$n->nama;?></td>
                            <td><?=$n->mapel;?></td>
                            <td><?=$n->nilai;?></td>
                            <td><?=$n->status;?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function(){
    $('#pilihkelas').change(function(){
        var id = $(this).val();
        $.ajax({
            url : "<?= base_url('admin/siswa_by_kelas'); ?>",
            type : "POST",
            data : {id: id},
            async : 'false',
            dataType : 'json',
            success : function(data){
                console.log(data);
            }
        });
    })
})
</script>