@section('sidemenu')
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link">
            <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="{{ __('Logo') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ __('Product') }}</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    @php
                        define("route", Request::route()->getName());
                    @endphp
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ route == 'home'?'active':'' }}">
                            <i class="nav-icon fa-solid fa-house"></i>
                            <p>{{ __('Home') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product') }}" class="nav-link {{ route == 'product' || route == 'product.add' 
                            || route == 'product.edit' || route == 'product.view' || route == 'addon.cat1' || route == 'addon.cat1.add' 
                            || route == 'addon.cat1.edit' || route == 'addon.cat1.view' || route == 'addon.cat2' || route == 'addon.cat2.add' 
                            || route == 'addon.cat2.edit' || route == 'addon.cat2.view' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-store"></i>
                            <p>{{ __('Products') }}</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
@show