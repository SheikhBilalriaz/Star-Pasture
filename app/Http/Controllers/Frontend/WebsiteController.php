<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function front_site()
    {
        $data = [
            'title' => 'Star Pasture'
        ];
        return view('frontend.index', $data);
    }
}
