@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="mt-4">
                        </div>
                        <div class="card">
                            <div class="card-body ">
                                
                            
                        <div class="row mx-auto">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Provinsi
                                    <div class="float-right">{{$provinsi}}</div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('provinsi.index')}}">View Details</a>
                                        <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah Tracking 
                                    <div class="float-right">{{$tracking->count()}}</div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('tracking.index')}}">View Details</a>
                                        <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center"><h1>Persentase</h1></div>
                        <div class="row">
                                <div class="col">
                                <div class="container" style="width: 70%; height:90vh">
                                        <div id="Pie"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="container" style="width: 70%; height:90vh">
                                        <div id="Bar"></div>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="mb-5"></div>
                        <div class="card mb-4">
                            <div class="card-header text-center">
                                <h3>Provinsi</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Provinsi</th>
                                                <th>Positif</th>
                                                <th>Sembuh</th>
                                                <th>Meninggal</th>
                                                <th>Sembuh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no = 1 @endphp
                                            @foreach($tracking as $ls)
                                                <tr class="tr-shadow">
                                                    <td>{{$no++}}</td>
                                                    <td>{{$ls->nama_prov}}</td>
                                                    <td style="color:#ffbf00;">{{number_format($ls->positif)}}</td>
                                                    <td style="color:lime;">{{number_format($ls->sembuh)}}</td>
                                                    <td style="color:tomato;">{{number_format($ls->meninggal)}}</td>
                                                    <td style="color:tomato;">{{number_format($ls->dirawat)}}</td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
<script>
                
                
        </script>