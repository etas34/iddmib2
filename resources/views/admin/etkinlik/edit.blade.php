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

                            <div class="form-group  col-md-6">
                                <label>Başlangıç Tarihi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" required name="tarih" value="{{\DateTime::createFromFormat("Y-m-d", $etkinlik->tarih)->format("d/m/Y")}}" class="form-control float-right tarih" >
                                </div>
                            </div>


                            <div class="form-group  col-md-6">
                                <label>Bitiş Tarihi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" required name="tarih2" value="{{\DateTime::createFromFormat("Y-m-d", $etkinlik->tarih2)->format("d/m/Y")}}" class="form-control float-right tarih" >
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
                $('.tarih').daterangepicker({
                    singleDatePicker: true,
                    "locale": {
                        "format": "DD/MM/YYYY",
                        "separator": " - ",
                        "applyLabel": "Uygula",
                        "cancelLabel": "Vazgeç",
                        "fromLabel": "Dan",
                        "toLabel": "a",
                        "customRangeLabel": "Seç",
                        "daysOfWeek": [
                            "Pt",
                            "Sl",
                            "Çr",
                            "Pr",
                            "Cm",
                            "Ct",
                            "Pz"
                        ],
                        "monthNames": [
                            "Ocak",
                            "Şubat",
                            "Mart",
                            "Nisan",
                            "Mayıs",
                            "Haziran",
                            "Temmuz",
                            "Ağustos",
                            "Eylül",
                            "Ekim",
                            "Kasım",
                            "Aralık"
                        ],
                        "firstDay": 1
                    }

                })
            </script>

    @endpush
</x-admin-app>

