<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yeni sektor Ekle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.sektor.store')}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">


                        <div class="form-group">
                            <label for="exampleInputFile">Sektör Banner (350 X 233 )</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input required type="file" name="image" class="custom-file-input" id="foto">
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
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="cat_name">Sektor Başlığı ({{$value}})</label>
                                                            <input required type="text" name="baslik[{{$key}}]"
                                                                   class="form-control" id="cat_name">

                                                        </div>
                                                        <div class="col-md-6">


                                                            <label>Sektor Alt Başlık ({{$value}})</label>
                                                            <input required name="alt_baslik[{{$key}}]"
                                                                   class="form-control"
                                                            >
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Sektor Metin Başlığı({{$value}})</label>
                                                            <input required name="metin_baslik[{{$key}}]"
                                                                   class="form-control">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label>Sektor Metin İçeriği ({{$value}})</label>
                                                            <textarea id="summernote_{{$key}}" class="form-control"
                                                                      name="aciklama[{{$key}}]"
                                                            > </textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Sektor Link Başlık({{$value}})</label>
                                                            <input required name="sektor_link_baslik[{{$key}}]"
                                                                   class="form-control"
                                                            >
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Sektor Link Alt Başlık({{$value}})</label>
                                                            <input required name="sektor_link_altbaslik[{{$key}}]"
                                                                   class="form-control"
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
                                        <h4> Sektör Bilgileri </h4>
                                    </div>
                                    <div class="card-body">


                                        <div class="row form-group">

                                            <div class="col-md-12">
                                                <label for="exampleInputFile">Sektör Link Resmi (1920 X 1080 )</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="sektor_resim" class="custom-file-input" required
                                                               id="foto2">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>

                                                </div>
                                                <span id="error_foto2"></span>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="sktrlnk">Sektör Link</label>
                                                <input required type="text" id="sktrlink" name="sektor_link"
                                                       class="form-control">
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
                                                        <input required type="file" name="gtip_pdf" accept="application/pdf"
                                                               class="custom-file-input"
                                                               id="foto">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="form-group col-md-6">


                                                <label for="exampleInputFile">Sektör Tanıtım Broşürü</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input required type="file" name="tanitim_pdf" accept="application/pdf"
                                                               class="custom-file-input"
                                                               id="foto">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>

                                                </div>

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

