@extends('layouts/app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification d'un produit</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('produit.update', $produit->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="reference" class="label">Référence : </label>
                    <div class="control">
                        <input class="input" id="idProduit" name="reference" placeholder="Réference de la catégorie" value="{{ old('reference',$produit->reference) }}" required>
                    </div>
                    @error('reference')
                    <p class="help is-danger">La référence du produit doit faire moins de 25 caractères !</p>
                    @enderror
                </div>
                <div class="field">
                    <label for="libelleProduit" class="label">Libelle : </label>
                    <div class="control">
                        <input class="input" id="libelleProduit" type="text" name="libelleProduit" placeholder="Libelle du produit" value="{{ old('libelleProduit',$produit->libelleProduit) }}" required>
                    </div>
                    @error('libelleProduit')
                    <div class="invalid-feedback">Le libelle du produit doit faire moins de 100 caractéres !</div>
                    @enderror
                </div>
                <div class="field">
                    <label for="prix" class="label">Prix : </label>
                    <div class="control">
                        <input class="input" id="prix" type="number" name="prix" step="0.01" min="0.01" max="99999.99" placeholder="Prix du produit" value="{{ old('prix',$produit->prix) }}" required>
                        @error('prix')
                        <div class="invalid-feedback">Le prix doit être inferieure à 10000 € !</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="description" class="label">Description : </label>
                    <div class="control">
                        <input class="input" id="description" type="text"  name="description" placeholder="Description du produit" value="{{ old('description',$produit->description) }}" required>
                        @error('unite')
                        <div class="invalid-feedback">La description doit faire moins de 300 caractères !</div>
                        @enderror
                    </div>
                </div>
                <?php $categorie_id = old('categorie_id', $categorie_id) ?>
                <div class="field">
                    <label class="label">Référence catégorie : </label>
                    <div class="select">
                        <select name="categorie_id">
                            @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}"{{($categorie->id==$categorie_id)?'selected ':''}}> {{old('libelleCategorie',$categorie->libelleCategorie)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Enregistrer
                        </button>
                        <a class="button is-info" href="{{ route('produit.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
