<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       
       $datas = Telefone::where('contato_id',$id)->get();        
       session()->put('key', $id);

       return view('telefones.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             
        return view('telefones.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $telefone = new \App\Models\Telefone();
        $telefone = new Telefone();
        $telefone->contato_id=session()->get('key');
        $telefone->telefone=$request->input('telefone');
        $id =session()->get('key');
       
        $telefone->save();

        return redirect()->route('telefones.index',$id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show(Telefone $telefone)
    {
       
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function edit(Telefone $telefone,$id)
    {
        $telefone = Telefone::where('id',$id)->first();
       
        return view('telefones.editar',compact('telefone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telefone $telefone)
    {
      
        $telefone = Telefone::findOrFail(request()->input('id'));
        $telefone->update($request->all());
        $id =session()->get('key');

        return redirect()->route('telefones.index',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telefone $telefone,$id)
    {
        $contato = Telefone::findOrFail($id);
        $contato->delete();
        return redirect()->back()->with('success', 'apagado com sucesso!');  
    }
}
