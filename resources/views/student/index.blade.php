@extends('product.layout')

@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <a href="{{ route('bubbolo.create') }}">Crea Studente Corso ....</a>
    <table class="table">
        <thead>
        <tr class="table-warning">
            <td>ID</td>
            <td>Nome</td>
            <td>Cognome</td>
            <td>Data Nascita</td>
            <td class="text-center">Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($pippo as $studente)
            <tr>
                <td><a  href="{{ route('products.show', $studente->id)}}">{{$studente->id}}</a></td>
                <td><a  href="{{ route('products.show', $studente->id)}}">{{$studente->firstname}}</a></td>
                <td>{{$studente->lastname}}</td>
                <td>{{$studente->birth}}</td>
                <td class="text-center">
                    -
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
