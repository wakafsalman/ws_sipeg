<!-- Import Data -->
<div class="modal fade" id="modal-import-jabatan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form action="/import_jabatan" method="POST" enctype="multipart/form-data">
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
<div class="modal fade" id="modal-tambah-jabatan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_jabatan" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Jabatan</label>
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
<div class="modal fade" id="modal-rubah-jabatan-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Data Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_jabatan/{{ $row->id }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Jabatan</label>
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