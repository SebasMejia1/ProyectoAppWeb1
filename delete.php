<?php 
if (isset($_GET['Id'])){
	include('database.php');
	$registro = new Database();
	$Id=intval($_GET['Id']);
	$res = $registro->delete($Id);
	if($res){
		header('location: leaderBoard.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>