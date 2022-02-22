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
                        <p class="help-block">Maksimal ukuran file foto yang bisa diupload 2MB. Format : jpeg, jpg, png</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Screening Harian Kondisi Kesehatan</label>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Silakan isi dengan lengkap dan jujur sesuai kondisi Anda di hari ini</label>
                    </div>
                    <div class="form-group">
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                <th></th>
                                <th>Tidak Ada</th>
                                <th>Ringan</th>
                                <th>Berat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Demam</strong></td>
                                    <td><input type="radio" name="demam" id="demam" value="Tidak Ada"></td>
                                    <td><input type="radio" name="demam" id="demam" value="Ringan"></td>                        
                                    <td><input type="radio" name="demam" id="demam" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Batuk Berdahak</strong></td>
                                    <td><input type="radio" name="batuk_dahak" id="batuk_dahak" value="Tidak Ada"></td>
                                    <td><input type="radio" name="batuk_dahak" id="batuk_dahak" value="Ringan"></td>                        
                                    <td><input type="radio" name="batuk_dahak" id="batuk_dahak" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Batuk Kering</strong></td>
                                    <td><input type="radio" name="batuk_kering" id="batuk_kering" value="Tidak Ada"></td>
                                    <td><input type="radio" name="batuk_kering" id="batuk_kering" value="Ringan"></td>                        
                                    <td><input type="radio" name="batuk_kering" id="batuk_kering" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Lesu Lelah</strong></td>
                                    <td><input type="radio" name="lelah" id="lelah" value="Tidak Ada"></td>
                                    <td><input type="radio" name="lelah" id="lelah" value="Ringan"></td>                        
                                    <td><input type="radio" name="lelah" id="lelah" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Sesak Nafas</strong></td>
                                    <td><input type="radio" name="sesak_nafas" id="sesak_nafas" value="Tidak Ada"></td>
                                    <td><input type="radio" name="sesak_nafas" id="sesak_nafas" value="Ringan"></td>                        
                                    <td><input type="radio" name="sesak_nafas" id="sesak_nafas" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Nyeri/Ngilu Sendi</strong></td>
                                    <td><input type="radio" name="nyeri_sendi" id="nyeri_sendi" value="Tidak Ada"></td>
                                    <td><input type="radio" name="nyeri_sendi" id="nyeri_sendi" value="Ringan"></td>                        
                                    <td><input type="radio" name="nyeri_sendi" id="nyeri_sendi" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Sakit Kepala</strong></td>
                                    <td><input type="radio" name="sakit_kepala" id="sakit_kepala" value="Tidak Ada"></td>
                                    <td><input type="radio" name="sakit_kepala" id="sakit_kepala" value="Ringan"></td>                        
                                    <td><input type="radio" name="sakit_kepala" id="sakit_kepala" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Bersin-bersin</strong></td>
                                    <td><input type="radio" name="bersin" id="bersin" value="Tidak Ada"></td>
                                    <td><input type="radio" name="bersin" id="bersin" value="Ringan"></td>                        
                                    <td><input type="radio" name="bersin" id="bersin" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Pilek</strong></td>
                                    <td><input type="radio" name="pilek" id="bersin" value="Tidak Ada"></td>
                                    <td><input type="radio" name="pilek" id="bersin" value="Ringan"></td>                        
                                    <td><input type="radio" name="pilek" id="bersin" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Hidung Tersumbat</strong></td>
                                    <td><input type="radio" name="hidung_mampet" id="hidung_mampet" value="Tidak Ada"></td>
                                    <td><input type="radio" name="hidung_mampet" id="hidung_mampet" value="Ringan"></td>                        
                                    <td><input type="radio" name="hidung_mampet" id="hidung_mampet" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Mata Berair</strong></td>
                                    <td><input type="radio" name="mata_berair" id="mata_berair" value="Tidak Ada"></td>
                                    <td><input type="radio" name="mata_berair" id="mata_berair" value="Ringan"></td>                        
                                    <td><input type="radio" name="mata_berair" id="mata_berair" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Sakit Tenggorokan</strong></td>
                                    <td><input type="radio" name="sakit_tenggorokan" id="sakit_tenggorokan" value="Tidak Ada"></td>
                                    <td><input type="radio" name="sakit_tenggorokan" id="sakit_tenggorokan" value="Ringan"></td>                        
                                    <td><input type="radio" name="sakit_tenggorokan" id="sakit_tenggorokan" value="Berat"></td>
                                </tr>
                                <tr>
                                    <td><strong>Diare</strong></td>
                                    <td><input type="radio" name="diare" id="diare" value="Tidak Ada"></td>
                                    <td><input type="radio" name="diare" id="diare" value="Ringan"></td>                        
                                    <td><input type="radio" name="diare" id="diare" value="Berat"></td>
                                </tr>
                            </tbody>
                          </table>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Apakah Anda kehilangan kemampuan untuk mencium suatu aroma?</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="cium_aroma" id="cium_aroma" value="Ya">
                                Ya
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="cium_aroma" id="cium_aroma" value="Tidak">
                                Tidak
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Apakah Anda kehilangan kemampuan untuk merasakan rasa pada lidah? </label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="rasa_lidah" id="rasa_lidah" value="Ya">
                                Ya
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="rasa_lidah" id="rasa_lidah" value="Tidak">
                                Tidak
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleOtherScreening" class="form-label">Apakah Anda memiliki keluhan lain?</label>
                        <input type="text" name="lain_lain" class="form-control" id="exampleOtherScreening">
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

<!-- Rubah Rencana Kerja -->
@foreach($data as $row)
<div class="modal fade" id="modal-rubah-rencana-kerja-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rubah Rencana Kerja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <form role="form" action="/rubah_rencana_kerja/{{ $row->id }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPlanningWork" class="form-label">Rencana Kerja</label>
                        <textarea class="form-control" name="rencana_kerja" rows="3">{{ $row->rencana_kerja }}</textarea>
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