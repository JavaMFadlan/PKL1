@extends('layouts.pdf.master')
@section('content')
        <div class="container-fluid">
                <div class="col">
                    <div class="row">
                        <h1>Data Laporan</h1>
                    </div>
                    <div class="row">
                    @if($select[2] != NULL)
                        <h4>pada tanggal {{$select[1]}} sampai {{$select[2]}} </h4>
                    @endif
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode {{$select[0]}}</th>
                                        <th>Nama {{$select[0]}}</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                    ?>
                                    @foreach ($raw as $data1)
                                        <tr style="page-break-inside: avoid;">
                                            <td>{{$i++}}</td>
                                            <td>{{$data1['kode']}}</td>
                                            <td>{{$data1['nama']}}</td>
                                            <td>{{$data1['tgl']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection