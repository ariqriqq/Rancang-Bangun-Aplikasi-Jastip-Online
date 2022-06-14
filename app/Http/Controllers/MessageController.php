<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('halo');
        $messages = Message::get();
        $user = User::where('id', auth()->id())->first();
        $users = User::where('id', '!=', auth()->id())->get();
        // dd($user);
        return Inertia::render('Message/Index', [
            'messages' => $messages,
            'user' => $user,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $message = Message::create($request->all());
        // dd($message->id);
        MessageEvent::dispatch($message->id, $message->message, $message->user_id, $message->seen, $message->delivered);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Successfully stored data to database',
        //     // 'data' => $message,
        // ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $messages = Message::where('user_id', $id)->get();
        return Inertia::render('Message/Show', [
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        //
    }
}
