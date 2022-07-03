<!-- Tambah Report KPI -->
<div class="modal fade" id="modal-tambah-report-kpi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Report KPI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/tambah_report_kpi/" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    @foreach($judul_data as $row_data)
                        @if($loop->first)
                            <input type="hidden" name="id_divisis" value="{{ $row_data->id_divisis }}">
                            <input type="hidden" name="id_kode_kpis" value="{{ $row_data->id_kode_kpis }}">
                        @endif
                    @endforeach                
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="exampleInputQty">
                    </div>
                    <div class="form-group">
                        <label class="form-label">PIC</label>
                        <select class="form-control select2" name="id_pegawais[]" multiple="multiple" style="width: 100%;">
                            @foreach($pegawai as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Progress</label>
                        <div class="row">
                            <div class="col-xs-3">
                                <input type="number" name="progress" class="form-control" id="exampleInputQty">
                            </div>
                            <div class="col-xs-1">
                                %
                            </div>    
                        </div>
                    </div>
                    @foreach($judul_data as $row_data)
                        @if(in_array($row_data->id_kode_kpis, [1, 3]))
                            @if($loop->first)
                                <div class="form-group">
                                    <label for="exampleInputTitle" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="exampleInputQty">
                                </div>        
                            @endif
                        @else
                            @if($loop->first)
                                <div class="form-group">
                                    <label for="exampleInputTitle" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="exampleInputQty">
                                </div>        
                            @endif
                        @endif
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Kendala</label>
                        <input type="text" name="kendala" class="form-control" id="exampleInputQty">
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

<!-- Edit Report KPI -->
@foreach($data as $row)
<div class="modal fade" id="modal-rubah-report-kpi-{{ $row->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Report KPI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_report_kpi/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    @foreach($judul_data as $row_data)
                        @if($loop->first)
                            <input type="hidden" name="id_divisis" value="{{ $row_data->id_divisis }}">
                            <input type="hidden" name="id_kode_kpis" value="{{ $row_data->id_kode_kpis }}">
                        @endif
                    @endforeach                
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="exampleInputQty" value="{{ $row->deskripsi }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">PIC</label>
                        <input type="text" name="pic" class="form-control typeahead-pic" id="exampleInputQty" value="{{ $row->pegawais->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Progress</label>
                        <div class="row">
                            <div class="col-xs-3">
                                <input type="number" name="progress" class="form-control" id="exampleInputQty" value="{{ $row->progress }}">
                            </div>
                            <div class="col-xs-1">
                                %
                            </div>    
                        </div>
                    </div>
                    @foreach($judul_data as $row_data)
                        @if(in_array($row_data->id_kode_kpis, [1, 3]))
                            @if($loop->first)
                                <div class="form-group">
                                    <label for="exampleInputTitle" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="exampleInputQty" value="{{ $row->tanggal }}">
                                </div>        
                            @endif
                        @else
                            @if($loop->first)
                                <div class="form-group">
                                    <label for="exampleInputTitle" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="exampleInputQty" value="{{ $row->keterangan }}">
                                </div>        
                            @endif
                        @endif
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Kendala</label>
                        <input type="text" name="kendala" class="form-control" id="exampleInputQty" value="{{ $row->kendala }}">
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

