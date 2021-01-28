<?php

namespace App\Http\Controllers\Admin;


use App\Models\Faliyet;
use App\Http\Controllers\Controller;
use App\Models\Sektor;
use Illuminate\Http\Request;

class FaliyetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faliyet = Faliyet::all();
        return view('admin.faliyet.index', compact('faliyet'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faliyet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faliyet = new Faliyet();
        if ($request->file('ana_resim')) {
            $request->validate([

                'ana_resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->ana_resim->extension();

            $request->ana_resim->storeAs('/public/images/faliyet_images', $imageName);
            $faliyet->ana_resim = $imageName;

        }

        if ($request->file('detay_resim')) {
            $request->validate([

                'detay_resim' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = 'detay'.time() . '.' . $request->detay_resim->extension();

            $request->detay_resim->storeAs('/public/images/faliyet_images', $imageName);
            $faliyet->detay_resim = $imageName;

        }
        $faliyet->metin_baslik = '';
        $faliyet->kategori_id = $request->kategori_id;
        $faliyet->baslik = $request->baslik;
        $faliyet->alt_baslik = $request->alt_baslik;
        $faliyet->aciklama = $request->aciklama1;
        $saved = $faliyet->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.faliyet.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Faliyet $faliyet
     * @return \Illuminate\Http\Response
     */
    public function show(Faliyet $faliyet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Faliyet $faliyet
     * @return \Illuminate\Http\Response
     */
    public function edit(Faliyet $faliyet)
    {
        return view('admin.faliyet.edit', compact('faliyet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faliyet $faliyet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faliyet $faliyet)
    {
        if ($request->file('ana_resim')) {
            if ($faliyet->ana_resim and file_exists(storage_path("app\\public\\images\\faliyet_images\\$faliyet->ana_resim")))
                unlink(storage_path("app\\public\\images\\faliyet_images\\$faliyet->ana_resim"));
            $request->validate([

                'ana_resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->ana_resim->extension();

            $request->ana_resim->storeAs('/public/images/faliyet_images', $imageName);
            $faliyet->ana_resim = $imageName;

        }
        if ($request->file('detay_resim')) {
            if ($faliyet->detay_resim and file_exists(storage_path("app\\public\\images\\faliyet_images\\$faliyet->detay_resim")))
                unlink(storage_path("app\\public\\images\\faliyet_images\\$faliyet->detay_resim"));
            $request->validate([

                'detay_resim' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = 'detay'.time() . '.' . $request->detay_resim->extension();

            $request->detay_resim->storeAs('/public/images/faliyet_images', $imageName);
            $faliyet->detay_resim = $imageName;

        }
//        $faliyet->kategori_id = $request->kategori_id;
        $faliyet->metin_baslik = $request->metin_baslik;
        $faliyet->baslik = $request->baslik;
        $faliyet->alt_baslik = $request->alt_baslik;
        $faliyet->aciklama = $request->aciklama;
//        dd($request->link_baslik);
        $faliyet->link_baslik = serialize($request->link_baslik);
        $faliyet->link_altbaslik = serialize($request->link_altbaslik);
        $faliyet->link = serialize($request->link);
        $saved = $faliyet->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Faliyet $faliyet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faliyet $faliyet)
    {
        if ($faliyet->ana_resim and file_exists(storage_path("app\\public\\images\\faliyet_images\\$faliyet->ana_resim")))
            unlink(storage_path("app\\public\\images\\faliyet_images\\$faliyet->ana_resim"));

        if ($faliyet->detay_resim and file_exists(storage_path("app\\public\\images\\faliyet_images\\$faliyet->detay_resim")))
            unlink(storage_path("app\\public\\images\\faliyet_images\\$faliyet->detay_resim"));
        $saved = $faliyet->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.faliyet.index');
    }
}
