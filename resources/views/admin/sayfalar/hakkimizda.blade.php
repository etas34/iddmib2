<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hakkımızda</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.sayfalar.hakkimizda.update',$hakkimizda)}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">

                        @if($hakkimizda->image)
                            <div class="form-group">
                                <label for="file">Seçili resim:</label>
                                <div id="file"><img src="{{asset("storage/images/sayfalar_images/$hakkimizda->image")}}"
                                                    width="300" alt="..."></div>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="exampleInputFile">Başlık Resmi (1200 X 470 )</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="foto">
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
                                                    <div class="form-group">

                                                        <label for="cat_name">Alt Başlık ({{$value}})</label>
                                                        <input @if($key == 'tr') required @endif type="text" name="altbaslik[{{$key}}]"
                                                               value=" @if (array_key_exists($key,$hakkimizda->getTranslations('altbaslik'))) {{$hakkimizda->getTranslations('altbaslik')[$key]}} @endif"
                                                               class="form-control" id="cat_name"
                                                               >
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="cat_name">Metin Başlık ({{$value}})</label>
                                                        <input @if($key == 'tr') required @endif type="text" name="metinbaslik[{{$key}}]"
                                                               value=" @if (array_key_exists($key,$hakkimizda->getTranslations('metinbaslik'))) {{$hakkimizda->getTranslations('metinbaslik')[$key]}} @endif"
                                                               class="form-control"  >
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="cat_name">Metin İçerik ({{$value}})</label>
                                                        <textarea @if($key == 'tr') required @endif id="summernote_{{$key}}" name="metin[{{$key}}]">
                                                            @if (array_key_exists($key,$hakkimizda->getTranslations('metin'))) {{$hakkimizda->getTranslations('metin')[$key]}} @endif
                                                        </textarea>
                                                    </div>


{{--                                                    <div class="form-group">--}}
{{--                                                        <label>Açıklama ({{$value}})</label>--}}
{{--                                                        <textarea id="summernote_{{$key}}" name="description[{{$key}}]"--}}
{{--                                                        ></textarea>--}}

{{--                                                    </div>--}}
                                                </div>
                                            @endforeach

                                        </div>
                                        <!-- /.tab-content -->
                                        <div class="row">


                                            <div class="form-group col-md-6">


                                                <label for="exampleInputFile">İDDMİB Hakkında Kanun</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input  type="file" name="pdf1" accept="application/pdf"
                                                                class="custom-file-input">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>

                                                </div>
                                                @if($hakkimizda->pdf1)
                                                    <div class="form-group">
                                                        <label>Seçili PDF:</label>
                                                        <div class="custom-file">
                                                            <a target="_blank"
                                                               href="{{asset("storage/files/sayfalar_files/$hakkimizda->pdf1")}}">İDDMİB Hakkında Kanun
                                                                <i class="nav-icon fa fa-file-pdf"></i></a>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="form-group col-md-6">


                                                <label for="exampleInputFile">İDDMİB Hakkında Yönetmelik</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input  type="file"
                                                                name="pdf2"
                                                                accept="application/pdf"
                                                                class="custom-file-input">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>

                                                </div>
                                                @if($hakkimizda->pdf2)
                                                    <div class="form-group">
                                                        <label>Seçili PDF:</label>
                                                        <div class="custom-file">
                                                            <a target="_blank"
                                                               href="{{asset("storage/files/sayfalar_files/$hakkimizda->pdf2")}}"> İDDMİB Hakkında Yönetmelik
                                                                <i class="nav-icon fa fa-file-pdf"></i></a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- ./card -->
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

                        if (this.width != 1920 && this.height != 900) {

                            $('#error_foto').html('<label class="text-danger">Lütfen 1920 X 900 boyutlarında yükleyiniz</label>');
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

