<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ChatRoomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $messages = ChatRoom::all();
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $name = $currentuser->name;
        return view('chatroom.index')->with(compact('messages','name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);

        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'user' => $currentuser->name
        ]);
        $chat = ChatRoom::create($data);

        return Response::json($chat);
    }

}
