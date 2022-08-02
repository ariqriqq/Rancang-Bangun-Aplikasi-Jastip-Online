<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/gdashboard">Jastip.ol</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/gdashboard">Jstp</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::is('gdashboard', 'edashboard') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('gdashboard') ? 'active' : '' }}"><a class="nav-link"
                            href="/gdashboard">General Dashboard</a></li>
                    <li class="{{ Request::is('edashboard') ? 'active' : '' }}"><a class="nav-link"
                            href="/edashboard">Ecommerce Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Validasi Data</li>
            <li class="{{ Request::is('pendaftaran') ? 'active' : '' }}"><a href="/pendaftaran"><i
                        class="far fa-file-alt"></i> <span>Pendaftaran
                        Jastiper</span></a></li>
            <li class=""><a href="/validasi-pembayaran"><i class="far fa-file-alt"></i> <span>Validasi Uang Muka
                    </span></a></li>
            <li class=""><a href="/validasi-payment"><i class="far fa-file-alt"></i> <span>Data
                        Pembayaran</span></a></li>


            <li class="menu-header">Pembayaran</li>
            <li class=""><a href="/payment_data"><i class="far fa-file-alt"></i> <span>Tagihan
                        Pembayaran</span></a></li>
            <li class=""><a href="/refund_data"><i class="far fa-file-alt"></i> <span>Tagihan
                        Refund Customer</span></a></li>


            <li class="menu-header">Data User</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Lihat Data</span></a>
                <ul class="dropdown-menu">
                    <li><a href="/data-jastiper">Data Jastiper</a></li>
                    <li><a href="/data-customer">Data Customer</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
