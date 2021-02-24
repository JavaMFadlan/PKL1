<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Crud
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('provinsi.index')}}">Provinsi</a>
                                    <a class="nav-link" href="{{ route('kota.index')}}">Kota</a>
                                    <a class="nav-link" href="{{ route('kecamatan.index')}}">Kecamatan</a>
                                    <a class="nav-link" href="{{ route('kelurahan.index')}}">Kelurahan</a>
                                    <a class="nav-link" href="{{ route('rw.index')}}">Rw</a>
                                    <a class="nav-link" href="{{ route('tracking.index')}}">Tracking</a>
                                </nav>
                            </div>
                            
                    </div>
                </nav>
            </div>