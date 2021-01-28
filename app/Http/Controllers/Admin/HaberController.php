<?php

namespace App\Http\Controllers\Admin;


use App\Models\Haber;
use App\Http\Controllers\Controller;
use App\Models\Sektor;
use Illuminate\Http\Request;

class HaberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $haber = Haber::all();
        return view('admin.haber.index',compact('haber'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sektor=Sektor::where('durum',1)->get();
        return view('admin.haber.create',compact('sektor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $haber = new Haber();
        if ($request->file('ana_resim')) {
            $request->validate([

                'ana_resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->ana_resim->extension();

            $request->ana_resim->storeAs('/public/images/haber_images', $imageName);
            $haber->ana_resim = $imageName;

        }
        if ($request->file('detay_resim')) {
            $request->validate([

                'detay_resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = 'detay'.time() . '.' . $request->detay_resim->extension();

            $request->detay_resim->storeAs('/public/images/haber_images', $imageName);
            $haber->detay_resim = $imageName;

        }
        $haber->sektor_id = $request->sektor_id;
        $haber->tarih = $request->tarih;
        $haber->baslik = $request->baslik;
        $haber->alt_baslik = $request->alt_baslik;
        $haber->metin_altbaslik = $request->metin_altbaslik;
        $haber->aciklama = $request->aciklama;
        $saved = $haber->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.haber.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Haber  $haber
     * @return \Illuminate\Http\Response
     */
    public function show(Haber $haber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Haber  $haber
     * @return \Illuminate\Http\Response
     */
    public function edit(Haber $haber)
    {
        $sektor=Sektor::where('durum',1)->get();
        return view('admin.haber.edit',compact('haber','sektor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Haber  $haber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Haber $haber)
    {

        if ($request->file('ana_resim')) {
            if ($haber->ana_resim and file_exists(storage_path("app\\public\\images\\haber_images\\$haber->ana_resim")))
                unlink(storage_path("app\\public\\images\\haber_images\\$haber->ana_resim"));
            $request->validate([

                'ana_resim' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->ana_resim->extension();


            $request->ana_resim->storeAs('/public/images/haber_images', $imageName);
            $haber->ana_resim = $imageName;

        }
        if ($request->file('detay_resim')) {
            if ($haber->detay_resim and file_exists(storage_path("app\\public\\images\\haber_images\\$haber->detay_resim")))
                unlink(storage_path("app\\public\\images\\haber_images\\$haber->detay_resim"));
            $request->validate([

                'detay_resim' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = 'detay'.time() . '.' . $request->detay_resim->extension();

            $request->detay_resim->storeAs('/public/images/haber_images', $imageName);
            $haber->detay_resim = $imageName;

        }
        $haber->sektor_id = $request->sektor_id;
        $haber->tarih = $request->tarih;
        $haber->baslik = $request->baslik;
        $haber->alt_baslik = $request->alt_baslik;
        $haber->metin_altbaslik = $request->metin_altbaslik;
        $haber->aciklama = $request->aciklama;
        $saved = $haber->save();

        if ($saved)
            toastr()->success('Güncelleme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Haber  $haber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Haber $haber)
    {
        if ($haber->ana_resim and file_exists(storage_path("app\\public\\images\\haber_images\\$haber->ana_resim")))
            unlink(storage_path("app\\public\\images\\haber_images\\$haber->ana_resim"));
        if ($haber->detay_resim and file_exists(storage_path("app\\public\\images\\haber_images\\$haber->detay_resim")))
            unlink(storage_path("app\\public\\images\\haber_images\\$haber->detay_resim"));
        $saved = $haber->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();

    }
}
