@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
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
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tanggal awal</label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="awal" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="akhir" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">
                                            <button type="submit" class="float-right btn btn-primary">
                                            <i class="fas fa-filter"></i> Filter
                                            </button>
                                        </div>
                                </form>
                                    <form action="{{ route('pdflaporan')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="tabel" value="{{$select[0]}}">
                                        <div class="col">
                                            <button type="submit" class="float-left btn btn-danger">
                                            <i class="fas fa-file-pdf"></i> Cetak PDF
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
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
                                            </tr>
                                            @endforeach
                                        @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col">
                                    <a href="{{ route('pdflaporan')}}" class="float-left btn btn-success ml-3">
                                    <i class="fas fa-file-pdf"></i> Cetak PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
@endsection