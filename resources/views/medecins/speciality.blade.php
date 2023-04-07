@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Doctors List</h2>
        </div>
        <form method="POST" action="{{ route('medecins.specialite') }}">
       @csrf
  <label for="specialite">Specialite:</label>
  <select name="specialite" id="specialite">
    <option value="">Tous les specialites</option>
    @foreach ($specialities as $specialite)
      <option value="{{ $specialite }}" >{{ $specialite }}</option>
    @endforeach
  </select>
  <button type="submit">Filtrer</button>
</form>  

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
                {{ $medecins->links() }}
            </div>
        </div>
    </div>
</div>
@endsection