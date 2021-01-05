<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12 form-group">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sektor Düzenle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.sektor.update',$sektor)}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">

                        @if($sektor->image)
                            <div class="form-group">
                                <label for="file">Seçili resim:</label>
                                <div id="file"> <img src="{{asset("storage/images/sektor_images/$sektor->image")}}" width="300"  alt="..."></div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputFile">Sektör Resmi (350 X 233 )</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input  type="file" name="image" class="custom-file-input" id="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>

                            </div>
                            <span id="error_foto"></span>

                        </div>


                        <div class="row">
                            <div class="col-12">
                                <!-- Custom Tabs -->
                                <div class="card">
                                    <div class="card-header d-flex p-0">
                                        <h3 class="card-title p-3">Translate</h3>
                                        <ul class="nav nav-pills ml-auto p-2">
                                            @foreach($langs as $key=>$value)
                                                <li class="nav-item"><a class="nav-link @if($key == 'tr') active @endif"
                                                                        href="#{{$key}}"
                                                                        data-toggle="tab">{{$value}}</a></li>

                                            @endforeach

                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            @foreach($langs as $key=>$value)
                                                <div class="tab-pane @if($key == 'tr') active @endif" id="{{$key}}">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <label for="cat_name">Sektor Başlığı ({{$value}})</label>
                                                        <input  type="text" name="baslik[{{$key}}]"
                                                               value=" @if (array_key_exists($key,$sektor->getTranslations('baslik'))) {{$sektor->getTranslations('baslik')[$key]}} @endif"      class="form-control" id="cat_name">
                                                        </div>


                                                        <div class="col-md-6">
                                                        <label>Sektor Alt Başlık ({{$value}})</label>
                                                        <input  name="alt_baslik[{{$key}}]" class="form-control" value=" @if (array_key_exists($key,$sektor->getTranslations('alt_baslik'))) {{$sektor->getTranslations('alt_baslik')[$key]}} @endif"
                                                        >

                                                        </div>

                                                        <div class="col-md-12 form-group">
                                                        <label for="cat_name">Sektor Metin Başlığı ({{$value}})</label>
                                                        <input  type="text" name="metin_baslik[{{$key}}]"
                                                               value=" @if (array_key_exists($key,$sektor->getTranslations('metin_baslik'))) {{$sektor->getTranslations('metin_baslik')[$key]}} @endif"      class="form-control" id="cat_name">
                                                        </div>
                                                        <div class="col-md-12 form-group">

                                                        <label>Sektor İçeriği ({{$value}})</label>
                                                        <textarea id="summernote_{{$key}}" name="aciklama[{{$key}}]"
                                                        >  @if (array_key_exists($key,$sektor->getTranslations('aciklama'))) {{$sektor->getTranslations('aciklama')[$key]}} @endif</textarea>

                                                    </div>
                                                        <div class="col-md-6">
                                                            <label>Sektor Link Başlık({{$value}})</label>
                                                            <input required name="sektor_link_baslik[{{$key}}]"
                                                                   class="form-control"
                                                                   value=" @if (array_key_exists($key,$sektor->getTranslations('sektor_link_baslik'))) {{$sektor->getTranslations('sektor_link_baslik')[$key]}} @endif"
                                                            >
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Sektor Link Alt Başlık({{$value}})</label>
                                                            <input required name="sektor_link_altbaslik[{{$key}}]"
                                                                   class="form-control"
                                                                   value=" @if (array_key_exists($key,$sektor->getTranslations('sektor_link_altbaslik'))) {{$sektor->getTranslations('sektor_link_altbaslik')[$key]}} @endif"

                                                            >
                                                        </div>
                                                    </div>

                                                    </div>
                                            @endforeach

                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- ./card -->
                                <div class="card bg-light mb-3">
                                    <div class="card-header">
                                        <h4 > Sektör Bilgileri </h4>
                                    </div>
                                    <div class="card-body">


                                        <div class="row">

                                            <div class="col-md-12 form-group">
                                                <label for="exampleInputFile">Sektör Resmi (1920 X 1080 )</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input  type="file" name="sektor_resim" class="custom-file-input" id="foto2" required>
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>

                                                </div>
                                                <span id="error_foto2"></span>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            @if($sektor->sektor_resim)
                                            <div class="col-md-12 form-group">

                                                    <div class="form-group">
                                                        <label for="file">Seçili resim:</label>
                                                        <div id="file">
                                                            <img src="{{asset("storage/images/sektor_resim/$sektor->sektor_resim")}}"
                                                                 width="300"
                                                                 alt="...">
                                                        </div>

                                                    </div>

                                            </div>
                                            @endif
                                            <div class="col-md-12 form-group">
                                                <label for="sktrlnk">Sektör Link</label>
                                                <input  type="text" value="{{$sektor->sektor_link}}" id="sktrlink" name="sektor_link" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-light mb-3">
                                    <div class="card-header">
                                        <h4> Aliminyum GTİP Listesi ve Tanıtım </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">


                                            <div class="form-group col-md-6">


                                                <label for="exampleInputFile">Sektör GTİP Listesi</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input  type="file" name="gtip_pdf" accept="application/pdf"
                                                               class="custom-file-input"
                                                               id="foto">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>

                                                </div>
                                                @if($sektor->gtip_pdf)
                                                    <div class="form-group">
                                                        <label>Seçili GTIP pdf:</label>
                                                        <div class="custom-file">
                                                            <a target="_blank"
                                                               href="{{asset("storage/files/gtip_pdf/$sektor->gtip_pdf")}}"> {{$sektor->gtip_pdf}}
                                                                <i class="nav-icon fa fa-file-pdf"></i></a>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="form-group col-md-6">


                                                <label for="exampleInputFile">Sektör Tanıtım Broşürü</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input  type="file"
                                                               name="tanitim_pdf"
                                                               accept="application/pdf"
                                                               class="custom-file-input"
                                                               id="foto">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>

                                                </div>
                                                @if($sektor->tanitim_pdf)
                                                    <div class="form-group">
                                                        <label>Tanıtım PDF:</label>
                                                        <div class="custom-file">
                                                            <a target="_blank"
                                                               href="{{asset("storage/files/tanitim_pdf/$sektor->tanitim_pdf")}}"> {{$sektor->tanitim_pdf}}
                                                                <i class="nav-icon fa fa-file-pdf"></i></a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" id="edit" class="btn btn-primary float-right">Kaydet</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>


    @push('scripts')
        <script>

            var _URL2 = window.URL || window.webkitURL;
            $("#foto").change(function (e) {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    var objectUrl = _URL2.createObjectURL(file);
                    img.onload = function () {

                        if (this.width != 350 && this.height != 233) {

                            $('#error_foto').html('<label class="text-danger">Lütfen 350 X 233 boyutlarında yükleyiniz</label>');
                            $('#foto').addClass('has-error');
                            $('#edit').attr('disabled', true);
                        } else {

                            $('#error_foto').html('<label class="text-success"></label>');
                            $('#foto').removeClass('has-error');
                            $('#edit').attr('disabled', false);

                        }


                        _URL2.revokeObjectURL(objectUrl);
                    };
                    img.src = objectUrl;
                }

            })

            var _URL3 = window.URL || window.webkitURL;
            $("#foto2").change(function (e) {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    var objectUrl = _URL3.createObjectURL(file);
                    img.onload = function () {

                        if (this.width != 1920 && this.height != 280) {

                            $('#error_foto2').html('<label class="text-danger">Lütfen 1920 X 1080 boyutlarında yükleyiniz</label>');
                            $('#foto2').addClass('has-error');
                            $('#edit2').attr('disabled', true);
                        } else {

                            $('#error_foto2').html('<label class="text-success"></label>');
                            $('#foto2').removeClass('has-error');
                            $('#edit').attr('disabled', false);

                        }


                        _URL2.revokeObjectURL(objectUrl);
                    };
                    img.src = objectUrl;
                }

            })

            $(function () {
                @foreach($langs as $key=>$lang)
                $("#summernote_{{{$key}}}").summernote({
                    height: 300
                })
                @endforeach
            })


        </script>

    @endpush
</x-admin-app>

