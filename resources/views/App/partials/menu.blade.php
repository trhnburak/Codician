<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/codicianl-logo.svg') }}" class="img-fluid" width="150">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('company.show') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Şirketler</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('location.show') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Şirket Lokasyonları</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('address.show') }}">
                            <i class="ni ni-pin-3 text-primary"></i>
                            <span class="nav-link-text">Adresler</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('people.show') }}">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Kişiler</span>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>