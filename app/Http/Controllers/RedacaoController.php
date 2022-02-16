<?php

namespace App\Http\Controllers;

use App\Models\Redacao;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class RedacaoController extends Controller
{
    private $objRedacao;
    private $objUser;

    public function __construct()
    {
        $this->objRedacao = new Redacao();
        $this->objUser = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $redacoes = Redacao::all();
        $user = User::find(Auth::user()->id);
        return view('corretores/crud_redacoes/index', compact('redacoes', 'user'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Redacao  $redacao
     * @return \Illuminate\Http\Response
     */
    public function show(Redacao $redacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Redacao  $redacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $redacao = Redacao::FindOrFail($id);
        $user = User::find(Auth::user()->id);

        if ($redacao->arquivo != null) {
            return view('corretores/crud_redacoes/editImg', compact('redacao', 'user'));
        } else {
            return view('corretores/crud_redacoes/edit', compact('redacao', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Redacao  $redacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->except(['_token', '_method']);

        $dados['corrigida'] = 1;


        $this->objRedacao->where(['id'=>$id])->update($dados);
        return redirect()->route('corretor.corrigir_redacoes')->with('status', 'Redação atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Redacao  $redacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Redacao $redacao)
    {
        //
    }

    public function downloadArquivo($id)
    {   
        $arquivo = Redacao::find($id)->arquivo;
        return response()->download(public_path() . '/' . $arquivo);
    }


    
}
