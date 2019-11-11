<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CitationRequest;

use App\Citation;

class CitationsController extends Controller
{
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
        $citations = Citation::where('user_creator', Auth::id())
                ->orderBy('updated_at', 'desc')
                ->get();
        
        return view('gest/citations',['citations'=>$citations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citation = new Citation();
        return view('gest/citation',[
            'citation'=>$citation,
            'action'=>route('citation.store')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitationRequest $request)
    {
        $data = $request->validated();
        $citation = new Citation($data);
        $citation->user_creator=Auth::id();
        
        if ($citation->save()){
            return $this->index();
        }
        else{
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($citation = Citation::where(['id' => $id, 'user_creator' => Auth::id()])->first()){
            
            return view('gest/citation',[
                'citation'=>$citation,
                'action'=>route('citation.update', $id),
                'method' => 'PUT',
                'id' => $id]);
        }
        return redirect()->back()->with('error', ['Citation non trouvé']);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitationRequest $request, $id)
    {
        if (Citation::where(['id' => $id, 'user_creator' => Auth::id()])->first()){
            $data = $request->validated();
            $citation->update($data);
            $citation->save();
            
            return view('gest/citation',[
                'citation'=>$citation,
                'action'=>route('citation.update', $id),
                'method' => 'PUT',
                'id' => $id]);
        }
        return redirect()->back()->with('error', ['Citation non trouvé']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if ($citation = Citation::where(['id' => $id, 'user_creator' => Auth::id()])->first()){
            if($citation->delete()){
                return redirect()->route('citation.index')->with('success', ['Citation supprimé']);  
            }
            return redirect()->back()->with('error', ['Erreur de suppression']);  
        }
        return redirect()->back()->with('error', ['Citation non trouvé']);  
    }
}
