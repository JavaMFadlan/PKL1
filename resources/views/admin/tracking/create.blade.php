@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <div class="mt-4"></div>
                    @if (session('error'))
                        <div class="alert alert-dismissible fade show alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{session('error')}}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3>Menambah Data Tracking</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('tracking.store')}}" method="post">
                                            @csrf
                                            @for($i = 0; $i < $num; $i++)
                                            <input type="hidden" name="num" value="{{$num}}">
                                            <h5>Data Ke-{{$i+1}}</h5>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                @livewire('kasus')
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class=" mr-auto">
                                                                <div class="form-group">
                                                                    <label for="">positif</label>
                                                                    <input type="number" min=0 name="positif[]" class="form-control" required id="">
                                                                </div>
                                                            </div>
                                                            <div class=" mr-auto">
                                                                <div class="form-group">
                                                                    <label for="">sembuh</label>
                                                                    <input type="number" min=0 name="sembuh[]" class="form-control" required id="">
                                                                </div>
                                                            </div>
                                                            <div class=" mr-auto">
                                                                <div class="form-group">
                                                                    <label for="">meninggal</label>
                                                                    <input type="number" min=0 name="meninggal[]" class="form-control" required id="">
                                                                </div>
                                                            </div>
                                                            <div class=" mr-auto">
                                                                <div class="form-group">
                                                                    <label for="">dirawat</label>
                                                                    <input type="number" min=0 name="dirawat[]" class="form-control" required id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr>
                                            @endfor
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