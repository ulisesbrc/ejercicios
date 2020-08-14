<?php header('Content-type: application/json; charset=utf-8');
include('../clases/db.php');
$bd=Db::getInstance(); 
$nombre = isset($_POST['nombre'])?htmlentities($_POST['nombre']):"";
$apellido = isset($_POST['apellido'])?htmlentities($_POST['apellido']):"";
$fecha = isset($_POST['fecha'])?htmlentities($_POST['fecha']):date('y-m-d');
$b=$bd->pbd->prepare("INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `fecha`) VALUES (NULL, :nombre, :apellido, :fecha)");
$b->bindParam(":nombre",$nombre,PDO::PARAM_STR);
$b->bindParam(":apellido",$apellido,PDO::PARAM_STR);
$b->bindParam(":fecha",$fecha);
if($b->execute()){
	$data['status'] = 'ok';
	echo json_encode($data);
}else{
	var_dump(http_response_code(500));
}

