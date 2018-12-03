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
                                <form action="">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Kelas">Kelas :</label>
                                            <select name="" class="form-control select2">
                                                <option selected>Pilih Kelas...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Mapel">Mapel :</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Pilih Mapel...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Guru">Guru :</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Pilih Guru...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Waktu">Waktu :</label>
                                            <input type="text" class="form-control" placeholder="Menit">
                                        </div>
                                        <div class="form-group">
                                            <label for="Tanggal">Tanggal :</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" class="form-control pull-right" id="tanggalujian" placeholder="Pilih Tanggal">
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
                            <th>Kelas</th>
                            <th>Mapel</th>
                            <th>Guru</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>12 TKJ 2</td>
                            <td>Matematika</td>
                            <td>Guru Matematika</td>
                            <td>60 Menit</td>
                            <td>16/11/18</td>
                            <td>
                                <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
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
        todayHighlight: true
    })
})
</script>