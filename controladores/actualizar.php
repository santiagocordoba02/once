<?php
// Paso 1: importar la librería
require "../Confi/conex.php";

// Paso 2: Verificar si se han enviado todos los datos esperados
if(isset($_POST["cervezas_comprar"], $_POST["precio"])) {
    // Almacenar las variables
    $fecha_sys = date('Y-m-d H:i:s');
    $cervezas_comprar = $_POST["cervezas_comprar"];
    $precio = $_POST["precio"]; // Obtener el precio enviado desde el formulario
    
   
    $sql_update = "UPDATE comprar 
                   SET fecha_Sys = '$fecha_sys', precio = '$precio' 
                   WHERE id = :id";
    
    // Paso 4: Preparar y ejecutar la consulta
    $stmt = $dbh->prepare($sql_update);
    $stmt->bindParam(':id', $_POST['id']); 

    // Paso 5: Ejecutar la consulta y manejar los resultados
    if($stmt->execute()) {
        echo "Información actualizada correctamente";
    } else {
        echo "Error al actualizar la información: " . $stmt->errorInfo()[2]; 
    }
} else {
    echo "Error: No se han recibido todos los datos esperados.";
}
?>


