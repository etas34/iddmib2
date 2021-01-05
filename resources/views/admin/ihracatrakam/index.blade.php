<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Başlık</h3>
         <a href="{{route('admin.ihracatrakam.create')}}" class="btn btn-primary active" style="float: right !important;">Yeni İhracat Rakamı Ekle</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                           <th>Orta Alan</th>
                           <th>Sağ Alan</th>
                           <th>Guncelleme Tarihi</th>

                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ihracatrakam as $key=>$value)
                        <tr>

                            <td>{{ $value->o_birinci ." ". $value->o_ikinci . " " .$value->o_ucuncu}}</td>
                            <td>{{ $value->s_birinci ." ". $value->s_ikinci . " " .$value->s_ucuncu}}</td>
                            <td>{{ $value->guncelleme_tarih}}</td>



                            <td><a href="{{route('admin.ihracatrakam.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                            <td><a href="{{route('admin.ihracatrakam.destroy',$value)}}" onclick="return confirm('Kaydı silmek istediğinize emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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

