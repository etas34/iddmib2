<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yeni faliyet ekle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.faliyet.store')}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Sektör Seçiniz</label>
                                <select name="sektor_id" id="" class="form-control" required>
                                    @foreach($sektor as $key=>$value)
                                        <option value="{{$value->id}}">{{$value->baslik}}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Kategori</label>
                                <select name="kategori_id" class="form-control">
                                    @foreach(config('constants.kategori') as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Faliyet Resmi (540 X 230 )</label>
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

                                                        <label for="cat_name">Faliyet Başlığı ({{$value}})</label>
                                                        <input @if($key == 'tr') required @endif type="text"
                                                               name="baslik[{{$key}}]"
                                                               class="form-control" id="cat_name"
                                                        >
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="cat_name">Faliyet Alt Başlığı ({{$value}})</label>
                                                        <input @if($key == 'tr') required @endif type="text"
                                                               name="alt_baslik[{{$key}}]"
                                                               class="form-control" id="cat_name"
                                                        >
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Faliyet İçeriği ({{$value}})</label>
                                                        <textarea id="summernote_{{$key}}" name="aciklama[{{$key}}]"
                                                        ></textarea>

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

