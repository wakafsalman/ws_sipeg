<!-- Tambah KPI -->
<div class="modal fade" id="modal-tambah-kpi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">KEY PERFORMANCE INDICATOR FORM </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_kpi/" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="exampleInputDescription" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" id="exampleInputDescription">
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputTitle" class="form-label">Jabatan</label>
                                <select name="id_jabatans" class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Jabatan</option>
                                    @foreach($jabatan as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <a href="#" class="tambah_kpi btn btn-primary mb-4"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    </div>
                </div>                
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-3">
                                <label class="form-label">Key Performance Indicator</label>
                                <select name="id_jabatans" class="form-control" aria-label="Default select example">
                                    <option selected>Pilih KPI</option>
                                    @foreach($kode_kpi as $row)
                                    <option value="{{ $row->id }}">{{ $row->kode }} - {{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <label class="form-label">Target</label>
                                <input type="text" name="target" class="form-control">
                            </div>
                            <div class="col-xs-2">
                                <label class="form-label">Progress</label>
                                <input type="text" name="progress" class="form-control">
                            </div>
                            <div class="col-xs-2">
                                <label class="form-label">Kendala</label>
                                <input type="text" name="kendala" class="form-control">
                            </div>
                            <div class="col-xs-2">
                                <label class="form-label">Aksi</label>
                                <a href="#" class="btn btn-danger form-control"><i class="glyphicon glyphicon-trash"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="form-group kpi"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

