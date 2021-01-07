<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Faaliyet Düzenle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.faliyet.update',$faliyet)}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">

                        @if($faliyet->image)
                            <div class="form-group">
                                <label for="file">Seçili resim:</label>
                                <div id="file"><img src="{{asset("storage/images/faliyet_images/$faliyet->image")}}"
                                                    width="300" alt="..."></div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputFile">Faliyet Resmi (650 X 350 )</label>
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

                                                        <label for="cat_name">Başlık ({{$value}})</label>
                                                        <input @if($key == 'tr') required @endif type="text"
                                                               name="baslik[{{$key}}]"
                                                               class="form-control" id="cat_name"
                                                               value=" @if (array_key_exists($key,$faliyet->getTranslations('baslik'))) {{$faliyet->getTranslations('baslik')[$key]}} @endif"
                                                        >
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="cat_name">Alt Başlık ({{$value}})</label>
                                                        <input @if($key == 'tr') required @endif type="text"
                                                               name="alt_baslik[{{$key}}]"
                                                               class="form-control" id="cat_name"
                                                               value=" @if (array_key_exists($key,$faliyet->getTranslations('alt_baslik'))) {{$faliyet->getTranslations('alt_baslik')[$key]}} @endif"
                                                        >
                                                    </div>

                                                    <div class="form-group">

                                                        <label for="cat_name">Metin Başlık ({{$value}})</label>
                                                        <input @if($key == 'tr') required @endif type="text"
                                                               name="metin_baslik[{{$key}}]"
                                                               class="form-control" id="cat_name"
                                                               value=" @if (array_key_exists($key,$faliyet->getTranslations('metin_baslik'))) {{$faliyet->getTranslations('metin_baslik')[$key]}} @endif"
                                                        >
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Metin ({{$value}})</label>
                                                        <textarea id="summernote_{{$key}}" name="aciklama[{{$key}}]"
                                                        > @if (array_key_exists($key,$faliyet->getTranslations('aciklama'))) {{$faliyet->getTranslations('aciklama')[$key]}} @endif</textarea>

                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                @if(in_array(0,explode(',',$faliyet->kategori_id)))
                                <div class="card card-light ">
                                    <div class="card-header">
                                        <h4>Linkler</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @for($i = 1 ; $i<= 8 ; $i++)
                                                <div class="col-md-12"><h4>Link Grup #{{$i}}</h4>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Link Başlık</label>
                                                    <input value="{{unserialize($faliyet->link_baslik)[$i]}}"
                                                           class="form-control"
                                                           name="link_baslik[{{$i}}]"
                                                    >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Link Alt Başlığı</label>
                                                    <input value="{{unserialize($faliyet->link_altbaslik)[$i]}}"
                                                           class="form-control"
                                                           name="link_altbaslik[{{$i}}]"
                                                    >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Link </label>
                                                    <input value="{{unserialize($faliyet->link)[$i]}}"
                                                           class="form-control"
                                                           name="link[{{$i}}]"
                                                    >
                                                </div>
                                            @endfor

                                        </div>
                                    </div>
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

                        if (this.width != 650 && this.height != 350) {

                            $('#error_foto').html('<label class="text-danger">Lütfen 650 X 350 boyutlarında yükleyiniz</label>');
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

