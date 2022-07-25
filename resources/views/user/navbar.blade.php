<header id="header" class="d-flex align-items-center ">
    <div class="container d-flex justify-content-between">

        <div class="logo">
            <h1><a href="/"><span>J</span>astip.ol</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="/"><i style="font-size: 20px;"
                            class="pe-2 fa-solid fa-house-chimney"></i>Beranda</a></li>
                <li><a class="nav-link scrollto" href="/order"><i style="font-size: 20px;"
                            class="pe-2 fa-solid fa-cart-plus"></i>Pesan
                        Jasa</a></li>
                <li><a class="nav-link scrollto" href="/myorder"><i style="font-size: 20px;"
                            class="pe-2 fa-solid fa-cart-shopping"></i>Pesanan Saya</a>
                </li>
                @if (auth()->user())
                    @if (auth()->user()->role === 'user')
                        <li><a class="nav-link scrollto " href="/bejastiper"><i style="font-size: 20px;"
                                    class="pe-2 fas fa-people-carry "></i>Daftar Jastiper</a></li>
                    @else
                        <li><a class="nav-link scrollto " href="/bukajasa"><i style="font-size: 20px;"
                                    class="pe-2 fa-solid fa-handshake fa-xl "></i>Buka Jasa</a></li>
                    @endif

                    <li class="dropdown"><a href="#"><span>Hi, {{ Auth()->user()->name }}</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/customer">Profil</a></li>
                            <li><a href="/myorder">Pesanan Saya</a></li>
                            @if (auth()->user())
                                @if (auth()->user()->role === 'jastiper')
                                    <li><a href="/orderan">Pesanan Customer</a></li>
                                @endif
                            @endif
                            <li><a href="/message">Chat</a></li>
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">LogOut</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @else
                    <li><a class="nav-link scrollto" href="/login"><i style="font-size: 20px;"
                                class="pe-2 fa-solid fa-user"></i>Login</a></li>
                    <a class="button" href="/daftar">Register</a>
                @endif

            </ul>
            <i class="bi bi-list mobile-nav-toggle "></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
