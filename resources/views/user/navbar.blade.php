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
                            class="pe-2 fa-solid fa-file-arrow-down"></i>Pesan
                        Jasa</a></li>
                <li><a class="nav-link scrollto" href="/myorder"><i style="font-size: 20px;"
                            class="pe-2 fa-solid fa-file-arrow-up"></i>Pesanan Saya</a>
                </li>
                <li><a class="nav-link scrollto " href="/bejastiper"><i style="font-size: 20px;"
                            class="pe-2 fa-solid fa-handshake fa-xl "></i>Daftar
                        Jastiper</a></li>
                @if (auth()->user())
                    <li class="dropdown"><a href="#"><span>Hi, {{ Auth()->user()->name }}</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/customer/{{ auth()->user()->id }}/edit">Profil</a></li>
                            {{-- <li class="dropdown"><a href="#"><span>Nama User</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Drop Down 1</a></li>
                                        <li><a href="#">Deep Drop Down 2</a></li>
                                        <li><a href="#">Deep Drop Down 3</a></li>
                                        <li><a href="#">Deep Drop Down 4</a></li>
                                        <li><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li> --}}
                            <li><a href="/myorder">Pesanan Saya</a></li>
                            <li><a href="#">Pesanan Pembeli</a></li>
                            <li><a href="/message">Chat</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">LogOut</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </li>
                @else
                    <li><a class="nav-link scrollto" href="/login"><i style="font-size: 20px;"
                                class="pe-2 fa-solid fa-user"></i>Login</a></li>
                    <a class="button" href="/register">Register</a>
                @endif
                {{-- <a href="blog.html">Blog</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
            </ul> --}}
            </ul>
            <i class="bi bi-list mobile-nav-toggle "></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
