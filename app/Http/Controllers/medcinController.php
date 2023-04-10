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
    // $governorats = Adresse::distinct()->pluck('governorat');
    // $cities = [];
    // foreach ($governorats as $governorat) {
    //     $cities[$governorat] = Adresse::where('governorat', $governorat)->distinct()->pluck('ville');
    // }
    $governorats = Adresse::join('medecins', 'medecins.id_adresse', '=', 'adresse.id_adresse')
    ->distinct()->pluck('governorat');

$cities = [];
foreach ($governorats as $governorat) {
    $cities[$governorat] = Adresse::join('medecins', 'medecins.id_adresse', '=', 'adresse.id_adresse')
        ->where('governorat', $governorat)->distinct()->pluck('ville');
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

public function search(Request $request)
{
    $nom_docteur = $request->input('nom_docteur');
  $medecins = Medecin::where('nom_docteur', 'like', '%'.$nom_docteur.'%')->orWhere('specialite', 'like', '%'.$nom_docteur.'%')->paginate(10);

    return view('medecins.search', compact('medecins', 'nom_docteur'));
}

public function ajaxView() {
  $medecins = Medecin::paginate(10);
  return view('ajax.index', compact('medecins'));
}

public function searchAjax(Request $request)
{
if($request->ajax())
{
$output="";
$nom_docteur = $request->input('nom_docteur');

$medecins = Medecin::where('nom_docteur', 'like', '%'.$nom_docteur.'%');
if($medecins)
{
foreach ($medecins as $key => $medecin) {
$output.='<tr>'.
'<td>'.$medecin->nom_docteur.'</td>'.
'<td>'.$medecin->specialite.'</td>'.
'<td>'.$medecin->telephone.'</td>'.
'<td>'.$medecin->adresse->adresse.'</td>'.
'<td>'.$medecin->adresse->governorat.'</td>'.
'<td>'.$medecin->adresse->ville.'</td>'.
'<td>'.$medecin->adresse->governorat.'</td>'.
'<td>'.$medecin->adresse->pays.'</td>'.
'</tr>';
}
return Response($output);
   }
  }}


}
