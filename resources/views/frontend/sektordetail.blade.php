<x-front-app>
<main class="detail">
    <div class="position-relative mb-4">
        <img src="{{asset('/assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
        <div class="container">
            <div class="bread"><h1 class="text-white">{{$sektor->baslik}}</h1></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                <h4>{{$sektor->alt_baslik}}</h4>

{{--                <button class="btn btn-link text-dark ml-auto text-decoration-none">--}}
{{--                    Daha falza bilgi <img class="ml-2" src="{{asset('/assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />--}}
{{--                </button>--}}

            </div>
        </div>
    </div>
    <hr class="mb-5" />

    <div class="container">
        <div class="row">
            <div class="col-12">
                <img  width="1050" height="699" src="{{asset("storage/images/sektor_images/$sektor->image")}}" alt="..." class="mb-4" />
                <h3 class="text-danger font-weight-bold">{{$sektor->baslik}} Sektörü</h3>
                {!! $sektor->aciklama !!}
                <p></p>
            </div>
        </div>
    </div>

    <!-- numbers start -->
    <div class="numbers bg-red text-light py-5 mb-5">
        <div class="container">
            <div class="row text-center text-sm-left">
                <div class="col-12 col-sm-4 d-flex flex-column mb-3 mb-sm-0">
                    <h2>İhracat <br /> Rakamları</h2>
                    <div class="mt-auto">
                        <p>Son Güncelleme Tarihi</p>

                        <p>{{$ihracatrakam->guncelleme_tarih ?? ''}}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                    <h2>Son Ay</h2>
                    <p>{{$ihracatrakam->o_birinci ?? ''}}</p>
                    <h1 class="display-3 font-weight-bold">{{$ihracatrakam->o_ikinci ?? ''}}</h1>
                    <h4>{{$ihracatrakam->o_ucuncu ?? ''}}</h4>
                </div>
                <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                    <h2>Son 12 Ay</h2>
                    <p>{{$ihracatrakam->s_birinci ?? ''}}</p>
                    <h1 class="display-3 font-weight-bold">{{$ihracatrakam->s_ikinci ?? ''}}</h1>
                    <h4>{{$ihracatrakam->s_ucuncu ?? ''}}</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- numbers end -->

    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="position-relative">
                    <a href="{{$sektor->sektor_link}}"><img src="{{asset("storage/images/sektor_resim/$sektor->sektor_resim")}}" alt="..." class="img-fluid" /></a>
                    <a href="{{$sektor->sektor_link}}" class="text-decoration-none text-light d-flex justify-content-between bg-red position-absolute p-3 text-light w-100" style="bottom:0;">
                        <div class="d-flex  align-items-center">
                            <h4 class="m-0">{{$sektor->sektor_link_baslik}} <br />
                                {{$sektor->sektor_link_altbaslik}}
                            </h4>
                        </div>
                        <img src="{{asset('/assets/images/arrow-right-light.svg')}}" width="46" alt="..." />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <hr class="mb-5" />

    <!-- threeslide start -->
    <div class="threeslide mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">{{$sektor->name}} Etkinlik Takvimi</h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($etkinlik as $key=>$value)
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="card-header text-danger bg-transparent">{{$value->tarih}}</div>
                                    <div class="card-body">
                                        <h5>{{ $value->baslik }}</h5>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0">
                                        {{$value->alt_baslik}} &nbsp;
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>
                    <div role="button" class="three-left d-none d-md-block"><img src="{{asset('/assets/images/arrow-left-red.svg')}}" alt="..." /></div>
                    <div role="button" class="three-right d-none d-md-block"><img src="{{asset('/assets/images/arrow-right-red.svg')}}" alt="..." /></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="text-danger text-decoration-none font-weight-bold" href="#">Tüm {{$sektor->baslik}} Etkinliklerini Göster</a>
                </div>
            </div>
        </div>
    </div>
    <!-- threeslide end -->

    <hr class="mb-5" />

    <!-- service start -->
    <div class="service mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Aliminyum URGE Projeleri</h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            @foreach($faaliyet as $key=>$value)

                                <div class="swiper-slide">
                                    <a href="#"><img class="img-fluid mb-3" src="{{asset("storage/images/faliyet_images/$value->image")}}" alt="..." /></a>
                                    <h5 class="text-secondary"><a class="text-dark text-decoration-none font-weight-bold" href="#">{{$value->baslik}}</a></h5>
                                    <h6><a class="text-secondary text-decoration-none" href="#">{{$value->alt_baslik}}</a></h6>
                                </div>

                            @endforeach

                        </div>
                    </div>
                    <div role="button" class="service-left d-none d-md-block"><img src="{{asset('/assets/images/arrow-left-red.svg')}}" alt="..." /></div>
                    <div role="button" class="service-right d-none d-md-block"><img src="{{asset('/assets/images/arrow-right-red.svg')}}" alt="..." /></div>
                </div>
            </div>
        </div>
    </div>
    <!-- service end -->

    <hr class="mb-5" />

    <!-- threeslide start -->
    <div class="threeslide mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">{{$sektor->baslik}} İhracat Raporları</h3>
                </div>
            </div>
            <div class="row mb-3 reports">
                <div class="col-12">
                    <div class="swiper-container">



                        <div class="swiper-wrapper">
                        @foreach($ihracat as $key=>$value)

                            <div class="swiper-slide">
                                <a href="{{asset("storage/files/ihracat_files/$value->pdf")}}" class="card p-3 text-decoration-none rounded-lg">
                                    <h4 class="text-dark text-decoration-none">{{$value->baslik}} &nbsp;</h4>
                                    <h6 class="text-secondary text-decoration-none">{{$value->baslik}} <br /> İhracat Raporu</h6>
                                </a>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div role="button" class="three-left d-none d-md-block"><img src="{{asset('/assets/images/arrow-left-red.svg')}}" alt="..." /></div>
                    <div role="button" class="three-right d-none d-md-block"><img src="{{asset('/assets/images/arrow-right-red.svg')}}" alt="..." /></div>
                </div>
            </div>
        </div>
    </div>
    <!-- threeslide end -->

    <hr class="mb-4" />

    <!-- news start -->
    <div class="news mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">{{$sektor->baslik}} Sektöründen Haberler</h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($haber as $key=>$value)

                            <div class="swiper-slide">
                                <a href="#"><img class="img-fluid mb-3" src="{{asset("storage/images/haber_images/$value->image")}}" alt="..." /></a>
                                <h5 class="text-secondary"><a class="text-dark text-decoration-none" href="#">{{$haber->tarih}}</a></h5>
                                <h5><a class="text-dark text-decoration-none" href="#">{{$value->baslik}}</a></h5>
                            </div>

                      @endforeach


                        </div>

                    </div>
                    <div role="button" class="news-left d-none d-md-block"><img src="{{asset('/assets/images/arrow-left-red.svg')}}" alt="..." /></div>
                    <div role="button" class="news-right d-none d-md-block"><img src="{{asset('/assets/images/arrow-right-red.svg')}}" alt="..." /></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="text-danger text-decoration-none font-weight-bold" href="#">Tüm haberleri göster</a>
                </div>
            </div>
        </div>
    </div>
    <!-- news end -->

    <hr class="mb-5" />

    <div class="container mb-5">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="text-danger font-weight-bold">Aliminyum GTİP Listesi ve Tanıtım</h3>
            </div>
        </div>

        <div class="row text-center justify-content-center">
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3 mb-sm-0">

                        <div class="card py-5 px-2">
                            <h4 class="text-dark font-weight-bold"> {{$sektor->baslik}}}   <br />
                                GTİP Listesi
                            </h4>
                            <h5><a class="text-dark text-decoration-none"   href="{{asset("storage/files/gtip_pdf/$sektor->gtip_pdf")}}">Pdf İndir (8 Mb)</a></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                        <div class="card py-5 px-2">
                            <h4 class="text-dark font-weight-bold"> {{$sektor->baslik}}   <br />
                                Tanıtım Broşürü
                            </h4>
                            <h5><a class="text-dark text-decoration-none" href="{{asset("storage/files/tanitim_pdf/$sektor->tanitim_pdf")}}"></a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- sectors start -->
    <div class="sectors mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Aliminyum Sektörü Ekibimiz</h3>
                </div>
            </div>
            <div class="row row-cols-sm-2 row-cols-md-3 text-center text-sm-left">
                <div class="col-12 mb-3">
                    <a href="#"><img class="img-fluid mb-3" src="{{asset('/assets/images/profile4.svg')}}" alt="..." /></a>
                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Ebru Kutlualp</a></h4>
                    <p><a class="text-secondary text-decoration-none" href="#">Metaller Sektör Şubesi <br />
                            Şube Müdür <div class="w-100"></div>
                    +90 212 454 0991 <br />
                    ebru.kutlualp@immib.org.tr
                    </a></p>
                </div>
                <div class="col-12 mb-3">
                    <a href="#"><img class="img-fluid mb-3" src="{{asset('/assets/images/profile4.svg')}}" alt="..." /></a>
                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Ebru Kutlualp</a></h4>
                    <p><a class="text-secondary text-decoration-none" href="#">Metaller Sektör Şubesi <br />
                            Şube Müdür
                    <div class="w-100"></div>
                    +90 212 454 0991 <br />
                    ebru.kutlualp@immib.org.tr
                    </a></p>
                </div>


            </div>
        </div>
    </div>

</main>
</x-front-app>

