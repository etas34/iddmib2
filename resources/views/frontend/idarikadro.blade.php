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
                    <h4>İDDMİB idari kadrosunu tanıyın!</h4>


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
                                <a ><img class="img-fluid mb-3" src="{{asset("storage/images/kadro_images/$value->resim")}}"
                                                 alt="..."/></a>
                                <h4><a class="text-dark font-weight-bold text-decoration-none">{{$value->ad_soyad}}</a>
                                </h4>
                                <p><a class="text-secondary text-decoration-none">
                                        @if($value->sektor_id!=null)
                                            @foreach(explode(",",$value->sektor_id) as $sektor)
                                                @if($sektor==999)
                                                    Metaller Şubesi <br/>
                                                @else
                                                    {{\App\Models\Sektor::find($sektor)->baslik}} Sektör Şubesi <br/>
                                                @endif


                                            @endforeach
                                        @endif
                                    {{$value->unvan}}
                                <div class="w-100"></div>
                                {{$value->tel}} <br/>
                                {{$value->email}}
                                </p></a>
                            </div>
                        @endif
                            @endforeach

                </div>
            </div>
        </div>

    </main>


</x-front-app>
