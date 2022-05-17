<!-- Import Data -->
<div class="modal fade" id="modal-import-kpi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Kode KPI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form action="/import_kpi" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah KPI -->
<div class="modal fade" id="modal-tambah-kpi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kode KPI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_kpi/" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Jabatan</label>
                        <select name="id_jabatans" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Jabatan</option>
                            @foreach($jabatan as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Key Performance Indicator</label>
                        <select name="id_kode_kpis" class="form-control" aria-label="Default select example">
                            <option selected>Pilih KPI</option>
                            @foreach($kode_kpi as $row)
                            <option value="{{ $row->id }}">{{ $row->kode }} - {{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Target</label>
                        <input type="text" name="target" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Progress</label>
                        <input type="text" name="progress" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kendala</label>
                        <input type="text" name="kendala" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Rubah Data -->
@foreach($data as $row)
<div class="modal fade" id="modal-rubah-kpi-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah KPI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_kpi/{{ $row->id }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Jabatan</label>
                        <select name="id_jabatans" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->id_jabatans }}">{{ $row->jabatans->nama }}</option>
                            @foreach($jabatan as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Key Performance Indicator</label>
                        <select name="id_kode_kpis" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->id_kode_kpis }}">{{ $row->kode_kpis->nama }}</option>
                            @foreach($kode_kpi as $data)
                            <option value="{{ $data->id }}">{{ $data->kode }} - {{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Target</label>
                        <input type="text" name="target" class="form-control" value="{{ $row->target }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Progress</label>
                        <input type="text" name="progress" class="form-control" value="{{ $row->progress }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kendala</label>
                        <input type="text" name="kendala" class="form-control" value="{{ $row->kendala }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach