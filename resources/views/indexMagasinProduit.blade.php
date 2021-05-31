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
        <p class="card-header-title">Inventaire</p>
        <div class="select">
            <select onchange="window.location.href = this.value">
                <option value="{{ route('magasin_produit.index') }}" @unless($slug) selected
                    @endunless>Tout magasins</option>
                    @foreach($magasins as $magasin)
                        <option value="{{ route('magasin_produit.magasin', $magasin->slug) }}"{{ $slug == $magasin->slug ? 'selected' : '' }}>{{ $magasin->libelleMagasin }}</option>
                    @endforeach
                </select>
        </div>
        <a class="button is-info" href="{{ route('magasin_produit.create') }}">Ajouter un produit dans un magasin</a>
    </header>
    <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Réference magasin</th>
                        <th></th>
                        <th>Réference produit</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        use App\Models\Magasin;
                        use App\Models\Produit;
                    ?>
                    @foreach($magasinProduits as $magasinProduit)
                    <?php
                        $magasins = Magasin::all();
                        $magasin_id = $magasinProduit->magasin_id;
                        $produits = Produit::all();
                        $produit_id = $magasinProduit->produit_id;
                    ?>
                    <tr>
                        <td>{{ $magasinProduit->id }}</td>
                        <td></td>
                        <td>
                            <strong>
                                @foreach($magasins as $magasin)
                                    {{($magasin->id==$magasin_id)?$magasin->libelleMagasin :''}}
                                @endforeach
                            </strong>
                        </td>
                        <td></td>
                        <td>
                            <strong>
                                @foreach($produits as $produit)
                                    {{($produit->id==$produit_id)?$produit->libelleProduit :''}}
                                @endforeach
                            </strong>
                        </td>
                        <td></td>
                        <td><a class="button is-primary" href="{{ route('magasin_produit.show', $magasinProduit->id) }}">Voir</a></td>
                        <td></td>
                        <td><a class="button is-warning" href="{{ route('magasin_produit.edit', $magasinProduit->id) }}">Modifier</a></td>
                        <td></td>
                        <td>
                            <form action="{{ route('magasin_produit.destroy', $magasinProduit->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="button is-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    <?php
//                      $i = $i + 1
                    ?>
                    @endforeach
                </tbody>
            </table>

    </div>
    <footer class="card-footer">

    </footer>
</div>
@endsection