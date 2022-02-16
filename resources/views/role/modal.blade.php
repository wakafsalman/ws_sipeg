<!-- Import Data -->
<div class="modal fade" id="modal-import-role-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Role User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form action="/import_role_user" method="POST" enctype="multipart/form-data">
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
<div class="modal fade" id="modal-tambah-role-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Role User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_role_user" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Role</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName">
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
<div class="modal fade" id="modal-rubah-role-user-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data Role User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_role_user/{{ $row->id }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Role</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $row->nama }}">
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