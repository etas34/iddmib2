<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yeni kadro ekle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.sayfalar.kadro_store')}}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputFile">Kişi Resmi (300 X 200 )</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input required type="file" name="resim" class="custom-file-input" id="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>

                            </div>
                            <span id="error_foto"></span>

                        </div>
                        <div class="form-group">
                            <label>Kadro türünü Seçiniz</label>
                            <select  name="kadro" id="kadro" class="form-control" required>
                                @foreach(config('constants.kadro') as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group" id="sektor" style="display: none">
                            <label>Sektör Seçiniz</label>
                            <select name="sektor_id" id="sektor_id" class="form-control">
                                <option disabled value="0">Sektör Seçiniz</option>
                                @foreach($sektor as $key=>$value)
                                    <option value="{{$value->id}}">{{$value->baslik}}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Ad Soyad</label>
                                <input required name="ad_soyad" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ünvan</label>
                                <input name="unvan" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telefon Numarası</label>
                                <input name="tel" type="tel" placeholder="+90 212 444 5555" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>E-posta</label>
                                <input name="email" type="email" placeholder="ali.can@immib.org.tr" class="form-control">
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

