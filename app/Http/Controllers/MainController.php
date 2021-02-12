<?php

namespace App\Http\Controllers;

use App\Models\BaskaninMesaji;
use App\Models\Devletdestegi;
use App\Models\Duyuru;
use App\Models\Etkinlik;
use App\Models\Faliyet;
use App\Models\FaliyetRapor;
use App\Models\Haber;
use App\Models\Hakkimizda;
use App\Models\Ihracat;
use App\Models\IhracatPage;
use App\Models\IhracatRakam;
use App\Models\Ihracatrotasi;
use App\Models\Kadro;
use App\Models\Sektor;
use App\Models\Slider;
use App\Models\Inovasyon;
use App\Models\Sunum;
use Illuminate\Http\Request;
use Mail;

class MainController extends Controller
{
    public function index()
    {
        $slider = Slider::first();
        $duyuru = Duyuru::orderByRaw('ISNULL(sira), sira ASC')->get();
        $haber = Haber::orderBy('created_at','desc')->get();
        $sektor = Sektor::where('durum',1)->where('id','!=',999)->get();
        $ihracat = Ihracat::where('anasayfa','1')->get();
        $faliyet = Faliyet::all();
        $ihracatRakam = IhracatRakam::first();
        $etkinlik = Etkinlik::orderBy('tarih','desc')->get();
        $inovasyon = Inovasyon::all();
        $faliyetRapor = FaliyetRapor::all();
        $baskan = BaskaninMesaji::first();
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
                'faliyetRapor',
                'baskan'
            ])
        );
    }

    public function sektordetail(Sektor $sektor)
    {

        $ihracatrakam = IhracatRakam::where('sektor_id', $sektor->id)
            ->first();
        $etkinlik = Etkinlik::whereIn('sektor_id', [$sektor->id,999])
            ->orderBy('tarih','desc')
            ->get();
//        $faaliyet = Faliyet::where('sektor_id', $sektor->id)
//            ->get();
        $ihracat = Ihracat::where('sektor_id', $sektor->id)
            ->get();
        $haber = Haber::whereIn('sektor_id', [$sektor->id,999])
            ->orderBy('created_at','desc')
            ->get();
        $kadro = Kadro::where('sektor_id','like',"%".$sektor->id."%" )
            ->get();
        return view('frontend.sektordetail', compact(
            'sektor',
            'ihracatrakam',
            'etkinlik',
            'ihracat',
            'haber',
            'kadro'
        ));
    }


    public function hakkimizda()
    {
        $hakkimizda = Hakkimizda::first();
        $sektor = Sektor::where('durum', 1)->where('id','!=',999)
            ->get();
        return view('frontend.hakkimizda', compact('sektor', 'hakkimizda'));
    }


    public function iletisim()
    {
        return view('frontend.iletisim');
    }
    public function iletisim_gonder(Request $request)
    {
        //  Send mail to admin
        Mail::send('mail', array(
            'mesaj' => $request->get('mesaj'),
            'isim_soyisim' => $request->get('isim_soyisim'),
            'email' => $request->get('email'),
            'tel' => $request->get('tel'),
            'adres' => $request->get('adres'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('info@turkishaluminium365.com', 'Admin')->subject('IDDMIB İletişim Formu');
        });
        if (!Mail::failures())
            toastr()->success('Mesajınız Başarıyla Gönderildi');
        else
            toastr()->error('Bir Şeyler Ters Gitti');



        return view('frontend.iletisim');
    }

    public function yonetimkurulu()
    {
        $kadro = Kadro::orderByRaw('ISNULL(sira), sira ASC')->get();
        return view('frontend.yonetimkurulu', compact('kadro'));
    }

    public function idarikadro()
    {
        $kadro = Kadro::orderByRaw('ISNULL(sira), sira ASC')->get();
        return view('frontend.idarikadro', compact('kadro'));
    }

    public function raporlar()
    {

        $fr = FaliyetRapor::orderBy('created_at', 'DESC')
            ->get();
        $fr_first = $fr
            ->first();
        $compact = compact('fr','fr_first');

        return view('frontend.raporlar', $compact);
    }
//
    public function sunumlar()
    {
        $sunum= Sunum::orderBy('created_at', 'DESC')
            ->get();
        $s_first = $sunum->first();
        $compact = compact('sunum','s_first');
        return view('frontend.sunumlar',$compact);
    }

    public function ihracat()
    {
        $ip = IhracatPage::first();
        $compact = compact('ip');
        return view('frontend.ihracat',$compact);
    }

    public function ihracatrota()
    {
        $ir = Ihracatrotasi::first();
        $compact = compact('ir');
        return view('frontend.ihracatrota',$compact);
    }

    public function uyelik()
    {
        return view('frontend.uyelik');
    }
    public function devletdestek()
    {
        $devletdestek = Devletdestegi::first();
        $compact = compact('devletdestek');
        return view('frontend.devletdestek',$compact);
    }

    public function ihracatrapor()
    {
        $ir = Ihracat::where('sektor_id',999)->orderBy('created_at', 'DESC')
            ->get();
        $ir_first = $ir
            ->first();
        $compact = compact('ir','ir_first');

        return view('frontend.ihracatrapor', $compact);
    }

    public function faydalilinkler()
    {
        return view('frontend.faydalilink');
    }

    public function etkinlik()
    {
        $etkinlik = Etkinlik::orderBy('tarih','desc')->get();
        $sektor = Sektor::where('durum',1)
            ->get();
        $compact = compact('etkinlik','sektor');

        return view('frontend.etkinlik',$compact);
    }

    public function yarisma()
    {
        return view('frontend.yarisma');
    }

    public function inovasyon(Inovasyon $inovasyon)
    {
        return view('frontend.inovasyon', compact('inovasyon'));
    }
    public function baskanmesaj()
    {
        $bm = BaskaninMesaji::first();
        $compact = compact('bm');
        return view('frontend.baskanmesaj',$compact);
    }

    public function haber(Haber $haber)
    {
        return view('frontend.haber', compact('haber'));
    }
    public function haberler()
    {
        $haber = Haber::orderBy('created_at','desc')->get();
        $compact = compact('haber');
        return view('frontend.haberler',$compact);
    }

    public function faaliyet(Faliyet $faaliyet)
    {
        $k_ids = explode(',', $faaliyet->kategori_id);

        $etkinlik = Etkinlik::whereIn('kategori_id', $k_ids)
            ->get();
        $compact = compact(
            'faaliyet',
            'etkinlik'
        );

        return view('frontend.faaliyet', $compact);
    }
}
