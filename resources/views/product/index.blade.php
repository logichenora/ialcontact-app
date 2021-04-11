@extends('product.layout')

@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Prodotto</td>
                <td>Studenti Registrati</td>
                <td>Disponibilità</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td><a  href="{{ route('products.show', $product->id)}}">{{$product->id}}</a></td>
                    <td><a  href="{{ route('products.show', $product->id)}}">{{$product->name}}</a></td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->available}}</td>
                    <td class="text-center">
                        <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
