@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panneau de controle') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Tu es connécté !') }}
                    <hr>
                    Acceder au produits :
                    <a class="btn btn-link" href="{{ route('produit.index') }}">
                        {{ __('Voir') }}
                    </a>
                    <br>
                    Acceder au catégories :
                    <a class="btn btn-link" href="{{ route('categorie.index') }}">
                        {{ __('Voir') }}
                    </a>
                    <br>
                    Acceder au magasins :
                    <a class="btn btn-link" href="{{ route('magasin.index') }}">
                        {{ __('Voir') }}
                    </a>
                    <br>
                    Acceder au inventaires :
                    <a class="btn btn-link" href="{{ route('magasin_produit.index') }}">
                        {{ __('Voir') }}
                    </a>
                    <br>
            </div>
        </div>
    </div>
</div>
@endsection
