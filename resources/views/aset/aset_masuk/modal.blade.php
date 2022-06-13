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
                        <label for="exampleInputDate" class="form-label">Tanggal Barang Masuk</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleInputDate" required>
                    </div>
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
                        <label for="exampleInputTitle" class="form-label">Satuan</label>
                        <select name="satuan" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Satuan</option>
                            @foreach($satuan as $row)
                            <option value="{{ $row->nama }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMerk" class="form-label">Merk</label>
                        <input type="text" name="merk" class="form-control" id="exampleInputMerk">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" id="exampleInputQty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty" class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="exampleInputQty">
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
