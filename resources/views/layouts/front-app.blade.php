<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'turkishMetals') }}</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- googlefonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- swiperjs -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/responsive.css') }}" />

    @stack('styles')


</head>

<body>
    <header class="header bg-white">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light">
                <a href="{{route('home')}}" class="navbar-brand"><img  src="{{ asset('assets/images/logo.svg') }}" alt="..." /></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#mynav"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Kurumsal</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('ihracat')}}">İhracat</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Üyelik</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Sektörler</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Faliyetler</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">İnovasyon</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">İletişim</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="bg-gray p-2 text-light">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-auto">
                        İstanbul Demir ve Demir Dışı Metaller İhracatçılar Birliği
                    </div>
                    <div class="col-12 col-md-auto text-center text-md-right">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item"><a class="@if ( Config::get('app.locale') == 'tr') text-light   @else text-secondary   @endif  text-decoration-none" href="{{route('setlocale','tr')}}">Türkçe</a></li>
                            <li class="list-inline-item"><a class="@if ( Config::get('app.locale') == 'en') text-light   @else text-secondary   @endif text-decoration-none" href="{{route('setlocale','en')}}">English</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- social start -->
    <div class="left-social">
        <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#"><img src="{{ asset('assets/images/twitter.svg') }}" alt="..." /></a></li>
            <li class="mb-2"><a href="#"><img src="{{ asset('assets/images/facebook.svg') }}" alt="..." /></a></li>
            <li class="mb-2"><a href="#"><img src="{{ asset('assets/images/instagram.svg') }}" alt="..." /></a></li>
            <li class="mb-2"><a href="#"><img src="{{ asset('assets/images/linked.svg') }}" alt="..." /></a></li>
            <li><a href="#"><img src="{{ asset('assets/images/youtube.svg') }}" alt="..." /></a></li>
        </ul>
    </div>
    <!-- social end -->
    {{$slot}}


    <!-- Main Footer -->
    <footer class="footer">
        <div class="footer-top border-top border-bottom py-5 position-relative">
            <a class="toTop" href="javascript:void(0);"><img src="{{ asset('assets/images/arrow-up.svg') }}" alt="..." /></a>
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <a href="{{route('hakkimizda')}}" class="btn btn-outline-secondary mb-2 mr-2">Hakkımızda</a>
                        <a href="{{route('yonetimkurulu')}}" class="btn btn-outline-secondary mb-2 mr-2">Yönetim ve Denetim Kurulu</a>
                        <a href="{{route('idarikadro')}}" class="btn btn-outline-secondary mb-2 mr-2">İdari Kadro</a>
                        <a href="{{route('raporlar')}}" class="btn btn-outline-secondary mb-2 mr-2">Raporlar</a>
                        <a href="{{route('sunumlar')}}" class="btn btn-outline-secondary mb-2 mr-2">Sunumlar</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Üyelik</a> <br />
                        <a href="{{route('ihracatrota')}}" class="btn btn-outline-secondary mb-2 mr-2">İhracat Rotası</a>
                        <a href="{{route('devletdestek')}}" class="btn btn-outline-secondary mb-2 mr-2">Devlet Destekleri</a>
                        <a href="{{route('ihracatrapor')}}" class="btn btn-outline-secondary mb-2 mr-2">İhracat Raporları</a>
                        <a href="{{route('faydalilinkler')}}" class="btn btn-outline-secondary mb-2 mr-2">Faydalı Linkler</a> <br />
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Aliminyum</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Bakır</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Döküm</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Ev ve Mutfak</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Kaynak</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Metal Hırdavat</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Metal Ambalaj</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Yapı Malzemeleri</a>  <br />
                        <a href="{{route('etkinlik')}}" class="btn btn-outline-secondary mb-2 mr-2">Etkinlik Takvimi</a>
                        <a href="{{route('fuar')}}" class="btn btn-outline-secondary mb-2 mr-2">Fuarlar</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Heyetler</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Çalıştaylar</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">İhracat Ödül Töreni</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">ARGE Proje Pazarı</a>
                        <a href="{{route('yarisma')}}" class="btn btn-outline-secondary mb-2 mr-2">Endüstriyel Tasarım Yarışması</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">Birlikte Tasarlaylım</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">İhracatçı-Öğrenci Buluşmaları</a>  <br />
                        <a href="{{route('iletisim')}}" class="btn btn-outline-secondary mb-2 mr-2">İletişim</a>
                        <a href="#" class="btn btn-outline-secondary mb-2 mr-2">İDDMİB Basın Kiti</a>
                        <a href="{{route('iletisim')}}#sss" class="btn btn-outline-secondary mb-2 mr-2">Sıkça Sorulan Sorular</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-4 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <ul class="social list-inline">
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/twitter.svg') }}" alt="..." /></a></li>
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/facebook.svg') }}" alt="..." /></a></li>
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/instagram.svg') }}" alt="..." /></a></li>
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/linked.svg') }}" alt="..." /></a></li>
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/youtube.svg') }}" alt="..." /></a></li>
                        </ul>
                        <ul class="list-inline list-dots">
                            <li class="list-inline-item"><a class="text-dark" href="#">Copyright © 2020,</a></li>
                            <li class="list-inline-item"><a class="text-dark" href="#">İDDMİB - Her hakkı saklıdır</a></li>
                            <li class="list-inline-item"><a class="text-dark" href="#">Gizlilik  </a></li>
                            <li class="list-inline-item"><a class="text-dark" href="#">Şartlar   </a></li>
                            <li class="list-inline-item"><a class="text-dark" href="#">Site haritası   </a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h1 class="display-3"><a class="text-dark text-decoration-none" href="#"><img class="img-fluid" src="{{ asset('assets/images/footerLogo.svg') }}" alt="..." /></a></h1>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- REQUIRED SCRIPTS -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- swiperjs -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="{{ asset('assets/main.js') }}"></script>
@stack('scripts')
</body>
</html>
