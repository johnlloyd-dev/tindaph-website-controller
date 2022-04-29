<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $banner = DB::table('banner')->count();
        $store = DB::table('store')->count();
        $testimony = DB::table('testimony')->count();
        $faqs = DB::table('faqs')->count();

        $products = [
            'banner' => $banner,
            'store' => $store,
            'testimony' => $testimony,
            'faqs' => $faqs,
        ];

        return response()->json($products);
    }
}
