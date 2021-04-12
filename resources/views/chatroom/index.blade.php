@extends('product.layout')

@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                <div><span>{{ Auth::user()->name }}</span></div>
                <div class="form-group">
                    <label>Messaggio</label>
                    <textarea type="text" class="form-control" id="description" name="description"
                              placeholder="Enter msg..." ></textarea>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Send</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-inverse">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody id="chatroom-list" name="chatroom-list">
                @foreach ($messages as $data)
                    <tr id="todo{{$data->id}}">
                        <td>{{$data->id}}</td>
                        <td>{{$data->user}}</td>
                        <td>{{$data->description}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
