<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Mail\ContactConfirmation;
use App\Mail\ContactResponse;
use App\Models\Message;
use Illuminate\Http\Request;
use Mail;

class MessagesController extends Controller
{
    public $categories_messages = [
        1 => "Event",
        2 => "Commande",
        3 => "Martins Marteau",
        4 => "Site",
        5 => "Confidencialité"
    ];
    
    //Accès réservé aux seuls éditeurs
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewany', Message::class);

        $messages = Message::notResponded()->orderBy('updated_at')->get();
        
        return view('gest.messages.index', [
            'messages' => $messages,
            'categories_messages' => $this->categories_messages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MessageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $data = $request->validated();
        $data['sender_ip'] = $request->ip();
        $message = Message::create($data);
        $message->save();
        Mail::to($message->email)
            ->send(new ContactConfirmation($data));
        return redirect()->back()->with('messages', 'Votre demande a bien été prise en compte');
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('gest.messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function respond(Message $message)
    {
        $this->authorize('respond', $message);

        return view('gest.messages.respond')->with('message', $message);
    }

    public function postRespond(Request $request, Message $message)
    {
        $this->authorize('respond', $message);

        $validatedData = $request->validate([
            'answerContent' => 'required|string|max:5000',
            'answerSubject' => 'required|string|max:200',
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactResponse($validatedData));

        if (!Mail::failures()) {
            $message->responded = true;
            $message->save();
        }

        return $this->index();
    }
}
