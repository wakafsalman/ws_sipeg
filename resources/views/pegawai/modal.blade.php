<!-- Import Data -->
<div class="modal fade" id="modal-import-pegawai">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form action="/import_pegawai" method="POST" enctype="multipart/form-data">
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
<div class="modal fade" id="modal-tambah-pegawai">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_pegawai" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="exampleInputGender" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputPhone" class="form-label">Nomor Telepon</label>
                                <input type="number" name="no_telepon" class="form-control" id="exampleInputPhone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBirthdate" class="form-label">Tempat / Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="text" name="tempat_lahir" class="form-control" id="exampleInputBirthdate" class="col-4">
                            </div>
                            <div class="col-xs-6">
                                <input type="date" name="tgl_lahir" class="form-control" id="exampleInputBirthdate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress" class="form-label">Alamat</label>
                        <input type="textarea" name="alamat" class="form-control" id="exampleInputAddress">
                    </div>
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
                        <label for="exampleInputDivision" class="form-label">Divisi</label>
                        <select name="id_divisis" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Divisi</option>
                            @foreach($divisi as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" id="exampleInputPhoto">
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
<div class="modal fade" id="modal-rubah-pegawai-{{ $row->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_pegawai/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $row->nama }}">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="exampleInputGender" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                    <option selected>{{ $row->jenis_kelamin }}</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputPhone" class="form-label">Nomor Telepon</label>
                                <input type="number" name="no_telepon" class="form-control" id="exampleInputPhone" value="{{ $row->no_telepon }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBirthdate" class="form-label">Tempat / Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="text" name="tempat_lahir" class="form-control" id="exampleInputBirthdate" class="col-4" value="{{ $row->tempat_lahir }}">
                            </div>
                            <div class="col-xs-6">
                                <input type="date" name="tgl_lahir" class="form-control" id="exampleInputBirthdate" value="{{ $row->tgl_lahir }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress" class="form-label">Alamat</label>
                        <input type="textarea" name="alamat" class="form-control" id="exampleInputAddress" value="{{ $row->alamat }}">
                    </div>
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
                        <label for="exampleInputDivision" class="form-label">Divisi</label>
                        <select name="id_divisis" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->id_divisis }}">{{ $row->divisis->nama }}</option>
                            @foreach($divisi as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" id="exampleInputPhoto">
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

