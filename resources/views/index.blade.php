@extends('layouts.front.master')
@section('content')
    <div class="page-wrapper">
        <!-- PAGE CONTENT-->
        <?php
            $p = 0;
            $m = 0;
            $g = 0;
            $h = 0;
            $k = 0;
            // foreach ($data as $key) {
            //     $p += $key['kasus'];
            //     $g += $key['aktif'];
            //     $h += $key['meninggal'];
            //     $k += $key['sembuh'];
            // }
            foreach ($tracking as $ke) {
                $m += $ke->positif;
                $m += $ke->sembuh;
                $m += $ke->meninggal;
                $m += $ke->dirawat;
            }
        ?>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" 
            style="background-image: url('{{asset('img/covid-banner.jpg')}}');
                    background-repeat: no-repeat; 
                    background-size: cover;">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <div class="overview-box clearfix">
                <h1>Lokal</h1>
                    <div class="row mb-3">
                        <div class="col">
                            <i class="fas fa-exclamation-triangle" style="font-size: 3em; color: Tomato;"></i>
                        </div>
                        <div class="col">
                            <div class="number">
                                <h2 style="font-size: 43px;">
                                <span class="count">{{$m}}</span>
                            </h2>
                            </div>
                        </div>
                        <div class="col">
                            <i class="fas fa-exclamation-triangle" style="font-size: 3em; color: Tomato;"></i>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="page-content--bgf7">
            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"></h2>
                                <span class="desc">Total Aktif</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-time-countdown"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"></h2>
                                <span class="desc">Total meninggal</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-mood-bad"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number"></h2>
                                <span class="desc">Total Sembuh</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-mood"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number"></h2>
                                <span class="desc">Total Kasus</span>
                                <div class="icon">
                                    <object data="{{asset('svg/indonesia.svg')}}" width="150" height="150" style="opacity: 0.5;"> </object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <h3 class="title-5 m-b-35 ">Data provinsi</h3>
                            </div>
                            <div class="card mx-auto col-10">
                                <div class="card-body">
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2" id="dataTable1">
                                            <thead>
                                                <tr>
                                                    <th>Nama Provinsi</th>
                                                    <th>Positif</th>
                                                    <th>Sembuh</th>
                                                    <th>Meninggal</th>
                                                    <th>Dirawat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tracking as $ls)
                                                <tr class="tr-shadow">
                                                    <td>{{$ls->nama_prov}}</td>
                                                    <td style="color:#ffbf00;">{{number_format($ls->positif)}}</td>
                                                    <td style="color:lime;">{{number_format($ls->sembuh)}}</td>
                                                    <td style="color:tomato;">{{number_format($ls->meninggal)}}</td>
                                                    <td>{{number_format($ls->dirawat)}}</td>
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
            </section>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>
    </div>
<!-- end document-->
@endsection