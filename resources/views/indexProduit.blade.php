@extends('layouts/app')
@section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        select, .is-info {
            margin: 0.3em;
        }
    </style>

@endsection
@section('content')
@if(session()->has('info'))
<div class="notification is-success">
    {{ session('info') }}
</div>
@endif

<div class="card" style="width:100%">
    <header class="card-header">
        <p class="card-header-title">Produits</p>
        <div class="select">
            <select onchange="window.location.href = this.value">
                <option value="{{ route('produit.index') }}" @unless($slug) selected @endunless>Toutes catégories</option>
                @foreach($categories as $categorie)
                <option value="{{ route('produit.categorie', $categorie->slug) }}"{{ $slug == $categorie->slug ? 'selected' : '' }}>{{ $categorie->libelleCategorie }}</option>
                @endforeach
            </select>
        </div>
        <a class="button is-info" href="{{ route('produit.create') }}">Créer un produit</a>
    </header>
    <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Référence du produit</th>
                        <th></th>
                        <th>Libelle du produit</th>
                        <th></th>
                        <th>Prix</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $produit)
                    <tr>
                        <td>{{ $produit->id }}</td>
                        <td></td>
                        <td>{{ $produit->reference }}</td>
                        <td></td>
                        <td>{{ $produit->libelleProduit }}</td>
                        <td></td>
                        <td>{{ $produit->prix }} €</td>
                        <td></td>
                        <td><a class="button is-primary" href="{{ route('produit.show', $produit->id) }}">Voir</a></td>
                        <td></td>
                        <td><a class="button is-warning" href="{{ route('produit.edit', $produit->id) }}">Modifier</a></td>
                        <td></td>
                        <td>
                            <form action="{{ route('produit.destroy', $produit->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="button is-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
    <footer class="card-footer">

    </footer>
</div>
@endsection
