<x-front-app>


    <main class="detail">
        <div class="position-relative mb-4">
            <img  src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">İhracat Raporları</h1></div>
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

        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="position-relative">
                        <img src="{{asset('assets/images/raporbg.svg')}}" alt="..." class="img-fluid"/>
                        <a target="_blank" href="{{asset("storage/files/ihracat_files/$ir_first->pdf")}}"
                           class="text-decoration-none text-light d-flex justify-content-between bg-red position-absolute p-3 text-light w-100"
                           style="bottom:0;">
                            <div class="d-flex  align-items-center">
                                <img src="{{asset('assets/images/doc-light.svg')}}" class="mr-3" width="46" alt="..."/>
                                <h4 class="m-0"> {{ $ir_first->baslik }}
                                </h4>
                            </div>
                            <img src="{{asset('assets/images/arrow-right-light.svg')}}" width="46" alt="..."/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mb-5" />

        <div class="container mb-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Geçmiş Dönem İhracat Raporları</h3>
                </div>
            </div>
            <div class="row">
                @foreach($ir as $key=>$value)
                    @if($value  != $ir_first )
                        <div class="col-12 mb-3">
                            <a target="_blank" href="{{asset("storage/files/ihracat_files/$value->pdf")}}"
                               class="text-dark text-decoration-none d-flex justify-content-between align-items-center border bg-transparent py-2 px-3 rounded-lg">
                                <h5 class="mb-0">{{$value->baslik}}</h5>
                                <img src="{{asset('assets/images/arrow-right-red.svg')}}" height="36" alt="..."/>
                            </a>
                        </div>
                    @endif
                @endforeach


            </div>
            <div class="row">
                <div class="col-12">
                    <h6 class="text-secondary">Quisque velit nisi, pretium ut lacinia in, elementum id enim</h6>
                    <a class="text-danger text-decoration-none font-weight-bold" href="#">www.turkishmetals.org/arsiv</a>
                </div>
            </div>
        </div>
    </main>


</x-front-app>
