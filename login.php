<?php
    session_start();
    if(isset($_SESSION['user'])){
    	//Si ya ha iniciado sesión
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>	
	<script type="text/javascript">
		function login(){
			var user = document.getElementById("txtUser").value;
			var pass = document.getElementById("txtPass").value;
			$.post("functions/init.php", {user: user, pass: pass}, function(result){
				if (result != 'error') {
					//Si inicio sesión
					console.log(result);
					window.location.href = "index.php";
				}else{
					alert("Usuario y/o contraseña incorrecta. Intente nuevamente.");
				}					
			});
		}
	</script>
</head>
<body style="background-color: #2c3e50">
	<div class="container">		
		<div class="row-fluid">			
			<div class="col-md-offset-3 col-md-4 col-centered">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="text-center">Team Zapdos</h2>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<div class="input-group col-sm-offset-2 col-sm-8">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
									</div>
									<input type="text" class="form-control" id="txtUser" placeholder="Nombre de usuario">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group col-sm-offset-2 col-sm-8">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
									</div>
									<input type="password" class="form-control" id="txtPass" placeholder="Contraseña">
								</div>
							</div>						
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
									<button type="submit" class="btn btn-success btn-block" onclick="login();">Entrar</button>
								</div>
							</div>				
						</form>	
					</div>
				</div>
			</div>
		</div>		
	</div>
</body>
</html>