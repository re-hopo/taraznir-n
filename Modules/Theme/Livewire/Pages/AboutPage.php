<?php

namespace App\Http\Livewire\Pages;

use App\Models\Option;
use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        $seo = redisHandler( 'about_page_seo' ,function (){
            return Option::where('key' ,'about_page_seo')->first();
        });

        return view('pages.about-page' ,[
            'seo' => $seo
        ]);
    }
}
