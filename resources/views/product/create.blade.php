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
            Add Product
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
            <form method="post" action="{{ route('products.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity"/>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox"  class="form-check-input"  name="available"/>
                    <label class="form-check-label" for="available">Available</label>
                </div>
                <div class="form-group">
                    <label for="imageUrl">Image url</label>
                    <input type="text" class="form-control" name="imageUrl"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Product</button>
            </form>
        </div>
    </div>
@endsection
