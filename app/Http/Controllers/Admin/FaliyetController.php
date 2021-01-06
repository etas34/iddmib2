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
        $sektor=Sektor::where('durum',1)->get();
        return view('admin.faliyet.create',compact('sektor'));
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
        if ($request->file('image')) {
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/faliyet_images', $imageName);
            $faliyet->image = $imageName;

        }
        $faliyet->kategori_id = $request->kategori_id;
        $faliyet->sektor_id = $request->sektor_id;
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
        $sektor=Sektor::where('durum',1)->get();
        return view('admin.faliyet.edit', compact('faliyet','sektor'));
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
        if ($request->file('image')) {
            if ($faliyet->image and file_exists(storage_path("app\\public\\images\\faliyet_images\\$faliyet->image")))
                unlink(storage_path("app\\public\\images\\faliyet_images\\$faliyet->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/faliyet_images', $imageName);
            $faliyet->image = $imageName;

        }
//        $faliyet->kategori_id = $request->kategori_id;
        $faliyet->metin_baslik = $request->metin_baslik;
        $faliyet->sektor_id = $request->sektor_id;
        $faliyet->baslik = $request->baslik;
        $faliyet->alt_baslik = $request->alt_baslik;
        $faliyet->aciklama = $request->aciklama;
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
        if ($faliyet->image and file_exists(storage_path("app\\public\\images\\faliyet_images\\$faliyet->image")))
            unlink(storage_path("app\\public\\images\\faliyet_images\\$faliyet->image"));
        $saved = $faliyet->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.faliyet.index');
    }
}
