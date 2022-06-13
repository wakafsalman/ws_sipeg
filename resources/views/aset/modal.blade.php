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
                        <label for="exampleInputName" class="form-label">Nama Aset</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMerk" class="form-label">Merk</label>
                        <input type="text" name="merk" class="form-control" id="exampleInputMerk">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPIC" class="form-label">PIC</label>
                        <select name="pic" class="form-control" aria-label="Default select example">
                            <option selected>Pilih PIC</option>
                            @foreach($pegawai as $row)
                            <option value="{{ $row->nama }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
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
                        <label for="exampleInputPhoto" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="exampleInputPhoto">
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
                        <label for="exampleInputName" class="form-label">Nama Aset</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $row->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMerk" class="form-label">Merk</label>
                        <input type="text" name="merk" class="form-control" id="exampleInputMerk" value="{{ $row->merk }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPIC" class="form-label">PIC</label>
                        <select name="pic" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->pic }}">{{ $row->pic }}</option>
                            @foreach($pegawai as $data)
                            <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
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
                        <label for="exampleInputPhoto" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="exampleInputPhoto">
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
