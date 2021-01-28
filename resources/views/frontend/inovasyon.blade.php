<x-front-app>

    <!-- header end -->

    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">{{$inovasyon->baslik}}</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>{{$inovasyon->alt_baslik}}</h4>
                </div>
            </div>
        </div>
        <hr class="mb-5" />

        <div class="container mb-5">

            <div class="row">
                <div class="col-12">
                    <img src="{{asset("storage/images/inovasyon_images/$inovasyon->detay_resim")}}" width="100%" alt="..." class="img-fluid mb-4" />

                        <h3 class="text-danger font-weight-bold">{{$inovasyon->metin_baslik}}</h3>

                        {!! $inovasyon->metin !!}
                    <a target="_blank" href="{{$inovasyon->link}}" class="text-decoration-none text-light d-flex justify-content-between bg-red p-3 text-light w-100">
                        <div class="d-flex  align-items-center">
                            <img src="{{asset('assets/images/doc-light.svg')}}" class="mr-3" width="46" alt="..." />
                            <h4 class="m-0">
                                {{$inovasyon->link_baslik}} <br />
                                {{$inovasyon->link_altbaslik}}
                            </h4>
                        </div>
                        <img src="{{asset('assets/images/arrow-right-light.svg')}}" width="46" alt="..." />
                    </a>
                </div>
            </div>
        </div>

    </main>

</x-front-app>
