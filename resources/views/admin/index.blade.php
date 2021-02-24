@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="mt-4"></div>
                        <div class="text-center"><h1>Persentase</h1></div>
                        <div class="row">
                                <div class="col">
                                <div class="container" style="width: 70%; height:80vh">
                                        <div id="Pie"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="container" style="width: 100%; height:80vh">
                                        <div id="Bar"></div>
                                    </div>
                                </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header text-center">
                                <h3>Global</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Negara</th>
                                                <th>Kasus</th>
                                                <th>Aktif</th>
                                                <th>Sembuh</th>
                                                <th>Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no = 1 @endphp
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item['nama_negara']}}</td>
                                                <td>{{$item['kasus']}}</td>
                                                <td>{{$item['aktif']}}</td>
                                                <td>{{$item['sembuh']}}</td>
                                                <td>{{$item['meninggal']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
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
                <?php 
                $f = 0;
                $g = 0;
                $h = 0;
                $k = 0;
                foreach ($data as $key) {
                        $g += $key['aktif'];
                        $h += $key['meninggal'];
                        $k += $key['sembuh'];
                        $f += $key['kasus'];
                    }
                $n = ($g / $f) * 100;
                $m = ($h / $f) * 100;
                $b = ($k / $f) * 100;
                ?>
                var kasus = {{$f}};
                var aktif = {{$n}};
                var meninggal = {{$m}};
                var sembuh = {{$b}};
                window.onload = function() {
                var chart = new CanvasJS.Chart("Pie", {
                        animationEnabled: true,
                        data: [{
                            responsive: true,
                            maintainAspectRatio	: false,
                                type: "pie",
                                startAngle: 160,
                                yValueFormatString: "##0.00\"%\"",
                                indexLabel: "{label} {y}",
                                dataPoints: [
                                        {y: aktif, label: "aktif"},
                                        {y: meninggal, label: "meninggal"},
                                        {y: sembuh, label: "sembuh"}
                                ]
                        }]
                });
                var chart1 = new CanvasJS.Chart("Bar", {
                    animationEnabled: true,
                    theme: "light2",
                    data: [{   
                        responsive: true,
                        maintainAspectRatio	: false,     
                        type: "column",  
                        dataPoints: [      
                            <?php 
                            $nm = 0;
                                foreach ($data as $bu) {
                                    $nm++;
                                ?>
                            { y: {{$bu['kasus']}}, label: "{{$bu['nama_negara']}}" },
                            <?php 
                            if ($nm > 5) {
                                break;
                                }
                            }
                        ?>
                        ]
                    }]
                });
                chart.render();
                chart1.render();
                }
                
        </script>