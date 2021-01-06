<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inovasyon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InovasyonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inovasyon = Inovasyon::all();
        return view('admin.inovasyon.index', compact('inovasyon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inovasyon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inovasyon = new Inovasyon();
        if ($request->file('image')) {

            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/inovasyon_images', $imageName);
            $inovasyon->image = $imageName;
        }
        $inovasyon->baslik = $request->baslik;
        $inovasyon->alt_baslik = $request->alt_baslik;
        $inovasyon->metin_baslik = $request->metin_baslik;
        $inovasyon->metin = $request->metin;
        $saved = $inovasyon->save();
        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.inovasyon.index');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Inovasyon $inovasyon
     * @return \Illuminate\Http\Response
     */
    public function show(Inovasyon $inovasyon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Inovasyon $inovasyon
     * @return \Illuminate\Http\Response
     */
    public function edit(Inovasyon $inovasyon)
    {
        return view('admin.inovasyon.edit', compact('inovasyon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Inovasyon $inovasyon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inovasyon $inovasyon)
    {

        if ($request->file('image')) {
            if ($inovasyon->image and file_exists(storage_path("app\\public\\images\\inovasyon_images\\$inovasyon->image")))
                unlink(storage_path("app\\public\\images\\inovasyon_images\\$inovasyon->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/inovasyon_images', $imageName);
            $inovasyon->image = $imageName;
        }
        $inovasyon->baslik = $request->baslik;
        $inovasyon->alt_baslik = $request->alt_baslik;
        $inovasyon->metin_baslik = $request->metin_baslik;
        $inovasyon->metin = $request->metin;
        $inovasyon->link_baslik = $request->link_baslik;
        $inovasyon->link_altbaslik = $request->link_altbaslik;
        $inovasyon->link = $request->link;

        $saved = $inovasyon->save();
        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Inovasyon $inovasyon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inovasyon $inovasyon)
    {
        if ($inovasyon->image and file_exists(storage_path("app\\public\\images\\inovasyon_images\\$inovasyon->image")))
            unlink(storage_path("app\\public\\images\\inovasyon_images\\$inovasyon->image"));
        $saved = $inovasyon->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.inovasyon.index');

    }
}
