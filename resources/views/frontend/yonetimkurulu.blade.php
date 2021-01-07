<x-front-app>


    <main class="detail">
        <div class="position-relative mb-4">
            <img  src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">Yönetim ve Denetim Kurulu</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>Rum intio veribus core adis exerum, vel el mollabo...</h4>



                </div>
            </div>
        </div>
        <hr class="mb-5" />

        <!-- sectors start -->
        <div class="sectors mb-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12">
                        <h3 class="text-danger font-weight-bold">Yönetim Kurulu</h3>
                    </div>
                </div>
                <div class="row row-cols-sm-2 row-cols-md-3 text-center text-sm-left">



                    @foreach($kadro as $key=>$value)

                        @if($value->kadro == 'Yönetim Kurulu')
                    <div class="col-12 mb-3">
                        <a href="#"><img class="img-fluid mb-3"  src="{{asset("storage/images/kadro_images/$value->resim")}}" alt="..." /></a>
                        <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">{{$value->ad_soyad}}</a></h4>
                        <h5><a class="text-secondary text-decoration-none" href="#">{{$value->unvan}}</a></h5>
                    </div>
                        @endif

                    @endforeach


                </div>
            </div>
        </div>
        <!-- sectors end -->
        <hr class="mb-5" />

        <!-- sectors start -->
        <div class="sectors mb-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12">
                        <h3 class="text-danger font-weight-bold">Denetim Kurulu</h3>
                    </div>
                </div>
                <div class="row row-cols-sm-2 row-cols-md-3 text-center text-sm-left">


                    @foreach($kadro as $key=>$value)

                        @if($value->kadro == 'Denetim Kurulu')
                            <div class="col-12 mb-3">
                                <a href="#"><img class="img-fluid mb-3"  src="{{asset("storage/images/kadro_images/$value->resim")}}" alt="..." /></a>
                                <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">{{$value->ad_soyad}}</a></h4>
                                <h5><a class="text-secondary text-decoration-none" href="#">{{$value->unvan}}</a></h5>
                            </div>
                        @endif

                    @endforeach




                </div>
            </div>
        </div>
        <!-- sectors end -->
    </main>

</x-front-app>
