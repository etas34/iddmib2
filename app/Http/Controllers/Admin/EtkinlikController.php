<?php

namespace App\Http\Controllers\Admin;

use App\Models\Etkinlik;
use App\Http\Controllers\Controller;
use App\Models\Sektor;
use Illuminate\Http\Request;

class EtkinlikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etkinlik = Etkinlik::all();
        return view('admin.etkinlik.index', compact('etkinlik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sektor=Sektor::where('durum',1)->get();
        return view('admin.etkinlik.create',compact('sektor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etkinlik = new Etkinlik();
        $etkinlik->kategori_id = $request->kategori_id;
        $etkinlik->tarih = $request->yil . "-" . $request->ay ."-". $request->gun;
        $etkinlik->baslik = $request->baslik;
        $etkinlik->sektor_id = $request->sektor_id ;
        $etkinlik->alt_baslik = '';
        $saved = $etkinlik->save();
        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');
        return redirect()->route('admin.etkinlik.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Etkinlik $etkinlik
     * @return \Illuminate\Http\Response
     */
    public function show(Etkinlik $etkinlik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Etkinlik $etkinlik
     * @return \Illuminate\Http\Response
     */
    public function edit(Etkinlik $etkinlik)
    {
        $sektor=Sektor::where('durum',1)->get();

        $tarih = explode("-",$etkinlik->tarih);
        return view('admin.etkinlik.edit',compact('etkinlik','tarih','sektor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Etkinlik $etkinlik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etkinlik $etkinlik)
    {
        $etkinlik->kategori_id = $request->kategori_id;
        $etkinlik->tarih = $request->yil . "-" . $request->ay ."-". $request->gun;
        $etkinlik->baslik = $request->baslik;
        $etkinlik->sektor_id = $request->sektor_id ;
        $etkinlik->alt_baslik ='';
        $saved = $etkinlik->save();
        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Etkinlik $etkinlik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etkinlik $etkinlik)
    {
        $saved = $etkinlik->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.etkinlik.index');
    }
}
