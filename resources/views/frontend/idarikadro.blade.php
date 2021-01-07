<x-front-app>


    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid"/>
            <div class="container">
                <div class="bread"><h1 class="text-white">İdari Kadro</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>Rum intio veribus core adis exerum, vel el mollabo...</h4>


                </div>
            </div>
        </div>
        <hr class="mb-5"/>

        <!-- sectors start -->
        <div class="sectors mb-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12">
                        <h3 class="text-danger font-weight-bold">Ekibimiz ve İletişim Bilgileri</h3>
                    </div>
                </div>
                <div class="row row-cols-sm-2 row-cols-md-3 text-center text-sm-left">

                    @foreach($kadro as $key=>$value)
                        @if($value->kadro ==  'İdari Kadro')
                            <div class="col-12 mb-3">
                                <a href="#"><img class="img-fluid mb-3" src="{{asset("storage/images/kadro_images/$value->resim")}}"
                                                 alt="..."/></a>
                                <h4><a class="text-dark font-weight-bold text-decoration-none" href="#">{{$value->ad_soyad}}</a>
                                </h4>
                                <p><a class="text-secondary text-decoration-none" href="#">{{\App\Models\Sektor::find($value->sektor_id)->baslik}} Sektör Şubesi <br/>
                                    {{$value->unvan}}
                                <div class="w-100"></div>
                                {{$value->tel}} <br/>
                                {{$value->email}}
                                </p>
                            </div>
                        @endif
                            @endforeach

                </div>
            </div>
        </div>

    </main>


</x-front-app>
