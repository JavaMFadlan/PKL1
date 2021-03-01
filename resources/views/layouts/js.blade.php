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
                    $n = 0;
                    $m = 0;
                    $b = 0;
                    if($g != 0){
                        $n = ($g / $f) * 100;
                        $m = ($h / $f) * 100;
                        $b = ($k / $f) * 100;
                    }
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
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="{{asset('js/jquery-3.5.1.min.js')}}" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function() {
                $('#dataTable').dataTable();
                $('#dataTable1').dataTable();
        } );
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="{{asset('assets/datatables/js/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('assets/datatables/js/dataTables.bootstrap4.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/datatables-demo.js')}}"></script>
        