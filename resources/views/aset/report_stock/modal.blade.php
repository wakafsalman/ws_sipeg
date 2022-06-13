<!-- Tambah Data -->
<div class="modal fade" id="modal-tambah-report-stock">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Stok Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_report_stock" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Aset</label>
                        <select name="id_assets" class="form-control" aria-label="Default select example">
                            <option selected>Pilih Aset</option>
                            @foreach($aset as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }} ({{ $row->merk }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty" class="form-label">Stock Awal</label>
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
                        <label for="exampleInputQty" class="form-label">Stock Masuk</label>
                        <input type="text" name="jumlah_in" class="form-control" id="exampleInputQty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty" class="form-label">Stock Keluar</label>
                        <input type="text" name="jumlah_out" class="form-control" id="exampleInputQty">
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
