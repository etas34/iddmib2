<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Faliyet Raporları</h3>
                 <a href="{{route('admin.faliyetrapor.create')}}" class="btn btn-primary active" style="float: right !important;">Yeni Rapor Ekle</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Dosya</th>
                            <th>Başlık</th>


                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>

                        @foreach($faliyetRapor as $key=>$value)
                        <tr>

                            <td><a target="_blank" href="{{asset("storage/files/faliyetrapor_files/$value->rapor")}}"> {{$value->rapor}} <i class="nav-icon fa fa-file-pdf"></i></a></td>
                            <td>{{$value->aciklama}}</td>


                            <td><a href="{{route('admin.faliyetrapor.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                            <td><a href="{{route('admin.faliyetrapor.destroy',$value)}}" onclick="return confirm('Kaydı silmek istediğinize emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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

