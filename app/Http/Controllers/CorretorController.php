<?php

namespace App\Http\Controllers;

use App\Models\Corretor;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class CorretorController extends Controller
{
    private $objUser;

    public function __construct()
    {
        $this->objUser = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function show(Corretor $corretor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function edit(Corretor $corretor)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corretor $corretor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corretor $corretor)
    {
        //
    }

    public function login(){
        return view('corretores/login');
    }

    public function home()
    {   
        $user_count = $this->objUser->countUser();
        $user = User::find(Auth::user()->id);
        return view('corretores/dashboard', compact('user', 'user_count'));
    }

    public function logout()
    {
        Auth::logout();

        return view('login');
    }

    public function mudarSenha()
    {
        $user = User::find(Auth::user()->id);
        return view('corretores/senha', compact('user'));
    }

    public function atualizarSenha(Request $req){
        $dados = $req->all();
        if ($dados['password'] != $dados['confirmar-password']) {
            return redirect()->route('corretor.mudar_senha')->with('alert', 'Senhas não conferem.');
        }
        $user = User::find(Auth::user()->id);
        $user->mudou_senha = 1;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('corretor.mudar_senha')->with('status', 'Senha atualizada com sucesso.');
    }

    public function alunos(){
        $user = User::find(Auth::user()->id);
        $alunos = User::where(['nivel'=>2])->paginate(10);
        return view('corretores/alunos', compact('alunos', 'user'));
    }

}   
