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
                                <form action="/user/updateuser/{{ $user -> id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ui>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ui>
                                    </div>
                                    @endif
                                    <div class="form-group w-25">
                                        <label>NIK User</label>
                                        <input type="number" name="nik_user" class="form-control" value="{{ $user-> nik_user }}" readonly>
                                     </div>
                                    <div class="form-group w-25">
                                         <label>Nama User</label>
                                        <input type="text" name="nama_user" class="form-control" value="{{ $user-> nama_user }}" required>
                                    </div>
                                    <div class="form-group w-25">
                                         <label>No. Handphone</label>
                                        <input type="text" name="no_handphone" class="form-control" value="{{ $user-> no_handphone }}" required>
                                    </div>
                                    <div class="form-group w-25">
                                         <label>Password</label>
                                        <input type="password" name="password" class="form-control" value="{{ $user-> password }}" required>
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