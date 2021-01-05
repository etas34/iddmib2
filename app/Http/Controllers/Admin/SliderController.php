<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider = Slider::all();

        if ($slider->count() <= 0 )
            return view('admin.slider.create');
        else{
            toastr()->error('Maksimum 1 Kayıt Eklenebilinir!');
            return redirect()->route('admin.slider.index');
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        if ($request->file('image')) {
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/slider_images', $imageName);
            $slider->image = $imageName;

        }

        $slider->baslik = $request->baslik;
        $slider->alt_baslik = $request->alt_baslik;
        $slider->aciklama = $request->aciklama;


        $saved = $slider->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.slider.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {

        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if ($request->file('image')) {
            if ($slider->image and file_exists(storage_path("app\\public\\images\\slider_images\\$slider->image")))
                unlink(storage_path("app\\public\\images\\slider_images\\$slider->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/slider_images', $imageName);
            $slider->image = $imageName;

        }

        $slider->baslik = $request->baslik;
        $slider->alt_baslik = $request->alt_baslik;
        $slider->aciklama = $request->aciklama;


        $saved = $slider->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image and file_exists(storage_path("app\\public\\images\\slider_images\\$slider->image")))
            unlink(storage_path("app\\public\\images\\slider_images\\$slider->image"));
        $saved = $slider->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.slider.index');
    }
}
