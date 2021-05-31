@extends('layouts/app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification d'une magasin</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('magasin.update', $magasin->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label class="label">Référence : </label>
                    <div class="control">
                        <input class="input" id="referenceMagasin" type="text"   name="referenceMagasin" value="{{ old('referenceMagasin',$magasin->referenceMagasin) }}" required>
                    </div>
                    @error('referenceMagasin')
                    <div class="invalid-feedback">La référence du magagin doit faire moins de 25 caractères !</div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Libelle : </label>
                    <div class="control">
                        <input class="input" id="libelleMagasin" name="libelleMagasin" placeholder="Libelle du magasin" value="{{ old('libelleMagasin',$magasin->libelleMagasin) }}" required>
                    </div>
                    @error('libelleMagasin')
                    <p class="help is-danger">Le libelle du magasin doit faire moins de 100 caractères !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Adresse : </label>
                    <div class="control">
                        <input class="input" id="adresse" name="adresse" placeholder="Adresse du magasin" value="{{ old('adresse',$magasin->adresse) }}" required>
                    </div>
                    @error('adresse')
                    <p class="help is-danger">L'adresse du magasin doit faire moins de 100 caractères !</p>
                    @enderror
                </div>
                <div class="field">
                    <label for="CP" class="label">Code Postal : </label>
                    <div class="control">
                        <input class="input" id="CP" type="number" name="CP" step="1" min="10000" max="99999" placeholder="Code postal du magasin" value="{{ old('CP',$magasin->CP) }}" required>
                        @error('CP')
                        <div class="invalid-feedback">Le code postal doit etre compris entre 10000 et 99999 !</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Ville : </label>
                    <div class="control">
                        <input class="input" id="ville" name="ville" placeholder="Ville du magasin" value="{{ old('ville',$magasin->ville) }}" required>
                    </div>
                    @error('ville')
                    <p class="help is-danger">La ville du magasin doit faire moins de 100 caractères !</p>
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Enregistrer
                        </button>
                        <a class="button is-info" href="{{ route('magasin.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
