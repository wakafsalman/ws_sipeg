<!-- Import Data -->
<div class="modal fade" id="modal-import-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form action="/import_user" method="POST" enctype="multipart/form-data">
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
<div class="modal fade" id="modal-tambah-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_user" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRole" class="form-label">Role</label>
                        <select name="id_roles" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Role</option>
                            @foreach($role_user as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmployee" class="form-label">Pegawai</label>
                        <select name="id_pegawais" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Pegawai</option>
                            @foreach($pegawai as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" id="exampleInputPhoto">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword">
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
<div class="modal fade" id="modal-rubah-user-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_user/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $row->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail" value="{{ $row->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRole" class="form-label">Role</label>
                        <select name="id_roles" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->id_roles }}">{{ $row->roles->nama }}</option>
                            @foreach($role_user as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmployee" class="form-label">Pegawai</label>
                        <select name="id_pegawais" class="form-control" aria-label="Default select example">
                            <option selected value="{{ $row->id_pegawais }}">{{ $row->pegawais->nama }}</option>
                            @foreach($pegawai as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" id="exampleInputPhoto">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword" value="{{ $row->password }}">
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
