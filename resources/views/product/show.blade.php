@extends('product.layout')

@section('content')

    <style>
        .container {
        }
        img{
            width: 100%;
        }
        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="row">
        <div class="col-4">
            <img src="{{$product->imageUrl}}">
        </div>
        <div class="col-8">
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
                    <input type="text" class="form-control" name="name" value="{{$product->name}}" disabled="disabled"/>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" disabled="disabled">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Studenti Registrati</label>
                    <input type="number" class="form-control" name="quantity" disabled="disabled" value="{{$product->quantity}}"/>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox"  class="form-check-input"  name="available" disabled="disabled" checked="{{$product->available}}"/>
                    <label class="form-check-label" for="available">Available</label>
                </div>
                <div class="form-group">
                    <label for="image">Image url</label>
                    <input type="text" class="form-control" name="imageUrl" disabled="disabled" value="{{$product->imageUrl}}"/>
                </div>
                <button id="prd-sub" type="submit" class="btn btn-block btn-primary" style="display: none">Update Product</button>
                <button id="prd-mod" type="button" class="btn btn-block btn-danger">Change Product</button>
                <button id="prd-und" type="button" class="btn btn-block btn-danger" style="display: none">Undo</button>

            </form>
        </div>
    </div>

@endsection
