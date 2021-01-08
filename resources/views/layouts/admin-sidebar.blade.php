
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Yönetim</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item @if(request()->routeIs('admin.sayfalar.*') or request()->routeIs('admin.sunum.index')) menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Sayfalar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.sayfalar.ihracatPage')}}"
                               class="nav-link @if(request()->routeIs('admin.sayfalar.ihracatPage')) active @endif ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>İhracat Sayfası  </p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.sayfalar.hakkimizda')}}"
                               class="nav-link @if(request()->routeIs('admin.sayfalar.hakkimizda')) active @endif ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hakkımızda  </p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.sunum.index')}}"
                               class="nav-link @if(request()->routeIs('admin.sunum.*')) active @endif ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sunumlar  </p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.sayfalar.kadro_index')}}"
                               class="nav-link @if(request()->routeIs('admin.sayfalar.kadro_index')) active @endif ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>İdari Kadro ve Yönetim</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.slider.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-hashtag"></i>
                        <p>
                          Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.duyuru.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-bullhorn"></i>
                        <p>
                          Duyurular
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.haber.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                          Haberler
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.sektor.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-map-signs"></i>
                        <p>
                            Sektörler
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.ihracat.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-ship"></i>
                        <p>
                            İhracat Raporları
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.ihracatrakam.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-calculator"></i>
                        <p>
                            İhracat Rakamları
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.faliyet.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-pen"></i>
                        <p>
                            Faaliyetler
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.faliyetrapor.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-file-pdf"></i>
                        <p>
                            Faliyet Raporları
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.etkinlik.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Etkinlikler
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.inovasyon.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-arrow-up"></i>
                        <p>
                            İnovasyon
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.baskaninmesaji.edit')}}" class="nav-link">
                        <i class="nav-icon fa fa-envelope-open-text"></i>
                        <p>
                            Başkanın Mesajı
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
