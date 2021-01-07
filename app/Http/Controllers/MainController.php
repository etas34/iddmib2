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


    public function iletisim()
    {
        return view('frontend.iletisim');
    }

    public function yonetimkurulu()
    {
        return view('frontend.yonetimkurulu');
    }
    public function idarikadro()
    {
        return view('frontend.idarikadro');
    }
    public function raporlar()
    {
        return view('frontend.raporlar');
    }
    public function sunumlar()
    {
        return view('frontend.sunumlar');
    }
    public function ihracat()
    {
        return view('frontend.ihracat');
    }
    public function ihracatrota()
    {
        return view('frontend.ihracatrota');
    }
    public function devletdestek()
    {
        return view('frontend.devletdestek');
    }
    public function ihracatrapor()
    {
        return view('frontend.ihracatrapor');
    }
    public function faydalilinkler()
    {
        return view('frontend.faydalilink');
    }
    public function etkinlik()
    {
        return view('frontend.etkinlik');
    }
    public function yarisma()
    {
        return view('frontend.yarisma');
    }
    public function inovasyon(Inovasyon $inovasyon)
    {
        return view('frontend.inovasyon',compact('inovasyon'));
    }
    public function faaliyet(Faliyet $faaliyet)
    {
        return view('frontend.faaliyet',compact('faaliyet'));
    }
}
