<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>WAKAF SALMAN SIPEG</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Edit Data Pegawai</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/proses_rubah_pegawai/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputName" value="{{ $data->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputGender" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                                    <option selected>{{ $data->jenis_kelamin }}</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPhone" class="form-label">Nomor Telepon</label>
                                <input type="number" name="no_telepon" class="form-control" id="exampleInputPhone"  value="{{ $data->no_telepon }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputBirthdate" class="form-label">Tempat / Tanggal Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="exampleInputBirthdate" class="col-4" value="{{ $data->tempat_lahir }}"> /
                                <input type="date" name="tgl_lahir" class="form-control" id="exampleInputBirthdate" value="{{ $data->tgl_lahir }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputAddress" class="form-label">Alamat</label>
                                <input type="textarea" name="alamat" class="form-control" id="exampleInputAddress" value="{{ $data->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputTitle" class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" id="exampleInputTitle" value="{{ $data->jabatan }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputDivision" class="form-label">Divisi</label>
                                <input type="text" name="divisi" class="form-control" id="exampleInputDivision" value="{{ $data->divisi }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>