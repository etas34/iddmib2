<x-front-app>

    <!-- header end -->

    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">{{$ir->baslik}}</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>{{$ir->altbaslik}}</h4>


                </div>
            </div>
        </div>
        <hr class="mb-5" />

        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset("storage/images/sayfalar_images/$ir->image")}}" alt="..." class="img-fluid mb-4" />
                    <h3 class="text-danger font-weight-bold">{{$ir->}}</h3>
                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                    <p>Curabitur aliquet quam id dui posuere blandit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh.</p>
                    <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
                    <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>

                    <a href="#" class="text-decoration-none text-light d-flex justify-content-between bg-red p-3 text-light w-100">
                        <div class="d-flex  align-items-center">
                            <img src="{{asset('assets/images/doc-light.svg')}}" class="mr-3" width="46" alt="..." />
                            <h4 class="m-0">
                                Türkiye İhracatçılar Meclisi <br />
                                İhracat Rotası Websitesi
                            </h4>
                        </div>
                        <img src="{{asset('assets/images/arrow-right-light.svg')}}" width="46" alt="..." />
                    </a>
                </div>
            </div>
        </div>

    </main>

</x-front-app>
