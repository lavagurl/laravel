<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::user()->role_id == 1):
        $users = User::all()->where('id', '!=' ,Auth::id());
        return view('messages.index',compact('users'));
        else:
        return redirect('home');
        endif;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        $message = new Message;
        $message->fill(['content'=>$request->input('content')]);
        $message->fill(['from_id'=>Auth::id()]);
        $message->fill(['to_id'=>$user->id]);
        $message->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $url = explode("/", $request->path());
        $user = User::find($url[1]);
        $messages = DB::table('messages')
            ->where('from_id', '=', $user->id)
            ->where('to_id', '=', Auth::id())
            ->orWhere('from_id', Auth::id())
            ->where('to_id', $user->id)
            ->get();

        return view('messages/show')->with([
            "user"=>$user,
            "messages"=>$messages,
            "infos"=>User::find(Auth::id())
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
