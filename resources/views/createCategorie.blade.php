@extends('layouts/app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'une catégorie</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('categorie.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label">Référence de la catégorie : </label>
                    <div class="control">
                        <input class="input" type="text" name="referenceCategorie" placeholder="Réference de la catégorie" value="{{ old('referenceCategorie') }}">
                    </div>
                    @error('referenceCategorie')
                    <p class="help is-danger">La référence catégorie est obligatoire et doit faire moins de 25 caractéres !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Libelle de la catégorie : </label>
                    <div class="control">
                        <input class="input" type="text" name="libelleCategorie" placeholder="Libelle de la catégorie" value="{{ old('libelleCategorie') }}">
                    </div>
                    @error('libelleCategorie')
                    <p class="help is-danger">La référence catégorie est obligatoire et doit faire moins de 100 caractéres !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Type de vente : </label>
                    <div class="control"> 
                        <input class="input" type="text" name="typeVente" placeholder="Type de vente de la catégorie" value="{{ old('typeVente') }}">
                    </div>
                    @error('typeVente')
                    <p class="help is-danger">Le type de vente est obligatoire et doit faire moins de 100 caractéres !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Type de conditionnement : </label>
                    <div class="control"> 
                        <input class="input" type="text" name="typeCond" placeholder="Type de conditionnement de la catégorie" value="{{ old('typeCond') }}">
                    </div>
                    @error('typeCond')
                    <p class="help is-danger">Le type de conditionnement est obligatoire et doit faire moins de 100 caractéres !</p>
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>

                        <a class="button is-info" href="{{ route('categorie.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
