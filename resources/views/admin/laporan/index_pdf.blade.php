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
                                <form action="{{ url('pdfindex')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="">Tabel</label>
                                            <select class="form-control col-5" name="tabel">
                                            <option value = "prov" <?= ($select[0] == "prov") ? 'selected' : '' ;?>>Provinsi</option>
                                            <option value = "kota" <?= ($select[0] == "kota") ? 'selected' : '' ;?>>Kota</option>
                                            <option value = "kec" <?= ($select[0] == "kec") ? 'selected' : '' ;?>>Kecamatan</option>
                                            <option value = "kel" <?= ($select[0] == "kel") ? 'selected' : '' ;?>>Kelurahan</option>
                                            <option value = "rw" <?= ($select[0] == "rw") ? 'selected' : '' ;?>>Rw</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
                                @if($select[0] != "Default" && $raw != NULL)
                                    <form action="{{ route('pdflaporan')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="tabel" value="{{$select[0]}}">
                                    <input type="hidden" name="awal" value="{{$select[1]}}">
                                    <input type="hidden" name="akhir" value="{{$select[2]}}">
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
                            @if($select[2] != "Default" && $select[2] != NULL) 
                            <h5 class="text-center">Tanggal {{$select[1]}} sampai {{$select[2]}}</h5> 
                            @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @isset($raw)
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($raw as $data1)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$data1['kode']}}</td>
                                                <td>{{$data1['nama']}}</td>
                                                <td>{{$data1['tgl']}}</td>
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