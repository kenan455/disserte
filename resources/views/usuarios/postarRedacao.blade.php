@extends('usuarios.layout.sistema')
@section('titulo', 'Tabelas')

@section('conteudo')
    <div class="container-fluid py-4">

      <style type="text/css">
        #redacao {
            border: 1px solid #E91E63;
            padding: 10px;
        }
        .textoJustificado {
          text-align: justify;
        }

        .fontAdjustment {
          font-size: 1.2rem;
          font-family:  "Arial";
        }      

    </style>

    <style type="text/css">
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
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
    <form name="formCad" id="formCad" method="POST" action="{{ route('redacao.store')}}" enctype="multipart/form-data">
    @csrf
      <div class='form-row'>

        <div class="form-group col-sm-12 mb-5 px-2 py-2 text-center">
          <label for="" class="text-center fontAdjustment">DIGITE O TEMA DA REDAÇÃO:</label>
          <input required class="form-control text-center fontAdjustment" id="redacao" name="tema_redacao">
        </div>


        <div class="form-group col-sm-12 mb-5 px-2 py-2 text-center">
          <label for="" class="text-center fontAdjustment">DIGITE O TÍTULO DA REDAÇÃO (SE HOUVER):</label>
          <input class="form-control text-center fontAdjustment" id="redacao" name="titulo"></input>
        </div>
    
        <div class="form-group text-center">
          <label for="" class="text-center fontAdjustment">Foto da sua redação</label>
            <div class="input-group px-2 py-2 rounded-pill bg-white shadow-sm">

              <input required id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="arquivo" id="arquivo">
              <label id="upload-label" for="upload" class="font-weight-light text-muted">Escolha o arquivo</label>
              <div class="input-group-append">
                <label for="upload" class="btn btn-primary text-white m-0 rounded-pill px-4"> 
                  <i class="fa fa-cloud-upload mr-2 text-muted"></i>
                  <small class="text-uppercase font-weight-bold ">Escolha o arquivo</small>
                </label>
              </div>
            </div>

            <!-- Uploaded image area-->
            <div  class="image-area mt-4 mb-3">
              <img id="imageResult" width="300" height="300" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-none">
            </div>
        </div>
        
        <div class="text-center">
          OU
        </div>

        <div class="form-group col-sm-12 mb-5 px-2 py-2 text-center mt-3">
          <label for="" class="text-center fontAdjustment">DIGITE SUA REDAÇÃO:</label>
          <textarea class="form-control fontAdjustment textoJustificado" id="redacao" rows="12" name="redacao"></textarea>
        </div>
        </div>

      <input class="form-control btn btn-primary" type="submit" value="Salvar">
    </form>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        /*  ==========================================
            SHOW UPLOADED IMAGE
        * ========================================== */
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                     $('#imageResult')
                        .attr('src', e.target.result);
                    };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL(input);
                $("#imageResult").removeClass('d-none');
                $("#imageResult").addClass('d-block');

            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById( 'upload' );
        var infoArea = document.getElementById( 'upload-label' );

        input.addEventListener( 'change', showFileName );
        function showFileName( event ) {
          var input = event.srcElement;
          var fileName = input.files[0].name;
          infoArea.textContent = 'Nome do arquivo: ' + fileName;
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
      
@endsection
  
  