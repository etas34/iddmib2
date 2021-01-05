<?php
namespace App\Http\Controllers\Admin;

use App\Models\IhracatRakam;
use App\Http\Controllers\Controller;
use App\Models\Sektor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IhracatRakamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ihracatrakam = IhracatRakam::all();
        return view('admin.ihracatrakam.index',compact('ihracatrakam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sektor = Sektor::all();
        return view('admin.ihracatrakam.create',compact('sektor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ihracatrakam = new IhracatRakam();
        $ihracatrakam->sektor_id = $request->sektor_id;
        $ihracatrakam->o_birinci = $request->o_birinci;
        $ihracatrakam->o_ikinci = $request->o_ikinci;
        $ihracatrakam->o_ucuncu = $request->o_ucuncu;
        $ihracatrakam->s_birinci = $request->s_birinci;
        $ihracatrakam->s_ikinci = $request->s_ikinci;
        $ihracatrakam->s_ucuncu = $request->s_ucuncu;
        $ihracatrakam->guncelleme_tarih = $request->guncelleme_tarih;
        $saved = $ihracatrakam->save();
        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');
        return redirect()->route('admin.ihracatrakam.index');



//        $ihracatrakam->sonay

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IhracatRakam  $ihracatRakam
     * @return \Illuminate\Http\Response
     */
    public function show(IhracatRakam $ihracatRakam)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IhracatRakam  $ihracatRakam
     * @return \Illuminate\Http\Response
     */
    public function edit(IhracatRakam $ihracatRakam)
    {
       $sektor = Sektor::where('durum',1)
           ->get();
        return view('admin.ihracatrakam.edit',compact('ihracatRakam','sektor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IhracatRakam  $ihracatRakam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IhracatRakam $ihracatRakam)
    {
        $ihracatRakam->o_birinci = $request->o_birinci;
        $ihracatRakam->sektor_id = $request->sektor_id;
        $ihracatRakam->o_ikinci = $request->o_ikinci;
        $ihracatRakam->o_ucuncu = $request->o_ucuncu;
        $ihracatRakam->s_birinci = $request->s_birinci;
        $ihracatRakam->s_ikinci = $request->s_ikinci;
        $ihracatRakam->s_ucuncu = $request->s_ucuncu;
        $ihracatRakam->guncelleme_tarih = $request->guncelleme_tarih;
        $saved = $ihracatRakam->save();
        if ($saved)
            toastr()->success('Güncelleme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IhracatRakam  $ihracatRakam
     * @return \Illuminate\Http\Response
     */
    public function destroy(IhracatRakam $ihracatRakam)
    {
        $saved = $ihracatRakam->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');
        return redirect()->route('admin.ihracatrakam.index');
    }
}
