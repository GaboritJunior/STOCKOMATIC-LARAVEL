@extends('layouts/app')
@section('content')
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Libelle : {{ $magasin->libelleMagasin }}</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <p>Référence : {{ $magasin->referenceMagasin }}</p>
                    <hr>
                    <p>Adresse : {{ $magasin->adresse }} - {{ $magasin->CP }} {{ $magasin->ville }} </p>
                </div>
            </div>
            <footer class="card-footer is-centered">
            <a class="button is-info" href="{{ route('magasin.index') }}">Retour à la liste</a>
        </footer>
        </div>
    @endsection
