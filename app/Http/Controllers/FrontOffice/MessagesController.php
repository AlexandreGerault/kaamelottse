<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Mail\ContactConfirmation;
use App\Mail\ContactResponse;
use App\Models\Message;
use Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @return Response
     * @throws AuthorizationException
     */
    public function index()
    {
        $messages = Auth::user()->messages;
        
        return view('frontoffice.messages.index', [
            'messages' => $messages,
            'categories_messages' => $this->categories_messages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MessageRequest $request
     * @return Response
     */
    public function store(MessageRequest $request)
    {
        $data = $request->validated();
        $data['sender_ip'] = $request->ip();
        $message = Message::create($data);
        if(Auth::check())
            $message->author()->associate(Auth::user());
        $message->save();
        Mail::to($message->email)
            ->send(new ContactConfirmation($data));
        return redirect()->back()->with('success', 'Votre demande a bien été prise en compte');
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return Response
     */
    public function show(Message $message)
    {
        return view('frontoffice.messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
