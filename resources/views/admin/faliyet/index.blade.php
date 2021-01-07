<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Faaliyetler</h3>
{{--                   <a href="{{route('admin.faliyet.create')}}" class="btn btn-primary active" style="float: right !important;">Yeni Faliyet Ekle</a>--}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Faaliyet</th>
                            <th>Sektör</th>
{{--                            <th>Kategori</th>--}}
                            {{--                            <th>Açıklama</th>--}}
                            <th>Düzenle</th>
{{--                            <th>Sil</th>--}}


                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $faliyet as $key=>$value)
                        <tr>

                            <td><img src="{{asset("storage/images/faliyet_images/$value->image")}}" height="60px" width="60px"></td>
                            <td>{{$value->baslik}}</td>

                            <td>{{\App\Models\Sektor::find($value->sektor_id)->baslik}}</td>
{{--                            <td>{{config('constants.kategori.'.$value->kategori_id)}}</td>--}}
                            <td><a href="{{route('admin.faliyet.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
{{--                            <td><a href="{{route('admin.faliyet.destroy',$value)}}" onclick="return confirm('Kaydı silmek istediğinize emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>--}}

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

