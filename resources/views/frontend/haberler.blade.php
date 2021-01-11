<x-front-app>


    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">Tüm Haberler</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>Sic Mundus Creatus Est</h4>

{{--                    <button class="btn btn-link text-dark ml-auto text-decoration-none">--}}
{{--                        Daha falza bilgi <img class="ml-2" src="{{asset('assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />--}}
{{--                    </button>--}}

                </div>
            </div>
        </div>
        <hr class="mb-5" />


                    <div class="sectors mb-5">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h3 class="text-danger font-weight-bold">Haberler</h3>
                                    <h5>Quisque velit nisi, pretium ut lacinia in, elementum id enim</h5>
                                </div>
                            </div>
                            <div class="row row-cols-sm-2">
                                @foreach($haber as $key=>$value)
                                    <div class="col-12 mb-3 mb-md-5">
                                        <a href="{{route('haber',$value)}}"><img class="img-fluid mb-3" src="{{asset("storage/images/haber_images/$value->image")}}" alt="..." /></a>
                                        <h5><a class="d-block text-secondary text-decoration-none small " href="{{route('haber',$value)}}">{{$value->tarih}}</a></h5>
                                        <h4><a href="{{route('haber',$value)}}" class="text-dark font-weight-bold text-decoration-none" href="#">{{$value->baslik}}</a></h4>
                                        <h5><a class="text-secondary text-decoration-none" href="{{route('haber',$value)}}">{{$value->alt_baslik}}</a></h5>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>


    </main>

</x-front-app>
