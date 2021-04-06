@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                        @if (session('error'))
                                <div class="alert alert-dismissible fade show alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{session('error')}}
                                </div>
                            @endif
                            <div class="card-header">
                                <h4>Laporan</h4>
                                <form action="{{ url('pdftracking')}}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Tanggal awal</label>
                                                <div class="col-sm-6">
                                                    <input type="date" name="awal" class="form-control">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class= "col-md-5">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Tanggal Akhir</label>
                                                <div class="col-sm-6">
                                                    <input type="date" name="akhir" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i> Cari
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                </form>
                                @if($select[0] != "Default")
                                    <form action="{{ route('pdflaporan')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="awal" value="{{$select[0]}}">
                                    <input type="hidden" name="akhir" value="{{$select[1]}}">
                                        <div class="col">
                                            <button type="submit" class="float-left btn btn-danger">
                                            <i class="fas fa-file-pdf"></i> Cetak PDF
                                            </button>
                                        </div>
                                    </form>
                                    @endisset
                                </div>
                            </div>
                            <div class="card-body">
                            @if($select[1] != "Default" && $select[1] != NULL) 
                            <h5 class="text-center">Tanggal {{$select[0]}} sampai {{$select[1]}}</h5> 
                            @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alamat</th>
                                                <th>Positif</th>
                                                <th>Meninggal</th>
                                                <th>Dirawat</th>
                                                <th>Sembuh</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @isset($tracking)
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($tracking as $data1)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                    <ul class="list-unstyled">
                                                        <li>provinsi : {{$data1->rw->kelurahan->kecamatan->kota->provinsi->nama_prov}}</br></li>
                                                        <li>kota : {{$data1->rw->kelurahan->kecamatan->kota->nama_kota}}</br></li>
                                                        <li>kecamatan : {{$data1->rw->kelurahan->kecamatan->nama_kec}}</br></li>
                                                        <li>kelurahan :{{$data1->rw->kelurahan->nama_kel}}</br></li>
                                                        <li>Rw : {{$data1->rw->nama_rw}}</br></li>
                                                    </ul>
                                                </td>
                                                <td>{{$data1->positif}}</td>
                                                <td>{{$data1->meninggal}}</td>
                                                <td>{{$data1->dirawat}}</td>
                                                <td>{{$data1->sembuh}}</td>
                                                <td>{{$data1->tanggal}}</td>
                                            </tr>
                                            @endforeach
                                        @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
@endsection