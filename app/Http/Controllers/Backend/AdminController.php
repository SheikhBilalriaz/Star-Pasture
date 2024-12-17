<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function account_dashboard()
    {
        $data = [
            'title' => 'Star Pasture | Admin Dashboard'
        ];

        return view('backend.dashboard' ,$data);
    }
}
