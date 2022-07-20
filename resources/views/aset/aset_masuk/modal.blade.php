<!-- Tambah Data -->
<div class="modal fade" id="modal-tambah-aset-masuk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Aset Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_aset_masuk" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal Aset Masuk</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleInputDate" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Jenis Aset</label>
                        <select name="jenis_aset" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Jenis Aset</option>
                            <option value="ATK">ATK</option>
                            <option value="Peralatan Wakaf">Peralatan Wakaf</option>
                            <option value="Merchandise">Merchandise</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-3">
                                <label class="form-label">Nama Aset</label>
                                <input type="text" name="aset[]" data-type="aset" id="aset_1" class="form-control typeahead-aset-masuk">
                            </div>
                            <div class="col-xs-2">
                                <label class="form-label">Jumlah</label>
                                <input type="text" name="jumlah[]" class="form-control">
                            </div>
                            <div class="col-xs-3">
                                <label class="form-label">Satuan</label>
                                <select name="satuan[]" class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Satuan</option>
                                    @foreach($satuan as $row)
                                    <option value="{{ $row->nama }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <label class="form-label">Harga</label>
                                <input type="text" name="harga[]" class="form-control">
                            </div>
                            <div class="col-xs-1">
                                <a href="#" id="tambah-asetmasuk" class="label label-info"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                            <div class="col-xs-1">
                                <a href="#" id="hapus-asetmasuk" class="label label-danger"><i class="glyphicon glyphicon-minus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="form-tambah-aset-masuk"></div>
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal Beli Aset Barang</label>
                        <input type="date" name="tanggal_beli" class="form-control" id="exampleInputDate">
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
<div class="modal fade" id="modal-rubah-aset-masuk-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data Aset Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_aset_masuk/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal Aset Masuk</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleInputDate" value="{{ $row->tanggal }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Jenis Aset</label>
                        <select name="jenis_aset" class="form-control" aria-label="Default select example">
                            <option selected>{{ $row->jenis_aset }}</option>
                            <option value="ATK">ATK</option>
                            <option value="Peralatan Wakaf">Peralatan Wakaf</option>
                            <option value="Merchandise">Merchandise</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Aset</label>
                        <input type="text" name="aset" class="form-control typeahead-aset-masuk" id="exampleInputQty" value="{{ $row->aset }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty" class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="exampleInputQty" value="{{ $row->jumlah }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Satuan</label>
                        <select name="satuan" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->satuan }}">{{ $row->satuan }}</option>
                            @foreach($satuan as $data_satuan)
                            <option value="{{ $data_satuan->nama }}">{{ $data_satuan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal Beli Aset Barang</label>
                        <input type="date" name="tanggal_beli" class="form-control" id="exampleInputDate" value="{{ $row->tanggal_beli }}">
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