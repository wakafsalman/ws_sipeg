<!-- Import Data -->
<div class="modal fade" id="modal-import-aset">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form action="/import_aset" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade" id="modal-tambah-aset">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_aset" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Kode Aset</label>
                        <input type="text" name="kode" class="form-control" id="exampleInputCode">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Jenis Aset</label>
                        <select name="jenis_aset" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Jenis Aset</option>
                            <option value="Peralatan Wakaf">Peralatan Wakaf</option>
                            <option value="Merchandise">Merchandise</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Aset</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal Pembelian</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleInputDate" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty" class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="exampleInputQty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Satuan</label>
                        <select name="satuan" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Satuan</option>
                            @foreach($satuan as $row)
                            <option value="{{ $row->nama }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" id="exampleInputQty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPIC" class="form-label">PIC</label>
                        <input type="text" name="pic" class="form-control typeahead-pic" id="exampleInputQty">
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
<div class="modal fade" id="modal-rubah-aset-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_aset/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Kode Aset</label>
                        <input type="text" name="kode" class="form-control" id="exampleInputCode" value="{{ $row->kode }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Jenis Aset</label>
                        <select name="jenis_aset" class="form-control" aria-label="Default select example">
                            <option selected>{{ $row->jenis_aset }}</option>
                            <option value="Peralatan Wakaf">Peralatan Wakaf</option>
                            <option value="Merchandise">Merchandise</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Aset</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $row->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal Pembelian</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleInputDate" value="{{ $row->tanggal }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty" class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="exampleInputQty" value="{{ $row->jumlah }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Satuan</label>
                        <select name="satuan" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->satuan }}">{{ $row->satuan }}</option>
                            @foreach($satuan as $data)
                            <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" id="exampleInputQty" value="{{ $row->harga }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPIC" class="form-label">PIC</label>
                        <input type="text" name="pic" class="form-control typeahead" id="exampleInputQty" value="{{ $row->pic }}">
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
