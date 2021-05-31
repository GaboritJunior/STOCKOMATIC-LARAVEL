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
        <p class="card-header-title">Magasins</p>

        <a class="button is-info" href="{{ route('magasin.create') }}">Créer un magasin</a>
    </header>
    <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Référence du magasin</th>
                        <th></th>
                        <th>Libelle du magasin</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($magasins as $magasin)
                    <tr>
                        <td>{{ $magasin->id }}</td>
                        <td></td>
                        <td><strong>{{ $magasin->referenceMagasin }}</strong></td>
                        <td></td>
                        <td>{{ $magasin->libelleMagasin  }}</td>
                        <td></td>
                        <td><a class="button is-primary" href="{{ route('magasin.show', $magasin->id) }}">Voir</a></td>
                        <td></td>
                        <td><a class="button is-warning" href="{{ route('magasin.edit', $magasin->id) }}">Modifier</a></td>
                        <td></td>
                        <td>
                            <form action="{{ route('magasin.destroy', $magasin->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="button is-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
    <footer class="card-footer">

    </footer>
</div>
@endsection
