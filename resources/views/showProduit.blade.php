@extends('layouts/app')

@section('content')
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><strong>Libelle : {{ $produit->libelleProduit }}</strong></p>
            </header>
            <div class="card-content">
                <div class="content">
                    <p>Référence : {{ $produit->reference }}</p>
                    <hr>
                    <p>Prix : {{ $produit->prix }}</p>
                    <hr>
                    <p>Description : {{ $produit->description }} </p>
                    <hr>
                    <p>Référence catégorie : {{ $categorie }} </p>
                </div>
            </div>
            <footer class="card-footer is-centered">
                <a class="button is-info" href="{{ route('produit.index') }}">Retour à la liste</a>
            </footer>
        </div>
    @endsection
