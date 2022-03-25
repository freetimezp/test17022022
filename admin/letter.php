<?php

session_start();

require_once '../functions/connect.php';

if($_POST['send']) {
    if(!$_POST['email']) {
        $_SESSION['error'] = 'Please enter email';
        header("location: ../index.php#form-send-letter");
        die;
    }elseif(!$_POST['name']){
        $_SESSION['error'] = 'Please enter name';
        header("location: ../index.php#form-send-letter");
        die;
    }elseif(!$_POST['phone']){
        $_SESSION['error'] = 'Please enter phone';
        header("location: ../index.php#form-send-letter");
        die;
    }elseif(!$_POST['message']){
        $_SESSION['errors'] = 'Please enter message';
        header("location: ../index.php#form-send-letter");
        die;
    }else{
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];


        $to = 'kraftukrnet@ukr.net';
        $subject = 'the subject';
        $headers = "From: $email . $name . $phone" . "\r\n" .
            'Reply-To: kraftukrnet@ukr.net' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        $_SESSION['sendok'] = 'Message send';
        header("location: ../index.php#form-send-letter");
        die;
    }
}

?>
