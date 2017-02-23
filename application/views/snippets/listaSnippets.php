
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
                      <input type="text" id="buscador" onKeyUp="searchSnippets();" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    <div id="respuestaBuscador">
                        
                    </div>
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
                      <?php
                        foreach($snippets as $snippet)
                        {
                            echo '<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Snippet Título <small>Lenguaje</small></h2>
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


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content'. $snippet['Id'] .'1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Code</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content'. $snippet['Id'] .'2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Description</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content'. $snippet['Id'] .'1" aria-labelledby="home-tab">
                          <pre id="snippetText" class="prettyprint linenums:4">
      <code class="language-javascript">';
                            echo $snippet['Valor'];
                            echo '</code>
  </pre>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content'. $snippet['Id'] .'2" aria-labelledby="profile-tab">
                          <p>'. $snippet['Descripcion'] .'</p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>';
                            
                        }
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- Script para la respuesta Ajax del formulario de adición. -->
    <script>
        function searchSnippets(){
            
            var snippet = document.getElementById('buscador').value;
            
            $.ajax({
                data: {
                        //snippet: snippet
                    },
                url: "http://localhost/SnippetApp/index.php/Snippets/GetSnippets/"+ snippet,
                type: "POST",
                success: function(result){
                    //$("#respuesta").html(result);
                    console.log(result);
//                    if(result == "1")
//                    {
//                        //$("#addModal").modal('show');
                        $("#respuestaBuscador").html(result);
//                    }
//                    else {
//                        //$("#addModal").modal('show');
//                        $("#respuestaBuscador").html('<p style="color: red;">No se ha poddio guardar.</p>');
//                    }
                }
            });
        }
    </script>