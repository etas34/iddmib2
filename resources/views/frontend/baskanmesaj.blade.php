<x-front-app>

    <!-- header end -->

    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">{{$bm->baslik}}</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>{{$bm->alt_baslik}}</h4>


                </div>
            </div>
        </div>
        <hr class="mb-5" />

        <div class="container mb-5">

            <div class="row">
                <div class="col-12">
                    <img src="{{asset("storage/images/baskan_images/$bm->image")}}" alt="..." class="img-fluid mb-4" />

                    <h3 class="text-danger font-weight-bold">{{$bm->metin_baslik}}</h3>

                    {!! $bm->metin !!}

                </div>
            </div>
        </div>

    </main>

</x-front-app>
