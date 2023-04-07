@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="text-align: center; padding: 5%;">
            <h2>Liste des médecins</h2>
        </div>
        <div class="row">
        <div class="col-md-12" style="text-align: center; padding: 5%;">
            <h4>Vous avez recherché nom de docteur: {{$nom_docteur}}</h4>
        </div>
        
        <a href="/" class="btn btn-primary" style="width: 15%; padding: 5px; margin: auto;">Retour</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Speciality</th>
                            <th>Telephone</th>
                            <!-- <th>Date</th> -->
                            <th>Address</th>
                            <th>ville</th>
                            <th>governorat</th>
                            <th>pays</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medecins as $medecin)
                        <tr>
                            <td>{{ $medecin->nom_docteur }}</td>
                            <td>{{ $medecin->specialite }}</td>
                            <td>{{ $medecin->telephone }}</td>
                            <!-- <td>{{ $medecin->date }}</td> -->
                            <!-- <td>{{ $medecin->adresse->adresse }}, {{ $medecin->adresse->ville }}, {{ $medecin->adresse->governorat }}, {{ $medecin->adresse->pays }}</td> -->
                            <td>{{ $medecin->adresse->adresse }}</td>
                            <td>{{ $medecin->adresse->ville }}</td>
                            <td>{{ $medecin->adresse->governorat }}</td>
                            <td>{{ $medecin->adresse->pays }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $medecins->appends(['nom_docteur' => $nom_docteur])->links() }}

            </div>
        </div>
    </div>
</div>

@endsection

