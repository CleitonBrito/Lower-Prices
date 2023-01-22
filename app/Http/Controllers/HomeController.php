<?php

namespace App\Http\Controllers;

use App\Models\Markets;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $markets;
    public function __construct(Markets $markets){
        $this->markets = $markets;
    }

    public function index()
    {
        $markets = $this->markets::all();
        return view('dashboard', ['data' => $markets]);
    }
}
