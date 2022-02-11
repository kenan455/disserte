@extends('corretores.layout.sistema')
@section('titulo', 'Tabelas')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/me.js') }} "></script>
    <!--<script src="{{ asset('assets/dist/me-markdown.standalone.js') }}"></script>-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <style type="text/css">
        

      #redacao {
        border: 1px solid #E91E63;
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


    </style>

    <div class="container-fluid py-4">
        

     <form name="formCad" id="formCad" method="post" action="{{ route('redacao.update', $redacao->id) }}">
        @csrf
        <input type="hidden" name="_method" value="PUT">
            <div class='form-row'>

                <div class="container">

                    <div class="form-group col-sm-12 mb-5 px-2 py-2 text-center">
                      <label for="" class="text-center">TEMA DA REDAÇÃO:</label> 
                      <input disabled class="form-control text-center fontAdjustment" id="redacao" name="tema_redacao" value="{{ $redacao->tema_redacao }}"></input>
                    </div>

                    @if($redacao->titulo)
                        <div class="form-group col-sm-12 mb-5 px-2 py-2 text-center">
                          <label for="" class="text-center">TÍTULO DA REDAÇÃO:</label>
                          <input class="form-control text-center fontAdjustment" id="redacao" name="titulo" value="{{ $redacao->titulo }}" ></input>
                        </div>
                    @endif

                    <div id="redacao" class="form-group col-sm-12 ">
                      <textarea  class="editable" name="redacao" >
                        <pre style="padding: -200px;">{{$redacao->redacao}}</pre>
                      </textarea>
                    </div>

                    @if($redacao->competencia_5)
                      <div class="form-group row mt-5 text-center d-flex justify-content-between ">
                        <div  class="form-group col-sm-2">
                          <span>Competência I</span>
                          <br>
                          <input step="20" type="range" value="{{$redacao->competencia_1}}" min="0" max="200" onmouseup="fillingNotaFinal()" oninput="this.nextElementSibling.value = this.value" name="competencia_1">
                          <output>{{$redacao->competencia_1}}</output>
                        </div>
                        
                        <div  class="form-group col-sm-2">
                          <span>Competência II</span>
                          <br>
                          <input step="20" type="range" value="{{$redacao->competencia_2}}" min="0" max="200" onmouseup="fillingNotaFinal()" oninput="this.nextElementSibling.value = this.value" name="competencia_2">
                          <output>{{$redacao->competencia_2}}</output>
                        </div>

                        
                        <div  class="form-group col-sm-2">
                          <span>Competência III</span>
                          <br>
                          <input step="20" type="range" value="{{$redacao->competencia_3}}" min="0" max="200" onmouseup="fillingNotaFinal()" oninput="this.nextElementSibling.value = this.value" name="competencia_3">
                          <output>{{$redacao->competencia_3}}</output>
                        </div>

                        
                        <div class="form-group col-sm-2">
                          <span>Competência IV</span>
                          <br>
                          <input step="20" type="range" value="{{$redacao->competencia_4}}" min="0" max="200" onmouseup="fillingNotaFinal()" oninput="this.nextElementSibling.value = this.value" name="competencia_4">
                          <output>{{$redacao->competencia_4}}</output>
                        </div>
                        
                        <div class="form-group col-sm-2">
                          <span>Competência V</span>
                          <br>
                          <input step="20" type="range" value="{{$redacao->competencia_5}}" min="0" max="200" onmouseup="fillingNotaFinal()" oninput="this.nextElementSibling.value = this.value" name="competencia_5">
                          <output>{{$redacao->competencia_5}}</output>
                        </div>
                      </div>
                    @else
                      <div class="form-group row mt-5 text-center d-flex justify-content-between ">
                        <div  class="form-group col-sm-2">
                          <span>Competência I</span>
                          <br>
                          <input step="20" type="range" value="120" min="0" max="200" onmouseup="fillingNotaFinal()" oninput=" this.nextElementSibling.value = this.value" name="competencia_1">
                          <output >120</output>
                        </div>
                        
                        <div  class="form-group col-sm-2">
                          <span>Competência II</span>
                          <br>
                          <input step="20" type="range" value="120" min="0" max="200" onmouseup="fillingNotaFinal()" oninput="this.nextElementSibling.value = this.value" name="competencia_2">
                          <output id="competencia-2">120</output>
                        </div>

                        
                        <div  class="form-group col-sm-2">
                          <span>Competência III</span>
                          <br>
                          <input step="20" type="range" value="120" min="0" max="200" onmouseup="fillingNotaFinal()" oninput="this.nextElementSibling.value = this.value" name="competencia_3">
                          <output >120</output>
                        </div>

                        
                        <div class="form-group col-sm-2">
                          <span>Competência IV</span>
                          <br>
                          <input step="20" type="range" value="120" min="0" max="200" onmouseup="fillingNotaFinal()" oninput="this.nextElementSibling.value = this.value" name="competencia_4">
                          <output id="competencia-4">120</output>
                        </div>
                        
                        <div class="form-group col-sm-2">
                          <span>Competência V</span>
                          <br>
                          <input step="20" type="range" value="120" min="0" max="200" onmouseup="fillingNotaFinal()" oninput="this.nextElementSibling.value = this.value" name="competencia_5">
                          <output id="competencia-5">120</output>
                        </div>
                      </div>

                    @endif

                    @if($redacao->nota)
                      <div class="d-flex justify-content-between mt-5">
                        <div>Nota final:</div>
                        <input id="nota-final" class="text-center" type="text" name="nota" value="{{ $redacao->nota }}">
                      </div>
                    @else
                      <div class="d-flex justify-content-between mt-5">
                        <div>Nota final:</div>
                        <input id="nota-final" class="text-center" type="text" name="nota" >
                      </div>
                    @endif
                    @if($redacao->comentario)
                      <div class="form-group col-sm-12 mt-5 px-2 py-2 text-center ">
                        <label for="" class="text-center">COMENTÁRIO:</label>
                        <textarea class="form-control text-justify fontAdjustment p-3" id="redacao" rows="4" name="comentario">{{$redacao->comentario}}</textarea>
                      </div>
                    @else
                      <div class="form-group col-sm-12 mt-5 px-2 py-2 text-center">
                        <label for="" class="text-center">COMENTÁRIO:</label>
                        <textarea class="form-control text-justify fontAdjustment p-3" id="redacao" rows="4" name="comentario"></textarea>
                      </div>
                    @endif

                    
                    <script type="text/javascript">
                      function fillingNotaFinal()
                        {
                          function getElementByXpath(path) {
                            return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
                          }

                          var competencia_1 = getElementByXpath("/html/body/main/div[1]/form/div/div/div[4]/div[1]/output").value;

                          var competencia_2 = getElementByXpath('/html/body/main/div[1]/form/div/div/div[4]/div[2]/output').value;

                          

                          var competencia_3 = getElementByXpath('/html/body/main/div[1]/form/div/div/div[4]/div[3]/output').value;

                          var competencia_4 = getElementByXpath('/html/body/main/div[1]/form/div/div/div[4]/div[4]/output').value;

                          var competencia_5 = getElementByXpath('/html/body/main/div[1]/form/div/div/div[4]/div[5]/output').value;

                          var nota_final = parseInt(competencia_1) + parseInt(competencia_2) + parseInt(competencia_3) + parseInt(competencia_4) + parseInt(competencia_5);

                          document.querySelector("#nota-final").value = nota_final; 

                        }
                    </script>
                    
                    <!--<script src="{{ asset('assets/js/main.js') }}"></script>-->

                    <script src="{{ asset('assets/dist/medium-editor.js') }}"></script>



                    <script src="https://cdnjs.cloudflare.com/ajax/libs/rangy/1.3.0/rangy-core.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/rangy/1.3.0/rangy-classapplier.min.js"></script>

                    

                    <script>
                          rangy.init();
                          var F44336 = MediumEditor.extensions.button.extend({
                              name: 'F44336',
                              tagNames: ['mark'],
                              contentDefault: '<b>vermelho</b>',
                              contentFA: '<i class="fa fa-paint-brush"></i>',
                              aria: 'F44336',
                              action: 'F44336',

                              init: function () {
                                  MediumEditor.extensions.button.prototype.init.call(this);

                                  this.classApplier = rangy.createClassApplier('F44336', {
                                      elementTagName: 'mark',
                                      normalize: true,
                                     
                                  });
                              },

                              handleClick: function (event) {
                                  this.classApplier.toggleSelection();

                                  // Ensure the editor knows about an html change so watchers are notified
                                  //<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> ie: <textarea> elements depend on the editableInput event to stay synchronized
                                  this.base.checkContentChanged();
                              }
                          });

                          var botaoVerde = MediumEditor.extensions.button.extend({
                              name: 'botaoVerde',
                              tagNames: ['mark'],
                              contentDefault: '<b>verde</b>',
                              contentFA: '<i class="fa fa-paint-brush"></i>',
                              aria: 'botaoVerde',
                              action: 'botaoVerde',

                              init: function () {
                                  MediumEditor.extensions.button.prototype.init.call(this);

                                  this.classApplier = rangy.createClassApplier('botaoVerde', {
                                      elementTagName: 'mark',
                                      normalize: true,
                                     
                                  });
                              },

                              handleClick: function (event) {
                                  this.classApplier.toggleSelection();

                                  // Ensure the editor knows about an html change so watchers are notified
                                  //<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> ie: <textarea> elements depend on the editableInput event to stay synchronized
                                  this.base.checkContentChanged();
                              }
                          });

                          var botaoAzul = MediumEditor.extensions.button.extend({
                              name: 'botaoAzul',
                              tagNames: ['mark'],
                              contentDefault: '<b>azul</b>',
                              contentFA: '<i class="fa fa-paint-brush"></i>',
                              aria: 'botaoAzul',
                              action: 'botaoAzul',

                              init: function () {
                                  MediumEditor.extensions.button.prototype.init.call(this);

                                  this.classApplier = rangy.createClassApplier('botaoAzul', {
                                      elementTagName: 'mark',
                                      normalize: true,
                                     
                                  });
                              },

                              handleClick: function (event) {
                                  this.classApplier.toggleSelection();

                                  // Ensure the editor knows about an html change so watchers are notified
                                  //<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> ie: <textarea> elements depend on the editableInput event to stay synchronized
                                  this.base.checkContentChanged();
                              }
                          });

                          var botaoRoxo = MediumEditor.extensions.button.extend({
                              name: 'botaoRoxo',
                              tagNames: ['mark'],
                              contentDefault: '<b>roxo</b>',
                              contentFA: '<i class="fa fa-paint-brush"></i>',
                              aria: 'botaoRoxo',
                              action: 'botaoRoxo',

                              init: function () {
                                  MediumEditor.extensions.button.prototype.init.call(this);

                                  this.classApplier = rangy.createClassApplier('botaoRoxo', {
                                      elementTagName: 'mark',
                                      normalize: true,
                                     
                                  });
                              },

                              handleClick: function (event) {
                                  this.classApplier.toggleSelection();

                                  // Ensure the editor knows about an html change so watchers are notified
                                  //<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> ie: <textarea> elements depend on the editableInput event to stay synchronized
                                  this.base.checkContentChanged();
                              }
                          });

                          var HighlighterButton = MediumEditor.extensions.button.extend({
                              name: 'highlighter',
                              tagNames: ['mark'],
                              contentDefault: '<b>amarelo</b>',
                              contentFA: '<i class="fa fa-paint-brush"></i>',
                              aria: 'Highlight',
                              action: 'highlight',

                              init: function () {
                                  MediumEditor.extensions.button.prototype.init.call(this);

                                  this.classApplier = rangy.createClassApplier('highlight', {
                                      elementTagName: 'mark',
                                      normalize: true,
                                     
                                  });
                              },

                              handleClick: function (event) {
                                  this.classApplier.toggleSelection();

                                  // Ensure the editor knows about an html change so watchers are notified
                                  //<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> ie: <textarea> elements depend on the editableInput event to stay synchronized
                                  this.base.checkContentChanged();
                              }
                          });
                          var editor = new MediumEditor('.editable', {
                                  toolbar: {
                                      buttons: ['bold', 'anchor', 'botaoVerde','botaoAzul', 'highlighter', 'F44336', 'botaoRoxo']
                                  },
                                  extensions: {
                                      'highlighter': new HighlighterButton(),
                                      'botaoVerde': new botaoVerde(),
                                      'botaoAzul': new botaoAzul(),
                                      'F44336': new F44336(),
                                      'botaoRoxo': new botaoRoxo()
                                  }
                              });
                      </script>

                     <!--
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



                    <script type="text/javascript">
                        (function () {
                            var removeBtn = document.getElementById('remove');
                            var sandbox = document.getElementById('sandbox');
                            var colors = new ColorPicker(document.querySelector('.color-picker'));
                            var hltr = new TextHighlighter(sandbox);

                    

                            colors.onColorChange(function (color) {
                                hltr.setColor(color);
                                
                            });


                            removeBtn.addEventListener('click', function () {
                                hltr.removeHighlights();
                            });
                        })();
                    </script>

                    -->

                        

                </div>
                


        <input class="form-control btn btn-primary text-white mt-5" type="submit" value="Salvar">
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
        
        
