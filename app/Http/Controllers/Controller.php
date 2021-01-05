<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        //its just a dummy data object.
        $langs = array(
            "tr"=>"Türkçe",
            "en"=>"English",

        );
        $ay = array(
                'Ocak'=>'Ocak',
                'Şubat'=>'Şubat',
                'Mart'=>'Mart',
                'Nisan'=>'Nisan',
                'Mayıs'=>'Mayıs',
                'Haziran'=>'Haziran',
                'Temmuz'=>'Temmuz',
                'Ağustos'=>'Ağustos',
                'Eylül' => 'Eylül',
                'Ekim' => 'Ekim',
                'Kasım' => 'Kasım',
                'Aralık' => 'Aralık',

        );
        $ay2 = array(
          '1'  => 'Ocak',
          '2'  => 'Mart',
          '3'  => 'Nisan',
          '4'  => 'Şubat',
          '5'  => 'Mayıs',
          '6'  => 'Haziran',
          '7'  => 'Temmuz',
          '8'  => 'Ağustos',
          '9'  => 'Eylül',
          '10' => 'Ekim',
          '11' => 'Kasım',
          '12' => 'Aralık',

        );

        // Sharing is caring
        View::share('langs', $langs);
        View::share('ay', $ay);
        View::share('ay2', $ay2);
    }
}
