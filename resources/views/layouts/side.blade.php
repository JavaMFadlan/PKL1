<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="{{route('home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <br>
                            <div class="sb-sidenav-menu-heading">CRUD</div>
                                <a class="nav-link" href="{{ route('provinsi.index')}}" <?= (Request::segment(1) == 'provinsi') ? 'selected' : '' ;?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                Provinsi</a>
                                <a class="nav-link" href="{{ route('kota.index')}}" <?= (Request::segment(1) == 'kota') ? 'selected' : '' ;?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                Kota</a>
                                <a class="nav-link" href="{{ route('kecamatan.index')}}" <?= (Request::segment(1) == 'kecamatan') ? 'selected' : '' ;?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                Kecamatan</a>
                                <a class="nav-link" href="{{ route('kelurahan.index')}}" <?= (Request::segment(1) == 'kelurahan') ? 'selected' : '' ;?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                Kelurahan</a>
                                <a class="nav-link" href="{{ route('rw.index')}}" <?= (Request::segment(1) == 'rw') ? 'selected' : '' ;?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                Rw</a>
                                <a class="nav-link" href="{{ route('tracking.index')}}" <?= (Request::segment(1) == 'tracking') ? 'selected' : '' ;?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                Tracking</a>
                            <br>
                            <div class="sb-sidenav-menu-heading">Laporan PDF</div>
                            <a class="nav-link" href="{{ route('pdfindex')}}" <?= (Request::segment(1) == 'pdfindex') ? 'selected' : '' ;?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                Provinsi - RW</a>
                            <a class="nav-link" href="{{ route('pdftracking')}}" <?= (Request::segment(1) == 'tracking') ? 'selected' : '' ;?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                Tracking</a>
                    </div>
                </nav>
            </div>