<?php

namespace App\Http\Controllers\Admin;


use App\Models\Ihracat;
use App\Http\Controllers\Controller;
use App\Models\Sektor;
use Illuminate\Http\Request;

class IhracatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ihracat = Ihracat::all();
        return view('admin.ihracat.index',compact('ihracat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sektor=Sektor::where('durum',1)->get();
        return view('admin.ihracat.create',compact('sektor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ihracat = new Ihracat();
        if ($request->file('pdf')) {
            $request->validate([

                'pdf' => 'required|mimes:pdf',

            ]);


            $pdfName = time() . '.' . $request->pdf->extension();

            $request->pdf->storeAs('/public/files/ihracat_files', $pdfName);
            $ihracat->pdf = $pdfName;

        }
        $ihracat->baslik = $request->baslik;
        $ihracat->sektor_id = $request->sektor_id;
        if ($request->anasayfa)
            $ihracat->anasayfa = $request->anasayfa;
        else
            $ihracat->anasayfa = 0;

        $saved = $ihracat->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.ihracat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ihracat  $ihracat
     * @return \Illuminate\Http\Response
     */
    public function show(Ihracat $ihracat)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ihracat  $ihracat
     * @return \Illuminate\Http\Response
     */
    public function edit(Ihracat $ihracat)
    {
        $sektor=Sektor::where('durum',1)->get();
        return view('admin.ihracat.edit',compact('ihracat','sektor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ihracat  $ihracat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ihracat $ihracat)
    {
        if ($request->file('pdf')) {
            if ($ihracat->pdf and file_exists(storage_path("app\\public\\files\\ihracat_files\\$ihracat->pdf")))
                unlink(storage_path("app\\public\\files\\ihracat_files\\$ihracat->pdf"));
            $request->validate([

                'pdf' => 'required|mimes:pdf',

            ]);


            $pdfName = time() . '.' . $request->pdf->extension();

            $request->pdf->storeAs('/public/files/ihracat_files', $pdfName);
            $ihracat->pdf = $pdfName;

        }
        $ihracat->baslik = $request->baslik;
        $ihracat->sektor_id = $request->sektor_id;
        if ($request->anasayfa)
            $ihracat->anasayfa = $request->anasayfa;
        else
            $ihracat->anasayfa = 0;
        $saved = $ihracat->save();

        if ($saved)
            toastr()->success('Güncelleme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ihracat  $ihracat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ihracat $ihracat)
    {
        if ($ihracat->pdf and file_exists(storage_path("app\\public\\files\\ihracat_files\\$ihracat->pdf")))
            unlink(storage_path("app\\public\\files\\ihracat_files\\$ihracat->pdf"));
        $saved = $ihracat->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();

    }
}
