@extends('layouts/app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification d'une catégorie</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('categorie.update', $categorie->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <div class="field">
                    <label class="label">Réference de la catégorie : </label>
                    <div class="control">
                        <input class="input" id="referenceCategorie" type="text" placeholder="Réference de la catégorie" name="referenceCategorie" value="{{ old('referenceCategorie',$categorie->referenceCategorie) }}" required>
                    </div>
                    @error('referenceCategorie')
                    <div class="invalid-feedback">La référence catégorie doit faire moins de 25 caractéres !</div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Libelle de la catégorie : </label>
                    <div class="control">
                        <input class="input" id="libelleCategorie" type="text" placeholder="Libelle de la catégorie" name="libelleCategorie" value="{{ old('libelleCategorie',$categorie->libelleCategorie) }}" required>
                    </div>
                    @error('libelleCategorie')
                    <div class="invalid-feedback">Le libelle catégorie doit faire moins de 100 caractéres !</div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Type de vente : </label>
                    <div class="control">
                        <input class="input" id="typeVente" type="text" placeholder="Type de vente de la catégorie" name="typeVente" value="{{ old('typeVente',$categorie->typeVente) }}" required>
                    </div>
                    @error('typeVente')
                    <div class="invalid-feedback">Le type de vente doit faire moins de 100 caractéres !</div>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Type de conditionnement : </label>
                    <div class="control">
                        <input class="input" id="typeCond" type="text" placeholder="Type de conditionnement de la catégorie" name="typeCond" value="{{ old('typeCond',$categorie->typeCond) }}" required>
                    </div>
                    @error('typeCond')
                    <div class="invalid-feedback">Le type de conditionnement doit faire moins de 100 caractéres !</div>
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Enregistrer
                        </button>
                        <a class="button is-info" href="{{ route('categorie.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
