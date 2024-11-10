<?php
// api/auth.php

function authenticate() {
    $headers = apache_request_headers();
    if (isset($headers['Authorization'])) {
        $authToken = $headers['Authorization'];
        if ($authToken === 'Bearer ciisa') {
            return true;
        }
    }
    http_response_code(401);
    echo json_encode(["message" => "Unauthorized"]);
    exit();
}
?>
