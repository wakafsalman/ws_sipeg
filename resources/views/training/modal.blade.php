<!-- Input Training -->
<div class="modal fade" id="modal-training">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Record Training</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/input_training" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleInputName" value="{{ Auth::user()->pegawais->nama }}" disabled>
                        <input type="hidden" name="id_users" value="{{ Auth::user()->id_pegawais }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Jenis Training <span style="color: red;">*</span></label>
                        <select name="id_training_types" class="form-control" aria-label="Default select example" required>
                            <option value="" selected>Pilih Jenis Training</option>
                            @foreach($jenis_training as $row)
                                @if($row->nama != "Bonus Point")
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Judul Training <span style="color: red;">*</span></label>
                        <input type="text" name="judul_training" class="form-control" id="exampleInputName" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Durasi <span style="color: red;">*</span></label>
                        <input type="text" name="durasi" class="form-control" style="width: 75px;" id="exampleInputName" required> 
                        <span style="float: right;margin-right: 450px; margin-top: -30px;">menit</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputResultWork" class="form-label">Screenshoot Bukti Training yang dilakukan <span style="color: red;">*</span></label>
                        <input type="file" name="hasil_training" class="form-control" id="exampleInputResultWork" required>
                        <p class="help-block">Maksimal ukuran file yang bisa diupload 2MB</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Insight yang didapat dari training</label>
                        <input type="text" name="insight" class="form-control" id="exampleInputName">
                        <span>*yang mengisi akan mendapatkan bonus point</span>
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

<!-- Edit Training -->
@foreach($data as $row)
<div class="modal fade" id="modal-rubah-training-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Record Training</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_training/{{ $row->id }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleInputName" value="{{ Auth::user()->pegawais->nama }}" disabled>
                        <input type="hidden" name="id_users" value="{{ Auth::user()->id_pegawais }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-label">Jenis Training <span style="color: red;">*</span></label>
                        <select name="id_training_types" class="form-control" aria-label="Default select example" required>
                            <option selected value="{{ $row->id_training_types }}">{{ $row->training_types->nama }}</option>
                            @foreach($jenis_training as $data)
                                @if($data->nama != "Bonus Point")
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Judul Training <span style="color: red;">*</span></label>
                        <input type="text" name="judul_training" class="form-control" id="exampleInputName"  value="{{ $row->judul_training }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Durasi <span style="color: red;">*</span></label>
                        <input type="text" name="durasi" class="form-control" id="exampleInputName" style="width: 75px;" value="{{ $row->durasi }}" required>
                        <span style="float: right;margin-right: 450px; margin-top: -30px;">menit</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputResultWork" class="form-label">Screenshoot Bukti Training yang dilakukan <span style="color: red;">*</span></label>
                        <input type="file" name="hasil_training" class="form-control" id="exampleInputResultWork" required>
                        <p class="help-block">Maksimal ukuran file yang bisa diupload 2MB</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Insight yang didapat dari training</label>
                        <input type="text" name="insight" class="form-control" id="exampleInputName"  value="{{ $row->insight }}">
                        <span>*yang mengisi akan mendapatkan bonus point</span>
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

<!-- Lihat Hasil Training -->
<div class="modal fade" id="modal-hasil-training-{{ $row->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Screenshoot Training {{ $row->pegawais->nama }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/hasil-training/'.$row->hasil_training)  }}" class="user-image" alt="User Image" width="870" height="450">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endforeach