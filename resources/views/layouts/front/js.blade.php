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
                if($g != 0){
                    $n = ($g / $f) * 100;
                    $m = ($h / $f) * 100;
                    $b = ($k / $f) * 100;
                }
                $n = 0;
                $m = 0;
                $b = 0;
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
        
    // <!-- Jquery JS-->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').dataTable();
            $('#dataTable1').dataTable();
        } );
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 10000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
        </script>
    // <!-- Bootstrap JS-->
    <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    // <!-- Vendor JS -->
    <script src="{{asset('vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}">
    </script>

    // <!-- Main JS-->
    <script src="{{asset('js/main.js')}}"></script>

    //Datatables JS
    <script src="{{asset('assets/datatables/js/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/datatables/js/dataTables.bootstrap4.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/demo/datatables-demo.js')}}"></script>