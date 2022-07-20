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
        <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-tambah-aset-masuk"><i class="glyphicon glyphicon-plus"></i> Tambah Aset Masuk</a>

      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
          <h3 class="box-title">Laporan Aset Masuk Wakaf Salman ITB</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Aset Masuk</th>
            <th>Jenis Aset</th>
            <th>Nama Aset</th>
            <th>Tanggal Pembelian</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->jenis_aset }}</td>
            <td>{{ $row->aset }}</td>
            <td>{{ $row->tanggal_beli }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->satuan }}</td>
            <td>{{ $row->harga }}</td>
            <td>{{ $row->harga*$row->jumlah }}</td>
            <td>
              <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-rubah-aset-masuk-{{ $row->id }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="#" class="btn btn-danger hapus-aset-masuk" data-id="{{ $row->id }}" data-aset="{{ $row->aset }}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            </td>
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

@include('aset.aset_masuk.modal')

@push('aset_masuk')
<script>
  $('.hapus-aset-masuk').click(function(){
      var id_aset_masuk = $(this).attr('data-id');
      var nama_aset_masuk = $(this).attr('data-aset');
      swal({
          title: "Hapus data",
          text: "Apakah kamu yakin akan menghapus data "+nama_aset_masuk+" ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.location = "/hapus_aset_masuk/"+id_aset_masuk+""
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
     
    $('#tambah-asetmasuk').click(function(){
        counter++

        let newInputan = "<div class='form-group' id='hapus'><div class='row'><div class='col-xs-3'><input type='text' name='aset[]' data-type='aset' id='aset"+counter+"' class='form-control typeahead-aset-masuk'></div><div class='col-xs-2'><input type='text' name='jumlah[]' class='form-control'></div><div class='col-xs-3'><select name='satuan[]' class='form-control'><option selected>Pilih Satuan</option>@foreach($satuan as $row)<option value='{{ $row->nama }}'>{{ $row->nama }}</option>@endforeach</select></div><div class='col-xs-2'><input type='text' name='harga[]' class='form-control'></div></div></div>"
        $('#form-tambah-aset-masuk').append(newInputan)

    });

    $('#hapus-asetmasuk').click(function(){
        if(counter == 1){
            alert("Form sudah tidak dapat dihapus")
        }

        $('#hapus').remove()
        counter--
    });

    $(document).on('focus','.typeahead-aset-masuk',function(){

        type = $(this).data('type');
        autoType = 'nama';
    
        $(this).autocomplete({
            minLength: 0,
            source: function( request, response ) {
                $.ajax({
                    url: "{{ route('autocomplete_aset_masuk') }}",
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
                $('#aset_'+elementId).val(data.nama);
            }
        });
    
    
    });
</script>
@endpush

@endsection