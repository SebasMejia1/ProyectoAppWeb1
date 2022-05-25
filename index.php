<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamesOnline</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="login-box">
        <img src="img/Retro_games_logo.png" alt="" class="avatar">
        <h1>Nuevo Partida</h1>
        <form method="post">
            <!--NickName -->
            <label for="NickName">Nombre Usuario</label>
            <input type="text" name="NickName" id="NickName" placeholder="Ingrese Nombre Usuario" required>
            <!--Email -->
            <label for="Email">Correo Electronico</label>
            <input type="text" name="Email" id="Email" placeholder="Ingrese Correo Electronico" required>
            <!--Age -->
            <label for="Age">Edad</label>
            <input type="number" name="Age" id="Age" placeholder="Ingrese su edad" required>
            <!-- Enviar -->
            <input type="submit" placeholder="Nueva Partida">
            <a href="leaderBoard.php">LeaderBoard</a>
        </form>
    </div>
    <?php
	include ("database.php");
	$juego= new Database();
		if(isset($_POST) && !empty($_POST)){
			$NickName = $juego->sanitize($_POST['NickName']);
            $Email = $juego->sanitize($_POST['Email']);
			$Age = $juego->sanitize($_POST['Age']);
			$res = $juego->create($NickName,$Email,$Age);
				if($res){
					$message= "Datos insertados con éxito";
					$class="alert alert-success";
				}else{
					$message="No se pudieron insertar los datos";
					$class="alert alert-danger";
				}
    ?>
	<div class="<?php echo $class?>">
	<?php echo $message;?>
	</div>
	<?php
        }?>
</body>
</html>