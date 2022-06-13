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

<h1>Laporan Stock Aset Wakaf Salman</h1>

<table id="customers">
  <tr>
    <th rowspan="2" style="text-align: center;">Nama Aset (Merk)</th>
    <th rowspan="2" style="text-align: center;">Stock Awal</th>
    <th rowspan="2" style="text-align: center;">Satuan</th>
    <th colspan="2" style="text-align: center;">Mutasi</th>
    <th rowspan="2" style="text-align: center;">Stock Akhir</th>
  </tr>
  <tr>
    <th style="text-align: center;">In</th>
    <th style="text-align: center;">Out</th>  
  </tr>
  @foreach($data as $row)
  <tr>
    <td>{{ $row->assets->nama }} ({{ $row->assets->merk }})</td>
    <td>{{ $row->jumlah }}</td>
    <td>{{ $row->satuan }}</td>
    <td>{{ $row->jumlah_in }}</td>
    <td>{{ $row->jumlah_out }}</td>
    <td>{{ ($row->jumlah+$row->jumlah_in)-$row->jumlah_out }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>


