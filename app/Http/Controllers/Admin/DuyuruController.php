<?php

namespace App\Http\Controllers\Admin;


use App\Models\Duyuru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DuyuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duyuru =Duyuru::orderByRaw('ISNULL(sira), sira ASC')->get();
        return view('admin.duyuru.index',compact('duyuru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.duyuru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duyuru = new Duyuru();
        if ($request->file('image')) {
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/duyuru_images', $imageName);
            $duyuru->image = $imageName;

        }
        $duyuru->link = $request->link;
        $saved = $duyuru->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.duyuru.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Duyuru  $duyuru
     * @return \Illuminate\Http\Response
     */
    public function show(Duyuru $duyuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Duyuru  $duyuru
     * @return \Illuminate\Http\Response
     */
    public function edit(Duyuru $duyuru)
    {
        return view('admin.duyuru.edit',compact('duyuru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Duyuru  $duyuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Duyuru $duyuru)
    {
        if ($request->file('image')) {
            if ($duyuru->image and file_exists(storage_path("app\\public\\images\\duyuru_images\\$duyuru->image")))
                unlink(storage_path("app\\public\\images\\duyuru_images\\$duyuru->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/duyuru_images', $imageName);
            $duyuru->image = $imageName;

        }
        $duyuru->link = $request->link;
        $saved = $duyuru->save();

        if ($saved)
            toastr()->success('Güncelleme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.duyuru.index');

    }

    public function sira(Request $request, Duyuru $duyuru)
    {

        $duyuru->sira=$request->sira;
        $saved = $duyuru->save();

        if ($saved)
            toastr()->success('Güncelleme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Duyuru  $duyuru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duyuru $duyuru)
    {
        if ($duyuru->image and file_exists(storage_path("app\\public\\images\\duyuru_images\\$duyuru->image")))
            unlink(storage_path("app\\public\\images\\duyuru_images\\$duyuru->image"));
        $saved = $duyuru->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.duyuru.index');

    }
}
