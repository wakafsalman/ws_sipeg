<!-- Import Data -->
<div class="modal fade" id="modal-import-donatur">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Donatur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form action="/import_donatur" method="POST" enctype="multipart/form-data">
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
<div class="modal fade" id="modal-tambah-donatur">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Donatur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_donatur" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label class="form-label">Nama Lengkap<span style="color:red;">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                            <div class="col-xs-6">
                                <label class="form-label">Nama Panggilan<span style="color:red;">*</span></label>
                                <input type="text" name="nama_panggilan" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label class="form-label">Email<span style="color:red;">*</span></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-xs-6">
                                <label class="form-label">Jenis Kelamin<span style="color:red;">*</span></label>
                                <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tempat / Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="text" name="tempat_lahir" class="form-control" class="col-4">
                            </div>
                            <div class="col-xs-6">
                                <input type="date" name="tgl_lahir" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <input type="textarea" name="alamat" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label class="form-label">Telepon</label>
                                <input type="number" name="no_telepon" class="form-control">
                            </div>
                            <div class="col-xs-6">
                                <label class="form-label">Nomor Handphone</label>
                                <input type="number" name="no_hp" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Asal Data<span style="color:red;">*</span></label>
                        <input type="text" name="asal_data" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Event<span style="color:red;">*</span></label>
                        <input type="text" name="event" class="form-control" required>
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
<div class="modal fade" id="modal-rubah-donatur-{{ $row->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data Donatur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_donatur/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label class="form-label">Nama Lengkap<span style="color:red;">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ $row->nama_lengkap }}" required>
                            </div>
                            <div class="col-xs-6">
                                <label class="form-label">Nama Panggilan<span style="color:red;">*</span></label>
                                <input type="text" name="nama_panggilan" class="form-control" value="{{ $row->nama_panggilan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label class="form-label">Email<span style="color:red;">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ $row->email }}" required>
                            </div>
                            <div class="col-xs-6">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                    <option selected>{{ $row->jenis_kelamin }}</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tempat / Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="text" name="tempat_lahir" class="form-control" class="col-4" value="{{ $row->tempat_lahir }}">
                            </div>
                            <div class="col-xs-6">
                                <input type="date" name="tgl_lahir" class="form-control" value="{{ $row->tgl_lahir }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <input type="textarea" name="alamat" class="form-control" value="{{ $row->alamat }}">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label class="form-label">Telepon</label>
                                <input type="number" name="no_telepon" class="form-control" value="{{ $row->no_telepon }}">
                            </div>
                            <div class="col-xs-6">
                                <label class="form-label">Nomor Handphone</label>
                                <input type="number" name="no_hp" class="form-control" value="{{ $row->no_hp }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Asal Data<span style="color:red;">*</span></label>
                        <input type="text" name="asal_data" class="form-control" value="{{ $row->asal_data }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Event<span style="color:red;">*</span></label>
                        <input type="text" name="event" class="form-control" value="{{ $row->event }}" required>
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

