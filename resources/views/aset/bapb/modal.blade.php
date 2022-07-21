<!-- Tambah Data -->
<div class="modal fade" id="modal-upload-bapb">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload BAPB</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/upload_bapb" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control" id="exampleInputCode">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control" id="exampleInputDate" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Karyawan</label>
                        <select name="id_pegawais" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Karyawan</option>
                            @foreach($pegawai as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="form-label">Upload Surat</label>
                        <input type="file" name="file_surat" class="form-control" id="exampleInputPhoto">
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
<div class="modal fade" id="modal-rubah-bapb-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah BAPB</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_bapb/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputCode" class="form-label">Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control" id="exampleInputCode" value="{{ $row->no_surat }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDate" class="form-label">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control" id="exampleInputDate" value="{{ $row->tgl_surat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Karyawan</label>
                        <select name="id_pegawais" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->id_pegawais }}">{{ $row->pegawais->nama }}</option>
                            @foreach($pegawai as $data_pegawai)
                            <option value="{{ $data_pegawai->id }}">{{ $data_pegawai->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="form-label">Upload Surat</label>
                        <input type="file" name="file_surat" class="form-control" id="exampleInputPhoto">
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
