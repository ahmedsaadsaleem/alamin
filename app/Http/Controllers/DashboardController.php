<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->first_name);
        $pageComponents = [
            'pageTitle'     => 'لوحة التحكم',
            'navElements' => [
                
            ]
        ];
        
        return View::make('dashboard.index', $pageComponents);
    }
}
