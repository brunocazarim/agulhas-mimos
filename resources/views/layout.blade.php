<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">
  <title>Agulhas e Mimos</title>
  <!-- Bootstrap core CSS and Font Awesome -->
  <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- Custom styles for this template -->
  <link href="../../css/carousel.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->

<body>
  <div class="navbar-wrapper">
    <div class="container">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
              aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" href="/">
              Agulhas e Mimos
              <!-- img src="/" alt="Agulhas e Mimos" -->
            </a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="/">Início</a></li>
              <li><a href="#">Quem Somos</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produtos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Cozinha</a></li>
                  <li><a href="#">Viagem</a></li>
                  <li><a href="#">Dia a Dia</a></li>
                  <li><a href="#">Trabalho</a></li>
                  <li><a href="#">Organizadores</a></li>
                  <li><a href="#">Infantil</a></li>
                </ul>
              </li>
              <li><a href="#about">Comprinhas</a></li>
              <li><a href="#about">Contato</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administração<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{action('ProductsController@listAllProducts')}}">Cadastro Produtos</a></li>
                  <li><a href="{{action('ProductsController@listAllProductGroups')}}">Grupos de Produtos</a></li>
                  <li><a href="#">Vendas</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="login-navbar">
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-o fa-lg" aria-hidden="true"></i>    Entrar</a>
                <ul id="login-dp" class="dropdown-menu">
                  <li>
                    <div class="row">
                      <div class="col-md-12">
                        <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                          <div class="form-group">
                            <input type="email" class="form-control" id="email-addr" placeholder="Email" required>
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" id="pass" placeholder="Senha" required>
                            <div class="help-block text-right"><a href="#">Esqueceu a senha?</a></div>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-login btn-block">Entrar</button>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Mantenha me conectado(a)
                            </label>
                          </div>
                        </form>
                      </div>
                      <div class="bottom text-center">
                        Novo(a)? <a href="#"><b>Junte-se a nós!</b></a>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="content">
    @yield('content')
  </div>
  <!-- FOOTER -->
  <footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
  </div>
  <!-- /.container -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>