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
    <h1>Liste des Internautes</h1>
    <a href="{{ route('internautes.create') }}" class="btn btn-primary">Ajouter un Internaute</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Date de Naissance</th>
                <th>CIN</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($internautes as $internaute)
            <tr>
                <td>{{ $internaute->id }}</td>
                <td>{{ $internaute->nom }}</td>
                <td>{{ $internaute->prenom }}</td>
                <td>{{ $internaute->adresse }}</td>
                <td>{{ $internaute->date_naissance }}</td>
                <td>{{ $internaute->cin }}</td>
                <td>
                    <a href="{{ route('internautes.show', $internaute->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('internautes.edit', $internaute->id) }}" class="btn btn-success">Modifier</a>
                    <form action="{{ route('internautes.destroy', $internaute->id) }}" method="POST" style="display:inline-block;">
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

