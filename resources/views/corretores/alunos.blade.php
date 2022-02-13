@extends('corretores.layout.sistema')
@section('titulo', 'Tabelas')

@section('conteudo')

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
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Plano</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telefone</th>
                    </tr>
                  </thead>

                  @foreach($alunos as $aluno)
                    <tbody><!-- INICIO do CRUD usuario -->
                      <tr> 

                        <td>
                          <div class="d-flex px-2 py-1">
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

                    </tbody><!-- FIM do CRUD usuario -->
                  @endforeach
                </table>
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
      
@endsection

	
		
	

