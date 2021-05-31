@extends('layouts/app')
@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification d'un produit dans un magasin</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('magasin_produit.update', $magasinProduit->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}
                
                <?php $magasin_id = old('magasin_id', $magasin_id) ?>
                <div class="field">
                    <label class="label">Référence magasin :</label>
                    <div class="select">
                        <select name="magasin_id">
                            @foreach($magasins as $magasin)
                                <option value="{{ $magasin->id }}"{{($magasin->id==$magasin_id)?'selected ':''}}> {{old('libelleMagasin',$magasin->libelleMagasin)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <?php $produit_id = old('produit_id', $produit_id) ?>
                <div class="field">
                    <label class="label">Référence produit :</label>
                    <div class="select">
                        <select name="produit_id">
                            @foreach($produits as $produit)
                                <option value="{{ $produit->id }}"{{($produit->id==$magasin_id)?'selected ':''}}> {{old('libelleProduit',$produit->libelleProduit)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="limiteStockAlerte" class="label">Stock d'alerte : </label>
                    <div class="control">
                        <input class="input" id="limiteStockAlerte" type="number" name="limiteStockAlerte" step="1" min="0" placeholder="Stock d'alerte" value="{{ old('limiteStockAlerte',$magasinProduit->limiteStockAlerte) }}" required>
                        @error('limiteStockAlerte')
                        <div class="invalid-feedback">Le stock d'alerte est obligatoire</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="quantiteStock" class="label">Quantité en stock : </label>
                    <div class="control">
                        <input class="input" id="quantiteStock" type="number" name="quantiteStock" step="1" min="0" placeholder="Quantité en stock" value="{{ old('quantiteStock',$magasinProduit->quantiteStock) }}" required>
                        @error('quantiteStock')
                        <div class="invalid-feedback">Le quantité est obligatoire</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Enregistrer
                        </button>
                        <a class="button is-info" href="{{ route('magasin_produit.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
