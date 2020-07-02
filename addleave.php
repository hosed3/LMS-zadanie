<?php
session_start();
if(!isset($_SESSION["name"])){
	header("Location: login.php");
	exit;
}
include 'connection.php';

if(isset($_POST['s_date']) && $_POST['e_date']!=NULL)
{
	$stmt = $conn->prepare("INSERT INTO leaves (status, employee_id, start_date, end_date) VALUES(1,?,?,?)");
	$stmt->bind_param("iss",$e_id,$sd,$ed);
	$e_id = $_SESSION['employee_id'];
	$sd = $_POST['s_date'];
	$ed = $_POST['e_date'];
	$stmt->execute();
	header("location: index.php");
	exit();
}


if(isset($_GET['rleave_id']))
{
	$sql = $conn->prepare("UPDATE leaves SET status=2 WHERE id=?");
	$sql->bind_param("i",$uid);
	$uid = $_GET['rleave_id'];
	$sql->execute();
	header("location: index.php");
	exit();
}
if(isset($_GET['aleave_id']))
{
	$sql = $conn->prepare("UPDATE leaves SET status=3 WHERE id=?");
	$sql->bind_param("i",$uid);
	$uid = $_GET['aleave_id'];
	$sql->execute();
	header("location: index.php");
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="image/png" href="../favicon/admin favicon.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Urlop!</title>
    <link rel="shortcut icon" type="image/png" href="../favicon/favicon.png"/>
      
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
 
    <script src="js/ckeditor.js" type="text/javascript"></script>
    <script src="js/table/table.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
        setSidebarHeight();
        });
    </script>

  
    <script src="bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/dropdown.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>


    <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    




  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        
        <?php 
	        if (isset($_GET['action']) && $_GET['action'] == "logout") {
	            session_destroy();
				header("Location: index.php");
	        }
	     ?>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="">Dawid Chojecki</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Witaj!, <?php echo $_SESSION['name']?></a></li>
            <li><a href="?action=logout">Wyloguj</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Zaplanuj swój urlop z nami! </h1>
      </div>
    </header>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Prośby o urlop twoich pracowników(Karta Administratora)
              </a>
              <a href="addleave.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Złóż Wniosek<span class="badge"></span></a>
              <a href="myleave.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Oczekujące wnioski <span class="badge"></span></a>
            </div>

          </div>
		  
		  <div class="col-md-9">
    <div class="panel panel-default">
      <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Aplikuj o urlop</h3>
      </div>
      <div class="panel-body">
        <form action="addleave.php" method="post">
		
		<div class="form-group">
            <label>Początek:</label>
            <input type="date" name="s_date" class="form-control"  value="">
          </div>
          <div class="form-group">
            <label>Koniec:</label>
            <input type="date" name="e_date" class="form-control" value="">
          </div>
          <input type="submit" class="btn btn-danger" value="Apply">
        </form>
        
      </div>
      </div>
  </div>
		  
          </div>
        </div>
      </div>
    </section>
    <footer id="footer" style="width: 100%; left: 0; bottom: 0; position: fixed;">
    </footer>

    <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>