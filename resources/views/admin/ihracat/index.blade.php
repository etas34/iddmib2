<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">İhracat Raporları</h3>
                 <a href="{{route('admin.ihracat.create')}}" class="btn btn-primary active" style="float: right !important;">Yeni Rapor Ekle</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Dosya</th>
                            <th>Sektör</th>
                            <th>Rapor Adı</th>
                            <th>Anasayfada Göster</th>
                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ihracat as $key=>$value)
                        <tr>

                            <td><a target="_blank" href="{{asset("storage/files/ihracat_files/$value->pdf")}}"> Rapor PDF <i class="nav-icon fa fa-file-pdf"></i></a></td>
                            <td>{{\App\Models\Sektor::find($value->sektor_id)->baslik }}</td>
                            <td>{{$value->baslik}}</td>
                            <td>@if($value->anasayfa==1) Evet @else Hayır @endif</td>



                            <td><a href="{{route('admin.ihracat.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                            <td><a href="{{route('admin.ihracat.destroy',$value)}}" onclick="return confirm('Kaydı silmek istediğinize emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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

