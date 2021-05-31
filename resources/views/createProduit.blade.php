@extends('layouts/app')
@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'un produit</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('produit.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label">Référence : </label>
                    <div class="control">
                        <input class="input" name="reference" placeholder="Référence du produit" value ="{{ old('reference') }}">
                    </div>
                    @error('reference')
                    <p class="help is-danger">La référence du produit est obligatoire et doit faire moins de 25 caractères !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Libelle :</label>
                    <div class="control">
                        <input class="input" type="text" name="libelleProduit" placeholder="Libelle du produit" value="{{ old('libelleProduit') }}">
                    </div>
                    @error('libelleProduit')
                    <p class="help is-danger">Le libelle du produit est obligatoire et doit faire moins de 100 caractéres !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Prix : </label>
                    <div class="control">
                        <input class="input" type="number" step="0.01" min="0.01" max="99999.99" name="prix" placeholder="Prix du produit" value="{{ old('prix') }}">
                    </div>
                    @error('prix')
                    <p class="help is-danger">Le prix est obligatoire !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Description : </label>
                    <div class="control">
                        <input class="input" type="text" name="description" placeholder="Description du produit" value="{{ old('description') }}">
                    </div>
                    @error('description')
                    <p class="help is-danger">La description est obligatoire et doit faire moins de 300 caractéres !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Référence catégorie : </label>
                    <div class="select">
                        <?php $categorie_id=$categorie_id ?? ''; $categorie_id = old('categorie_id', $categorie_id) ?>
                        <select name="categorie_id">
                            @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{($categorie->id==$categorie_id)?'selected ':''}}>{{ $categorie->libelleCategorie }}</option>
                            class
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>

                        <a class="button is-info" href="{{ route('produit.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
