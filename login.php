<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="image/png" href="../favicon/admin favicon.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Zaplanuj Urlop z Nami!</h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
      
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            
            <form id="login" action="logincheck.php" method="post" class="well">
                  <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" class="form-control" placeholder="Wpisz swój adres email" name="admin_email">
                  </div>
                  <div class="form-group">
                    <label>Hasło</label>
                    <input type="password" class="form-control" placeholder="Hasło" name="admin_password">
                  </div>
                  <button type="submit" class="btn btn-info btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer" style="width: 100%; left: 0; bottom: 0; position: fixed;">
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>