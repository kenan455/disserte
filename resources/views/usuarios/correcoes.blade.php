@extends('usuarios.layout.sistema')
@section('titulo', 'Tabelas')

@section('conteudo')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 ">
                <h6 class="text-white text-capitalize ps-3 text-center">Tabela De Redações</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Autor</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tema da redação</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                  <a class='d-flex justify-content-center pt-2' href="{{route('user.postar_redacao' )}}">
                    <span onclick="" class="btn btn-primary btn-md">
                        Postar Redação
                    </span>
                  </a>

                  @foreach($redacoes as $redacao)
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
                              <h6 class="mb-0 text-sm">{{ $redacao->autor }}</h6>
                              <!--<p class="text-xs text-secondary mb-0">john@creative-tim.com</p EMAIL DO USER-->
                            </div>

                          </div>
                        </td>

                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $redacao->tema_redacao }}</p>
                        </td>

                        <td class="align-middle text-center text-sm">
                          @if($redacao->corrigida)
                            <span class="badge badge-sm bg-gradient-success" style="letter-spacing: 1.5px;">Corrigido</span>
                            <td class="align-middle text-center text-sm">
                              <a class='' data-toggle="tooltip" href="{{ route('redacoes.show.usuario', $redacao) }}">
                                    <span style="letter-spacing: 1px;" onclick="$('#form-edit-{{ $redacao->id }}').submit()" class="badge badge-sm bg-gradient-info">
                                        Ver Texto
                                    </span>
                              </a>
                            </td>
                          @else 
                            <span class="badge badge-sm bg-gradient-warning" style="letter-spacing: 1px;">Correção Pendente</span>
                          @endif
                        </td>
                        

                    </tbody><!-- FIM do CRUD usuario -->
                  @endforeach
                </table>
                {{ $redacoes->links('pagination::bootstrap-4') }}
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
  
  