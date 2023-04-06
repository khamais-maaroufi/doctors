@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Doctors List</h2>
        </div>
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
                            <th>Date</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medecins as $medecin)
                        <tr>
                            <td>{{ $medecin->nom_docteur }}</td>
                            <td>{{ $medecin->specialite }}</td>
                            <td>{{ $medecin->telephone }}</td>
                            <td>{{ $medecin->date }}</td>
                            <td>{{ $medecin->adresse->adresse }}, {{ $medecin->adresse->ville }}, {{ $medecin->adresse->governorat }}, {{ $medecin->adresse->pays }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $medecins->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

