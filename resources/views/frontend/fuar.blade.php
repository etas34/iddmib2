<x-front-app>


    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">Fuarlar</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>Rum intio veribus core adis exerum, vel el mollabo...</h4>

                    <button class="btn btn-link text-dark ml-auto text-decoration-none">
                        Daha falza bilgi <img class="ml-2" src="{{asset('assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />
                    </button>

                </div>
            </div>
        </div>
        <hr class="mb-5" />

        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset('assets/images/fuarlar.svg')}}" alt="..." class="img-fluid mb-4" />
                    <h3 class="text-danger font-weight-bold">Milli Katılım Organizasyonları</h3>
                    <p>Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh.</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>

                    <h4>Nasıl Başvurulur</h4>
                    <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
                </div>
            </div>
        </div>

        <!-- threeslide start -->
        <div class="threeslide mb-5">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-header text-danger bg-transparent">01 Eylül 2020</div>
                                        <div class="card-body">
                                            <h5>Özbekistan <br /> Milli Katılım <br /> Organizasyonu</h5>
                                        </div>
                                        <div class="card-footer bg-transparent border-top-0">
                                            Aliminyum
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-header text-danger bg-transparent">01 Eylül 2020</div>
                                        <div class="card-body">
                                            <h5>Özbekistan <br /> Milli Katılım <br /> Organizasyonu</h5>
                                        </div>
                                        <div class="card-footer bg-transparent border-top-0">
                                            Aliminyum
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-header text-danger bg-transparent">01 Eylül 2020</div>
                                        <div class="card-body">
                                            <h5>Özbekistan <br /> Milli Katılım <br /> Organizasyonu</h5>
                                        </div>
                                        <div class="card-footer bg-transparent border-top-0">
                                            Aliminyum
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div role="button" class="three-left d-none d-md-block"><img src="{{asset('assets/images/arrow-left-red.svg')}}" alt="..." /></div>
                        <div role="button" class="three-right d-none d-md-block"><img src="{{asset('assets/images/arrow-right-red.svg')}}" alt="..." /></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a class="text-danger text-decoration-none font-weight-bold" href="#">Tüm Milli Katılım Organizasyonlarını Göster</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- threeslide end -->

    </main>

</x-front-app>
