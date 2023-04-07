<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medecin;
use App\Models\Adresse;


class medcinController extends Controller
{
    public function index(Request $request)
{
    $medecins = Medecin::paginate(10);
    $specialities = Medecin::distinct()->pluck('specialite')->toArray();
    $governorats = Adresse::distinct()->pluck('governorat');
    $cities = [];
    foreach ($governorats as $governorat) {
        $cities[$governorat] = Adresse::where('governorat', $governorat)->distinct()->pluck('ville');
    }
    return view('medecins.index', compact('medecins', 'specialities','governorats', 'cities'));
}

public function showBySpecialite(Request $request)
{
    $specialite = $request->input('specialite');
  $medecins = Medecin::where('specialite', $specialite)->paginate(10);
  $specialities = [$specialite];
  return view('medecins.speciality', compact('medecins', 'specialities'));
}

public function showByVille(Request $request) {
    $ville = $request->input('ville');
$medecins = Medecin::whereHas('adresse', function ($query) use ($ville) {
  $query->where('ville', $ville);
})->paginate(10);
  $governorats = [$request->input('governorat')];
  return view('medecins.ville', compact('medecins','governorats', 'ville'));
}


}
