<!-- Edit Report KPI -->
@foreach($data as $row)
<div class="modal fade" id="modal-rubah-report-user-kpi-{{ $row->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Report KPI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_report_user_kpi/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="pic" class="form-control typeahead-pic" id="exampleInputQty" value="{{ $row->pegawais->nama }}">
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
                    @if(in_array($row->id_kode_kpis, [1, 3]))
                        <div class="form-group">
                            <label for="exampleInputTitle" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputQty" value="{{ $row->tanggal }}">
                        </div>        
                    @else
                        <div class="form-group">
                            <label for="exampleInputTitle" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputQty" value="{{ $row->keterangan }}">
                        </div>        
                    @endif
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

