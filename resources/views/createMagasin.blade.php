@extends('layouts/app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'un magasin</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('magasin.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label">Référence : </label>
                    <div class="control">
                        <input class="input" name="referenceMagasin" placeholder="Référence du magasin" value="{{ old('referenceMagasin') }}">
                    </div>
                    @error('referenceMagasin')
                    <p class="help is-danger">La référence du magasin est obligatoire et doit faire moins de 25 caractères !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Libelle : </label>
                    <div class="control">
                        <input class="input" name="libelleMagasin" placeholder="Libelle du magasin" value="{{ old('libelleMagasin') }}">
                    </div>
                    @error('libelleMagasin')
                    <p class="help is-danger">Le libelle du magasin est obligatoire et doit faire moins de 100 caractères !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Adresse : </label>
                    <div class="control">
                        <input class="input" name="adresse" placeholder="Adresse du magasin" value="{{ old('adresse') }}">
                    </div>
                    @error('adresse')
                    <p class="help is-danger">L'adresse du magasin est obligatoire et doit faire moins de 100 caractères !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Code Postal : </label>
                    <div class="control">
                        <input class="input" type="number" step="1" min="10000" max="99999" placeholder="Code postal du magasin" name="CP" value="{{ old('CP') }}">
                    </div>
                    @error('CP')
                    <p class="help is-danger">Le code postal est obligatoire et doit etre compris entre 10000 et 99999 !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Ville : </label>
                    <div class="control">
                        <input class="input" name="ville" placeholder="Ville du magasin" value="{{ old('ville') }}">
                    </div>
                    @error('ville')
                    <p class="help is-danger">La ville du magasin est obligatoire et doit faire moins de 100 caractères !</p>
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>

                        <a class="button is-info" href="{{ route('magasin.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
