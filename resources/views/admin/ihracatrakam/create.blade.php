<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">İhracat Rakamları</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.ihracatrakam.store')}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">


                        <div class="row ">

                            <div class="form-group col-md-12">
                                <label>Son Güncelleme Tarihi :</label>

                                <input placeholder="01.01.2020 - 12:53" type="text" class="form-control datepicker"
                                       id="guncelleme_tarih"
                                       name="guncelleme_tarih"/>
                            </div>

                            <div class=" form-group col-md-12">
                                <label>Sektör Seçiniz</label>
                                <select name="sektor_id" id="" class="form-control">
                                    <option value="0">Anasayfa</option>

                                    @foreach($sektor as $key=>$value)
                                        <option value="{{$value->id}}">{{$value->baslik}}</option>
                                    @endforeach

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

                                                    <div class="form-group ">

                                                        <label>({{$value}}) Orta Alan :</label>


                                                    </div>

                                                    <div class="row">


                                                        <div class="form-group col-md-4">

                                                            <label>1.Alan</label>

                                                            <input @if($key == 'tr') placeholder="01.31 Ağustos 2020"
                                                                   @else placeholder="01.31 August 2020" @endif
                                                                   type="text" class="form-control"
                                                                   name="o_birinci[{{$key}}]"/>

                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label>2.Alan</label>

                                                            <input placeholder="192" type="text" class="form-control"
                                                                   name="o_ikinci[{{$key}}]"/>

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>3.Alan</label>

                                                            <input @if($key == 'tr')placeholder="Milyon USD "
                                                                   @else placeholder="Million USD" @endif  type="text"
                                                                   class="form-control" name="o_ucuncu[{{$key}}]"/>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                        <label>({{$value}}) Sağ Alan:</label>


                                                    </div>
                                                    <div class="row">


                                                        <div class="form-group col-md-4">

                                                            <label>1.Alan</label>

                                                            <input
                                                                @if($key == 'tr')placeholder="1 Eylül 2019 / 31 Ağustos 2020"
                                                                @else placeholder="1 September 2019/31 August 2020"
                                                                @endif  type="text" class="form-control"
                                                                name="s_birinci[{{$key}}]"/>

                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label>2.Alan</label>

                                                            <input placeholder="5.317" type="text" class="form-control"
                                                                   name="s_ikinci[{{$key}}]"/>

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>3.Alan</label>

                                                            <input @if($key == 'tr')placeholder="Milyon USD "
                                                                   @else placeholder="Million USD" @endif type="text"
                                                                   class="form-control" name="s_ucuncu[{{$key}}]"/>

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
        {{--        <script>--}}
        {{--            $(function () {--}}
        {{--                $('#guncelleme_tarih').bootstrapMaterialDatePicker({--}}
        {{--                    weekStart: 1,--}}
        {{--                    format: 'DD-MM-YYYY HH:mm',--}}
        {{--                    time: true,--}}
        {{--                    lang: 'tr',--}}
        {{--                    cancelText: 'İptal',--}}
        {{--                    okText: 'Tamam',--}}

        {{--                });--}}
        {{--                $('#guncelleme_tarih').bootstrapMaterialDatePicker('setDate', moment());--}}

        {{--                $('#son_ay').bootstrapMaterialDatePicker({--}}
        {{--                    weekStart: 1,--}}
        {{--                    format: 'MM-YYYY',--}}
        {{--                    time: false,--}}
        {{--                    lang: 'tr',--}}
        {{--                    cancelText: 'İptal',--}}
        {{--                    okText: 'Tamam',--}}

        {{--                });--}}
        {{--                $('#son_ay').bootstrapMaterialDatePicker('setDate', moment());--}}

        {{--                //--}}
        {{--                // $('#bitis').bootstrapMaterialDatePicker({--}}
        {{--                //     format: 'MM/YYYY',--}}
        {{--                //     weekStart: 0,--}}
        {{--                //     time: false,--}}
        {{--                //     lang: 'tr',--}}
        {{--                //     cancelText: 'İptal',--}}
        {{--                //     okText: 'Tamam',--}}
        {{--                // }).on('change', function (e,date) {--}}
        {{--                //     var date1 = date--}}
        {{--                //     var date2 = date--}}
        {{--                //     var lastDate = date1.endOf('month')--}}
        {{--                //     var oneYearAgo = date2.startOf('month').subtract(1, 'year')--}}
        {{--                //--}}
        {{--                //     alert(lastDate)--}}
        {{--                // });--}}

        {{--            });--}}
        {{--        </script>--}}

    @endpush
</x-admin-app>

