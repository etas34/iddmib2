<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Başlık</h3>
                   @if($slider->count() <= 0) <a href="{{route('admin.slider.create')}}" class="btn btn-primary active" style="float: right !important;">Yeni Başlık Ekle</a>  @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Alt Başlık</th>
                            <th>Açıklama</th>
                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slider as $key=>$value)
                        <tr>

                            <td><img src="{{asset("storage/images/slider_images/$value->image")}}" height="60px" width="60px"></td>
                            <td>{{$value->baslik}}</td>
                            <td>{{$value->alt_baslik}}</td>
                            <td>{{$value->aciklama}}</td>


                            <td><a href="{{route('admin.slider.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                            <td><a href="{{route('admin.slider.destroy',$value)}}" onclick="return confirm('Kaydı silmek istediğinize emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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

