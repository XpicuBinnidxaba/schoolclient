<?php
session_start();

////recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$url = 'http://localhost:8080/api/login';
$ch = curl_init($url);

$data = array(
    'email' => $usuario,
    'password' => $password
);

$payload = json_encode( $data );

// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);

// Close cURL resource
curl_close($ch);

$data = json_decode($result, TRUE);

if ($data['status'] === "SUCCESS") {
    $_SESSION["s_usuario"] = $data['data'];
} else {
    $_SESSION["s_usuario"] = null;
    $data=null;
}

echo json_encode($data);