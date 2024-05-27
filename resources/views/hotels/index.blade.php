<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    @extends('layouts.app')
<div class="container" style="padding-top:130px;">
    <h1>Liste des Hôtels</h1>
    <a href="{{ route('hotels.create') }}" class="btn btn-primary">Ajouter un Hôtel</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Adresse</th>
                <th>Prix Unitaire</th>
                <th>Type de Chambre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
            <tr>
                <td>{{ $hotel->id }}</td>
                <td>{{ $hotel->titre }}</td>
                <td>{{ $hotel->adresse }}</td>
                <td>{{ $hotel->prix_unitaire }}</td>
                <td>{{ $hotel->type_chambre }}</td>
                <td>
                    <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-success">Modifier</a>
                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>