@extends('layouts/app')

@section('content')
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><strong>Libelle Magasin</strong> :
                    @foreach($magasins as $magasin)
                        {{($magasin->id==$magasin_id)?$magasin->libelleMagasin :''}}
                    @endforeach
                </p>
                <p class="card-header-title"><strong>Libelle Produit</strong> : 
                    @foreach($produits as $produit)
                        {{($produit->id==$produit_id)?$produit->libelleProduit :''}}
                    @endforeach
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <p>Stock d'alerte : {{ $magasinProduit->limiteStockAlerte }}</p>
                    <hr>
                    <p>Quantité en stock : {{ $magasinProduit->quantiteStock }}</p>
                    <hr>
                    <?php 
                        if($magasinProduit->quantiteStock > $magasinProduit->limiteStockAlerte){
                            echo "<p class='notification is-success'>Le stock d'alerte n'est pas atteint</p>";
                        }
                        elseif ($magasinProduit->quantiteStock == $magasinProduit->limiteStockAlerte) {
                            echo "<p class='notification is-warning'>Le stock d'alerte atteint, pensez a réapprovisionner le stock</p>";
                        }
                        elseif ($magasinProduit->quantiteStock < $magasinProduit->limiteStockAlerte && $magasinProduit->quantiteStock > 0) {
                            echo "<p class='notification is-danger'>Le stock d'alerte est dépassé, réapprovisionner le stock au plus vite</p>";
                        }
                        elseif ($magasinProduit->quantiteStock == 0) {
                            echo "<p class='notification is-danger'>Stock d'alerte vide, réapprovisionner le stock au plus vite</p>";
                        }
                    ?>
                </div>
            </div>
            <footer class="card-footer is-centered">
            <a class="button is-info" href="{{ route('magasin_produit.index') }}">Retour à la liste</a>
        </footer>
        </div>
    @endsection
