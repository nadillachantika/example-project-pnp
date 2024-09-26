<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{

    public function index()
    {
        $informations = Information::all();
        return view('admin.informasi.index', compact('informations'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }
}
