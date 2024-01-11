<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Chart;



class ChartController extends Controller
{
    public function index()
    {
        return view('charts');
    }

    public function apiCharts()
    {
        $data = Chart::all();
        return response()->json($data);
    }
}
