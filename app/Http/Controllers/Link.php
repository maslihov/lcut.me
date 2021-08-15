<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Links;
use App\Models\Clicks;

class Link extends Controller
{
    
    public function redirect(Links $link)
    {
        Clicks::click($link->link_id);
        return redirect()->away($link->full_url);
    }
    
    public function add(Request $request) 
    {
        $request->validate([
            'url' => Links::VALID_FULL_URL,
        ]);
        
        $link_id = Links::new($request->input('url'));
        
        return [
            'short_link' => url($link_id)
        ];
    }
    
    public function info(Links $link)
    {
        return view('info', ['link' => $link]);
    }
}
