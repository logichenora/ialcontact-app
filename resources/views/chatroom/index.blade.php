@extends('product.layout')

@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="row">
        <div class="col-md-2">
            <ul class="list-group">
                @foreach($users as $chatuser)
                    <li v-on:click="getUserId" class="list-group-item" id="{{ $chatuser->id }}" value="{{ $chatuser->name }}">{{ $chatuser->name }}</li>
                @endforeach

            </ul>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-4" v-for="(chatWindow,index) in chatWindows" v-bind:sendid="index.senderid" v-bind:name="index.name">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="accordion">
                            <span class="glyphicon glyphicon-comment"></span> @{{chatWindow.name}}
                        </div>
                        <div class="panel-collapse" id="collapseOne">
                            <div class="panel-body">
                                <ul class="chat" id="chat">
                                    <li class="left clearfix" v-for="chat in chats[chatWindow.senderid]" v-bind:message="chat.message" v-bind:username="chat.username">
                       <span class="chat-img pull-left">
                       <img src="https://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
                       </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> @{{chat.name}}</strong>
                                            </div>
                                            <p>@{{chat.message}}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input :id="chatWindow.senderid" v-model="chatMessage[chatWindow.senderid]" v-on:keyup.enter="sendMessage2" type="text" class="form-control input-md" placeholder="Type your message here..." />
                                    <span class="input-group-btn"><button :id="chatWindow.senderid" class="btn btn-warning btn-md" v-on:click="sendMessage2">
                               Send</button></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
