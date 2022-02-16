@extends('corretores.layout.sistema')
@section('titulo', 'Tabelas')

@section('conteudo')
  <style type="text/css">
    .form-pesquisa {
      display: flex;
      justify-content: center;
    }
    @media (max-width: 576px) { 
      #form-pesquisa {
        display: block;
      }
    }
    nav.flex {
      display: none;
    }
  </style>
	<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 ">
                <h6 class="text-white text-capitalize ps-3 text-center">Tabela De Alunos</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              @if (session('status'))
                  <div class="alert alert-success text-center">
                    {{ session('status') }}
                  </div><br>
              @endif
              @if (session('alert'))
                  <div class="alert alert-danger text-center">
                    {{ session('alert') }}
                  </div><br>
              @endif

              <div class="table-responsive p-0">
                  <a class='d-flex justify-content-center pt-2' href="{{ route('registro.page') }}">
                    <span class="btn btn-dark btn-md">
                        Cadastrar Aluno
                    </span>
                  </a>

                  <br>
                  <form class="form-pesquisa" id='form-pesquisa' action="{{ route('alunos.pesquisar') }}" method="post">
                      @csrf
                        <div class="form-group col-sm-2">
                          <input style="border: 1px solid #e91e63; padding: 10px;" type="text" class='form-control' name="pesquisa" value="" placeholder="Nome">
                        </div>
                        <br>
                        <div class="form-group col-sm-2">
                          <input style="border: 1px solid #e91e63; padding: 10px;" type="text" class='form-control' name="plano_expirado" value="" placeholder="Redações">
                        </div>
                        <br>
                        <div class="form-group col-sm-2">
                          <input style="border: 1px solid #e91e63; padding: 10px;" type="text" maxlength="10" class='js-date form-control' name="date" value="" placeholder="Dia">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">pesquisar</button>
                  </form>
                  <br>
                  @if(isset($dataForm)) 
                      {{$alunos->appends($dataForm)->links()}}
                  @else
                      {{$alunos->links()}}
                  @endif

                  <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Plano</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telefone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data do cadastro</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    </tr>
                  </thead>

                  @foreach($alunos as $aluno)
                    <tbody><!-- INICIO do CRUD usuario -->
                      <tr> 

                        <td>
                          <div >
                            <!-- imagem de perfil
                            <div>
                              <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            </div>
                            -->
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $aluno->name }}</h6>
                              <!--<p class="text-xs text-secondary mb-0">john@creative-tim.com</p EMAIL DO USER-->
                            </div>

                          </div>
                        </td>

                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $aluno->plano }}</p>
                        </td>

                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $aluno->email }}</p>
                        </td>

                        <td >
                          <p class="text-xs font-weight-bold">{{ $aluno->telefone }}</p>
                        </td>

                        <td >
                          <p class="text-xs font-weight-bold mb-0">{{ $aluno->created_at->format('d/m/Y'); }}</p>
                        </td>

                        <td >
                          <a href="{{ route('atualizarPlano.usuario', $aluno) }}" class="badge badge-sm bg-gradient-info" data-toggle="tooltip">
                              <span style="letter-spacing: 1px;" onclick="$('#form-edit-{{ $aluno->id }}').submit()">
                                Atualizar Plano
                              </span>
                          </a>
                        </td>

                        

                    </tbody><!-- FIM do CRUD usuario -->
                  @endforeach
                </table>
                {{ $alunos->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div>
  

      <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
            damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
      </script>

      <script type="text/javascript">
        var input = document.querySelectorAll('.js-date')[0];
  
        var dateInputMask = function dateInputMask(elm) {
          elm.addEventListener('keypress', function(e) {
            if(e.keyCode < 47 || e.keyCode > 57) {
              e.preventDefault();
            }
            
            var len = elm.value.length;
            
            // If we're at a particular place, let the user type the slash
            // i.e., 12/12/1212
            if(len !== 1 || len !== 3) {
              if(e.keyCode == 47) {
                e.preventDefault();
              }
            }
            
            // If they don't add the slash, do it for them...
            if(len === 2) {
              elm.value += '-';
            }

            // If they don't add the slash, do it for them...
            if(len === 5) {
              elm.value += '-';
            }
          });
        };
          
        dateInputMask(input);
      </script>
      
@endsection

	
		
	

