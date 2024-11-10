<?php
header("Content-Type: application/json");

// obtiene el token de autorizacion: 
$headers = apache_request_headers();
$authHeader = isset($headers["Authorization"]) ? $headers["Authorization"] : "";

// Este IF verifica la autenticación:
// Si el token no coincide con "Bearer ciisa", devuelve error 401 No autorizado
if ($authHeader !== "Bearer ciisa") {
    http_response_code(401);
    echo json_encode(["mensaje" => "No autorizado. Token incorrecto."]);
    exit();
}

// Este IF maneja las diferentes peticiones HTTP:
// - Para peticiones GET: Devuelve un mensaje de conexión exitosa
// - Para peticiones POST: Recibe datos JSON, los procesa y devuelve confirmación
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo json_encode(["mensaje" => "¡Conexión exitosa!"]);
    
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = json_decode(file_get_contents("php://input"), true);
    $respuesta = ["mensaje" => "Recibido correctamente", "datos" => $datos];
    echo json_encode($respuesta);
}
?>
