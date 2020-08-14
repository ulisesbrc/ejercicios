<?php header('Content-type: application/json; charset=utf-8');
include('../clases/db.php');
/*Creamos la instancia del objeto. Ya estamos conectados*/
$bd=Db::getInstance(); 
/*Creamos la query */
$sql='SELECT * from usuarios';
$stmt=$bd->pbd->prepare($sql);
if($stmt->execute()) {
	/*Realizamos un bucle para obtener los resultados*/
	while($result = $stmt->fetch(PDO::FETCH_OBJ)) {
		$array_json[] = $result;
	}
	if(count($array_json)){
		$json = json_encode($array_json);
		echo $json;
	}
} else {
	var_dump(http_response_code(500));
}