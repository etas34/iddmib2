<x-front-app>


    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">Devlet Destekleri</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>{{$devletdestek->altbaslik}}</h4>

                </div>
            </div>
        </div>
        <hr class="mb-5" />

        <div class="container mb-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">{{$devletdestek->metin_baslik}}
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="{{asset("storage/images/sayfalar_images/$devletdestek->image")}}" alt="..." class="img-fluid mb-4" />
                    {!! $devletdestek->metin !!}
                    <a href="{{$devletdestek->link}}" class="text-decoration-none text-light d-flex justify-content-between bg-red p-3 text-light w-100">
                        <div class="d-flex  align-items-center">
{{--                            <img src="{{asset('assets/images/doc-light.svg')}}" class="mr-3" width="46" alt="..." />--}}
                            <h4 class="m-0">
                                {{$devletdestek->link_altbaslik}} <br />
                                {{$devletdestek->link_baslik}}
                            </h4>
                        </div>
                        <img src="{{asset('assets/images/arrow-right-light.svg')}}" width="46" alt="..." />
                    </a>
                </div>
            </div>
        </div>

    </main>



</x-front-app>
