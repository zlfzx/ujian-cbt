<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Tambah Soal</h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
                <a href="<?= site_url('soal');?>" class="btn btn-sm btn-warning"><i class="fa fa-angle-left"></i>  Kembali</a>
            </div>
            <div class="box-body">
                <form action="" enctype="multipart/form-data" method="POST">
                    <div class="col-md-4 form-group">
                        <label for="MataPelajaran">Mata Pelajaran :</label>
                        <select name="mapel" class="form-control">
                            <option selected>Pilih Mata Pelajaran...</option>
                            <?php foreach($listmapel as $lm){ ?>
                            <option value="<?= $lm->id_mapel;?>"><?= $lm->mapel;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="MataPelajaran">Kelas :</label>
                        <select name="kelas" class="form-control">
                            <option selected>Pilih Kelas...</option>
                            <?php foreach($listkelas as $lk){ ?>
                            <option value="<?= $lk->id_kelas;?>"><?= $lk->kode_kelas;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="MataPelajaran">Guru :</label>
                        <select name="guru" class="form-control">
                            <option selected>Pilih Guru...</option>
                            <?php foreach($listguru as $lg){ ?>
                            <option value="<?= $lg->id_guru;?>"><?= $lg->nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="Soal">Soal :</label>
                        <textarea id="fieldSoal" name="soal"></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="Media">Media :</label>
                        <input type="file" name="media">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="A">Opsi A</label>
                        <input type="text" name="a" class="form-control" placeholder="Jawaban A">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="B">Opsi B</label>
                        <input type="text" name="b" class="form-control" placeholder="Jawaban B">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="C">Opsi C</label>
                        <input type="text" name="c" class="form-control" placeholder="Jawaban C">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="D">Opsi D</label>
                        <input type="text" name="d" class="form-control" placeholder="Jawaban D">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="E">Opsi E</label>
                        <input type="text" name="e" class="form-control" placeholder="Jawaban E">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="Jawaban">Jawaban</label>
                        <select name="jawaban" id="" class="form-control">
                            <option value="pilih">Pilih Jawaban...</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                            <option value="e">E</option>
                        </select>
                        <input type="hidden" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
$(function(){
    CKEDITOR.replace('fieldSoal')
})
</script>