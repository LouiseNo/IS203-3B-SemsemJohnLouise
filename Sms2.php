<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'twilio-php-main\src\Twilio\autoload.php';

    $sid = "AC18e1cb7ed1f811faa3bdd7fed9bbce2d"; // Your Account SID
    $token = "b2e26eb6d389b7cf6ef587189dac0410"; // Your Auth Token
    $client = new Twilio\Rest\Client($sid, $token);

    $to = $_POST['to'];
    $message = $_POST['message'];

    try {
        $client->messages->create(
            $to, // Recipient's phone number
            [
                'from' => '+12246018233', // Twilio phone number
                'body' => $message
            ]
        );
        echo json_encode(["status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
}
?>