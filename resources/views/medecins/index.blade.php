@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            {{-- here start the filter --}}
    <div class="row">
        <div class="col-md-12" style="text-align: left; padding: 2%;"> 
            <h2>Recherchez des résultats</h2>
        </div>
        <div class="row mt-3" style="text-align: left; padding: 2%;">
     <form method="GET" action="{{ route('medecins.specialite') }}">
        <div style=" display: flex; flex-direction: column; justify-content: space-evenly;">
      {{-- <label for="specialite">Specialite:</label> --}}
      <select name="specialite" id="specialite" style="width: 80%; padding: 5px;">
        <option value="">Tous les specialites</option>
        @foreach ($specialities as $specialite)
          <option value="{{ $specialite }}" >{{ $specialite }}</option>
        @endforeach
      </select>
        </div>
      <button type="submit" class="btn btn-primary mt-3 col-md-2" >Filtrer</button>
    </form> 
    <form method="GET" action="{{ route('medecins.ville') }}" style="height: 20vh; display: flex; flex-direction: column; justify-content: space-evenly; margin-top: 5%;">
    <div style=" display: flex; flex-direction: column; justify-content: space-evenly;">
        {{-- <label for="governorat">Governorat:</label> --}}
        <select name="governorat" id="governorat" style="width: 80%; padding: 5px;">
            <option value="">Sélectionnez un gouvernorat</option>
            @foreach ($governorats as $governorat)
                <option value="{{ $governorat }}">{{ $governorat }}</option>
            @endforeach
        </select></div>
        
    <div style=" display: flex; flex-direction: column; justify-content: space-evenly;"> 
        {{-- <label for="ville">Ville:</label> --}}
        <select name="ville" id="ville" disabled style="width: 80%; padding: 5px;">
            <option value="">Sélectionnez une ville</option>
        </select></div>
       
        <button type="submit" type="submit" class="btn btn-primary mt-3 col-md-2">Filtrer</button>
    </form>
    <form method="GET" action="{{ route('medecin.search') }}" style="width: 80%; padding: 5px;" class="d-flex align-items-center justify-content-center mt-3">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Entrez le nom du médecin" name="nom_docteur">
        <button type="submit" class="btn btn-primary ms-2">Rechercher</button>
    </div>
</form>

 </div>      
   
</div>
    {{-- here end the filter --}}
        </div>
        <div class="col-md-8">
            
            <div class="col-md-12" style="text-align: center; padding: 2%; "> 
                <img src="{{ asset('images/logo-medecin.jpeg') }}" alt="doctor" style="width: 10%; aspect-ration: 1/2;"/>
                <h2>Liste des médecins</h2>
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

<script>
    const cities = @json($cities);

    const governoratSelect = document.querySelector('#governorat');
    const villeSelect = document.querySelector('#ville');

    governoratSelect.addEventListener('change', (event) => {
        const governorat = event.target.value;
        villeSelect.innerHTML = '';
        villeSelect.disabled = true;

        if (governorat !== '') {
            const governoratCities = cities[governorat];

            governoratCities.forEach((city) => {
                const option = document.createElement('option');
                option.value = city;
                option.text = city;
                villeSelect.add(option);
            });

            villeSelect.disabled = false;
        }
    });
</script>
@endsection


        </div>
    </div>

    
