<x-admin-app>
    @push('styles')


    @endpush
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">İhracat Raporu Düzenle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.baskaninmesaji.update',$baskaninmesaji)}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">


                        @if($baskaninmesaji->image)
                            <div class="form-group">
                                <label for="file">Seçili resim:</label>
                                <div id="file"><img
                                        src="{{asset("storage/images/baskan_images/$baskaninmesaji->image")}}"
                                        width="300" alt="..."></div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputFile">Başkanın Resmi (1100 X 463 )</label>
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


                                                        <label>Başkanın Mesajı ({{$value}})</label>
                                                        <textarea rows="3" id="summernote_{{$key}}"
                                                                  @if($key == 'tr') required
                                                                  @endif name="metin[{{$key}}]"
                                                        >  {{$baskaninmesaji->getTranslations('metin')[$key] ?? ''}}</textarea>

                                                    </div>

                                                    <div class="card bg-light ">
                                                        <div class="card-header">
                                                            <h4>Detay Sayfası</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Başlık</label>
                                                                <input name="baslik[{{$key}}]" class="form-control"
                                                                       type="text"
                                                                       value="{{$baskaninmesaji->getTranslations('baslik')[$key] ?? ''}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alt başlık</label>
                                                                <input name="alt_baslik[{{$key}}]" class="form-control"
                                                                       type="text"
                                                                       value="{{$baskaninmesaji->getTranslations('alt_baslik')[$key] ?? ''}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Metin Alt Başlık</label>
                                                                <input name="metin_baslik[{{$key}}]"
                                                                       class="form-control" type="text"
                                                                       value="{{$baskaninmesaji->getTranslations('metin_baslik')[$key] ?? ''}}">
                                                            </div>
                                                        </div>


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
            //             if (this.width != 2506 && this.height != 1692) {
            //
            //                 $('#error_foto').html('<label class="text-danger">Lütfen 2506 X 1692 boyutlarında yükleyiniz</label>');
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
                    height: 100
                })
                @endforeach
            })

        </script>

    @endpush
</x-admin-app>

