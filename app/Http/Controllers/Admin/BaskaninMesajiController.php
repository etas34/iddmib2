<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaskaninMesaji;
use Illuminate\Http\Request;

class BaskaninMesajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaskaninMesaji  $baskaninmesaji
     * @return \Illuminate\Http\Response
     */
    public function show(BaskaninMesaji $baskaninmesaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaskaninMesaji  $baskaninmesaji
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit()
    {
        $baskaninmesaji = BaskaninMesaji::first();
        return view('admin.mesaj.baskaninmesaji',compact('baskaninmesaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaskaninMesaji  $baskaninmesaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaskaninMesaji $baskaninmesaji)
    {
        if ($request->file('image')) {

            if ($baskaninmesaji->image and file_exists(storage_path("app\\public\\images\\baskan_images\\$baskaninmesaji->image")))
                unlink(storage_path("app\\public\\images\\baskan_images\\$baskaninmesaji->image"));


            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/baskan_images', $imageName);
            $baskaninmesaji->image = $imageName;

        }
        $baskaninmesaji->metin = $request->metin;
        $saved = $baskaninmesaji->save();
        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');
        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaskaninMesaji  $baskaninmesaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaskaninMesaji $baskaninmesaji)
    {
        //
    }
}
