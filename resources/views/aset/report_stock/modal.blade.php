<!-- Tambah Data -->
<div class="modal fade" id="modal-tambah-report-stock">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Laporan Stock Opname</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_report_stock" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="exampleInputQty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleInputDate" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Status</label>
                        <select name="status" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Status</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Belum Selesai">Belum Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="form-label">File</label>
                        <input type="file" name="laporan" class="form-control" id="exampleInputPhoto">
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
<div class="modal fade" id="modal-rubah-stock-opname-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Laporan Stock Opname</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_report_stock/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="exampleInputQty" value="{{ $row->keterangan }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleInputDate" value="{{ $row->tanggal }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Status</label>
                        <select name="status" class="form-control" aria-label="Default select example">
                            <option selected>{{ $row->status }}</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Belum Selesai">Belum Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="form-label">File</label>
                        <input type="file" name="laporan" class="form-control" id="exampleInputPhoto">
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

