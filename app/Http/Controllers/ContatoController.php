<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
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
        $id= auth()->user()->id;
        $contatos = Contato::where('user_id',$id)->get();
      
        return view('contatos.index',compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatos.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contato = new \App\Models\Contato();
        $contato->nome = $request->input('nome');
        $contato->apelido = $request->input('apelido');
        $contato->user_id = auth()->user()->id;
        
        $contato->save();

        return redirect()->route('contatos.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato,$id)
    {
        $contato = Contato::where('id',$id)->first();
       
         return view('contatos.editar',compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato)
    {
       
        $contato = Contato::findOrFail(request()->input('id'));
        $contato->update($request->all());
      

       return redirect()->route('contatos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato, $id)
    {
    
       $contato = Contato::findOrFail($id);
       $contato->delete();
       return redirect()->route('contatos.index');
    }
}
