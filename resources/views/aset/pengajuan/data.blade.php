@extends('layout.master')

@section('title', 'Sistem Employee Wakaf Salman ITB')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{$judul}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$judul}}</a></li>
    </ol>
  </section>

  <section class="content-header">  
    <div class="row">
      <div class="col-md-1">
          <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-pengajuan-aset"><i class="glyphicon glyphicon-plus"></i> Pengajuan Barang</a>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal Pengajuan</th>
            <th>Nama Aset</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Keterangan</th>
            <th>Status</th>
            @if(in_array(Auth::user()->id, [1, 16, 17, 46, 47]))
              <th>Aksi</th>
            @endif
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $row->pegawais->nama }}</td>
            <td>{{ $row->jabatans->nama }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->assets }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->satuan }}</td>
            <td>{{ $row->keterangan }}</td>
            @if($row->status=="")
            <td>Waiting approval from GA/Operation Manager</td>
            @else
              @if($row->status=="Accepted")
                <td><div class="label label-success" style="font-size: 14px;">{{ $row->status }}</div></td>
              @elseif($row->status=="Rejected")
                <td><div class="label label-danger" style="font-size: 14px;">{{ $row->status }}</div></td>
              @endif
            @endif
            @if(in_array(Auth::user()->id, [1, 16, 17, 46, 47]))
              <td style="padding: 5px;">
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-pengajuan-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                <a href="#" class="btn btn-danger hapus-pengajuan" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" data-aset="{{ $row->assets }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                <br>
                <a href="/setujui_pengajuan/{{ $row->id }}" class="btn btn-success" style="margin-top: 5px;"><i class="glyphicon glyphicon-ok"></i> Approve</a>
                <a href="/batalkan_pengajuan/{{ $row->id }}" class="btn btn-danger" style="margin-top: 5px;"><i class="glyphicon glyphicon-remove"></i> Reject</a>
              </td>
            @endif
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

  </section>
  <!-- /.content -->
</div>

@include('aset.pengajuan.modal')

@push('aset_pengajuan')
<script>
  $('.hapus-pengajuan').click(function(){
      var id_pengajuan = $(this).attr('data-id');
      var nama_pengajuan = $(this).attr('data-nama');
      var aset_pengajuan = $(this).attr('data-aset');
      swal({
          title: "Hapus data",
          text: "Apakah kamu yakin akan menghapus data "+nama_pengajuan+" yang mengajukan merchandise "+aset_pengajuan+" ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.location = "/hapus_pengajuan/"+id_pengajuan+""
              swal("Data berhasil dihapus", {
              icon: "success",
              });
          } else {
              swal("Aksi dibatalkan!");
          }
      });
  });
</script>
<script>

    let counter = 1
     
    $('#tambah-aset').click(function(){
        counter++

        let newInputan = "<div class='form-group' id='hapus'><div class='row'><div class='col-xs-5'><input type='text' name='assets[]' data-type='assets' id='assets"+counter+"' class='form-control typeahead-aset'></div><div class='col-xs-2'><input type='text' name='jumlah[]' class='form-control'></div><div class='col-xs-3'><select name='satuan[]' class='form-control'><option selected>Pilih Satuan</option>@foreach($satuan as $row)<option value='{{ $row->nama }}'>{{ $row->nama }}</option>@endforeach</select></div></div></div>"
        $('#form-tambah-aset').append(newInputan)

    });

    $('#hapus-aset').click(function(){
        if(counter == 1){
            alert("Form sudah tidak dapat dihapus")
        }

        $('#hapus').remove()
        counter--
    });

    $(document).on('focus','.typeahead-aset',function(){

        type = $(this).data('type');
        autoType = 'nama';
    
        $(this).autocomplete({
            minLength: 0,
            source: function( request, response ) {
                $.ajax({
                    url: "{{ route('autocomplete_aset_pengajuan') }}",
                    dataType: "json",
                    data: {
                        term : request.term,
                        type : type,
                    },
                    success: function(data) {
                        var array = $.map(data, function (item) {
                        return {
                            label: item[autoType],
                            value: item[autoType],
                            data : item
                        }
                    });
                        response(array)
                    }
                });
            },
            select: function( event, ui ) {
                var data = ui.item.data;           
                id_arr = $(this).attr('id');
                id = id_arr.split("_");
                elementId = id[id.length-1];
                $('#assets_'+elementId).val(data.nama);
            }
        });
    
    
    });
</script>
@endpush

@endsection