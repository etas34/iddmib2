<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Duyular</h3>
                 <a href="{{route('admin.duyuru.create')}}" class="btn btn-primary active" style="float: right !important;">Yeni Duyuru Ekle</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Link</th>
                            <th>Sıra</th>
                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($duyuru as $key=>$value)
                        <tr>

                            <td><img src="{{asset("storage/images/duyuru_images/$value->image")}}" height="100px" width="100px"></td>
                            <td><a href="{{$value->link}}">{{$value->link}}</a></td>
                            <td>
                                <form action="{{route('admin.duyuru.sira',$value)}}" method="post" autocomplete="off">
                                    {{csrf_field()}}
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="text-center" name="sira" style="width: 50px;"
                                               value="{{$value->sira}}">
                                        <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-check"
                                                                           aria-hidden="true"></i></button>
                  </span>
                                    </div>
                                </form>

                            </td>


                            <td><a href="{{route('admin.duyuru.edit',$value)}}"><span class="badge bg-warning p-2">Düzenle</span></a></td>
                            <td><a href="{{route('admin.duyuru.destroy',$value)}}" onclick="return confirm('Kaydı silmek istediğinize emin misiniz?')"><span class="badge bg-danger p-2">Sil</span></a></td>

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

