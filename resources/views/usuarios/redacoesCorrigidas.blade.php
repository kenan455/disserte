@extends('usuarios.layout.sistema')
@section('titulo', 'Tabelas')

@section('conteudo')

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/me.js') }} "></script>
    <script src="{{ asset('assets/dist/me-markdown.standalone.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <style type="text/css">
  
      .markdown {
        display: none; 
      }

      #redacao {
        border: 1px solid #E91E63;
        padding: 10px;
      }   

      #medium-editor-toolbar-1{
          display: none;
      }

      pre{
        overflow: hidden;
        font-size: 1.2rem;
        line-height: 2rem;
        font-family:  "Arial";
        text-align: justify;
      }     

      .highlight {
        background-color:#FFFF7B;
        opacity: 0.8;        
      }

      .F44336 {
        background-color: #F44336;
      } 

      .botaoVerde {
        background-color: #39FF14;
      }

      .botaoAzul{
        background-color: #29B6F6;
      }

      .botaoRoxo {
        background-color: #af8eff;
      }

      .fontAdjustment {
          font-size: 1.2rem;
          font-family:  "Arial";
        }

        .fontNota {
          font-size: 1.35rem;
          font-family:  "Arial";
        }


    /*Chrome*/
    @media screen and (-webkit-min-device-pixel-ratio:0) {
        input[type='range'] {
          overflow: hidden;
          width: 80px;
          -webkit-appearance: none;
          background-color: gray;
        }
        
        input[type='range']::-webkit-slider-runnable-track {
          height: 10px;
          -webkit-appearance: none;
          color: #F44336;
          margin-top: -1px;
        }
        
        input[type='range']::-webkit-slider-thumb {
          width: 10px;
          -webkit-appearance: none;
          height: 10px;
          cursor: ew-resize;
          background: black;
          box-shadow: -80px 0 0 80px #0075ff;
        }

    }
    /** FF*/
    input[type="range"]::-moz-range-progress {
      background-color: #0075ff; 
    }
    input[type="range"]::-moz-range-track {  
      background-color: #9a905d;
    }
    /* IE*/
    input[type="range"]::-ms-fill-lower {
      background-color: #0075ff; 
    }
    input[type="range"]::-ms-fill-upper {  
      background-color: #9a905d;
    }
    </style>

    <div class="container-fluid py-4">
        

     <form name="formCad" >
        @csrf

            <div class='form-row'>

                <div class="container ">
                    <div class="form-group col-sm-12 mb-5 px-2 py-2 text-center">

                      <label for="" class="text-center fontAdjustment">TEMA DA REDAÇÃO:</label>
                                

                      <input disabled class="form-control text-center fontAdjustment " id="redacao" name="tema_redacao" value="{{ $redacao->tema_redacao }}"></input>

                    </div>

                    @if($redacao->titulo)
                        <div class="form-group col-sm-12 mb-5 px-2 py-2 text-center">
                          <label for="" class="text-center fontAdjustment">DIGITE O TÍTULO DA REDAÇÃO:</label>      
                          <input disabled class="form-control text-center fontAdjustment" id="redacao" name="titulo" value="{{ $redacao->titulo }}" ></input>
                        </div>
                    @endif


                    <div id="redacao" class="form-group col-sm-12 mb-5">
                      <textarea class="editor fontAdjustment "  id="" name="redacao" disabled>
                          {{$redacao->redacao}}
                      </textarea>
                    </div>

                    @if($redacao->competencia_5)
                      <div class="form-group row mt-5 text-center d-flex justify-content-between ">


                        <div  class="form-group col-sm-2">
                          <span>Competência I</span>
                          <br>
                          <input id="range" disabled type="range" value="{{$redacao->competencia_1}}" min="0" max="200" oninput="this.nextElementSibling.value = this.value" name="competencia_1">
                          <output>{{$redacao->competencia_1}}</output>
                        </div>
                        
                        <div  class="form-group col-sm-2">
                          <span>Competência II</span>
                          <br>
                          <input id="range" disabled type="range" value="{{$redacao->competencia_2}}" min="0" max="200" oninput="this.nextElementSibling.value = this.value" name="competencia_2">
                          <output>{{$redacao->competencia_2}}</output>
                        </div>

                        
                        <div  class="form-group col-sm-2">
                          <span>Competência III</span>
                          <br>
                          <input id="range" disabled type="range" value="{{$redacao->competencia_3}}" min="0" max="200" oninput="this.nextElementSibling.value = this.value" name="competencia_3">
                          <output>{{$redacao->competencia_3}}</output>
                        </div>

                        
                        <div class="form-group col-sm-2">
                          <span>Competência IV</span>
                          <br>
                          <input id="range" disabled type="range" value="{{$redacao->competencia_4}}" min="0" max="200" oninput="this.nextElementSibling.value = this.value" name="competencia_4">
                          <output>{{$redacao->competencia_4}}</output>
                        </div>
                        
                        <div class="form-group col-sm-2">
                          <span>Competência V</span>
                          <br>
                          <input id="range" disabled type="range" value="{{$redacao->competencia_5}}" min="0" max="200" oninput="this.nextElementSibling.value = this.value" name="competencia_5">
                          <output>{{$redacao->competencia_5}}</output>
                        </div>

                      </div>
                    @endif

                    @if($redacao->nota)
                      <div class="d-flex justify-content-center mt-5 fontNota">
                        <div><span class="fontAdjustment">Nota Final:</span> <span class="fontNota">{{$redacao->nota}}</span> </div>
                      </div>
                    @endif

                    @if($redacao->comentario)
                      <div class="form-group col-sm-12 mt-4 px-2 py-2 text-center ">
                        <label for="" class="text-center fontAdjustment">COMENTÁRIO:</label>
                        <textarea class="form-control text-justify fontAdjustment p-3" id="redacao" rows="4" name="comentario" disabled>{{$redacao->comentario}}</textarea>
                      </div>
                    @endif
                    <pre class="markdown"  >
                            
                    </pre>


                    <script src="path/to/medium-editor.js"></script>

                    <script src="path/to/me-markdown.standalone.min.js"></script>
                    <script>
                        
                        (function () {
                            var markDownEl = document.querySelector(".markdown");
                            new MediumEditor(document.querySelector(".editor"), {
                                extensions: {
                                    markdown: new MeMarkdown(function (md) {
                                        markDownEl.textContent = md;
                                    })
                                }
                            });

                        })();

                    </script>


                </div>
                
                
            
         <a class="form-control btn btn-primary text-white mt-5"href="{{ route('user.correcoes') }}">Voltar</a>

    </form>
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
        
        
