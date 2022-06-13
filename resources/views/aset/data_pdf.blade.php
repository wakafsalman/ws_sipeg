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

<h1>Data Aset Wakaf Salman</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Kode Aset</th>
    <th>Nama Aset</th>
    <th>Merk</th>
    <th>PIC/Tempat</th>
    <th>Jumlah</th>
    <th>Satuan</th>
    <th>Gambar</th>
  </tr>
  @php
    $no = 1;
  @endphp
  @foreach($data as $row)
  <tr>
    <th scope="row">{{ $no++ }}</th>
    <td>{{ $row->kode }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->merk }}</td>
    <td>{{ $row->pic }}</td>
    <td>{{ $row->jumlah }}</td>
    <td>{{ $row->satuan }}</td>
    <td>
        <img src="{{ public_path('img/aset/'.$row->gambar)  }}" style="width: 180px; height: 200px;">
    </td>
  </tr>
  @endforeach
</table>

</body>
</html>


