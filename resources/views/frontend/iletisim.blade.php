<x-front-app>

    <main class="detail">
        <div class="position-relative mb-4">
            <img src="{{asset('assets/images/aboutBg.png')}}" alt="" class="img-fluid" />
            <div class="container">
                <div class="bread"><h1 class="text-white">İletişim</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <h4>Bilgi ve önerileriniz için, bize ulaşın!</h4>



                </div>
            </div>
        </div>
        <hr class="mb-5" />

        <div class="container mb-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-danger font-weight-bold">Adres Bilgileri</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <img src="{{asset('assets/images/contact.svg')}}" alt="..." class="img-fluid" />
                </div>
                <div class="col-12 col-sm-6">
                    <h5>İstanbul Demir ve Demir Dışı Metaller İhracatçıları Birliği</h5>
                    <p>Sanayi Cad. No:3, Dış Ticaret Kompleksi
                        A Blok, Çobançeşme Mevkii 34196
                        Bahçelievler / İSTANBUL</p>
                    <p>
                        +90 (212) 454 00 00 (Pbx) <br />
                        iddmib@immib.org.tr
                    </p>
                    <a class="text-danger text-decoration-none font-weight-bold" href="#">Adrese Git</a>
                </div>
            </div>
        </div>
        <hr class="mb-5" />
        <form method="post" action="{{route('iletisim_gonder')}}">
            @csrf
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="text-danger">İletişim ve Öneri Formu</h2>
                    <h4 class="text-secondary">Firma güvencesiyle!</h4>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <textarea required name="mesaj" class="form-control bg-transparent" rows="4" placeholder="İletişim Konusu"></textarea>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <div class="col-12">
                          <input  type="text" name="isim_soyisim" class="form-control bg-transparent" placeholder="İsim Soyisim" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <input required type="email" name="email" class="form-control bg-transparent" placeholder="E-Posta" />
                        </div>
                    </div>
                    <div class="row mb-4 mb-md-0">
                        <div class="col-12">
                            <input required type="tel" name="tel" class="form-control bg-transparent" placeholder="Telefon" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <textarea required name="adres" class="form-control h-100 bg-transparent"  placeholder="Adres"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-danger">GÖNDER</button>
                </div>
            </div>
        </div>
        </form>
{{--        <hr class="mb-5" />--}}

{{--        <div class="container mb-5">--}}
{{--            <div class="row mb-4">--}}
{{--                <div class="col-12">--}}
{{--                    <h3 class="text-danger font-weight-bold">İDDMİB Basın Kiti</h3>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row text-center justify-content-center">--}}

{{--                <div class="col-12 col-sm-6 mb-3">--}}
{{--                    <div class="card py-5 px-2">--}}
{{--                        <h4 class="text-dark font-weight-bold"> İDDMİB   <br />--}}
{{--                            Logotype Paketi--}}
{{--                        </h4>--}}
{{--                        <h5><a class="text-dark text-decoration-none" href="#">Zip İndir (8 Mb)</a></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-sm-6 mb-3">--}}
{{--                    <div class="card py-5 px-2">--}}
{{--                        <h4 class="text-dark font-weight-bold"> İDDMİB   <br />--}}
{{--                            Sektörler Görseller--}}
{{--                        </h4>--}}
{{--                        <h5><a class="text-dark text-decoration-none" href="#">Pdf İndir (8 Mb)</a></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-sm-6 mb-3">--}}
{{--                    <div class="card py-5 px-2">--}}
{{--                        <h4 class="text-dark font-weight-bold"> İDDMİB   <br />--}}
{{--                            Sektörler Görseller--}}
{{--                        </h4>--}}
{{--                        <h5><a class="text-dark text-decoration-none" href="#">Pdf İndir (8 Mb)</a></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-sm-6 mb-3">--}}
{{--                    <div class="card py-5 px-2">--}}
{{--                        <h4 class="text-dark font-weight-bold"> İDDMİB   <br />--}}
{{--                            Sektörler Görseller--}}
{{--                        </h4>--}}
{{--                        <h5><a class="text-dark text-decoration-none" href="#">Pdf İndir (8 Mb)</a></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--        <hr class="mb-5" />--}}

{{--        <section class="container py-5" id="sss">--}}
{{--            <h2 class="text-danger mb-4">Sıkça Sorulan Sorular</h2>--}}
{{--            <div class="accordion" id="accordionExample">--}}
{{--                <div class="card mb-4">--}}
{{--                    <div id="headingOne" class="card-header p-0 bg-transparent">--}}
{{--                        <h2 class="mb-0">--}}
{{--                            <button class="btn btn-link btn-block text-left  px-2 py-3  text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">--}}
{{--                                Araştırma-Geliştirme Destekleri Hakkında Bilgi Verebilir misiniz?--}}
{{--                            </button>--}}
{{--                        </h2>--}}
{{--                    </div>--}}

{{--                    <div id="collapseOne" class="collapse" data-parent="#accordionExample">--}}
{{--                        <div class="card-body">--}}
{{--                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon--}}
{{--                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice--}}
{{--                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card mb-4">--}}
{{--                    <div id="headingTwo" class="card-header p-0 bg-transparent">--}}
{{--                        <h2 class="mb-0">--}}
{{--                            <button class="btn btn-link btn-block text-left collapsed px-2 py-3 text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                                2023 Türkiye İhracat Stratejisi nedir?--}}
{{--                            </button>--}}
{{--                        </h2>--}}
{{--                    </div>--}}
{{--                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">--}}
{{--                        <div class="card-body">--}}
{{--                            <p>--}}
{{--                                2023 Türkiye İhracat Stratejisi, Türkiye’nin ulusal strateji ve politika dökümanlarında öngörülen--}}
{{--                                çerçeveye uygun olarak, Ticaret Bakanlığı’nın koordinasyonunda, Ticaret Bakanlığı, Kalkınma Bakanlığı--}}
{{--                                ve Türkiye İhracatçılar Meclisi (TİM) işbirliği içinde hazırlanmıştır.--}}
{{--                            </p>--}}
{{--                            <p>--}}
{{--                                2023 Türkiye İhracat Stratejisinin Vizyonu, “Cumhuriyetimizin 100. kuruluş yıldönümü olan 2023 yılında--}}
{{--                                500 milyar dolar ihracata ulaşarak, ülkemizin dünya ticaretinde lider ülkeler arasında yer almasının--}}
{{--                                sağlanması” olarak belirlenmiştir.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card mb-4">--}}
{{--                    <div id="headingThree" class="card-header p-0 bg-transparent">--}}
{{--                        <h2 class="mb-0">--}}
{{--                            <button class="btn btn-link btn-block text-left collapsed px-2 py-3 text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                                Rest harchil moluptatur rest harchil moluptatur?--}}
{{--                            </button>--}}
{{--                        </h2>--}}
{{--                    </div>--}}
{{--                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">--}}
{{--                        <div class="card-body">--}}
{{--                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon--}}
{{--                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice--}}
{{--                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

    </main>
</x-front-app>
