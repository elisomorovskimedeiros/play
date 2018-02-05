
<html>
<head>
<title>Cadastro Play Diversão</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap -->
<link href="play/gui/css/bootstrap.min.css" rel="stylesheet">
<link href="play/gui/css/style.css" rel="stylesheet">
<link href="play/gui/css/jumbotron.css" rel="stylesheet">

</head>
<body>

  <nav class="navbar navbar-static-top navbar-dark bg-inverse">
      <a class="navbar-brand" href="#">Cadastro Play Diversão</a>
      
    </nav>


 <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" >
      <div class="container">
      <img src="https://static.wixstatic.com/media/82ce3a_39d62cf45e3647b9b97edd61586e1ef1~mv2_d_7817_1977_s_2.jpg/v1/fill/w_980,h_254,al_c,q_80,usm_0.66_1.00_0.01/82ce3a_39d62cf45e3647b9b97edd61586e1ef1~mv2_d_7817_1977_s_2.webp" class=img-responsive>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <!--
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
      -->
      
    <h2>Dados para Cadastro</h2>
        
      <div class ="row">
        <div class="col-md-5 table-responsive">
          <fieldset>
            
            <form action="play/interface/cadastro.php" method="POST">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td><label for="nome">Nome:</label></th>
                    <td><input type="text" name="nome" placeholder="Digite seu nome" autofocus required></th>
                  </tr>             
                  <tr>
                    <td><label for="label_dataNasc">Data de Nascimento:</label></td>
                    <td><input type="text" name="dataNasc" placeholder="dd/mm/aaaa" autofocus required></td>
                  </tr>
                  <tr>
                    <td><label for="label_cpf">CPF:</label></td>
                    <td><input type="text" name="cpf" placeholder="Insira seu CPF" autofocus required></td>
                  </tr>
                  <tr>
                    <td><label for="label_email">E-mail:</label></td>
                    <td><input type="text" name="email" placeholder="Insira seu email" autofocus required></td>
                  </tr>
                  <tr>
                    <td><label for="label_telefone">Telefone:</label></td>
                    <td><input type="text" name="telefone" placeholder="Seu número com DDD" autofocus required></td>
                  </tr>
                  <tr>
                    <td><label for="query">Como nos Conheceu:</label></td>
                    <td><textarea name="sugestao" rows="5" cols="20" placeholder="Digite aqui sua sugestão"></textarea> </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </fieldset>
        </div>
        <div class="col-md-5 table-responsive">
          <fieldset> 
            <form action="play/interface/cadastro.php" method="POST"> 
              <table class="table table-hover">               
                <tbody>                
                  <tr>
                   <td><label for="label_er">Endereço Residencial:</label></td>
                   <td><input type="text" name="er" autofocus required></td>
                  </tr>
                  <tr>
                   <td><label for="label_ee">Endereço do Evento:</label></td>
                   <td><input type="text" name="ee" autofocus required></td>
                  </tr>
                  <tr>
                   <td><label for="label_de">Data do Evento:</label></td>
                   <td><input type="text" name="de" placeholder="dd/mm/aaaa" autofocus required></td>
                  </tr>
                  <tr>
                   <td><label for="label_hv">Hora do Evento:</label></td>
                   <td><input type="number" name="he" min="0" max="150">
                       <label for="h">h</label>
                       <input type="number" name="me" min="0" max="150">
                       <label for="m">min</label></td>
                  </tr>
                  <tr>
                   <td><label for="label_na">Nome do Aniversariante:</label></td>
                   <td><input type="text" name="na" placeholder="Nome do aniversariante" autofocus required></td>
                  </tr>
                </tbody>
              </table>
            </form>
          </fieldset>
        </div>  
      </div>
      
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
 


<script src="play/gui/js/jquery.js"></script>
<script src="play/gui/js/bootstrap.min.js"></script>

</body>
</html>