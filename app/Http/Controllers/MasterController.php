<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class MasterController extends Controller
{
    public function index()
    {
        $pageComponents = [
            'pageTitle'     => 'الأمين للأنظمة التكنولوجية',
            'navElements' => [
                
            ]
        ];
        return View::make('master.index', $pageComponents);
    }
}