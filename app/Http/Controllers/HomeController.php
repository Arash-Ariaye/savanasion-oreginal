<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'پنل مدیریت',
            'drs' => DB::table('drs')->count(),
            'experts' => DB::table('experts')->count(),
            'farms' => DB::table('farms')->count(),
            'periods' => DB::table('periods')->where('status', 1),
            'dailyReport' => DB::table('daily_reports')->limit(6)->get()
        ];
        return view('home', $data);
    }
}