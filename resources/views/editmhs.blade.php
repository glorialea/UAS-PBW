<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  </head>
  <body>
      <div class="container-fluid">
           <div class="row">
                <div class="col-lg-12 bg-primary py-4"></div>
           </div>
           <div class="row">
                <div class="col-lg-2 vh-100">
                <div class="nav flex-column nav-pills mt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" href="#">Home</a>
                <a class="nav-link" href="#">Dosen</a>
                <a class="nav-link active" href="/mahasiswa">Mahasiswa</a>
                <a class="nav-link" href="#">Skripsi</a>
                    </div>
                </div>
                <div class="col-lg-10 vh-100">
                    <div class="card mt-4">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="container-fluid rounded mt-4">
                                @php
                                    $bidang_minat = explode(',', $mahasiswa -> bidang_minat);
                                @endphp
                                <form action="/mahasiswa/updatemhs/{{ $mahasiswa -> id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group w-25">
                                        <label>NIM</label>
                                        <input type="number" name="nim" class="form-control" value="{{ $mahasiswa-> nim }}" readonly>
                                     </div>
                                    <div class="form-group w-25">
                                         <label>Nama Mahasiswa</label>
                                        <input type="text" name="nama" class="form-control" value="{{ $mahasiswa-> nama }}" required>
                                    </div>
                                        <label>Gender</label>
                                    <div class="form-check w-25">
                                        <input type="radio" name="gender" value="Perempuan" {{ $mahasiswa->gender == 'Perempuan' ? 'checked':''  }} class="form-check-input">
                                        <label>Perempuan</label>
                                    </div>
                                    <div class="form-check w-25">
                                        <input type="radio" name="gender" value="Laki-Laki" {{ $mahasiswa -> gender == 'Laki-Laki' ? 'checked':'' }} class="form-check-input">
                                        <label>Laki-Laki</label>
                                    </div>       
                                    <div class="form-group w-25">
                                         <label>Jurusan</label>
                                        <select name="jurusan" class="form-control">
                                            <option value="0">--Pilih Jurusan--</option>
                                            <option value="Sistem Informasi" {{ $mahasiswa-> jurusan == 'Sistem Informasi' ? 'selected':'' }}>--Sistem Informasi--</option>
                                            <option value="Teknik Informasi" {{ $mahasiswa-> jurusan == 'Teknik Informasi' ? 'selected':'' }}>--Teknik Informasi--</option>
                                            <option value="Bioteknologi" {{ $mahasiswa-> jurusan == 'Bioteknologi' ? 'selected':'' }}>--Bioteknologi--</option>
                                            <option value="Akuntansi" {{ $mahasiswa-> jurusan == 'Akuntansi' ? 'selected':'' }}>--Akuntansi--</option>
                                            <option value="Manajemen" {{ $mahasiswa-> jurusan == 'Manajemen' ? 'selected':'' }}>--Manajemen--</option>
                                        </select>
                                    </div>
                                        <label>Bidang Minat</label>
                                        <div class="form-check w-25">
                                            <input type="checkbox" name="bidang_minat[]" value="Voli" {{ in_array('Voli', $bidang_minat) ? 'checked':'' }} class="form-check-input">
                                            <label>Voli</label>
                                        </div>
                                        <div class="form-check w-25">
                                            <input type="checkbox" name="bidang_minat[]" value="Badminton" {{ in_array('Badminton', $bidang_minat) ? 'checked':'' }} class="form-check-input">
                                            <label>Badminton</label>
                                        </div>
                                        <div class="form-check w-25">
                                            <input type="checkbox" name="bidang_minat[]" value="Basket" {{ in_array('Basket', $bidang_minat) ? 'checked':'' }} class="form-check-input">
                                            <label>Basket</label>
                                        </div>
                                        <div class="form-check w-25">
                                            <input type="checkbox" name="bidang_minat[]" value="Futsal" {{ in_array('Futsal', $bidang_minat) ? 'checked':'' }} class="form-check-input">
                                            <label>Futsal</label>
                                        </div>
                                        <div class="form-group w-25 mt-4">
                                            <input type="submit" value="SAVE" class="btn btn-outline-primary">
                                        </div>
                                </form>
                             </div>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>