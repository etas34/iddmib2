<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Haberler</h3>
                   <a href="{{route('admin.haber.create')}}" class="btn btn-primary active" style="float: right !important;">Yeni Haber Ekle</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Sektör</th>
                            <th>Başlık</th>
{{--                            <th>Açıklama</th>--}}
                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $haber as $key=>$value)
                        <tr>

                            <td><img src="{{asset("storage/images/haber_images/$value->image")}}" height="60px" width="60px"></td>
                            <td>{{\App\Models\Sektor::find($value->sektor_id)->baslik}}</td>
                            <td>{{$value->baslik}}</td>
{{--                            <td>{!! $value->aciklama   !!}</td>--}}


                            <td><a href="{{route('admin.haber.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                            <td><a href="{{route('admin.haber.destroy',$value)}}" onclick="return confirm('Kaydı silmek istediğinize emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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

