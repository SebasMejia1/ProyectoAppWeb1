<?php
	if (isset($_GET['Id'])){
		$n_venta=intval($_GET['Id']);
	} else {
		header("location:LeaderBoard.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LeaderBoardUpdate</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Usuario</b></h2></div>
                    <div class="col-sm-4">
                        <a href="LeaderBoard.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$Usuarios= new Database();
				if(isset($_POST) && !empty($_POST)){
					$NickName = $Usuarios->sanitize($_POST['NickName']);
					$Email = $Usuarios->sanitize($_POST['Email']);
					$Age = $Usuarios->sanitize($_POST['Age']);
					$iduser=intval($_GET['Id']);
					$res = $Usuarios->update($NickName, $Email, $Age,$iduser);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_usuarios=$Usuarios->single_record($n_venta);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>NickName:</label>
					<input type="text" name="NickName" id="NickName" class='form-control' maxlength="100" required  value="<?php echo $datos_usuarios->NickName;?>">
					<input type="hidden" name="id_usuarios" id="id_usuarios" class='form-control' maxlength="100"   value="<?php echo $datos_usuarios->Id;?>">
				</div>
				<div class="col-md-6">
					<label>Email:</label>
					<input type="text" name="Email" id="Email" class='form-control' maxlength="100" required value="<?php echo $datos_usuarios->Email;?>">
				</div>
				<div class="col-md-12">
					<label>Age:</label>
					<textarea  name="Age" as="Age" class='form-control' maxlength="100" required><?php echo $datos_usuarios->Age;?></textarea>
				</div>								
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>