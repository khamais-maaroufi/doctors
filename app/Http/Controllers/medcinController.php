<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medecin;


class medcinController extends Controller
{
    public function index(Request $request)
{
    $medecins = Medecin::paginate(10);
    return view('medecins.index', compact('medecins'));
}
}
