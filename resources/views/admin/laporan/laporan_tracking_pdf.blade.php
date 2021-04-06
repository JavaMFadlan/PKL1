@extends('layouts.pdf.master')
@section('content')
        <div class="container-fluid">
                <div class="col">
                    <div class="row">
                        <h1>Data Laporan</h1>
                    </div>
                    <div class="row">
                    @if($select[1] != NULL)
                        <h4>pada tanggal {{$select[0]}} sampai {{$select[1]}} </h4>
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
                                            <th>Alamat</th>
                                            <th>Positif</th>
                                            <th>Meninggal</th>
                                            <th>Dirawat</th>
                                            <th>Sembuh</th>
                                            <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($tracking as $data1)
                                        <tr style="page-break-inside: avoid;">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection