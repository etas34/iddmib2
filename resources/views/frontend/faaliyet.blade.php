<x-front-app>


    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">{{$faaliyet->baslik}}</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>{{$faaliyet->alt_baslik}}</h4>

{{--                    <button class="btn btn-link text-dark ml-auto text-decoration-none">--}}
{{--                        Daha falza bilgi <img class="ml-2" src="{{asset('assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />--}}
{{--                    </button>--}}

                </div>
            </div>
        </div>
        <hr class="mb-5" />

        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset("storage/images/faliyet_images/$faaliyet->detay_resim")}}"  width="100%" alt="..." class="img-fluid mb-4" />
                    <h3 class="text-danger font-weight-bold">{{$faaliyet->metin_baslik}}</h3>
                    {!! $faaliyet->aciklama !!}

                    @if(in_array('0',explode(',',$faaliyet->kategori_id)))

                        @for($i = 1 ; $i <= 6 ; $i++ )
                    <a target="_blank" href="{{unserialize($faaliyet->link)[$i]}}" class="text-decoration-none text-light d-flex justify-content-between bg-red p-3 mt-3 text-light w-100">
                        <div class="d-flex  align-items-center">
                            <img src="{{asset('assets/images/doc-light.svg')}}" class="mr-3" width="46" alt="..." />
                            <h4 class="m-0">
                                {{unserialize($faaliyet->link_baslik)[$i]}} <br />
                                {{unserialize($faaliyet->link_altbaslik)[$i]}}
                            </h4>
                        </div>

                        <img src="{{asset('assets/images/arrow-right-light.svg')}}" width="46" alt="..." />
                    </a>
                        @endfor

                    @endif

                </div>
            </div>
        </div>
@if(!in_array('0',explode(',',$faaliyet->kategori_id)))



        <!-- threeslide start -->
        <div class="threeslide mb-5">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                             @foreach($etkinlik as $key=>$value)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-header text-danger bg-transparent">{{$value->tarih}}</div>
                                        <div class="card-body">
                                            {{$value->baslik}}
                                        </div>
                                        <div class="card-footer bg-transparent border-top-0">
                                            {{$value->alt_baslik}}
                                        </div>

                                    </div>
                                </div>
                                @endforeach



                            </div>

                        </div>
                        <div role="button" class="three-left d-none d-md-block"><img src="{{asset('assets/images/arrow-left-red.svg')}}" alt="..." /></div>
                        <div role="button" class="three-right d-none d-md-block"><img src="{{asset('assets/images/arrow-right-red.svg')}}" alt="..." /></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                      <a class="text-danger">Tüm etkinlikleri göster</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- threeslide end -->
    @endif


    </main>

</x-front-app>
