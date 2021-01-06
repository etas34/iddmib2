<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kadrolar</h3>
                    <a href="{{route('admin.sayfalar.kadro_create')}}" class="btn btn-primary active"
                       style="float: right !important;">Yeni Kadro Ekle</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Kadro</th>
                            <th>Sektör</th>
                            <th>Ünvan</th>
                            <th>Ad Soyad</th>
                            <th>Telefon Numarası</th>
                            <th>E-Mail</th>

                            {{--                            <th>Açıklama</th>--}}
                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $kadro as $key=>$value)
                            <tr>

                                <td><img src="{{asset("storage/images/kadro_images/$value->resim")}}" height="60px"
                                         width="60px"></td>
                                <td> {{$value->kadro}}</td>
                                <td>{{\App\Models\Sektor::find($value->sektor_id)->baslik ?? ''}}</td>
                                <td> {{$value->unvan}}</td>
                                <td> {{$value->ad_soyad}}</td>
                                <td> {{$value->tel}}</td>
                                <td> {{$value->email}}</td>

                                <td><a href="{{route('admin.sayfalar.kadro_edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a>
                                </td>
                                <td><a href="{{route('admin.sayfalar.kadro_destroy',$value)}}"
                                       onclick="return confirm('Kaydı silmek istediğinize emin misiniz?')"><span
                                            class="badge bg-danger p-2">Sil</span></a></td>

                            </tr>
                        @endforeach


                        </tbody>
                        {{--                        <tfoot>--}}
                        {{--                        <tr>--}}
                        {{--                            <th>Rendering engine</th>--}}
                        {{--                            <th>Browser</th>--}}
                        {{--                            <th>Platform(s)</th>--}}
                        {{--                            <th>Engine version</th>--}}
                        {{--                            <th>CSS grade</th>--}}
                        {{--                        </tr>--}}
                        {{--                        </tfoot>--}}
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>


    @push('scripts')


    @endpush
</x-admin-app>

