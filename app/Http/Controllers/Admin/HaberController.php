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
        if ($request->file('image')) {
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/haber_images', $imageName);
            $haber->image = $imageName;

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

        if ($request->file('image')) {
            if ($haber->image and file_exists(storage_path("app\\public\\images\\haber_images\\$haber->image")))
                unlink(storage_path("app\\public\\images\\haber_images\\$haber->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/haber_images', $imageName);
            $haber->image = $imageName;

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
        if ($haber->image and file_exists(storage_path("app\\public\\images\\haber_images\\$haber->image")))
            unlink(storage_path("app\\public\\images\\haber_images\\$haber->image"));
        $saved = $haber->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();

    }
}
