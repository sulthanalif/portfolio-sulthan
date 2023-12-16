<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $home;

    public function index()
    {
        $Home = new Home();
        return view('index', [
            'getHeader' => $Home->getHeader(),
            'getAbout'     => $Home->getAbout(),
            'getContact' => $Home->getContact(),
            // 'getSkill'     => $Home->getSkill(),
            'getPortfolio'     => $Home->getPortfolio(),
        ]);
    }
}
