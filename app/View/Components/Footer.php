<?php

namespace App\View\Components;

use App\Models\StaticElement;
use Illuminate\View\Component;

class Footer extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $navLinks = array(
            'beranda' => 'Beranda',
            'tentang' => 'Tentang',
            'infotbc' => 'Info TBC',
            'kasustbc' => 'Kasus TBC',
            'artikel' => 'Artikel',
            'kegiatan' => 'Kegiatan',
        );

        $socials = StaticElement::where('id', '>', 4)->where('id', '<=', 7)->get();
        return view('components.footer', compact('navLinks', 'socials'));
    }
}
