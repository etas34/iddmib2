<x-front-app>


    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">{{$haber->baslik}}</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>{{$haber->alt_baslik}}</h4>

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
                    <img src="{{asset("storage/images/haber_images/$haber->detay_resim")}}"   width="100%"  alt="..." class="img-fluid mb-4 text-center" />


                    <h3 class="text-danger font-weight-bold">{{$haber->metin_altbaslik}}</h3>
                    {!! $haber->aciklama !!}


                </div>
            </div>
        </div>

    </main>

</x-front-app>
