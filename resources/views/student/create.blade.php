@extends('product.layout')

@section('content')

    <style>
        .container {
        }
        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="card push-top">
        <div class="card-header">
            Aggiungi Studente
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('bubbolo.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="firstname"/>
                </div>
                <div class="form-group">
                    <label for="description">Cognome</label>
                    <textarea class="form-control" name="lastname"></textarea>
                </div>
                <div class="form-group">
                    <label for="qualification">Titolo Studio</label>
                    <input class="form-control" name="qualification"/>
                </div>
                <div class="form-group">
                    <label for="birth">Data di Nascita</label>
                    <input  class="form-control" name="birth"/>
                </div>
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="text" class="form-control" name="phone"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Crea Strudel</button>
            </form>
        </div>
    </div>
@endsection
