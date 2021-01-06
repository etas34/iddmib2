<?php

namespace App\Http\Controllers;

use App\Models\Duyuru;
use App\Models\Etkinlik;
use App\Models\Faliyet;
use App\Models\FaliyetRapor;
use App\Models\Haber;
use App\Models\Ihracat;
use App\Models\IhracatRakam;
use App\Models\Sektor;
use App\Models\Slider;
use App\Models\Inovasyon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $slider = Slider::first();
        $duyuru = Duyuru::all();
        $haber = Haber::all();
        $sektor = Sektor::all();
        $ihracat = Ihracat::all();
        $faliyet = Faliyet::all();
        $ihracatRakam = IhracatRakam::first();
        $etkinlik = Etkinlik::all();
        $inovasyon = Inovasyon::all();
        $faliyetRapor = FaliyetRapor::all();

        return view('index',
            compact([
                'slider',
                'duyuru',
                'haber',
                'sektor',
                'ihracat',
                'faliyet',
                'ihracatRakam',
                'etkinlik',
                'inovasyon',
                'faliyetRapor'
            ])
        );
    }

    public function sektordetail(Sektor $sektor)
    {

        $ihracatrakam = IhracatRakam::where('sektor_id', $sektor->id)
            ->first();
        $etkinlik = Etkinlik::where('sektor_id', $sektor->id)
            ->get();
        $faaliyet = Faliyet::where('sektor_id', $sektor->id)
            ->get();
        $ihracat = Ihracat::where('sektor_id', $sektor->id)
            ->get();
        $haber = Haber::where('sektor_id',$sektor->id)
            ->get();

        return view('frontend.sektordetail', compact(
            'sektor',
            'ihracatrakam',
            'etkinlik',
            'faaliyet',
            'ihracat',
            'haber'
        ));
    }
    public function hakkimizda()
    {
        return view('frontend.hakkimizda');
    }
}
