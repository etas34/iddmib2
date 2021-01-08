<?php

namespace App\Http\Controllers\Admin;


use App\Models\FaliyetRapor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaliyetRaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faliyetRapor = FaliyetRapor::all();

        return view('admin.faliyetrapor.index',compact('faliyetRapor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faliyetrapor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faliyetrapor = new FaliyetRapor;
        if ($request->file('pdf')) {
            $request->validate([

                'pdf' => 'required|mimes:pdf',

            ]);


            $pdfName = time() . '.' . $request->pdf->extension();

            $request->pdf->storeAs('/public/files/faliyetrapor_files', $pdfName);
            $faliyetrapor->rapor = $pdfName;

        }
        $faliyetrapor->aciklama = $request->baslik;
        $saved = $faliyetrapor->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.faliyetrapor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FaliyetRapor $faliyetRapor
     * @return \Illuminate\Http\Response
     */
    public function show(FaliyetRapor $faliyetRapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FaliyetRapor $faliyetRapor
     * @return \Illuminate\Http\Response
     */
    public function edit(FaliyetRapor $faliyetRapor)
    {
        return view('admin.faliyetrapor.edit', compact('faliyetRapor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FaliyetRapor $faliyetRapor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaliyetRapor $faliyetRapor)
    {
        if ($request->file('pdf')) {
            if ($faliyetRapor->pdf and file_exists(storage_path("app\\public\\files\\faliyetrapor_files\\$faliyetRapor->pdf")))
                unlink(storage_path("app\\public\\files\\faliyetrapor_files\\$faliyetRapor->pdf"));
            $request->validate([

                'pdf' => 'required|mimes:pdf',

            ]);


            $pdfName = time() . '.' . $request->pdf->extension();

            $request->pdf->storeAs('/public/files/faliyetrapor_files', $pdfName);
            $faliyetRapor->rapor = $pdfName;

        }
        $faliyetRapor->aciklama = $request->baslik;
        $saved = $faliyetRapor->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.faliyetrapor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FaliyetRapor $faliyetRapor
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaliyetRapor $faliyetRapor)
    {
        if ($faliyetRapor->pdf and file_exists(storage_path("app\\public\\files\\faliyetrapor_files\\$faliyetRapor->pdf")))
            unlink(storage_path("app\\public\\files\\faliyetrapor_files\\$faliyetRapor->pdf"));
        $saved = $faliyetRapor->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.faliyetrapor.index');
    }
}
