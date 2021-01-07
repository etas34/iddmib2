<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Duyuru;
use App\Models\Etkinlik;
use App\Models\Haber;
use App\Models\Sektor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        $haber = Haber::all();
        $sektor = Sektor::where('durum',1);
        $duyuru = Duyuru::all();
        $etkinlik = Etkinlik::all();
        $compact = compact('etkinlik','duyuru','haber','sektor');
        return view('admin.dashboard',$compact);
    }

    public function form_index()
    {
        return view('admin.form.index');
    }

    public function setlocale($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function form_create()
    {
        return view('admin.form.create');
    }

}
