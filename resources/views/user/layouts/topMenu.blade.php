<header>
    <div class="header-area ">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <div class="header-left d-flex align-items-center">
                        <div class="logo">
                            <a href="{{ route('user.home') }}">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li>
                                        <a href="{{ route('user.home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.products') }}">Shop</a>
                                    </li>
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right1 d-flex align-items-center">
                        <div class="header-social d-none d-md-block">
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </div>
                        <div class="search d-none d-md-block">
                            <ul class="d-flex align-items-center">
                                <li class="mr-15">
                                    <div class="nav-search search-switch">
                                        <i class="ti-search"></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-stor">
                                        <img src="{{ asset('assets/img/gallery/card.svg') }}" alt="">
                                        <span>0</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>