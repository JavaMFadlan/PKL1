@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <div class="mt-4"></div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3>Menambah Data kelurahan</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('kelurahan.store')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-5 mr-auto">
                                                    <div class="form-group">
                                                        <label for="">Nama kelurahan</label>
                                                        <input type="text" name="nama" class="form-control" required id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">Kode kelurahan</label>
                                                        <input type="number" name="kode" class="form-control" min="0" required  id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 mx-auto">
                                                    <div class="form-group">
                                                        <label>nama kecamatan</label>
                                                        <select class="form-control" name="id_kec" id="">
                                                            @foreach ($kecamatan as $data)
                                                                <option value="{{$data->id}}">{{$data->nama_kec}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" id="">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
@endsection