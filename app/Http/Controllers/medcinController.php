<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medecin;


class medcinController extends Controller
{
    public function index(Request $request)
{
    $medecins = Medecin::paginate(10);
    $specialities = Medecin::distinct()->pluck('specialite')->toArray();
    return view('medecins.index', compact('medecins', 'specialities'));
}

public function showBySpecialite(Request $request)
{
    $specialite = $request->input('specialite');
    // dd($request->input('option'));
  $medecins = Medecin::where('specialite', $specialite)->paginate(10);
  $specialities = Medecin::distinct()->pluck('specialite')->toArray();
  return view('medecins.index', compact('medecins', 'specialities'));
}


}
