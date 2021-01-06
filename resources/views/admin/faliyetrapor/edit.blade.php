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
                <form action="{{route('admin.faliyetrapor.update',$faliyetRapor)}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        @if($faliyetRapor->rapor)
                            <div class="form-group">
                                <label>Seçili PDF:</label>
                                <div class="custom-file">
                                    <a target="_blank"
                                       href="{{asset("storage/files/ihracat_files/$faliyetRapor->rapor")}}"> {{$faliyetRapor->rapor}}
                                        <i class="nav-icon fa fa-file-pdf"></i></a>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputFile">İhracat Raporu (PDF)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input  type="file" name="pdf" accept="application/pdf"
                                           class="custom-file-input"
                                           id="foto">
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
                                                            <input  @if($key == 'tr') required @endif type="text" name="baslik[{{$key}}]"
                                                                   value=" @if (array_key_exists($key,$faliyetRapor->getTranslations('aciklama'))) {{$faliyetRapor->getTranslations('aciklama')[$key]}} @endif"
                                                                   class="form-control" id="cat_name"
                                                            >
                                                        </div>



{{--                                                        <div class="form-group">--}}
{{--                                                            <label>Alt Başlık ({{$value}})</label>--}}
{{--                                                            <input type="text"  value=" @if (array_key_exists($key,$faliyetRapor->getTranslations('alt_baslik'))) {{$faliyetRapor->getTranslations('baslik')[$key]}} @endif"--}}
{{--                                                                   name="alt_baslık[{{$key}}]" class="form-control">--}}

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

