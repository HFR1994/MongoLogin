<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content=“Mongo Login“>
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="css/form.css" type="text/css">
</head>

<body>

<div class=“container”>

<div class="row">
<div class="col-xs-offset-2 col-xs-8">
    
<form autocomplete="off" class="applyFilter" action="/login.php" accept-charset="UTF-8" method="post">
    <div class="row">
      <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">

	<div style="text-align: center">
          <h2>Login</h2>
        </div>

	<hr>

        <div style="text-align: center">
          <b>¿Sin cuenta? Haz clic <a href="register.php">aquí</a></b>
        </div>
        <hr>

	<?php
	    if(isset($_SESSION["message"])){
	       echo "<div class=\"alert alert-".$_SESSION["message"]["type"]." alert-dismissible\" role=\"alert\">
		   <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
         	   ".$_SESSION["message"]["text"]."</div>";
	       unset($_SESSION["message"]);
	    }
        ?>

        <div class="form-group">
              <label for="session_email">Email<em class="error_message">*</em></label>
          <input class="form-control" placeholder="Email" autocomplete="off" type="email" name="session[email]" id="session_email">
        </div>

        <div class="form-group">
              <label for="session_password">Password<em class="error_message">*</em></label>
          <input class="form-control" placeholder="Password" autocomplete="off" type="password" name="session[password]" id="session_password">
        </div>

        <div class="form-group">
              <label style="float: left; margin-right: 10px;" for="session_remember">Recuerdame: </label>
          <input class="form-control" style="width:initial; display: contents;" type="checkbox" checked="checked" name="remember" id="session_remember">
        </div>

        <div class="actions">
          <input type="submit" name="commit" value="Iniciar Sesión" class="btn btn-primary" data-disable-with="Iniciar Sesión">
        </div>
      </div>
    </div>
</form>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
