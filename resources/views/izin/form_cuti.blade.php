<!DOCTYPE html>
<html>
  <head>
  <style>

    * {
        font-family: 'Times-Roman';
    }
    html {
        padding: 0;
        margin: 0;
    }
    .gambar img{
        width: 170px;
        height: 100px;
        margin-left: 75px;
    }
    .legalitas img{
        float: right;
        width: 240px;
        height: 94px;
        margin-right: 12px;
        margin-top: -84px;
    }
    .clearfix{
        clear: both;
    }
    .judul{
        font-size : 9.5px;
        text-align: center;
        margin-top: 10px;
    }
    .background_judul{
        background-color:lightgrey;
        border:1px solid black;
        width: 600px;
    }
    .romawi{
        font-size: 18px;
        margin-left: 30px;
    }
    .jarak{
        margin-left: 8px;
    }
    .data_karyawan{
        margin-left: 90px;
    }
    .bagian_data_karyawan{
        margin-left: 35px;
    }
    .kolom_nama{
        border:1px solid black;
        width: 90px;
        float: left;
        margin-top: -1px;
    }
    .kolom_data_nama{
        border:1px solid black;
        width: 600px;
        margin-top: -1px;
    }
    .kolom_jabatan_divisi{
        border:1px solid black;
        width: 90px;
        float: left;
        margin-top:-2px;
    }
    .kolom_data_jabatan_divisi{
        border:1px solid black;
        width: 600px;
        margin-top:-2px;
    }
    .jenis_cuti{
        margin-left: 90px;
        margin-top: 30px;
    }
    .bagian_jenis_cuti{
        margin-left: 32px;
    }
    .kolom_cuti_tahunan{
        border:1px solid black;
        width: 150px;
        height: 100px;
        float: left;
        margin-top : -1px;
    }
    .ceklis_cuti_tahunan{
        border:1px solid black;
        width: 145px;
        height: 100px;
        float: left;
        margin-left: -1px;
        margin-top : -1px;
    }
    .tengah_kabeh{
        margin-top: 40px;
    }
    .ceklis_cuti_tahunan img{
        width: 16px;
        height: 16px;
        margin-top: 2px;
    }
    .kolom_cuti_lainnya{
        margin-left: 300px;
    }
    .kolom_cuti_nikah{
        border:1px solid black;
        width: 272px;
        float: left;
        margin-top: -103px;
        margin-left: -3px;
    }
    .ceklis_cuti_nikah{
        border:1px solid black;
        width: 30px;
        float: left;
        height: 19px;
        margin-top: -103px;
        margin-left: 270px;
    }
    .ceklis_cuti_nikah img{
        width: 16px;
        height: 16px;
        margin-top: 2px;
        margin-left: 5px;
    }
    .kolom_cuti_grafida{
        border:1px solid black;
        width: 272px;
        float: left;
        margin-top: -83px;
        margin-left: -3px;
    }
    .ceklis_cuti_grafida{
        border:1px solid black;
        width: 30px;
        float: left;
        height: 19px;
        margin-top: -83px;
        margin-left: 270px;
    }
    .ceklis_cuti_grafida img{
        width: 16px;
        height: 16px;
        margin-left: 5px;
    }
    .kolom_cuti_layat1{
        border:1px solid black;
        width: 272px;
        float: left;
        margin-top: -63px;
        margin-left: -3px;
    }
    .ceklis_cuti_layat1{
        border:1px solid black;
        width: 30px;
        float: left;
        height: 19px;
        margin-top: -63px;
        margin-left: 270px;
    }
    .ceklis_cuti_layat1 img{
        width: 16px;
        height: 16px;
        margin-left: 5px;
    }
    .kolom_cuti_layat2{
        border:1px solid black;
        width: 272px;
        float: left;
        margin-top: -43px;
        margin-left: -3px;
    }
    .ceklis_cuti_layat2{
        border:1px solid black;
        width: 30px;
        float: left;
        height: 19px;
        margin-top: -43px;
        margin-left: 270px;
    }
    .ceklis_cuti_layat2 img{
        width: 16px;
        height: 16px;
        margin-left: 5px;
    }
    .kolom_cuti_rawat{
        border:1px solid black;
        width: 272px;
        height: 21px;
        float: left;
        margin-top: -23px;
        margin-left: -3px;
    }
    .ceklis_cuti_rawat{
        border:1px solid black;
        width: 30px;
        float: left;
        height: 21px;
        margin-top: -23px;
        margin-left: -1px;
    }
    .ceklis_cuti_rawat img{
        width: 16px;
        height: 16px;
        margin-left: 5px;
    }
    .lama_cuti{
        margin-left: 90px;
        margin-top: 30px;
    }
    .bagian_lama_cuti{
        margin-left: 27px;
    }
    .kolom_jumlah_hari{
        border:1px solid black;
        width: 108px;
        float: left;
        margin-top: -1px;
    }
    .kolom_hari{
        border:1px solid black;
        width: 61px;
        float: left;
        margin-left: -1px;
        margin-top: -1px;
    }
    .kolom_mulai_tanggal{
        border:1px solid black;
        width: 115px;
        float: left;
        margin-left: -1px;
        margin-top: -1px;
    }
    .kolom_tanggal_awal{
        border:1px solid black;
        width: 140px;
        float: left;
        margin-left: -1px;
        margin-top: -1px;
    }
    .kolom_sampai_dengan{
        border:1px solid black;
        width: 30px;
        float: left;
        margin-left: -1px;
        margin-top: -1px;
    }
    .kolom_tanggal_akhir{
        border:1px solid black;
        width: 141px;
        float: left;
        margin-left: -1px;
        margin-top: -1px;
    }
    .alamat{
        margin-left: 90px;
        margin-top: 30px;
    }
    .bagian_alamat{
        margin-left: 27px;
    }
    .kolom_alamat{
        border:1px solid black;
        width: 350px;
        float: left;
        margin-top: -1px;
        height: 120px;
    }
    .kolom_ttd_karyawan{
        border:1px solid black;
        width: 249px;
        float: left;
        margin-top: -1px;
        margin-left: -1px;
        height: 120px;
    }
    .delegasi{
        margin-left: 90px;
        margin-top: 30px;
    }
    .bagian_delegasi{
        margin-left: 32px;
    }
    .kolom_no{
        border:1px solid black;
        width: 40px;
        float: left;
        margin-top: -1px;
    }
    .kolom_nama_delegasi{
        border:1px solid black;
        width: 120px;
        float: left;
        margin-top: -1px;
        margin-left: -1px;
    }
    .kolom_tugas_delegasi{
        border:1px solid black;
        width: 300px;
        float: left;
        margin-top: -1px;
        margin-left: -1px;
    }
    .kolom_tanda_tangan{
        border:1px solid black;
        width: 137px;
        float: left;
        margin-top: -1px;
        margin-left: -1px;
    }
    .data_no{
        border:1px solid black;
        width: 40px;
        float: left;
        margin-top: -2px;
        height: 100px;
    }
    .data_nama_delegasi{
        border:1px solid black;
        width: 120px;
        float: left;
        margin-top: -2px;
        margin-left: -1px;
        height: 100px;
    }
    .data_tugas_delegasi{
        border:1px solid black;
        width: 300px;
        float: left;
        margin-top: -2px;
        margin-left: -1px;
        height: 100px;
    }
    .data_tanda_tangan{
        border:1px solid black;
        width: 137px;
        float: left;
        margin-top: -2px;
        margin-left: -1px;
        height: 100px;
    }
    .keputusan{
        margin-left: 90px;
        margin-top: 30px;
    }
    .bagian_keputusan{
        margin-left: 27px;
    }
    .kolom_manajer_divisi{
        border:1px solid black;
        width: 290px;
        margin-top: -1px;
    }
    .kolom_izin{
        border:1px solid black;
        width: 290px;
        float: left;
        margin-top: -1px;
    }
    .kolom_sdm{
        border:1px solid black;
        width: 309px;
        float: left;
        margin-top: -21px;
        margin-left: -1px;
        height: 39px;
    }
    .data_manajer_divisi{
        border:1px solid black;
        width: 290px;
        float: left;
        margin-top: -2px;
    }
    .data_sdm{
        border:1px solid black;
        width: 309px;
        float: left;
        margin-top: -2px;
        margin-left: -1px;
    }
    .ttd_manajer_divisi{
        border:1px solid black;
        width: 290px;
        height: 100px;
        float: left;
        margin-top: -2px;
    }
    .ttd_sdm{
        border:1px solid black;
        width: 309px;
        height: 100px;
        float: left;
        margin-top: -2px;
        margin-left: -1px;
    }
  </style>
  </head>
  <body>

    <div class="main-wrapper">
        <div class="header">
            <div class="gambar">
                <img src="{{ public_path('img/logo/wakaf-salman.png')  }}">
            </div>
            <div class="legalitas">
                <img src="{{ public_path('img/logo/legalitas.png')  }}">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="konten">
            <div class="judul">
                <h1>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h1>
            </div>
            <div class="data_karyawan">
                <div class="background_judul">
                    <div class="romawi"><b>I.<span class="bagian_data_karyawan">DATA PEGAWAI</span></b></div>                    
                </div>
                <div class="kolom_nama"><b><span class="jarak">Nama</span></b></div>
                <div class="kolom_data_nama"><span class="jarak">{{ $data->pegawais->nama }}</span></div>
                <div class="clearfix"></div>
                <div class="kolom_jabatan_divisi"><b><span class="jarak">Jabatan</span></b></div>
                <div class="kolom_data_jabatan_divisi"><span class="jarak">{{ $data->jabatans->nama }}</span></div>
                <div class="clearfix"></div>
                <div class="kolom_jabatan_divisi"><b><span class="jarak">Divisi</span></b></div>
                <div class="kolom_data_jabatan_divisi"><span class="jarak">{{ $data->divisis->nama }}</span></div>
            </div>
            <div class="clearfix"></div>
            <div class="jenis_cuti">
                <div class="background_judul">
                    <div class="romawi"><b>II.<span class="bagian_jenis_cuti">JENIS CUTI YANG DIAMBIL</span></b></div>                    
                </div>
                <div class="kolom_cuti_tahunan"><b><span><center class="tengah_kabeh">Cuti Tahunan</center></span></b></div>
                @if($data->jenis_cuti == 'Cuti Tahunan')
                    <div class="ceklis_cuti_tahunan"><b><span><center class="tengah_kabeh"><img src="{{ public_path('img/logo/ceklis.png')  }}"> ({{ $jumlah_cuti + 1 }} Hari)</center></span></b></div>
                @else
                    <div class="ceklis_cuti_tahunan"></div>
                @endif
                <div class="clearfix"></div>
                <div class="kolom_cuti_lainnya">
                    <div class="kolom_cuti_nikah"><b><span class="jarak">Cuti Menikah</span></b></div>
                    @if($data->jenis_cuti == 'Cuti Menikah')
                        <div class="ceklis_cuti_nikah"><img src="{{ public_path('img/logo/ceklis.png')  }}"></div>
                    @else
                        <div class="ceklis_cuti_nikah"></div>
                    @endif
                    <div class="clearfix"></div>
                    <div class="kolom_cuti_grafida"><b><span class="jarak">Cuti Grafida/Persalinan</span></b></div>
                        @if($data->jenis_cuti == 'Cuti Persalinan (Grafida)')
                            <div class="ceklis_cuti_grafida"><img src="{{ public_path('img/logo/ceklis.png')  }}"></div>
                        @else
                            <div class="ceklis_cuti_grafida"></div>
                        @endif
                    <div class="clearfix"></div>
                    <div class="kolom_cuti_layat1"><b><span class="jarak">Cuti Melayat (Keluarga Inti)</span></b></div>
                        @if($data->jenis_cuti == 'Cuti Melayat (Keluarga Inti)')                
                            <div class="ceklis_cuti_layat1"><img src="{{ public_path('img/logo/ceklis.png')  }}"></div>
                        @else
                            <div class="ceklis_cuti_layat1"></div>
                        @endif
                    <div class="clearfix"></div>
                    <div class="kolom_cuti_layat2"><b><span class="jarak">Cuti Melayat (Orangtua/Mertua)</span></b></div>
                        @if($data->jenis_cuti == 'Cuti Melayat (Orangtua/Mertua)')                
                            <div class="ceklis_cuti_layat2"><img src="{{ public_path('img/logo/ceklis.png')  }}"></div>
                        @else
                            <div class="ceklis_cuti_layat2"></div>
                        @endif
                    <div class="clearfix"></div>
                    <div class="kolom_cuti_rawat"><b><span class="jarak">Cuti Rawat Inap (Keluarga Inti)</span></b></div>
                        @if($data->jenis_cuti == 'Cuti Rawat Inap (Keluarga Inti)')                
                            <div class="ceklis_cuti_rawat"><img src="{{ public_path('img/logo/ceklis.png')  }}"></div>    
                        @else
                            <div class="ceklis_cuti_rawat"></div>    
                        @endif
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="lama_cuti">
                <div class="background_judul">
                    <div class="romawi"><b>III.<span class="bagian_lama_cuti">LAMANYA CUTI</span></b></div>                    
                </div>
                <div class="kolom_jumlah_hari"><b><span class="jarak">{{ $jumlah_cuti + 1 }}</span></b></div>
                <div class="kolom_hari"><b><span class="jarak">Hari</span></b></div>
                <div class="kolom_mulai_tanggal"><b><span class="jarak">Mulai Tanggal</span></b></div>
                <div class="kolom_tanggal_awal"><b><span class="jarak">{{ $data->tanggal_awal_indo }}</span></b></div>
                <div class="kolom_sampai_dengan"><b><span><center>s.d</center></span></b></div>
                @if($data->tanggal_awal != $data->tanggal_akhir)
                    <div class="kolom_tanggal_akhir"><b><span class="jarak">{{ $data->tanggal_akhir_indo }}</span></b></div>
                @else
                    <div class="kolom_tanggal_akhir"><b><span class="jarak">-</span></b></div>
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="alamat">
                <div class="background_judul">
                    <div class="romawi"><b>IV.<span class="bagian_alamat">ALAMAT SELAMA MENJALANKAN CUTI</span></b></div>                    
                </div>
                <div class="kolom_alamat">
                    <b><span class="jarak">Bila ada hal yang bersifat penting dapat menghubungi alamat dan nomor HP : </span></b><br>
                    <p class="jarak">{{ $data->alamat }} (HP : 0{{ $data->no_telepon }})</p>
                </div>
                <div class="kolom_ttd_karyawan">
                    <div style="font-size: 20px;">
                        <b><span class="jarak">Hormat Saya, </span></b>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div style="margin-top: -20px;">
                        <b><span class="jarak">{{ $data->pegawais->nama }}</span></b>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="delegasi">
                <div class="background_judul">
                    <div class="romawi"><b>V.<span class="bagian_delegasi">PENDELEGASIAN TUGAS</span></b></div>                    
                </div>
                <div class="kolom_no"><center><b>No.</b></center></div>
                <div class="kolom_nama_delegasi"><center><b>Nama</b></center></div>
                <div class="kolom_tugas_delegasi"><center><b>Tugas dan Tanggung Jawab</b></center></div>
                <div class="kolom_tanda_tangan"><center><b>Tanda Tangan</b></center></div>
                <div class="clearfix"></div>
                @if($data->nama_delegasi != NULL)
                    <div class="data_no"><center><b>1</b></center></div>
                    <div class="data_nama_delegasi"><b><span class="jarak">{{ $data->nama_delegasi }}</span></b></div>
                    <div class="data_tugas_delegasi"><b><span class="jarak">{!! $data->detail_delegasi !!}</span></b></div>
                    <div class="data_tanda_tangan"><center><b></b></center></div>
                @else
                    <div class="data_no"><center><b>-</b></center></div>
                    <div class="data_nama_delegasi"><center><b>-</b></center></div>
                    <div class="data_tugas_delegasi"><center><b>-</b></center></div>
                    <div class="data_tanda_tangan"><center><b>-</b></center></div>
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="keputusan">
                <div class="background_judul">
                    <div class="romawi"><b>VI.<span class="bagian_keputusan">KEPUTUSAN YANG BERWENANG MEMBERIKAN CUTI</span></b></div>                    
                </div>
                <div class="kolom_manajer_divisi"><center><b>Manajer Divisi</b></center></div>
                <div class="kolom_izin"><center><b>(Mengizinkan/Tidak Mengizinkan)</b></center></div>
                <div class="kolom_sdm"><div style="margin-top: 10px;"><center><b>SDM</b></center></div></div>
                <div class="clearfix"></div>
                <div class="data_manajer_divisi"><center><b>{{ $data->manager }}</b></center></div>
                <div class="data_sdm"><center><b>Novia Wahyu Pangestu</b></center></div>
                <div class="clearfix"></div>
                <div class="ttd_manajer_divisi"><center><b></b></center></div>
                <div class="ttd_sdm"><center><b></b></center></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

  </body>
</html>


