<!-- Pengajuan Cuti -->
<div class="modal fade" id="modal-cuti">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pengajuan Cuti</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <p>Assalamu'alaikum Wr. Wb.</p>
                <br>
                <br>
                <p>Selamat datang di form pengajuan cuti</p>
                <p>Silakan isi data di bawah ini secara lengkap dan jelas ya :)</p>
                <br>
                <br>
                <p>Data ini akan dimasukkan ke dalam berkas hardfile untuk ditandatangani secara langsung</p>
            </div>
            <form role="form" action="/input_cuti" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleInputName" value="{{ Auth::user()->pegawais->nama }}" disabled>
                        <input type="text" name="id_users" class="form-control" id="exampleInputName" value="{{ Auth::user()->id }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="exampleInputName" value="{{ Auth::user()->pegawais->jabatans->nama }}" disabled>
                        <input type="text" name="id_jabatans" class="form-control" id="exampleInputName" value="{{ Auth::user()->pegawais->jabatans->id }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="exampleInputName" value="{{ Auth::user()->pegawais->divisis->nama }}" disabled>
                        <input type="text" name="id_divisis" class="form-control" id="exampleInputName" value="{{ Auth::user()->pegawais->divisis->id }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Jenis Cuti yang Diambil <span style="color: red;">*</span></label><br>
                        <input type="radio" name="jenis_cuti" id="jenis_cuti" value="Cuti tahunan" required> Cuti tahunan<br>
                        <input type="radio" name="jenis_cuti" id="jenis_cuti" value="Cuti Menikah"> Cuti Menikah<br>
                        <input type="radio" name="jenis_cuti" id="jenis_cuti" value="Cuti Persalinan (Grafida)"> Cuti Persalinan (Grafida)<br>
                        <input type="radio" name="jenis_cuti" id="jenis_cuti" value="Cuti Melayat (Keluarga Inti)"> Cuti Melayat (Keluarga Inti)<br>
                        <input type="radio" name="jenis_cuti" id="jenis_cuti" value="Cuti Melayat (Orangtua/Mertua)"> Cuti Melayat (Orangtua/Mertua)<br>
                        <input type="radio" name="jenis_cuti" id="jenis_cuti" value="Cuti Rawat Inap (Keluarga Inti)"> Cuti Rawat Inap (Keluarga Inti)<br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBirthdate" class="form-label">Cuti mulai tanggal <span style="color: red;">*</span></label>
                        <input type="date" name="tanggal_awal" class="form-control" id="exampleInputBirthdate" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBirthdate" class="form-label">Sampai tanggal <span style="color: red;">*</span></label>
                        <input type="date" name="tanggal_akhir" class="form-control" id="exampleInputBirthdate" required>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputBirthdate" class="form-label"><u>KORESPONDENSI SELAMA MENJALANKAN CUTI</u></label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Alamat yang dapat dikunjungi dalam keadaan darurat selama cuti  <span style="color: red;">*</span></label>
                        <input type="text" name="alamat" class="form-control" id="exampleInputName" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Kontak yang dapat dihubungi dalam keadaan darurat selama cuti  <span style="color: red;">*</span></label>
                        <input type="text" name="no_telepon" class="form-control" id="exampleInputName" required>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputBirthdate" class="form-label"><u>PENDELEGASIAN TUGAS</u></label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama yang didelegasikan tugas</label>
                        <input type="text" name="nama_delegasi" class="form-control" id="exampleInputName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Tugas dan tanggung jawab yang didelegasikan</label>
                        <input type="text" name="detail_delegasi" class="form-control" id="exampleInputName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Apakah sudah mengabari orang yang didelegasikan <span style="color: red;">*</span></label><br>
                        <input type="radio" name="nama_delegasi_setuju" id="nama_delegasi_setuju" value="Sudah" required> Sudah<br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Apakah sudah izin dengan atasan langsung? <span style="color: red;">*</span></label><br>
                        <input type="radio" name="atasan_setuju" id="atasan_setuju" value="Sudah" required> Sudah<br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">Nama Manager Divisi <span style="color: red;">*</span></label>
                        <select name="manager" class="form-control" aria-label="Default select example" required>
                            <option selected>Pilih Manager Anda</option>
                            @foreach($manager as $data)
                            <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
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

