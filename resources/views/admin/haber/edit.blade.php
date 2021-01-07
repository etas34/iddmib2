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
                <form action="{{route('admin.haber.update',$haber)}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">

                        <div class="form-group">
                            <label>Sektör Seçiniz</label>
                            <select name="sektor_id" id="" class="form-control" required>
                                @foreach($sektor as $key=>$value)
                                    <option value="{{$value->id}}" @if($value->id==$haber->sektor_id) selected @endif>{{$value->baslik}}</option>
                                @endforeach

                            </select>

                        </div>
                        @if($haber->image)
                            <div class="form-group">
                                <label for="file">Seçili resim:</label>
                                <div id="file"> <img src="{{asset("storage/images/haber_images/$haber->image")}}" width="300"  alt="..."></div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="">Tarih</label>
                            <input type="text" name="tarih" value="{{$haber->tarih}}" placeholder="05 05 2021" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Başlık Resmi (1200 X 700 )</label>
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

                                                            <label for="cat_name">Haber Başlığı ({{$value}})</label>
                                                            <input  @if($key == 'tr') required @endif type="text" name="baslik[{{$key}}]"
                                                                   class="form-control" id="cat_name"  value=" @if (array_key_exists($key,$haber->getTranslations('baslik'))) {{$haber->getTranslations('baslik')[$key]}} @endif"
                                                            >
                                                        </div>

                                                        <div class="form-group">

                                                            <label for="cat_name">Haber Alt Başlığı ({{$value}})</label>
                                                            <input  @if($key == 'tr') required @endif type="text" name="alt_baslik[{{$key}}]"
                                                                   class="form-control" id="cat_name"  value=" {{$haber->getTranslations('alt_baslik')[$key] ?? ''}}"
                                                            >
                                                        </div>



                                                        <div class="form-group">

                                                            <label for="cat_name">Metin Başlığı ({{$value}})</label>
                                                            <input  @if($key == 'tr') required @endif type="text" name="metin_altbaslik[{{$key}}]"
                                                                   class="form-control"
                                                                    id="cat_name"
                                                                    value="{{$haber->getTranslations('metin_altbaslik')[$key] ?? ''}}"
                                                            >
                                                        </div>



                                                        <div class="form-group">
                                                            <label>Haber İçeriği ({{$value}})</label>
                                                            <textarea id="summernote_{{$key}}" name="aciklama[{{$key}}]"
                                                            > @if (array_key_exists($key,$haber->getTranslations('aciklama'))) {{$haber->getTranslations('aciklama')[$key]}} @endif</textarea>

                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <!-- /.tab-content -->
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
            // var _URL2 = window.URL || window.webkitURL;
            // $("#foto").change(function (e) {
            //     var file, img;
            //     if ((file = this.files[0])) {
            //         img = new Image();
            //         var objectUrl = _URL2.createObjectURL(file);
            //         img.onload = function () {
            //
            //             if (this.width != 1920 && this.height != 900) {
            //
            //                 $('#error_foto').html('<label class="text-danger">Lütfen 1920 X 900 boyutlarında yükleyiniz</label>');
            //                 $('#foto').addClass('has-error');
            //                 $('#edit').attr('disabled', true);
            //             } else {
            //
            //                 $('#error_foto').html('<label class="text-success"></label>');
            //                 $('#foto').removeClass('has-error');
            //                 $('#edit').attr('disabled', false);
            //
            //             }
            //
            //
            //             _URL2.revokeObjectURL(objectUrl);
            //         };
            //         img.src = objectUrl;
            //     }
            //
            // })
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

