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
            Edit & Update
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
            <form method="post" action="{{ route('products.update', $product->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$product->name}}"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Studenti Registrati</label>
                        <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}"/>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox"  class="form-check-input"  name="available"  checked="{{$product->available}}"/>
                        <label class="form-check-label" for="available">Available</label>
                    </div>
                    <div class="form-group">
                        <label for="image">Image url</label>
                        <input type="text" class="form-control" name="imageUrl" value="{{$product->imageUrl}}"/>
                    </div>
                <button type="submit" class="btn btn-block btn-danger">Update Product</button>
            </form>
        </div>
    </div>
@endsection
