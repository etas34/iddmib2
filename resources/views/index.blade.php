<x-front-app>

    <!--
     イースターエッグ

                    _ ___                /^^\ /^\  /^^\_
    _          _@)@) \            ,,/ '` ~ `'~~ ', `\.
  _/o\_ _ _ _/~`.`...'~\        ./~~..,'`','',.,' '  ~:
 / `,'.~,~.~  .   , . , ~|,   ,/ .,' , ,. .. ,,.   `,  ~\_
( ' _' _ '_` _  '  .    , `\_/ .' ..' '  `  `   `..  `,   \_
 ~V~ V~ V~ V~ ~\ `   ' .  '    , ' .,.,''`.,.''`.,.``. ',   \_
  _/\ /\ /\ /\_/, . ' ,   `_/~\_ .' .,. ,, , _/~\_ `. `. '.,  \_
 < ~ ~ '~`'~'`, .,  .   `_: ::: \_ '      `_/ ::: \_ `.,' . ',  \_
  \ ' `_  '`_    _    ',/ _::_::_ \ _    _/ _::_::_ \   `.,'.,`., \-,-,-,_,_,
   `'~~ `'~~ `'~~ `'~~  \(_)(_)(_)/  `~~' \(_)(_)(_)/ ~'`\_.._,._,'_;_;_;_;_;


    -->


    <!-- hero start -->
    <div style="background-image: url({{asset("storage/images/slider_images/$slider->image")}}) !important" class="hero text-light mb-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-8">
                    <h1>{{$slider->baslik}}</h1>
                    <h2 class="mb-3">{{$slider->alt_baslik}}
                    </h2>
                    <p>{{$slider->aciklama}}</p>
                </div>
                <div class="col-sm-4 text-center text-sm-right">
                    <h6 class="border rounded px-2 py-3 d-inline-block text-center">
                        <span class="font-weight-bold">Turkish</span> 365 <br />
                        E-ihracat Portalı
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#"><img src="{{ asset('assets/images/arrow-down.svg') }}" alt="..." /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- hero end -->

    <!-- notice start -->
    <div class="notice mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Güncel Duyurular</h3>
                    <h5>Quisque velit nisi, pretium ut lacinia in, elementum id enim</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($duyuru as $key=>$value)
                            <div class="swiper-slide"><img class="img-fluid" src="{{asset("storage/images/duyuru_images/$value->image")}}" alt="..." /></div>
                            @endforeach
                        </div>

                    </div>
                    <div role="button" class="notice-left"><img src="{{ asset('assets/images/arrow-left-red.svg') }}" alt="..." /></div>
                    <div role="button" class="notice-right"><img src="{{ asset('assets/images/arrow-right-red.svg') }}" alt="..." /></div>
                </div>
            </div>

        </div>
    </div>
    <!-- notice end -->
    <hr class="mb-5" />

    <!-- message start -->
    <div class="message mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Başkan'ın Mesajı</h3>
                  {!! $baskan->metin !!}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="{{asset("storage/images/baskan_images/$baskan->image")}}" alt="..." class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
    <!-- message end -->

    <!-- apply start -->
    <div class="apply mb-5 text-light">
        <div class="bg-red py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        Donec rutrum congue leo eget malesuada.
                    </div>
                    <div class="col-sm-4">
                        <a href="{{route('iletisim')}}" class="btn btn-light font-weight-bold">İLETİŞİME GEÇİN </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- apply end -->

    <!-- news start -->
    <div class="news mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Haberler</h3>
                    <h5>Quisque velit nisi, pretium ut lacinia in, elementum id enim</h5>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                        @foreach($haber as $key=>$value)
                            <div class="swiper-slide">
                                <a href="{{route('haber',$value)}}"><img class="img-fluid mb-3" src="{{asset("storage/images/haber_images/$value->image")}}" alt="..." /></a>
                               <a class="" style="color: #6c757d " href="{{route('haber',$value)}}">{{$value->tarih}}</a>
                                <h5><a class="text-dark text-decoration-none" href="{{route('haber',$value)}}">{{$value->baslik}}</a></h5>
                            </div>
                            @endforeach


                        </div>

                    </div>
                    <div role="button" class="news-left"><img src="{{ asset('assets/images/arrow-left-red.svg') }}" alt="..." /></div>
                    <div role="button" class="news-right"><img src="{{ asset('assets/images/arrow-right-red.svg') }}" alt="..." /></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="text-danger" href="#">Tüm haberleri göster</a>
                </div>
            </div>
        </div>
    </div>
    <!-- news end -->

    <!-- numbers start -->
    <div class="numbers text-light py-5 mb-5">
        <div class="container">
            <div class="row text-center text-sm-left">
                <div class="col-12 col-sm-4 d-flex flex-column mb-3 mb-sm-0">
                    <h2>İhracat <br /> Rakamları</h2>
                    <div class="mt-auto">
                        <p>Son Güncelleme Tarihi</p>
                        <p>{{$ihracatRakam->guncelleme_tarih ?? ''}}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                    <h2>Son Ay</h2>
                    <p>{{$ihracatRakam->o_birinci ?? ''}}</p>
                    <h1 class="display-3 font-weight-bold">{{$ihracatRakam->o_ikinci ?? ''}}</h1>
                    <h4>{{$ihracatRakam->o_ucuncu ?? ''}}</h4>
                </div>
                <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                    <h2>Son 12 Ay</h2>
                    <p>{{$ihracatRakam->s_birinci ?? ''}}</p>
                    <h1 class="display-3 font-weight-bold">{{$ihracatRakam->s_ikinci ?? ''}}</h1>
                    <h4>{{$ihracatRakam->s_ucuncu ?? ''}}</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- numbers end -->

    <!-- sectors start -->
    <div class="sectors mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Sektörler</h3>
                    <h5>Quisque velit nisi, pretium ut lacinia in, elementum id enim</h5>
                </div>
            </div>
            <div class="row row-cols-sm-2 row-cols-md-3 text-center text-sm-left">
                @foreach($sektor as $key=>$value)
                    <div class="col-12 mb-3">
                        <a href="{{route('sektordetail',$value)}}"><img class="img-fluid mb-3" src="{{asset("storage/images/sektor_images/$value->image")}}" alt="..." /></a>
                        <h4><a href="{{route('sektordetail',$value)}}" class="text-dark font-weight-bold text-decoration-none" href="#">{{$value->baslik}}</a></h4>
                        <h5><a class="text-secondary text-decoration-none" href="#">{{$value->alt_baslik}}</a></h5>
                    </div>
                @endforeach



{{--                <div class="col-12 mb-3">--}}
{{--                    <a href="#"><img class="img-fluid mb-3" src="{{ asset('assets/images/sectors2.svg') }}" alt="..." /></a>--}}
{{--                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Bakır</a></h4>--}}
{{--                    <h5><a class="text-secondary text-decoration-none" href="#">Pellentesque in ipsum id orci porta dapibus</a></h5>--}}
{{--                </div>--}}
{{--                <div class="col-12 mb-3">--}}
{{--                    <a href="#"><img class="img-fluid mb-3" src="{{ asset('assets/images/sectors2.svg') }}" alt="..." /></a>--}}
{{--                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Bakır</a></h4>--}}
{{--                    <h5><a class="text-secondary text-decoration-none" href="#">Pellentesque in ipsum id orci porta dapibus</a></h5>--}}
{{--                </div>--}}
{{--                <div class="col-12 mb-3">--}}
{{--                    <a href="#"><img class="img-fluid mb-3" src="{{ asset('assets/images/sectors2.svg') }}" alt="..." /></a>--}}
{{--                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Bakır</a></h4>--}}
{{--                    <h5><a class="text-secondary text-decoration-none" href="#">Pellentesque in ipsum id orci porta dapibus</a></h5>--}}
{{--                </div>--}}
{{--                <div class="col-12 mb-3">--}}
{{--                    <a href="#"><img class="img-fluid mb-3" src="{{ asset('assets/images/sectors2.svg') }}" alt="..." /></a>--}}
{{--                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Bakır</a></h4>--}}
{{--                    <h5><a class="text-secondary text-decoration-none" href="#">Pellentesque in ipsum id orci porta dapibus</a></h5>--}}
{{--                </div>--}}
{{--                <div class="col-12 mb-3">--}}
{{--                    <a href="#"><img class="img-fluid mb-3" src="{{ asset('assets/images/sectors2.svg') }}" alt="..." /></a>--}}
{{--                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Bakır</a></h4>--}}
{{--                    <h5><a class="text-secondary text-decoration-none" href="#">Pellentesque in ipsum id orci porta dapibus</a></h5>--}}
{{--                </div>--}}
{{--                <div class="col-12 mb-3">--}}
{{--                    <a href="#"><img class="img-fluid mb-3" src="{{ asset('assets/images/sectors2.svg') }}" alt="..." /></a>--}}
{{--                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Bakır</a></h4>--}}
{{--                    <h5><a class="text-secondary text-decoration-none" href="#">Pellentesque in ipsum id orci porta dapibus</a></h5>--}}
{{--                </div>--}}
{{--                <div class="col-12 mb-3">--}}
{{--                    <a href="#"><img class="img-fluid mb-3" src="{{ asset('assets/images/sectors2.svg') }}" alt="..." /></a>--}}
{{--                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Bakır</a></h4>--}}
{{--                    <h5><a class="text-secondary text-decoration-none" href="#">Pellentesque in ipsum id orci porta dapibus</a></h5>--}}
{{--                </div>--}}
{{--                <div class="col-12 mb-3">--}}
{{--                    <a href="#"><img class="img-fluid mb-3" src="{{ asset('assets/images/sectors2.svg') }}" alt="..." /></a>--}}
{{--                    <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">Bakır</a></h4>--}}
{{--                    <h5><a class="text-secondary text-decoration-none" href="#">Pellentesque in ipsum id orci porta dapibus</a></h5>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
    <!-- sectors end -->
    <hr class="mb-5" />

    <!-- reports start -->
    <div class="reports mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">İhracat Raporları</h3>
                    <h5>Quisque velit nisi, pretium ut lacinia in, elementum id enim</h5>
                </div>
            </div>


            <div class="row row-cols-sm-2 row-cols-md-3">
                @foreach($ihracat as $key=>$value)
                <div class="col-12 mb-3">
                    <a target="_blank" href="{{asset("storage/files/ihracat_files/$value->pdf")}}" class="card p-3 text-decoration-none rounded-lg">
                        <h3 class="text-dark text-decoration-none">{{ \App\Models\Sektor::find($value->sektor_id)->baslik }}</h3>
                        <h5 class="text-secondary text-decoration-none">{{$value->baslik}} <br /> İhracat Raporu</h5>
                    </a>
                </div>
                @endforeach



                </div>

            </div>
        </div>
    </div>

    <!-- reports end -->
    <hr class="mb-5" />

    <!-- service start -->
    <div class="service mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Faaliyetler</h3>
                    <h5>Quisque velit nisi, pretium ut lacinia in, elementum id enim</h5>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            @foreach($faliyet as $key=>$value)

                            <div class="swiper-slide">
                                <a href="{{route('faaliyet',$value)}}"><img class="img-fluid mb-3" src="{{asset("storage/images/faliyet_images/$value->image")}}" alt="..." /></a>
                                <h5 class="text-secondary"><a class="text-dark" href="{{route('faaliyet',$value)}}">{{$value->baslik}}</a></h5>
                                <h6><span class="text-secondary text-decoration-none">{{$value->alt_baslik}}</span></h6>
                            </div>
                            @endforeach



                        </div>

                    </div>
                    <div role="button" class="service-left"><img src="{{ asset('assets/images/arrow-left-red.svg') }}" alt="..." /></div>
                    <div role="button" class="service-right"><img src="{{ asset('assets/images/arrow-right-red.svg') }}" alt="..." /></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="text-danger" href="#">Tüm faaliyetleri göster</a>
                </div>
            </div>
        </div>
    </div>
    <!-- service end -->

    <hr  class="mb-5"/>

    <!-- threeslide start -->
    <div class="threeslide mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Etkinlik Takvimi</h3>
                    <h5>Quisque velit nisi, pretium ut lacinia in, elementum id enim</h5>
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
                                            <h5>{{$value->baslik}}</h5>
                                        </div>
                                        <div class="card-footer bg-transparent border-top-0">
                                            {{$value->alt_baslik}}
                                        </div>
                                        <div class="card-footer bg-transparent border-top-0 text-secondary d-flex justify-content-between">
                                            <span>{{\App\Models\Sektor::find($value->sektor_id)->baslik}}</span>
                                            <span>{{config('constants.kategori.'.$value->kategori_id)}}</span>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div role="button" class="three-left"><img src="{{ asset('assets/images/arrow-left-red.svg') }}" alt="..." /></div>
                    <div role="button" class="three-right"><img src="{{ asset('assets/images/arrow-right-red.svg') }}" alt="..." /></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="text-danger" href="#">Tüm etkinlikleri göster</a>
                </div>
            </div>
        </div>
    </div>
    <!-- threeslide end -->

    <hr class="mb-5" />

    <!-- innovation start -->
    <div class="innovation mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">İnovasyon</h3>
                    <h5>Quisque velit nisi, pretium ut lacinia in, elementum id enim</h5>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($inovasyon as $key=>$value)
                                <div class="swiper-slide">
                                    <a href="{{route('inovasyon',$value)}}"><img class="img-fluid mb-3 d-block mx-auto" src="{{asset("storage/images/inovasyon_images/$value->image")}}" alt="..." /></a>
                                    <h5 class="text-secondary"><a class="text-dark" href="#">{{$value->baslik}}</a></h5>
                                    <h6><a class="text-secondary text-decoration-none" href="#">{{$value->alt_baslik}}</a></h5>
                                </div>
                            @endforeach



                        </div>

                    </div>
                    <div role="button" class="innovation-left"><img src="{{ asset('assets/images/arrow-left-red.svg') }}" alt="..." /></div>
                    <div role="button" class="innovation-right"><img src="{{ asset('assets/images/arrow-right-red.svg') }}" alt="..." /></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="text-danger" href="#">Tüm inovasyonları göster</a>
                </div>
            </div>
        </div>
    </div>
    <!-- innovation end -->

    <hr class="mb-5" />

    <div class="container mb-5">
        <div class="row text-center justify-content-center">
            <div class="col-12 col-md-11">
                <div class="row">
                    @foreach($faliyetRapor->take(2) as $key=>$value)
                        <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                            <div class="card py-5 px-2">
                                <h4 class="text-red font-weight-bold"> İDDMİB   <br />
                                    {{$value->aciklama}}
                                </h4>
                                <h5><a target="_blank" class="text-dark text-decoration-none" href="{{asset("storage/files/faliyetrapor_files/$value->rapor")}}">Pdf İndir (
                                    {{number_format((float)File::size(public_path("storage/files/faliyetrapor_files/$value->rapor")) / 1048576 , 2) }}  MB )</a></h5>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    <hr class="mb-5" />

    <!-- contact start -->
    <div class="contact mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">İletişim</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <img src="{{ asset('assets/images/contact.svg') }}" alt="..." class="img-fluid" />
                </div>
                <div class="col-12 col-sm-6">
                    <h5>Proin eget tortor risus. Mauris blandit aliquet elit</h5>
                    <p>Eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Praesent sapien massa, convallis a pellentesque nec</p>
                    <p>
                        +90 355 555 55 55 <br />
                        info@turkishaluminium365.com
                    </p>
                    <a class="text-danger" href="#">Adrese Git</a>
                </div>
            </div>
        </div>
    </div>
    <!-- contact end -->

    @push('scripts')
        <script>
{{--            @foreach($faliyetRapor->take(2) as $key=>$value)--}}
{{--            var MFsize{{$key}} ={{File::size(public_path("storage/files/faliyetrapor_files/$value->rapor"))  /  1048576,2}}--}}
{{--            $('#abcx').text(MFsize{{$key}}.toFixed(2))--}}
{{--            @endforeach--}}
            {{--$(function() {--}}
            {{--
            {{--});--}}
        </script>


    @endpush
</x-front-app>

