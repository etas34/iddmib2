<x-admin-app>
    @push('styles')


    @endpush
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Duyuru</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.etkinlik.update',$etkinlik)}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">

                        <div class="row">

                                <div class= "form-group col-md-6">

                                    <label>Sektör Seçiniz</label>
                                    <select name="sektor_id" id="" class="form-control" required>

                                        @foreach($sektor as $key=>$value)
                                            <option @if($etkinlik->sektor_id == $value->id) selected @endif value="{{$value->id}}">{{$value->baslik}}</option>
                                        @endforeach

                                    </select>

                                </div>

                            <div class="form-group col-md-6">
                                <label>Kategori</label>
                                <select name="kategori_id" class="form-control">
                                    @foreach(config('constants.kategori') as $key=>$value)
                                        <option @if($etkinlik->kategori_id == $key) selected
                                                @endif value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Gün </label>


                                <select name="gun" class="form-control">
                                    @for($i = 1; $i <= 31 ; $i++ )
                                        <option @if($tarih[0] == $i) selected @endif value="{{$i}}">{{ $i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Ay </label>

                                <select name="ay" class="form-control">
                                    @foreach($ay2 as $key=>$value)
                                        <option @if($tarih[1] == $key) selected
                                                @endif value="{{$key}}">{{ $value}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label>Yıl </label>


                                <select name="yil" class="form-control">
                                    @for($i = 2010; $i <= \Carbon\Carbon::now()->year + 100; $i++ )
                                        <option @if($tarih[0] == $i) selected @endif value="{{$i}}">{{ $i}}</option>
                                    @endfor
                                </select>
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

                                                        <label for="cat_name">Etkinlik Adı ({{$value}})</label>
                                                        <input  @if($key == 'tr') required @endif type="text" name="baslik[{{$key}}]"
                                                               value=" @if (array_key_exists($key,$etkinlik->getTranslations('baslik'))) {{$etkinlik->getTranslations('baslik')[$key]}} @endif"
                                                               class="form-control" id="cat_name"
                                                        >
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
            var _URL2 = window.URL || window.webkitURL;
            $("#foto").change(function (e) {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    var objectUrl = _URL2.createObjectURL(file);
                    img.onload = function () {

                        if (this.width != 2506 && this.height != 1692) {

                            $('#error_foto').html('<label class="text-danger">Lütfen 2506 X 1692 boyutlarında yükleyiniz</label>');
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

