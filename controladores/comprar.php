<?php
// Paso 1: importar la librería
require "../Confi/conex.php";

// Paso 2: Verificar si se han enviado todos los datos esperados
if(isset($_POST["cervezas_comprar"], $_POST["precio"])) {
    // Almacenar las variables
    $fecha_sys = date('Y-m-d H:i:s');
    $cervezas_comprar = $_POST["cervezas_comprar"];
    $precio = $_POST["precio"]; // Obtener el precio enviado desde el formulario
    
    // Paso 3: armar el SQL en una variable, asegurando que los valores estén correctamente escapados y rodeados de comillas si son de tipo string
    $sql_insertar = "INSERT INTO comprar (fecha_Sys, precio, cervezas_comprar)
                     VALUES ('$fecha_sys', '$precio', '$cervezas_comprar')";
    
    // Paso 4: enviar a la BD
    if($dbh->query($sql_insertar)) {
        echo "Información registrada correctamente";
    } else {
        echo "Error al registrar la información: " . $dbh->errorInfo()[2]; 
    }
} else {
    echo "Error: No se han recibido todos los datos esperados.";
}
?>
