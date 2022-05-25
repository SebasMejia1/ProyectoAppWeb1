<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>leaderBoard</title>
<link rel="stylesheet" href="estilos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
    <?php 
        include ('database.php');
        $juego = new Database();
        $listado=$juego->read();
    ?> 
    <div class="container">
        <div class="table-wrapper">
            <center><H2>LeaderBoard</H2></center>
            <table>
                <thead>
                    <tr>
                        <th>NickName</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>
    <?php
        while ($row=mysqli_fetch_object($listado)){
        $Id=$row->Id;
        $NickName=$row->NickName;
        $Email=$row->Email;
        $Age=$row->Age;
    ?>   
    <tr>
        <td><?php echo $NickName;?></td>
        <td><?php echo $Email;?></td>
        <td><?php echo $Age;?></td>
        <td>
        <a href="update.php?Id=<?php echo $Id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
        <a href="delete.php?Id=<?php echo $Id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
        </td>
    </tr>
    <?php
    }
    ?> 
            </table>
        </div>
    </div> 
</body>
</html>