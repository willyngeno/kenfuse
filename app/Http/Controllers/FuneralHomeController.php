<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuneralHomeController extends Controller
{
    public function index()
{
    return view('dashboard.admin');  // Create views accordingly
}

}
