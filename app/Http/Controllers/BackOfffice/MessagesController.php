<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Mail\ContactConfirmation;
use App\Mail\ContactResponse;
use App\Models\Message;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewany', Message::class);

        $messages = Message::orderBy('updated_at')->get();
        
        return view('backoffice.messages.index', [
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
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return Response
     */
    public function show(Message $message)
    {
        return view('backoffice.messages.show')->with('message', $message);
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

    /**
     * @param Message $message
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function respond(Message $message)
    {
        $this->authorize('respond', $message);

        return view('backoffice.messages.respond')->with('message', $message);
    }

    public function postRespond(Request $request, Message $message)
    {
        try {
            $this->authorize('respond', $message);

            $validatedData = $request->validate([
                'answerContent' => 'required|string|max:5000',
                'answerSubject' => 'required|string|max:200',
            ]);

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactResponse($validatedData));

            if (! Mail::failures()) {
                $message->responded = true;
                $message->save();
            }

            return $this->index();
        } catch (AuthorizationException $e) {
            // TODO : Handle AuthorizationException
        }
    }
}
