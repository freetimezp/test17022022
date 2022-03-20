<?php
require_once '../functions/connect.php';

$msg = '';

if($_POST['send']) {
    if(!$_POST['email']) {
        $msg = 'Please enter email';
        echo $msg;
    }elseif(!$_POST['name']){
        $msg = 'Please enter name';
        echo $msg;
    }elseif(!$_POST['phone']){
        $msg = 'Please enter phone';
        echo $msg;
    }elseif(!$_POST['message']){
        $msg = 'Please enter message';
        echo $msg;
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

        $msg = 'Message send';
        echo $msg;
    }
}


?>