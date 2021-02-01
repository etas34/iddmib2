<x-front-app>


    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}"  alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">Etkinlikler</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>Güncel etkinliklerimizi keşfedin!</h4>

{{--                    <button class="btn btn-link text-dark ml-auto text-decoration-none">--}}
{{--                        Daha fazla bilgi <img class="ml-2" src="{{asset('assets/images/arrow-down-dark.svg')}}" width="22" height="22" alt="..." />--}}
{{--                    </button>--}}

                </div>
            </div>
        </div>
        <hr class="mb-5" />

        <div class="container mb-5">
            <div class="row text-center">
                <div class="col-12">
                    <button class="btn btn-danger mb-2 mr-2" data-mixitup-control data-filter="all">Tüm Etkinlikler</button>
                    <br />
                    @foreach($sektor as $key=>$value )
                    <button class="btn btn-outline-secondary mb-2 mr-2" data-mixitup-control data-filter=".sektor_{{$value->id}}">
                        {{$value->baslik}}</button>
                    @endforeach
                   <br />
                    @foreach(config('constants.kategori')  as $key=>$value)
                        <button class="btn btn-outline-secondary mb-2 mr-2" data-mixitup-control data-filter=".kategori_{{$key}}">
                            {{$value}}</button>
                    @endforeach
{{--                    <br />--}}
{{--                    <button class="btn btn-outline-secondary mb-2 mr-2">İhracat Ödül Töreni</button>--}}
{{--                    <button class="btn btn-outline-secondary mb-2 mr-2">Yarışma</button>--}}
{{--                    <button class="btn btn-outline-secondary mb-2 mr-2">ARGE</button>--}}
{{--                    <button class="btn btn-outline-secondary mb-2 mr-2">Diğer</button>--}}

                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="mixitup row row-cols-sm-2 row-cols-sm-3">
                @foreach($etkinlik as $key=>$value)
                <div class="col-12 mb-3 mix {{'sektor_'.$value->sektor_id}} {{'kategori_'.$value->kategori_id}}">
                    <div class="card rounded-lg">
                        <div class="card-header text-danger bg-transparent">{{\DateTime::createFromFormat("Y-m-d", $value->tarih)->format("d/m/Y")}}-{{\DateTime::createFromFormat("Y-m-d", $value->tarih2)->format("d/m/Y")}}</div>
                        <div class="card-body">
                            <h4>{{$value->baslik}}
                                <br>
                                {{$value->altbaslik}}
                            </h4>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 text-secondary d-flex justify-content-between">
                            <span> {{\App\Models\Sektor::find($value->sektor_id)->baslik}}</span>
                            <span>{{config('constants.kategori.'.$value->kategori_id)}}</span>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>

    </main>


</x-front-app>
