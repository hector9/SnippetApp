
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Snippets</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Filters</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!-- action="<?= base_url() ?>index.php/Snippets/AddSnippet" method="post" -->
                      <form class="form-horizontal form-label-left" id="formulario">
                          
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Lenguaje </label>
                        <div class="col-md-3 col-sm-10 col-xs-12">
                            <select class="select2_group form-control" name="lenguaje">
                              
                            <?php
                                                    
                                foreach ($lenguajesCombo as $lenguaje)
                                {
                                    echo '<option value="'. $lenguaje['Id'] .'">'. $lenguaje['Nombre'] .'</option>';
                                }
                            ?>
                            </select>
                          <!--<input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">-->
                        </div>
                        
                        <!-- Div para generar un espacio entre los combos en pantallas SM's y que no afecte a pantallas MD's -->
                        <div class="col-md-3 col-sm-12"></div>
                        
                        <label class="control-label col-md-1 col-sm-2 col-xs-12">Aplicación </label>
                        <div class="col-md-3 col-sm-10 col-xs-12">
                            <select class="select2_group form-control" name="app">
                              
                            <?php
                                                    
                                foreach ($appsCombo as $app)
                                {
                                    echo '<option value="'. $app['Id'] .'">'. $app['Nombre'] .'</option>';
                                }
                            ?>
                            </select>
                          <!--<input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">-->
                        </div>
                      </div>
                          
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Título </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" class="form-control" name="titulo" placeholder="Introduce un título...">
                        </div>
                      </div>
                          
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Descripción </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" class="form-control" name="descripcion" placeholder="Introduce la descripción...">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Snippet <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <textarea class="form-control" name="textarea" rows="18" placeholder='Introduce tu Snippet aquí...' required="true"></textarea>
                        </div>
                      </div>                  

                      
                      <div class="ln_solid"></div>
<!--                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary">Cancel</button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                      </div>-->

                    </form>
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                          <button id="enviar" onclick="addSnippet();" class="btn btn-success">Submit</button>
                      </div>
                      
                      <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add</button>
                      
                      <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="gridSystemModalLabel">Info</h4>
                            </div>

                            <div class="modal-body">
                                <div  id="respuesta">
                                    
                                </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                      <!--        <a href="http://localhost/Dissertation/iCuentas/index.php/Cuenta/AddAccount/1/2/3">Añadir</a>-->
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
     <!-- Script para habilitar la tabulación en los textareas con tagName textarea -->
    <script>
        var textareas = document.getElementsByTagName('textarea');
        var count = textareas.length;
        for(var i=0;i<count;i++){
            textareas[i].onkeydown = function(e){
                if(e.keyCode==9 || e.which==9){
                    e.preventDefault();
                    var s = this.selectionStart;
                    this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
                    this.selectionEnd = s+1; 
                }
            }
        }
    </script>
    
    <!-- Script para la respuesta Ajax del formulario de adición. -->
    <script>
        function addSnippet(){
            $.ajax({
                data: $('#formulario').serialize(),
                url: "http://localhost/SnippetApp/index.php/Snippets/AddSnippet",
                type: "POST",
                success: function(result){
                //$("#respuesta").html(result);
                    if(result == "1")
                    {
                        $("#addModal").modal('show');
                        $("#respuesta").html('<p style="color: blue;">Se ha guardado correctamente.</p>');
                    }
                    else {
                        $("#addModal").modal('show');
                        $("#respuesta").html('<p style="color: red;">No se ha poddio guardar.</p>');
                    }
                    
                    
                }
            });
        }
    </script>