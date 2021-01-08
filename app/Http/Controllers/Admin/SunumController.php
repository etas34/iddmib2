<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sunum;
use Illuminate\Http\Request;

class SunumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sunum = Sunum::all();
        $compact = compact('sunum');
        return view('admin.sunum.index',$compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sunum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sunum = new Sunum();
        if ($request->file('sunum')) {
            $request->validate([

                'sunum' => 'required',

            ]);


            $pdfName = time() . '.' . $request->sunum->extension();

            $request->sunum->storeAs('/public/files/sunum_files', $pdfName);
            $sunum->sunum = $pdfName;

        }
        $sunum->aciklama = $request->aciklama;
        $saved = $sunum->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return redirect()->route('admin.sunum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sunum  $sunum
     * @return \Illuminate\Http\Response
     */
    public function show(Sunum $sunum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sunum  $sunum
     * @return \Illuminate\Http\Response
     */
    public function edit(Sunum $sunum)
    {
        $compact = compact('sunum');
        return view('admin.sunum.edit',$compact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sunum  $sunum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sunum $sunum)
    {
        if ($request->file('sunum')) {
            if ($sunum->sunum and file_exists(storage_path("app\\public\\files\\sunum_files\\$sunum->sunum")))
                unlink(storage_path("app\\public\\files\\sunum_files\\$sunum->sunum"));
            $request->validate([

                'sunum' => 'required',

            ]);


            $pdfName = time() . '.' . $request->sunum->extension();

            $request->sunum->storeAs('/public/files/sunum_files', $pdfName);
            $sunum->sunum = $pdfName;

        }
        $sunum->aciklama = $request->aciklama;
        $saved = $sunum->save();

        if ($saved)
            toastr()->success('Kayıt Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sunum  $sunum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sunum $sunum)
    {
        if ($sunum->sunum and file_exists(storage_path("app\\public\\files\\sunum_files\\$sunum->sunum")))
            unlink(storage_path("app\\public\\files\\sunum_files\\$sunum->sunum"));
        $saved = $sunum->delete();
        if ($saved)
            toastr()->success('Silme Başarılı');
        else
            toastr()->error('Bir Şeyler Ters Gitti');
        return back();
    }
}
