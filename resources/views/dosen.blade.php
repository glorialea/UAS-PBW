@extends('layouts/main')
@section('title', 'Dosen')
@section('article')
  <body>
        <div class="col-lg-12 vh-100">
            <div class="card mt-4">
                <div class="card-header">
                    <a name="" id="" class="btn btn-primary" href="/dosen/formulirdosen" role="button"><i class="bi bi-plus-square-fill"></i> ADD DOSEN</a>
                    <form class="form-inline my-2 my-lg-0 float-right" method="GET" action="/dosen/cari">
                            <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h1 class="h2">Welcome!</h1>
                        <i class="h4">{{Auth::user()->nama_user ?? ''}}</i>
                    </div>
                </div>
                <div class="card-body">
                    @foreach (['info', 'success', 'danger'] as $msg)
                    @if (session('alert-' . $msg))
                    <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                        <strong>{{ (session('alert-' . $msg)) }}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @endforeach
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIDN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Status</th>
                            <th scope="col">Jafung</th>
                            <th scope="col">Pakar</th>
                            <th scope="col">Manipulasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dosen as $no => $d)
                                <tr>
                                <th scope="row">{{ $dosen->firstItem() +$no }}</th>
                                <td>{{ $d -> nidn}}</td>
                                <td>{{ $d -> nama}}</td>
                                <td>{{ $d -> status}}</td>
                                <td>{{ $d -> jafung}}</td>
                                <td>{{ $d -> pakar}}</td>
                                <td>
                                    <a href="/dosen/editdosen/{{ $d -> id}}" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/dosen/deletedosen/{{ $d -> id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn btn-outline-danger"><i class="bi bi-trash3-fill"></i></i></a>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>   
                        {{  $dosen->count() }}   
                        <span class="float-right">{{ $dosen -> links() }}</span>
                </div>
            </div>
        </div>
  </body>
</html>           
@endsection