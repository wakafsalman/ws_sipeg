<!-- Tambah Data -->
<div class="modal fade" id="modal-pengajuan-aset">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pengajuan Aset Wakaf Salman ITB</h4>
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
                            <div class="col-xs-8">
                                <label for="exampleInputName" class="form-label">Nama Aset</label>
                            </div>
                            <div class="col-xs-1">
                                <a href="#" id="tambah-aset" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                            <div class="col-xs-1">
                                <a href="#" id="hapus-aset" class="btn btn-danger"><i class="glyphicon glyphicon-minus"></i></a>
                            </div>
                        </div>
                        <input type="text" name="assets[]" class="form-control typeahead-aset" id="exampleInputQty">
                    </div>
                    <div id="form-tambah-aset"></div>
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
                        <label for="exampleInputTitle" class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <select name="keterangan" class="form-control" aria-label="Default select example" required>
                            <option value="">Pilih Keterangan</option>
                            <option value="Wakif">Wakif</option>
                            <option value="Non Wakif">Non Wakif</option>
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
<div class="modal fade" id="modal-rubah-pengajuan-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data PIC/Tempat</h4>
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
                        <select name="keterangan" class="form-control" aria-label="Default select example" required>
                            <option selected>{{ $row->keterangan }}</option>
                            <option value="Wakif">Wakif</option>
                            <option value="Non Wakif">Non Wakif</option>
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

@push('multi-input-aset')
<script>

    let counter = 1
     
    $('#tambah-aset').click(function(){
        counter++

        let newInputan = '<div class="form-group" id="hapus"><input type="text" name="assets[]" class="form-control typeahead-aset" id="exampleInputQty"></div>'
        $('#form-tambah-aset').append(newInputan)

    });

    $('#hapus-aset').click(function(){
        if(counter == 1){
            alert("Form sudah tidak dapat dihapus")
        }

        $('#hapus').remove()
        counter--
    });
</script>
@endpush