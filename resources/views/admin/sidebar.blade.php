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
            <li class="nav-item dropdown {{ Request::is('gdashboard') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('gdashboard') ? 'active' : '' }}"><a class="nav-link"
                            href="/gdashboard">General Dashboard</a></li>
                    {{-- <li class="{{ Request::is('edashboard') ? 'active' : '' }}"><a class="nav-link"
                            href="/edashboard">Ecommerce Dashboard</a></li> --}}
                </ul>
            </li>
            <li class="menu-header">Validasi Data</li>
            <li class="{{ Request::is('pendaftaran') ? 'active' : '' }}"><a href="/pendaftaran"><i
                        class="fas fa-address-card"></i> <span>Pendaftaran Jastiper</span></a></li>
            <li class="{{ Request::is('validasi-pembayaran') ? 'active' : '' }}"><a href="/validasi-pembayaran"><i class="fas fa-money-check-dollar"></i><span>Validasi Uang Muka
                    </span></a></li>
            <li class="{{ Request::is('validasi-payment') ? 'active' : '' }}"><a href="/validasi-payment"><i class="fas fa-file-invoice-dollar"></i><span>Data
                        Pembayaran</span></a></li>


            <li class="menu-header">Pembayaran</li>
            <li class="{{ Request::is('payment_data') ? 'active' : '' }}"><a href="/payment_data"><i class="fas fa-cash-register"></i> <span>Tagihan
                        Pembayaran</span></a></li>
            <li class="{{ Request::is('refund_data') ? 'active' : '' }}"><a href="/refund_data"><i class="fas fa-comment-dollar"></i> <span>Tagihan
                        Refund Customer</span></a></li>


            <li class="menu-header">Data User</li>
            <li class="nav-item dropdown {{ Request::is('data-jastiper') ?  'active' : ''}}{{ Request::is('data-customer') ?  'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-id-card"></i> <span>Lihat Data</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('data-jastiper') ?  'active' : ''}}"><a href="/data-jastiper">Data Jastiper</a></li>
                    <li class="{{ Request::is('data-customer') ?  'active' : ''}}"><a href="/data-customer">Data Customer</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
