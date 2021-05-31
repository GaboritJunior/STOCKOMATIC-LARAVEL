@extends('layouts/app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'un produit dans un magasin</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('magasin_produit.store') }}" method="POST">
                @csrf
               <div class="field">
                <label class="label">Référence magasin : </label>
                    <div class="select">
                        <?php $magasin_id=$magasin_id ?? '';
                        $magasin_id = old('magasin_id', $magasin_id) ?>
                        <select name="magasin_id">
                            @foreach($magasins as $magasin)
                                <option value="{{ $magasin->id }}" {{($magasin->id==$magasin_id)?'selected ':''}}>{{ $magasin->libelleMagasin }}</option>
                                class
                            @endforeach
                        </select>
                    </div>
                </div>
               <div class="field">
                <label class="label">Référence produit : </label>
                    <div class="select">
                        <?php $produit_id=$produit_id ?? '';
                        $produit_id = old('produit_id', $produit_id) ?>
                        <select name="produit_id">
                            @foreach($produits as $produit)
                                <option value="{{ $produit->id }}" {{($produit->id==$produit_id)?'selected ':''}}>{{ $produit->libelleProduit }}</option>
                                class
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Stock d'alerte : </label>
                    <div class="control">
                        <input class="input" type="number" step="1" min="0" placeholder="Stock d'alerte du produit" name="limiteStockAlerte" value="{{ old('limiteStockAlerte') }}">
                    </div>
                    @error('limiteStockAlerte')
                    <p class="help is-danger">Le stock d'alerte est obligatoire !</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Quantité en stock : </label>
                    <div class="control">
                        <input class="input" type="number" step="1" min="0" placeholder="Quantité en stock du produit" name="quantiteStock" value="{{ old('quantiteStock') }}">
                    </div>
                    @error('quantiteStock')
                    <p class="help is-danger">La quantité en stock est obligatoire !</p>
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>

                        <a class="button is-info" href="{{ route('magasin_produit.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
