@extends('layouts.pdf.master')
@section('content')
        <div class="container-fluid">
                <div class="col">
                    <div class="row">
                        <h1>Data Provinsi</h1>
                    </div>
                    <div class="row">
                        <h4>pada tanggal - sampai - </h4>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Provinsi</th>
                                        <th>Nama Provinsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($provinsi as $data)
                                    <tr style="page-break-inside: avoid;">
                                        <td>{{$i++}}</td>
                                        <td>{{$data->kode_prov}}</td>
                                        <td>{{$data->nama_prov}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
