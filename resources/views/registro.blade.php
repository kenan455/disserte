<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>
    REGISTRO
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />
  <style type="text/css">
    /*
    #containerImage {
      background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');
    }
    */

  
    #formContainer {
     background-color: white;
    }
  </style>
</head>

<body  >
  <main class="main-content  mt-0">

    <section class="">

      <div class="page-header min-vh-100" id="containerImage">

        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">

          <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto" id="formContainer">
              <div class="card card-plain">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <h5 class="text-white font-weight-bolder text-center mt-2 mb-0">Insira os dados abaixo </h5>
                  </div>
                </div>
                <!--
                <div class="card-header">
                  <h4 class="font-weight-bolder text-center">Registre-se</h4>
                  <p class="mb-0">Insira seu email e senha para registrar-se</p>
                </div>
              -->
                <div class='card-body'>
                    @if(isset($errors) and count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            {{$error}}
                            @endforeach
                        </div>
                    @endif
                    
                
                    <form name="formCad" id="formCad" method="post" action="{{ route('user.store') }}">
                    @csrf

                        <div class='form-row'>
                            <div class="input-group input-group-outline mb-3">
                                <label for="" class="form-label">Nome</label>
                                <input required type="text" class="form-control"  name="name" id="name" >
                            </div>

                            <div class="input-group input-group-outline mb-3">
                                <label for="" class="form-label">E-mail</label>
                                <input required type="email" class="form-control"  name="email" id="email" >
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label for="" class="form-label">Telefone</label>
                                <input required type="text" class="form-control" type="text" id="telefone" name="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                            </div>

                            <label for="" class="form-label">Plano</label>
                            <div class="input-group input-group-outline mb-3 ">
                                <select class="form-control" name="plano" >
                                  <option value="Básico">Básico</option>
                                  <option value="Padrão">Padrão</option>
                                  <option value="Avançado">Avançado</option>
                                  <option value="">Corretor</option>
                                </select>
                            </div>

                            <div class="input-group input-group-outline mb-3">
                                <label for="" class="form-label">Senha</label>
                                <input minlength="6" maxlength="100" required type="password" class="form-control"  name="password" id="password" >
                            </div>

                            <label for="" class="form-label">Tipo de usuário</label>
                            <div class="input-group input-group-outline mb-3 ">
                                <select class="form-control" name="nivel" >
                                  <option value="2">Aluno</option>
                                  <option value="1">Corretor</option>
                                </select>
                            </div>
                            
                        </div>

                        <input class="form-control btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" type="submit" value="registrar">

                    </form>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
              </div>
            </div>
          </div>
        </div>
      </footer>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script type="text/javascript">
    function mask(o, f) {
        setTimeout(function() {
          var v = mphone(o.value);
          if (v != o.value) {
            o.value = v;
          }
        }, 1);
      }

      function mphone(v) {
        var r = v.replace(/\D/g, "");
        r = r.replace(/^0/, "");
        if (r.length > 10) {
          r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (r.length > 5) {
          r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (r.length > 2) {
          r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
          r = r.replace(/^(\d*)/, "($1");
        }
        return r;
      }
  </script>
  <script>

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.0') }}"></script>
</body>

</html>