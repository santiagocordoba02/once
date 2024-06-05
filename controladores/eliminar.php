<?php
// Paso 1: importar la librería
require "../Confi/conex.php";

// Paso 2: Verificar si se ha enviado la cantidad de cervezas esperada
if(isset($_POST["cervezas_comprar"])) {
    // Almacenar la cantidad de cervezas a eliminar
    $cervezas_comprar = $_POST["cervezas_comprar"];
    
    // Paso 3: Preparar la consulta SQL
    $sql_eliminar = "DELETE FROM `comprar` WHERE cervezas_comprar = :cervezas_comprar";
    $statement = $dbh->prepare($sql_eliminar);
    $statement->bindParam(':cervezas_comprar', $cervezas_comprar);
    
    // Paso 4: ejecutar la consulta preparada
    if($statement->execute()) {
        echo "Información eliminada correctamente";
    } else {
        echo "Error al eliminar la información: " . $statement->errorInfo()[2]; 
    }
} else {
    echo "Error: No se ha recibido la cantidad de cervezas a eliminar.";
}
?>
