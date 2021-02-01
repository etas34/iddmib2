<x-front-app>

    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">Hakkımızda</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>{{$hakkimizda->altbaslik}}</h4>

{{--                    <button class="btn btn-link text-dark ml-auto text-decoration-none">--}}
{{--                        Daha falza bilgi <img class="ml-2" src="{{asset('assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />--}}
{{--                    </button>--}}

                </div>
            </div>
        </div>
        <hr />
        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset("storage/images/sayfalar_images/$hakkimizda->image")}}" class="img-fluid mb-4" alt="..." />
                    <h3 class="text-danger font-weight-bold">{{$hakkimizda->metinbaslik}}</h3>
                    {!! $hakkimizda->metin !!}


                </div>
            </div>
        </div>
        <!-- sectors start -->
        <div class="sectors mb-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12">
                        <h3 class="text-danger font-weight-bold">Alt Sektörlerimiz</h3>
                    </div>
                </div>
                <div class="row row-cols-sm-2 row-cols-md-3 text-center text-sm-left">
                    @foreach($sektor as $key=>$value)
                        <div class="col-12 mb-3">
                            <a href="{{route('sektordetail',$value)}}"><img class="img-fluid mb-3"src="{{asset("storage/images/sektor_images/$value->ana_resim")}}"  alt="..." /></a>
                            <h4><a class="text-dark font-weight-bold text-decoration-none" href="{{route('sektordetail',$value)}}">{{$value->baslik}}</a></h4>
{{--                            <h5><a class="text-secondary text-decoration-none" href="#">{{$value->alt_baslik}}</a></h5>--}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- sectors end -->

        <div class="container mb-5">
            <div class="row text-center justify-content-center">
                <div class="col-12 col-md-11">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                            <div class="card py-5 px-2">
                                <h4 class="text-red font-weight-bold"> İDDMİB   <br />
                                    Hakkında Kanun
                                </h4>
                                <h5><a target="_blank" class="text-dark text-decoration-none" href="{{asset("storage/files/sayfalar_files/$hakkimizda->pdf1")}}">Pdf İndir (8 Mb)</a></h5>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                            <div class="card py-5 px-2">
                                <h4 class="text-red font-weight-bold"> İDDMİB   <br />
                                    Hakkında Yönetmelik
                                </h4>
                                <h5><a target="_blank" class="text-dark text-decoration-none" href="{{asset("storage/files/sayfalar_files/$hakkimizda->pdf2")}}">Pdf İndir (8 Mb)</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

</x-front-app>
