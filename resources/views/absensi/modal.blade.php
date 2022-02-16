<!-- Lihat Rencana Kerja -->
@foreach($data as $row)
<div class="modal fade" id="modal-rencana-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rencana Kerja {{ $row->pegawais->nama }} Tanggal {{ $row->tanggal }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <p>{{ $row->rencana_kerja }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Lihat Hasil Kerja -->
@foreach($data as $row)
<div class="modal fade" id="modal-hasil-{{ $row->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hasil Kerja {{ $row->pegawais->nama }} Tanggal {{ $row->tanggal }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/hasil-kerja-wfh/'.$row->hasil_kerja)  }}" style="width: 600px; height: 300px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Absen Masuk -->
<div class="modal fade" id="modal-absen-masuk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Absen Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/absen_masuk" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pegawai : {{ Auth::user()->pegawais->nama }}</label>
                    </div>
                    <div class="form-group">
                        <label>Tanggal : {{ $tanggal }}</label>
                    </div>
                    <div class="form-group">
                        <label>Jam Sekarang : </label> <label id="clock-masuk"></label>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPlanningWork" class="form-label">Rencana Kerja</label>
                        <textarea class="form-control" name="rencana_kerja" rows="3"></textarea>
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

<!-- Absen Keluar -->
<div class="modal fade" id="modal-absen-keluar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Absen Keluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/absen_keluar" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pegawai : {{ Auth::user()->pegawais->nama }}</label>
                    </div>
                    <div class="form-group">
                        <label>Tanggal : {{ $tanggal }}</label>
                    </div>
                    <div class="form-group">
                        <label>Jam Sekarang : </label> <label id="clock-keluar"></label>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputResultWork" class="form-label">Hasil Kerja</label>
                        <input type="file" name="hasil_kerja" class="form-control" id="exampleInputResultWork">
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
