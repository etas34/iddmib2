<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Etkinlik Raporları</h3>
                 <a href="{{route('admin.etkinlik.create')}}" class="btn btn-primary active" style="float: right !important;">Yeni Etkinlik Ekle</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Etkinlik Adı</th>
                            <th>Kategori</th>
                            <th>Sektor Adı</th>
                            <th>Tarih</th>
                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($etkinlik as $key=>$value)
                        <tr>

                            <td>{{$value->baslik}}</td>
                            <td>{{config('constants.kategori.'.$value->kategori_id)}}</td>
                            <td>{{\App\Models\Sektor::find($value->sektor_id)->baslik}}</td>
                            <td>{{$value->tarih}}</td>



                            <td><a href="{{route('admin.etkinlik.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                            <td><a href="{{route('admin.etkinlik.destroy',$value)}}" onclick="return confirm('Kaydı silmek istediğinize emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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

