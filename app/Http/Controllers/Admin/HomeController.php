<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
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
