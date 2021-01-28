<x-admin-app>
    @push('styles')


    @endpush


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Kadrolar</h2>
                    <a href="{{route('admin.sayfalar.kadro_create')}}" class="btn btn-primary active"
                       style="float: right !important;">Yeni Kadro Ekle</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body py-2">
                    <h2 class="card-title">Yönetim Kurulu</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Kadro</th>
                            <th>Ünvan</th>
                            <th>Ad Soyad</th>
                            <th>Telefon Numarası</th>
                            <th>E-Mail</th>
                            <th>Sıra</th>


                            {{--                            <th>Açıklama</th>--}}
                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $kadro_yonetim as $key=>$value)
                            <tr>

                                <td><img src="{{asset("storage/images/kadro_images/$value->resim")}}" height="60px"
                                         width="60px"></td>
                                <td> {{$value->kadro}}</td>
                                <td> {{$value->unvan}}</td>
                                <td> {{$value->ad_soyad}}</td>
                                <td> {{$value->tel}}</td>
                                <td> {{$value->email}}</td>
                                <td>
                                    <form action="{{route('admin.sayfalar.kadro_sira',$value)}}" method="post" autocomplete="off">
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

                                <td><a href="{{route('admin.sayfalar.kadro_edit',$value)}}"><span
                                            class="badge bg-warning p-2">Düzenle</span></a>
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
                <hr>
                <div class="card-body py-2">
                    <h2 class="card-title">Denetim Kurulu</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Kadro</th>
                            <th>Ünvan</th>
                            <th>Ad Soyad</th>
                            <th>Telefon Numarası</th>
                            <th>E-Mail</th>
                            <th>Sıra</th>


                            {{--                            <th>Açıklama</th>--}}
                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $kadro_denetim as $key=>$value)
                            <tr>

                                <td><img src="{{asset("storage/images/kadro_images/$value->resim")}}" height="60px"
                                         width="60px"></td>
                                <td> {{$value->kadro}}</td>
                                <td> {{$value->unvan}}</td>
                                <td> {{$value->ad_soyad}}</td>
                                <td> {{$value->tel}}</td>
                                <td> {{$value->email}}</td>
                                <td>
                                    <form action="{{route('admin.sayfalar.kadro_sira',$value)}}" method="post" autocomplete="off">
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

                                <td><a href="{{route('admin.sayfalar.kadro_edit',$value)}}"><span
                                            class="badge bg-warning p-2">Düzenle</span></a>
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
                <hr>
                <!-- /.card-body -->
                <div class="card-body py-2">
                    <h2 class="card-title">İdari Kadro</h2>
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
                            <th>Sıra</th>


                            {{--                            <th>Açıklama</th>--}}
                            <th>Düzenle</th>
                            <th>Sil</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $kadro_idari as $key=>$value)
                            <tr>

                                <td><img src="{{asset("storage/images/kadro_images/$value->resim")}}" height="60px"
                                         width="60px"></td>
                                <td> {{$value->kadro}}</td>
                                <td>{{\App\Models\Sektor::find($value->sektor_id)->baslik ?? ''}}</td>
                                <td> {{$value->unvan}}</td>
                                <td> {{$value->ad_soyad}}</td>
                                <td> {{$value->tel}}</td>
                                <td> {{$value->email}}</td>
                                <td>
                                    <form action="{{route('admin.sayfalar.kadro_sira',$value)}}" method="post" autocomplete="off">
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

                                <td><a href="{{route('admin.sayfalar.kadro_edit2',$value)}}"><span
                                            class="badge bg-warning p-2">Düzenle</span></a>
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
            </div>
        </div>
    </div>


    @push('scripts')


    @endpush
</x-admin-app>

