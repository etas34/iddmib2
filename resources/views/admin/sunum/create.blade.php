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
                <form action="{{route('admin.sunum.store')}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">


                        <div class="form-group">
                            <label for="exampleInputFile">Sunum (PDF yada PPTX)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input required type="file" name="sunum" accept="application/msword,
                                     application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                                      application/vnd.ms-powerpoint,
                                       application/vnd.openxmlformats-officedocument.presentationml.slideshow,
                                        application/vnd.openxmlformats-officedocument.presentationml.presentation,
                                         application/pdf" class="custom-file-input"
                                          >
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
                                                            <input  @if($key == 'tr') required @endif type="text" name="aciklama[{{$key}}]"
                                                                   class="form-control" id="cat_name"

                                                            >
                                                        </div>



{{--                                                        <div class="form-group">--}}
{{--                                                            <label>Alt Başlık ({{$value}})</label>--}}
{{--                                                            <input type="text" name="alt_baslık[{{$key}}]" class="form-control">--}}

{{--                                                        </div>--}}
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

    @endpush
</x-admin-app>

