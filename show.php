<?php
    session_start();
    if(!isset($_SESSION["login"])){
         $_SESSION["message"]["type"] = "danger";
         $_SESSION["message"]["text"] = "No has iniciado sessión";
         header('Location: index.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Mongo Show</title>
  <meta name="description" content=“Mongo Login“>
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="css/form.css" type="text/css">
</head>

<body>

<div class=“container”>

	<form autocomplete="off" class="applyFilter" action="/logout.php" accept-charset="UTF-8" method="post">
    		<div class="row">
	        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">

	<div style="text-align: center">
          <h2>Mostrando Usuario</h2>
        </div>

	<hr>
            
	    <div class="form-group">	
            	<dt>Nombre<dt>
                <dd><?php echo $_SESSION["name"] ?></dd>
            </div>

	    <div class="form-group">	
            	<dt>Email<dt>
                <dd><?php echo $_SESSION["email"] ?></dd>
            </div>

	    <div class="form-group">	
            	<dt>Edad<dt>
                <dd><?php echo $_SESSION["age"] ?></dd>
            </div>

	    <div class="form-group">	
            	<dt>Sexo<dt>
                <dd><?php echo $_SESSION["gender"] == "true" ? "Hombre":"Mujer" ?></dd>
            </div>
	    <div class="actions">
               <input type="submit" name="commit" value="Cerar Sesión" class="btn btn-primary" data-disable-with="Cerrar Sesión">
            </div>
	   </div>
	   </div>
	</form>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
