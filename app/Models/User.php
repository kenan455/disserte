<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nivel',
        'telefone',
        'plano',
        'mudou_senha',
        'qtd_correcoes'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rules($id_user){
        return  $rules = [
            'email' => 'unique:users,email,'.$id_user,
        ];
    }
  
    public function messages(){
        return $messages = [
          'email.unique'=>'Email em uso.',
        ];
    }

    public function countUser()
    {
        $users_count = DB::table('users')
        ->where(['nivel'=>2])
        ->count();

        return $users_count;
    }

    private $porPagina = 10;

    public function getPorPagina(){
        return $this->porPagina;
    }

    public function pesquisa($req){
        $dados = $req->all();

        if (isset($dados['pesquisa']) && $dados['pesquisa'] != null ) {

            $resposta = User::where(function($query) use ($dados){
                $query->Where('name', 'like', $dados['pesquisa']."%")
                ->orWhere('id', '=', intval($dados['pesquisa']));
            })
            ->paginate($this->getPorPagina());
            
        } elseif(isset($dados['date']) && isset($dados['plano_expirado'])) {
            $resposta = User::where(function($query) use ($dados){
                $orderdate = explode('-', $dados['date']);
                $day = $orderdate[0];
                $month   = $orderdate[1];
                $year  = $orderdate[2];

                $query->Where('qtd_correcoes', 'like', $dados['plano_expirado']."%")
                ->Where('created_at', '>=', $year.'-'. $month.'-'.$day.' 00:00:00');
            })
            ->paginate($this->getPorPagina());
        } elseif(isset($dados['plano_expirado'])) {
            $resposta = User::where(function($query) use ($dados){
                $query->Where('qtd_correcoes', 'like', $dados['plano_expirado']."%");
            })
            ->paginate($this->getPorPagina());
        } elseif(isset($dados['date'])) {
            $resposta = User::where(function($query) use ($dados){
                $orderdate = explode('-', $dados['date']);
                $day = $orderdate[0];
                $month   = $orderdate[1];
                $year  = $orderdate[2];

                $query->Where('created_at', '>=', $year.'-'. $month.'-'.$day.' 00:00:00');
            })
            ->paginate($this->getPorPagina());
        } else {
            abort(404);
        }

        $dataForm = $req->except('_token');
        $retornar['resposta'] = $resposta;
        $retornar['dataForm'] = $dataForm;
        
        return $retornar;

    }
}
