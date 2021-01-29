<?php

namespace App\View\Components;

use App\Models\Faliyet;
use App\Models\Inovasyon;
use App\Models\Sektor;
use Illuminate\View\Component;

class FrontApp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $sektor = Sektor::where('durum',1)->where('id','!=',999)
            ->get();
        $faaliyet  = Faliyet::all();
        $inovasyon = Inovasyon::all();
        $compact = compact('inovasyon','sektor','faaliyet');
        return view('layouts.front-app',$compact);
    }
}
