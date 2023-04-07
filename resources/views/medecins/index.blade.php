@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12" style="text-align: center; padding: 2%;">
            <h2>Liste des médecins</h2>
        </div>
 <div class="row" style="text-align: left; padding: 2%;">
 <form method="GET" action="{{ route('medecins.specialite') }}">
 <div style=" display: flex; flex-direction: column; justify-content: space-evenly;">
      <label for="specialite">Specialite:</label>
      <select name="specialite" id="specialite" style="padding: 5px;">
        <option value="">Tous les specialites</option>
        @foreach ($specialities as $specialite)
          <option value="{{ $specialite }}" >{{ $specialite }}</option>
        @endforeach
      </select>
</div>
      <button type="submit" style="margin-top: 5px; border-radius: 5px; padding: 5px; width: 15%; border: none; background-color: black; color:white;">Filtrer</button>
    </form> 
    <form method="GET" action="{{ route('medecins.ville') }}" style="height: 20vh; display: flex; flex-direction: column; justify-content: space-evenly; margin-top: 5%;">
    <div style=" display: flex; flex-direction: column; justify-content: space-evenly;"><label for="governorat">Governorat:</label>
        <select name="governorat" id="governorat" style="width: 80%; padding: 5px;">
            <option value="">Select a governorat</option>
            @foreach ($governorats as $governorat)
                <option value="{{ $governorat }}">{{ $governorat }}</option>
            @endforeach
        </select></div>
        
    <div style=" display: flex; flex-direction: column; justify-content: space-evenly;"> <label for="ville">Ville:</label>
        <select name="ville" id="ville" disabled style="width: 80%; padding: 5px;">
            <option value="">Select a ville</option>
        </select></div>
       
        <button type="submit" style="margin-top: 5px; border-radius: 5px; padding: 5px; width: 15%; border: none; background-color: black; color:white;">Filtrer</button>
    </form>
    <form method="GET" action="{{ route('medecin.search') }}" style="margin-top: 5%;" class="d-flex align-items-center justify-content-center">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Entrez le nom du médecin" name="nom_docteur">
        <button type="submit" class="btn btn-primary ms-2">Rechercher</button>
    </div>
</form>

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

