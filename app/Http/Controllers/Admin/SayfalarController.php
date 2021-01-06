<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hakkimizda;
use Illuminate\Http\Request;

class SayfalarController extends Controller
{
    public function hakkimizda()
    {
        $hakkimizda=Hakkimizda::first();
        return view('admin.sayfalar.hakkimizda',compact('hakkimizda'));
    }
    public function hakkimizda_update(Request $request,Hakkimizda $hakkimizda)
    {
        if ($request->file('image')) {
            if ($hakkimizda->image and file_exists(storage_path("app\\public\\images\\sayfalar_images\\$hakkimizda->image")))
                unlink(storage_path("app\\public\\images\\sayfalar_images\\$hakkimizda->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/sayfalar_images', $imageName);
            $hakkimizda->image = $imageName;

        }

        if ($request->file('pdf1')) {
            $request->validate([

                'pdf1' => 'required|mimes:pdf',

            ]);


            $isim1 = time() . '.' . $request->pdf1->extension();

            $request->pdf1->storeAs('/public/files/sayfalar_files', $isim1);
            $hakkimizda->pdf1 = $isim1;
        }
        if ($request->file('pdf2')) {
            $request->validate([

                'pdf1' => 'required|mimes:pdf',

            ]);


            $isim2 = time() . '2.' . $request->pdf2->extension();

            $request->pdf2->storeAs('/public/files/sayfalar_files', $isim2);
            $hakkimizda->pdf2 = $isim2;
        }
        $hakkimizda->altbaslik = $request->altbaslik;
        $hakkimizda->metinbaslik = $request->metinbaslik;
        $hakkimizda->metin = $request->metin;


        $saved = $hakkimizda->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }
}
