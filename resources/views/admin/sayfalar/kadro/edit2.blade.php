<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kadro Düzenle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.sayfalar.kadro_update',$kadro)}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputFile">Kişi Resmi (300 X 200 )</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="resim" class="custom-file-input" id="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>

                            </div>
                        </div>
                            @if($kadro->resim)
                                <div class="form-group">
                                    <label for="exampleInputFile">Seçili Resim</label>
                                    <div class="input-group">
                                <img src="{{asset("storage/images/kadro_images/$kadro->resim")}}" class="img-fluid">
                                    </div>
                                </div>

                            @endif

                        <div class="form-group">
                            <label>Kadro Türü</label>
{{--                            <select name="kadro" id="kadro" class="form-control" required>--}}
{{--                                @foreach(config('constants.kadro') as $key=>$value)--}}
{{--                                    <option  value="{{$key}}">{{$value}}</option>--}}
{{--                                @endforeach--}}

                            <select  name="kadro" id="kadro" class="form-control" required>
                                @foreach(config('constants.kadro') as $key=>$value)
                                    <option value="{{$key}}" @if($kadro->kadro==$key) selected @endif>{{$value}}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group" id="sektor">
                            <label>Sektör </label>
                            <select name="sektor_id[]" id="sektor_id" class="form-control select2" multiple data-placeholder="Sektör Seçiniz" required>
                                @foreach($sektor as $key=>$value)
                                    <option value="{{$value->id}}"
                                            @foreach(explode(",",$kadro->sektor_id) as $sektor)

                                            @if($sektor==$value->id) selected @endif
                                        @endforeach
                                    >@if($value->id==999)
                                         Metaller
                                        @else
                                         {{$value->baslik}}
                                    @endif</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Ad Soyad</label>
                                <input name="ad_soyad" value="{{$kadro->ad_soyad}}" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ünvan</label>
                                <input name="unvan" value="{{$kadro->unvan}}" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telefon Numarası</label>
                                <input name="tel" type="tel" value="{{$kadro->tel}}" placeholder="+90 212 454 0991" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>E-posta</label>
                                <input name="email" type="email" value="{{$kadro->email}}" placeholder="ozgur.inan@immib.org.tr" class="form-control">
                            </div>

                        </div>


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
            $(() => {
                    var sektor = $('#sektor')
                    var sektor_id = $('#sektor_id')
                    $('#kadro').on('change', () => {
                        if ($("#kadro option:selected").val() === 'İdari Kadro'){
                            sektor.show()
                            sektor_id.prop('required',true)
                        }
                        else {
                            sektor.hide()
                            sektor_id.val('0')
                            sektor_id.prop('required',false)
                        }
                    })
                }
            )
        </script>

    @endpush
</x-admin-app>

