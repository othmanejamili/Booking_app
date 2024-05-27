<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Réservations</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.app')
<div class="container mt-5" style="padding-top:130px;">
    <h1>Liste des Réservations</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('reservations.create') }}" class="btn btn-primary">Ajouter un Réservations</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Internaute</th>
                <th>Hôtel</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->internaute->nom }}</td>
                <td>{{ $reservation->hotel->titre }}</td>
                <td>{{ $reservation->date_debut_sejour }}</td>
                <td>{{ $reservation->date_fin_sejour }}</td>
                <td>{{ $reservation->titre }}</td>
                <td>
                    <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">Supprimer</button>
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
