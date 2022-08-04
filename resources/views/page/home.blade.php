@extends('user.index')

@section('title')
    <title>Home Page</title>
@endsection


@section('content')
    <!-- ======= hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/6.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Pakaian Indonesia </h2>
                                <p class="animate__animated animate__fadeInUp">Mencari pakaian-pakaian terbaik dari berbagai
                                    daerah kunjungan jastiper</p>
                                <a href="/order" class="btn-get-started ">Cari
                                    Jasa</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/4.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Makanan Tradisional Indonesia</h2>
                                <p class="animate__animated animate__fadeInUp">Makanan tradisional merupakan salah satu ciri
                                    khas yang dimiliki oleh berbagai daerah di Indonesia</p>
                                <a href="/order" class="btn-get-started">Cari
                                    Jasa</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/5.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Oleh-Oleh</h2>
                                <p class="animate__animated animate__fadeInUp">Oleh-oleh khas daerah merupakan salah satu
                                    incaran
                                    terbanyak dari banyaknya customer jastip</p>
                                <a href="/order" class="btn-get-started ">Cari
                                    Jasa</a>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section><!-- End Hero Section -->

    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2 style="text-transform:none;">About Jastip.ol </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <a href="#">
                                <img src="assets/img/about/1.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <a href="#">
                                <h4 class="sec-head">Jasa Titip Beli</h4>
                            </a>
                            <p>
                                Jastip adalah singkatan dari jasa titip atau layanan informal yang menawarkan bantuan kepada
                                orang-orang yang membutuhkan atau ingin membeli sesuatu tetapi tidak dapat pergi ke tempat
                                yang diinginkan untuk membeli sendiri karena berbagai alasan.
                            </p>
                            <ul>
                                <li>
                                    <i class="bi bi-check"></i> Makanan
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Pakaian
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Perkakas
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> dan lain-lain
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-center">
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <!-- Start Left services -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="bi bi-briefcase"></i>
                                </a>
                                <h4>Bayar Penuh</h4>
                                <p>
                                    Metode pembayaran pada transaksi ini menggunakan sistem Cashless, dimana kami tidak
                                    menyediakan pembayaran secara konvensional. Pada pembayaran pemesanan jasa harus
                                    menyertakan uang jaminan (DP).
                                </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="bi bi-card-checklist"></i>
                                </a>
                                <h4>Jastiper Terverifikasi</h4>
                                <p>
                                    Jastiper adalah orang yang membuka jasa penitipan, dalam hal ini sudah terverifikasi
                                    data-datanya sehingga terpercaya untuk membuka jasa tersebut.
                                </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- end col-md-4 -->
                    <div class=" about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="bi bi-calendar4-week"></i>
                                </a>
                                <h4>OnTime</h4>
                                <p>
                                    Pengiriman pesanan dilakukan tepat waktu sesuai tanggal pembayaran yang dilakukan.
                                </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                <div class="col-md-12 col-sm-4 col-xs-12">
                    <!-- end about-details -->
                    <div class=" about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="fa-regular fa-money-bill-1"></i>
                                </a>
                                <h4>Payment</h4>
                                <p>
                                    Pesanan tidak dapat dibatalkan setelah membayar uang muka.
                                </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Contact us</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start contact icon column -->
                    <div class="col-md-4">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="bi bi-phone"></i>
                                <p>
                                    Call: +62 877 2711 5750<br>
                                    <span>Senin-Jum'at (09.00-16.00)</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="bi bi-envelope"></i>
                                <p>
                                    Email: jastipolindonesia@gmail.com<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="bi bi-geo-alt"></i>
                                <p>
                                    Loc: Jl. Pari 13 No.195. Pabean Kencana, Pabean Udik. Indramayu<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Google Map -->
                    <div class="col-md-6">
                        <!-- Start Map -->
                        <iframe src="https://maps.google.com/maps?q=pabean%20kencana&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <!-- End Map -->
                    </div>
                    <!-- Start  contact -->
                    <div class="col-md-6">
                        <div class="form contact-form">
                            <form action="/" method="post" role="form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                </div>
                                <div class=" text-center">
                                    <button type="submit" class="btn btn-primary" id="liveAlertBtn">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div><!-- End Contact Section -->
@endsection
