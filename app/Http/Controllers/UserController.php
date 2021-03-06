<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
use App\Models\Redacao;

class UserController extends Controller
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

    public function inserirAnexo($anexo, $pasta){
        $num = rand(1111, 9999);
        $dir = "arquivos/$pasta";
        $type = "arquivos/$pasta";
        $ex = $anexo->guessClientExtension();
        $nomeAnexo = time().random_int(100, 999) .'.' . $ex;
        public_path($dir.''.$type.'/'.$nomeAnexo.'/');
        $anexo->move($dir, $nomeAnexo);
        return $dir."/".$nomeAnexo;
    }
    
    public function store(Request $request)
    {
        $idUserDaSessao = User::find(Auth::user()->id)->id;

        $dados = $request->all();

        $autor = User::find(Auth::user()->id)->name;
        $dados['autor'] = $autor;

        $qtd_correcoes = User::find(Auth::user()->id)->qtd_correcoes;
        $dados['qtd_correcoes'] = $qtd_correcoes - 1;

        if($dados['qtd_correcoes'] == -1) {
            return redirect()->route('user.postar_redacao')->with('alert', 'Você atingiu o limite de correções do seu plano.');
        } 

        $this->objUser->where(['id'=>$idUserDaSessao])->update([
            'qtd_correcoes'=>$dados['qtd_correcoes']
        ]);

        $dados['corrigida'] = 0;

        $user_id = User::find(Auth::user()->id)->id;
        $dados['user_id'] = $user_id;

        if(isset($request->arquivo)){
            $dados['arquivo'] = $this->inserirAnexo($request->arquivo, 'redacoes');
        }

        $cad = Redacao::create($dados);
        
        if ($cad) {
            return redirect()->route('user.postar_redacao')->with('status', 'Redação cadastrada com sucesso.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login()
    {
        return view('login');
    }


    public function registro()
    {
        return view('registro');
    }

    public function home()
    {
        $user = User::find(Auth::user()->id);
        return view('usuarios/dashboard', compact('user'));
    }


    public function postarRedacao()
    {
        $user = User::find(Auth::user()->id);
        return view('usuarios/postarRedacao', compact('user'));
    }


    public function correcoes()
    {   
        $user_id = User::find(Auth::user()->id)->id;
        $user = User::find(Auth::user()->id);

        $redacoes = Redacao::where('user_id', $user_id)->paginate(10);

        return view('usuarios/correcoes', compact('redacoes','user'));
    }



    public function auth(Request $request)
    {   
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if ( Auth::user()->nivel == 1) {
                $user = User::find(Auth::user()->id);
                $user_count = $this->objUser->countUser();
                return view('corretores/dashboard', compact('user', 'user_count'));

            } else if ( Auth::user()->nivel == 2) { 
                $user = User::find(Auth::user()->id);
                return redirect()->route('user.correcoes');
            }
        }else {
            return redirect()->back()->with('danger', 'E-mail ou senha inválida');
        }
    }


    public function logout()
    {
        Auth::logout();

        return view('login');
    }


    public function correcoesShow($id)
    {
        $redacao = Redacao::FindOrFail($id);
        $user = User::find(Auth::user()->id);

        return view('usuarios/redacoesCorrigidas', compact('redacao', 'user'));
    }

    public function storeUsuario(Request $request)
    {   
        $this->validate($request, $this->objUser->rules(0), $this->objUser->messages());
        $dados = $request->except("_token");
        
        $dados['plano'] = $dados['plano'];
        $dados['nivel'] = $dados['nivel'];
        $dados['mudou_senha'] = 0;
        $dados['password'] = Hash::make($dados['password']);

        if ($dados['plano'] == 'Básico') {
            $dados['qtd_correcoes'] = 3;
        } else {
            $dados['qtd_correcoes'] = 4;
        }

        User::create($dados);
        
        return redirect()->route('corretor.home')->with('status', 'Usuário Cadastrado Com Sucesso');

    }

    public function perfil()
    {
        $user = User::find(Auth::user()->id);
        return view('usuarios/profile', compact('user'));
    }

    public function mudarSenha()
    {
        $user = User::find(Auth::user()->id);
        return view('usuarios/senha', compact('user'));
    }

    public function atualizarSenha(Request $req){
        $dados = $req->all();
        if ($dados['password'] != $dados['confirmar-password']) {
            return redirect()->route('user.mudar_senha')->with('alert', 'Senhas não conferem.');
        }
        $user = User::find(Auth::user()->id);
        $user->mudou_senha = 1;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('user.mudar_senha')->with('status', 'Senha atualizada com sucesso.');
    }

    public function atualizarPlano(Request $request, $id){
 
         $plano = User::find($id)->plano;

        if ($plano == "Básico") {
            $this->objUser->where(['id'=>$id])->update([
                'qtd_correcoes'=>3
            ]);
        } else if($plano == "Padrão" || $plano == "Avançado") {
            $this->objUser->where(['id'=>$id])->update([
                'qtd_correcoes'=>4
            ]);
        }
        return redirect()->route('corretor.alunos')->with('status', 'Plano atualizado!');
    }

    public function pesquisa(Request $req)
    {
        $user = User::find(Auth::user()->id);
        
        $resposta = $this->objUser->pesquisa($req);
        $alunos = $resposta['resposta'];
        $dataForm = $resposta['dataForm'];

        
        
        //dd($dataForm);
        return view('corretores/alunos', compact('alunos', 'dataForm', 'user'));
    }
}
