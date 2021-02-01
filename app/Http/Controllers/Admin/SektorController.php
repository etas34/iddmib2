<?php

namespace App\Http\Controllers\Admin;


use App\Models\Ihracat;
use App\Models\IhracatRakam;
use App\Models\Sektor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SektorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sektor =  Sektor::where('durum',1)->where('id','!=',999)
        ->get();
        return view('admin.sektor.index',compact('sektor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.sektor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sektor = new Sektor();
        if ($request->file('ana_resim')) {
            $request->validate([

                'ana_resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = time() . '.' . $request->ana_resim->extension();

            $request->ana_resim->storeAs('/public/images/sektor_images', $imageName);
            $sektor->ana_resim = $imageName;

        }
        if ($request->file('detay_resim')) {
            $request->validate([

                'detay_resim' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $imageName = 'detay'.time() . '.' . $request->detay_resim->extension();

            $request->detay_resim->storeAs('/public/images/sektor_images', $imageName);
            $sektor->detay_resim = $imageName;

        }
        if ($request->file('sektor_resim')) {
            $request->validate([

                'sektor_resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

            ]);


            $resimName = time() . '.' . $request->sektor_resim->extension();

            $request->sektor_resim->storeAs('/public/images/sektor_resim', $resimName);
            $sektor->sektor_resim = $resimName;

        }
        if ($request->file('gtip_pdf')) {
            $request->validate([

                'gtip_pdf' => 'required|mimes:pdf',

            ]);


            $isim1 = time() . '.' . $request->gtip_pdf->extension();

            $request->gtip_pdf->storeAs('/public/files/gtip_pdf', $isim1);
            $sektor->gtip_pdf = $isim1;
        }

        if ($request->file('tanitim_pdf')) {
            $request->validate([

                'tanitim_pdf' => 'required|mimes:pdf',

            ]);


            $isim2 = time() . '.' . $request->tanitim_pdf->extension();

            $request->tanitim_pdf->storeAs('/public/files/tanitim_pdf', $isim2);
            $sektor->tanitim_pdf = $isim2;
        }


        $sektor->baslik = $request->baslik;
        $sektor->alt_baslik = $request->baslik;
        $sektor->metin_baslik = $request->metin_baslik;
        $sektor->aciklama = $request->aciklama;
        $sektor->sektor_link_baslik = $request->sektor_link_baslik;
        $sektor->sektor_link_altbaslik = $request->sektor_link_altbaslik;
        $sektor->sektor_link = $request->sektor_link;

        $saved = $sektor->save();
            if ($saved)
                toastr()->success('Kayıt Başarılı');
            else
                toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.sektor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sektor  $sektor
     * @return \Illuminate\Http\Response
     */
    public function show(Sektor $sektor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sektor  $sektor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sektor $sektor)
    {
        return view('admin.sektor.edit',compact('sektor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sektor  $sektor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sektor $sektor)
    {

        if ($request->file('ana_resim')) {
            if ($sektor->image and file_exists(storage_path("app\\public\\images\\sektor_images\\$sektor->ana_resim")))
                unlink(storage_path("app\\public\\images\\sektor_images\\$sektor->image"));

            $request->validate([

                'ana_resim' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);



            $imageName = time() . '.' . $request->ana_resim->extension();

            $request->ana_resim->storeAs('/public/images/sektor_images', $imageName);
            $sektor->ana_resim = $imageName;

        }
        if ($request->file('detay_resim')) {
            if ($sektor->image and file_exists(storage_path("app\\public\\images\\sektor_images\\$sektor->detay_resim")))
                unlink(storage_path("app\\public\\images\\sektor_images\\$sektor->image"));

            $request->validate([

                'detay_resim' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);



            $imageName = 'detay'.time() . '.' . $request->detay_resim->extension();

            $request->detay_resim->storeAs('/public/images/sektor_images', $imageName);
            $sektor->detay_resim = $imageName;

        }
        if ($request->file('gtip_pdf')) {
            $request->validate([

                'gtip_pdf' => 'required|mimes:pdf',

            ]);


            $isim1 = time() . '.' . $request->gtip_pdf->extension();


            $request->gtip_pdf->storeAs('/public/files/gtip_pdf', $isim1);
            $sektor->gtip_pdf = $isim1;
        }

        if ($request->file('tanitim_pdf')) {
            $request->validate([

                'tanitim_pdf' => 'required|mimes:pdf',

            ]);


            $isim2 = time() . '.' . $request->tanitim_pdf->extension();

            $request->tanitim_pdf->storeAs('/public/files/tanitim_pdf', $isim2);
            $sektor->tanitim_pdf = $isim2;
        }


        if ($request->file('sektor_resim')) {
            if ($sektor->sektor_resim and file_exists(storage_path("app\\public\\images\\sektor_resim\\$sektor->sektor_resim")))
                unlink(storage_path("app\\public\\images\\sektor_resim\\$sektor->sektor_resim"));

            $request->validate([

                'sektor_resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $resimName = time() . '.' . $request->sektor_resim->extension();

            $request->sektor_resim->storeAs('/public/images/sektor_resim', $resimName);
            $sektor->sektor_resim = $resimName;

        }
        $sektor->baslik = $request->baslik;
        $sektor->alt_baslik = $request->alt_baslik;
        $sektor->metin_baslik = $request->metin_baslik;
        $sektor->aciklama = $request->aciklama;
        $sektor->sektor_link_baslik = $request->sektor_link_baslik;
        $sektor->sektor_link_altbaslik = $request->sektor_link_altbaslik;
        $sektor->sektor_link = $request->sektor_link;
        $saved = $sektor->save();
        if ($saved)
            toastr()->success('Guncelleme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sektor  $sektor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sektor $sektor)
    {
//        if ($sektor->image and file_exists(storage_path("app\\public\\images\\sektor_images\\$sektor->image")))
//            unlink(storage_path("app\\public\\images\\sektor_images\\$sektor->image"));
//        if ($sektor->sektor_resim and file_exists(storage_path("app\\public\\images\\sektor_resim\\$sektor->sektor_resim")))
//            unlink(storage_path("app\\public\\images\\sektor_resim\\$sektor->sektor_resim"));
        $sektor->durum = 0;
        $saved = $sektor->save();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }
}
