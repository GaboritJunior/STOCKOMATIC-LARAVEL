@extends('layouts/app')

@section('content')
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><strong>Libelle de la Catégorie : {{ $categorie->libelleCategorie }}</strong></p>
            </header>
            <div class="card-content">
                <div class="content">
                    <p>Réference : {{ $categorie->referenceCategorie }}</p>
                    <hr>
                    <p>Type de vente : {{ $categorie->typeVente }}</p>
                    <hr>
                    <p>Type de Conditionnement : {{ $categorie->typeCond }} </p>
                </div>
            </div>
            <footer class="card-footer is-centered">
            <a class="button is-info" href="{{ route('categorie.index') }}">Retour à la liste</a>
        </footer>
        </div>
    @endsection
