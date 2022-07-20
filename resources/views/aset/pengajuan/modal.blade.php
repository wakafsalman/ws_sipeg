<!-- Tambah Data -->
<div class="modal fade" id="modal-pengajuan-aset" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pengajuan Merchandise Wakaf Salman ITB</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/proses_pengajuan" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama : {{ Auth::user()->pegawais->nama }}</label>
                        <input type="hidden" name="id_users" value="{{ Auth::user()->id_pegawais }}">
                    </div>
                    <div class="form-group">
                        <label>Jabatan : {{ Auth::user()->pegawais->jabatans->nama }}</label>
                        <input type="hidden" name="id_jabatans" value="{{ Auth::user()->pegawais->jabatans->id }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pengajuan : {{ $tanggal }}</label>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-5">
                                <label class="form-label">Nama Aset</label>
                                <input type="text" name="assets[]" data-type="assets" id="assets_1" class="form-control typeahead-aset">
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
                            <div class="col-xs-1">
                                <a href="#" id="tambah-aset" class="label label-info"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                            <div class="col-xs-1">
                                <a href="#" id="hapus-aset" class="label label-danger"><i class="glyphicon glyphicon-minus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="form-tambah-aset"></div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <input type="text" name="keterangan" class="form-control" required>
                        <p class="help-block">Jika Merchandise diberikan untuk Wakif maka tulisan dengan format UNTUK WAKIF_NAMA_ALAMAT<br><b>Contoh : UNTUK WAKIF_RIFKY ADRIANSYAH_JL. GANESHA NO 7</b></p>
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
<div class="modal fade" id="modal-rubah-pengajuan-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Pengajuan Merchandise</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_pengajuan/{{ $row->id }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Aset</label>
                        <input type="text" name="assets" class="form-control typeahead-aset" id="exampleInputQty" value="{{ $row->assets }}">
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
                        <label for="exampleInputTitle" class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <input type="text" name="keterangan" class="form-control" value="{{ $row->keterangan }}">
                        <p class="help-block">Jika Merchandise diberikan untuk Wakif maka tulisan dengan format UNTUK WAKIF_NAMA_ALAMAT<br><b>Contoh : UNTUK WAKIF_RIFKY ADRIANSYAH_JL. GANESHA NO 7</b></p>
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

