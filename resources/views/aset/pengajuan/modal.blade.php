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
                        <label for="exampleInputName" class="form-label">Nama Aset</label>
                        <select name="id_assets" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Aset</option>
                            @foreach($aset as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
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
                        <label for="exampleInputTitle" class="form-label">Untuk diberikan kepada</label>
                        <select name="keterangan" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Keterangan</option>
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
