<?php
header("Content-Type: application/json");

// Maneja la solicitud GET
// Retorna un JSON con mensaje de conexión exitosa
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo json_encode(["mensaje" => "¡Conexión exitosa!"]);

// Maneja la solicitud POST
// Recibe datos en formato JSON y los devuelve junto con un mensaje de confirmación
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = json_decode(file_get_contents("php://input"), true);
    $respuesta = ["mensaje" => "Recibido correctamente", "datos" => $datos];
    echo json_encode($respuesta);
}

?>
