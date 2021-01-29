<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Site Başlığı</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.inovasyon.update',$inovasyon)}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="row">

                            @if($inovasyon->ana_resim)
                                <div class="form-group col-md-6">
                                    <label for="file">Anasayfa Seçili Resim</label>
                                    <div id="file"><img src="{{asset("storage/images/inovasyon_images/$inovasyon->ana_resim")}}"
                                                        width="300" alt="..."></div>
                                </div>
                            @endif

                                @if($inovasyon->detay_resim)
                                    <div class="form-group col-md-6">
                                        <label for="file">Anasayfa Seçili Resim</label>
                                        <div id="file"><img src="{{asset("storage/images/inovasyon_images/$inovasyon->detay_resim")}}"
                                                            width="300" alt="..."></div>
                                    </div>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Anasayfa Resim ( 1200x600 )</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="ana_resim" class="custom-file-input" id="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>

                            </div>
                            <span id="error_foto"></span>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Detay Resim</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="detay_resim" class="custom-file-input" >
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>

                            </div>

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

                                                        <label for="cat_name">Başlık ({{$value}})</label>
                                                        <input @if($key == 'tr') required @endif type="text"
                                                               name="baslik[{{$key}}]"
                                                               class="form-control" id="cat_name"
                                                               value=" {{$inovasyon->getTranslations('baslik')[$key] ?? ''}} "
                                                        >
                                                    </div>

                                                    <div class="form-group">

                                                        <label for="cat_name">Alt Başlık ({{$value}})</label>
                                                        <input @if($key == 'tr') required @endif type="text"
                                                               name="alt_baslik[{{$key}}]"
                                                               class="form-control" id="cat_name"
                                                               value=" {{$inovasyon->getTranslations('alt_baslik')[$key] ?? ''}} "
                                                        >
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Metin Başlığı ({{$value}})</label>
                                                        <input @if($key == 'tr') required
                                                               @endif value="{{$inovasyon->getTranslations('metin_baslik')[$key] ?? ''}}"
                                                               class="form-control"
                                                               name="metin_baslik[{{$key}}]"
                                                        >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Metin İçeriği ({{$value}})</label>
                                                        <textarea @if($key == 'tr') required
                                                                  @endif  id="summernote_{{$key}}"
                                                                  name="metin[{{$key}}]"
                                                        >{{$inovasyon->getTranslations('metin')[$key] ?? ''}}</textarea>

                                                    </div>
                                                    @if($inovasyon->id!=9 && $inovasyon->id!=10)
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>İnovasyon Website Başlığı ({{$value}})</label>
                                                            <input value="{{$inovasyon->getTranslations('link_baslik')[$key] ?? ''}}"
                                                                   class="form-control"
                                                                   name="link_baslik[{{$key}}]"
                                                            >
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>İnovasyon Website Alt Başlığı ({{$value}})</label>
                                                            <input value="{{$inovasyon->getTranslations('link_altbaslik')[$key] ?? ''}}"
                                                                   class="form-control"
                                                                   name="link_altbaslik[{{$key}}]"
                                                            >
                                                        </div>
                                                    </div>
                                                        @endif
                                                </div>
                                            @endforeach

                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                @if($inovasyon->id!=9 && $inovasyon->id!=10)
                                <div class="form-group">
                                    <label>İnovasyon Websitesi</label>
                                    <input type="text" value="{{$inovasyon->link}}" name="link" class="form-control">
                                </div>
                                @endif
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

                        if (this.width != 1200 && this.height != 600) {

                            $('#error_foto').html('<label class="text-danger">Lütfen 1200 X 600 boyutlarında yükleyiniz</label>');
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

            });
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

