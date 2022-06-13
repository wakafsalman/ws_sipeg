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

<h1>Laporan Aset Masuk Wakaf Salman</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Tanggal Aset Masuk</th>
    <th>Nama Aset</th>
    <th>Satuan</th>
    <th>Merk</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Total</th>
  </tr>
  @php
    $no = 1;
  @endphp
  @foreach($data as $row)
  <tr>
    <th scope="row">{{ $no++ }}</th>
    <td>{{ $row->tanggal }}</td>
    <td>{{ $row->assets->nama }}</td>
    <td>{{ $row->satuan }}</td>
    <td>{{ $row->merk }}</td>
    <td>{{ $row->harga }}</td>
    <td>{{ $row->jumlah }}</td>
    <td>{{ $row->harga*$row->jumlah }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>


