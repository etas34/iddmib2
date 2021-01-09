<?php

namespace App\View\Components;

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
        $sektor = Sektor::where('durum',1)
            ->get();
        $compact = compact('sektor');
        return view('layouts.front-app',$compact);
    }
}
