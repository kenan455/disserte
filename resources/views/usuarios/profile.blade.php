@extends('usuarios.layout.sistema')
@section('titulo', 'Perfil')

@section('conteudo')


    <div class="container-fluid px-2 px-md-4 ">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>

      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{ asset('assets/img/bruce-mars.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>

          <div class="col-auto my-auto">
            <div class="h-100">
              <!-- NOME USUARIO -->
              <h5 class="mb-1">
                {{$user->name}}
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                @if($user->telefone) {{$user->telefone}} |@endif  {{$user->email}}
              </p>
            </div>
          </div>
          
        </div>
              
            <div class="col-12 col-xl-4 ">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Plano: <span>@if($user->plano) {{$user->plano}} |@endif</span></h6>
                    </div>
                    <a href="" class="btn btn-sm btn-danger bg-grey mt-3 w-50 ml-5">
                        CANCELAR INSCRIÇÃO
                    </a>
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

  