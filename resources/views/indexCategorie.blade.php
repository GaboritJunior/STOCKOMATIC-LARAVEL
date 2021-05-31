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
        <p class="card-header-title">Categorie</p>

        <a class="button is-info" href="{{ route('categorie.create') }}">Créer une catégorie</a>
    </header>
    <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Réference de la catégorie</th>
                        <th></th>
                        <th>Libelle de la catégorie</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td></td>
                        <td>{{ $categorie->referenceCategorie }}</td>
                        <td></td>
                        <td>{{ $categorie->libelleCategorie }}</td>
                        <td></td>
                        <td><a class="button is-primary" href="{{ route('categorie.show', $categorie->id) }}">Voir</a></td>
                        <td></td>
                        <td><a class="button is-warning" href="{{ route('categorie.edit', $categorie->id) }}">Modifier</a></td>
                        <td></td>
                        <td>
                            <form action="{{ route('categorie.destroy', $categorie->id) }}" method="post">
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
