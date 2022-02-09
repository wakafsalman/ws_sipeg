<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: blue;
  color: white;
}
</style>
</head>
<body>

<h1>Data Karyawan Wakaf Salman</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>No. Telepon</th>
    <th>Tempat dan Tanggal Lahir</th>
    <th>Alamat</th>
    <th>Jabatan</th>
    <th>Divisi</th>
  </tr>
  @php
    $no = 1;
  @endphp
  @foreach($data as $row)
  <tr>
    <th scope="row">{{ $no++ }}</th>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->jenis_kelamin }}</td>
    @if($row->no_telepon != NULL)
    <td>0{{ $row->no_telepon }}</td>
    @else
      <td></td>
    @endif
    @if($row->tempat_lahir != NULL && $row->tgl_lahir != NULL)
      <td>{{ $row->tempat_lahir }}, {{ date('j F Y', strtotime($row->tgl_lahir))}}</td>
    @else
      <td></td>
    @endif
    <td>{{ $row->alamat }}</td>
    <td>{{ $row->jabatans->nama }}</td>
    <td>{{ $row->divisis->nama }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>


