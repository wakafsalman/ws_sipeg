<!-- Tambah KPI -->
<div class="modal fade" id="modal-tambah-kpi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah KPI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_kpi/" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Divisi</label>
                        <select name="id_divisis" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Divisi</option>
                            <option value="1">Operational</option>
                            <option value="3">Marketing</option>
                            <option value="4">Program</option></option>
                            <option value="5">Management</option>
                            <option value="2">Kolaborasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">KPI</label>
                        <select name="id_kode_kpis" class="form-control" aria-label="Default select example">
                            <option selected>Pilih KPI</option>
                            @foreach($kode_kpi as $row)
                            <option value="{{ $row->id }}">{{ $row->kode }} - {{ $row->nama }}</option>
                            @endforeach
                        </select>
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
                        <label for="exampleInputTitle" class="form-label">Divisi</label>
                        <select name="id_divisis" class="form-control" aria-label="Default select example">
                            @if($row->id_divisis == 2)
                                <option selected value="{{ $row->id_divisis }}">Kolaborasi</option>
                            @else
                                <option selected value="{{ $row->id_divisis }}">{{ $row->divisis->nama }}</option>
                            @endif
                            <option value="1">Operational</option>
                            <option value="3">Marketing</option>
                            <option value="4">Program</option></option>
                            <option value="5">Management</option>
                            <option value="2">Kolaborasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">KPI</label>
                        <select name="id_kode_kpis" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->id_kode_kpis }}">{{ $row->kode_kpis->kode }} - {{ $row->kode_kpis->nama }}</option>
                            @foreach($kode_kpi as $data)
                            <option value="{{ $data->id }}">{{ $data->kode }} - {{ $data->nama }}</option>
                            @endforeach
                        </select>
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
