<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devletdestegi;
use App\Models\Hakkimizda;
use App\Models\IhracatPage;
use App\Models\Ihracatrotasi;
use App\Models\Kadro;
use App\Models\Sektor;
use Illuminate\Http\Request;

class SayfalarController extends Controller
{
    public function hakkimizda()
    {
        $hakkimizda = Hakkimizda::first();
        return view('admin.sayfalar.hakkimizda', compact('hakkimizda'));
    }

    public function hakkimizda_update(Request $request, Hakkimizda $hakkimizda)
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

                'pdf2' => 'required|mimes:pdf',

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
  public function ihracatrotasi()
    {
        $ihracatrotasi = Ihracatrotasi::first();
        return view('admin.sayfalar.ihracatrotasi', compact('ihracatrotasi'));
    }

    public function ihracatrotasi_update(Request $request, Ihracatrotasi $ihracatrotasi)
    {
        if ($request->file('image')) {
            if ($ihracatrotasi->image and file_exists(storage_path("app\\public\\images\\sayfalar_images\\$ihracatrotasi->image")))
                unlink(storage_path("app\\public\\images\\sayfalar_images\\$ihracatrotasi->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/sayfalar_images', $imageName);
            $ihracatrotasi->image = $imageName;

        }

        $ihracatrotasi->altbaslik = $request->altbaslik;
        $ihracatrotasi->metinbaslik = $request->metinbaslik;
        $ihracatrotasi->metin = $request->metin;
        $ihracatrotasi->link = $request->link;
        $ihracatrotasi->link_baslik = $request->link_baslik;
        $ihracatrotasi->link_altbaslik = $request->link_altbaslik;


        $saved = $ihracatrotasi->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }

public function devletdestegi()
    {
        $devletdestegi = Devletdestegi::first();
        return view('admin.sayfalar.devletdestegi', compact('devletdestegi'));
    }

    public function devletdestegi_update(Request $request, Devletdestegi $devletdestegi)
    {
        if ($request->file('image')) {
            if ($devletdestegi->image and file_exists(storage_path("app\\public\\images\\sayfalar_images\\$devletdestegi->image")))
                unlink(storage_path("app\\public\\images\\sayfalar_images\\$devletdestegi->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/sayfalar_images', $imageName);
            $devletdestegi->image = $imageName;

        }

        $devletdestegi->altbaslik = $request->altbaslik;
        $devletdestegi->metinbaslik = $request->metinbaslik;
        $devletdestegi->metin = $request->metin;
        $devletdestegi->link = $request->link;
        $devletdestegi->link_baslik = $request->link_baslik;
        $devletdestegi->link_altbaslik = $request->link_altbaslik;


        $saved = $devletdestegi->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }


    public function kadro_index()
    {
        $kadro = Kadro::all();
        return view('admin.sayfalar.kadro.index', compact('kadro'));
    }

    public function kadro_create()
    {
        $sektor = Sektor::where('durum', 1)
            ->get();
        return view('admin.sayfalar.kadro.create', compact('sektor'));

    }

    public function kadro_edit(Kadro $kadro)
    {
        $sektor = Sektor::where('durum', 1)
            ->get();
        return view('admin.sayfalar.kadro.edit', compact('kadro', 'sektor'));
    }

    public function kadro_destroy(Kadro $kadro)
    {
        if ($kadro->resim and file_exists(storage_path("app\\public\\images\\kadro_images\\$kadro->resim")))
            unlink(storage_path("app\\public\\images\\kadro_images\\$kadro->resim"));
        $saved = $kadro->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti!');

        return redirect()->route('admin.sayfalar.kadro_index');

    }

    public function kadro_update(Kadro $kadro, Request $request)
    {
        if ($request->file('resim')) {
            if ($kadro->resim and file_exists(storage_path("app\\public\\images\\kadro_images\\$kadro->resim")))
                unlink(storage_path("app\\public\\images\\kadro_images\\$kadro->resim"));
            $request->validate([

                'resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time() . '.' . $request->resim->extension();

            $request->resim->storeAs('/public/images/kadro_images', $imageName);
            $kadro->resim = $imageName;

        }
        $kadro->ad_soyad = $request->ad_soyad;
        $kadro->tel = $request->tel;
        $kadro->email = $request->email;
        $kadro->unvan = $request->unvan;
        $saved = $kadro->save();
        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti!');


        return redirect()->route('admin.sayfalar.kadro_index');

    }

    public function kadro_store(Request $request)
    {
        $kadro = new Kadro();
        if ($request->file('resim')) {
            $request->validate([

                'resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time() . '.' . $request->resim->extension();

            $request->resim->storeAs('/public/images/kadro_images', $imageName);
            $kadro->resim = $imageName;

        }
        $kadro->kadro = $request->kadro;
        $kadro->sektor_id = $request->sektor_id;
        $kadro->ad_soyad = $request->ad_soyad;
        $kadro->tel = $request->tel;
        $kadro->email = $request->email;
        $kadro->unvan = $request->unvan;
        $saved = $kadro->save();
        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti!');


        return redirect()->route('admin.sayfalar.kadro_index');


    }


    public function ihracatPage()
    {
        $ihracatPage = IhracatPage::first();
        return view('admin.sayfalar.ihracatPage', compact('ihracatPage'));
    }



    public function ihracatPage_update(Request $request, IhracatPage $ihracatPage)
    {
        if ($request->file('image')) {
            if ($ihracatPage->image and file_exists(storage_path("app\\public\\images\\sayfalar_images\\$ihracatPage->image")))
                unlink(storage_path("app\\public\\images\\sayfalar_images\\$ihracatPage->image"));
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs('/public/images/sayfalar_images', $imageName);
            $ihracatPage->image = $imageName;

        }

        $ihracatPage->baslik = $request->baslik;
        $ihracatPage->altbaslik = $request->altbaslik;
        $ihracatPage->metinbaslik = $request->metinbaslik;
        $ihracatPage->metin = $request->metin;
        $ihracatPage->link_baslik = $request->link_baslik;
        $ihracatPage->link_altbaslik = $request->link_altbaslik;
        $ihracatPage->link = $request->link;


        $saved = $ihracatPage->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }





}

