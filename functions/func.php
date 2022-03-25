<?php

session_start();

function debug($data) {
    echo '<pre>' . print_r($data, 1) . '</pre>>';
}

$rules = [
    'required' => ['email', 'password', 'name', 'code'],
    'email' => ['email'],
    'lengthMin' => [
        ['password', 6]
    ],
    'integer' => [
        ['code']
    ]
];

if(!empty($_POST)) {
    $v = new \Valitron\Validator($_POST);
    $v->rules($rules);
    if($v->validate()) {
        $_SESSION['success'] = 'Validation success';
    }else{
        $errors = '<ul>';
        foreach ($v->errors() as $error) {
            foreach ($error as $item) {
                $errors .= "<li>{$item}</li>";
            }
        }
        $errors .= '</ul>';

        $_SESSION['errors'] = $errors;
    }
    header("location: index.php#form-validation");
    die;
}

function get_products() {
    global $pdo;
    $res = $pdo->query("SELECT * FROM content");
    return $res->fetchAll();
}

function get_product($id) {
    $id = (int)$id;
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM content WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function add_to_cart($product) {
    if(isset($_SESSION['cart'][$product['id']])) {
        $_SESSION['cart'][$product['id']]['qty'] += 1;
    }else{
        $_SESSION['cart'][$product['id']] = [
            'title' => $product['title'],
            'price' => $product['price'],
            'image' => $product['image'],
            'qty' => 1
        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
}

function recover() {
    global $pdo;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : '';

    if(empty($email)) {
        $_SESSION['error'] = "Email is required";
        return false;
    }

    $res = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $res->execute([$email]);

    if(!$user = $res->fetch()) {
        $_SESSION['error'] = "Email not found";
        return false;
    }

    $expire = time() + TIME_ACTIVE_LINK;
    $hash = md5($expire . $email);
    $res = $pdo->prepare("INSERT INTO recovery (hash, expire, email) VALUES (?, ?, ?)");
    if($res->execute([$hash, $expire, $email])) {
        global $mail_settings_prod;
        $link = "http://test17022022/public/recovery.php?key={$hash}";
        $body = "This link <a href='{$link}'>{$link}</a> you can change password";

        send_mail($mail_settings_prod, [$email], "Recovery password", $body);
        $_SESSION['success'] = "Success to send letter recovery password";

        return true;
    }else{
        $_SESSION['error'] = "Error, try later";
        return false;
    }
}

function send_mail(array $mail_settings, array $to, $subject, $body) {
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try{
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = $mail_settings['host'];
        $mail->SMTPAuth = $mail_settings['auth'];
        $mail->Username = $mail_settings['username'];
        $mail->Password = $mail_settings['password'];
        $mail->SMTPSecure = $mail_settings['secure'];
        $mail->Port = $mail_settings['port'];
        $mail->CharSet = $mail_settings['charset'];

        $mail->setFrom($mail_settings['from'], $mail_settings['name']);

        foreach ($to as $email) {
            $mail->addAddress($email);
        }

        $mail->isHTML($mail_settings['is_html']);
        $mail->Subject = $subject;
        $mail->Body = $body;

        return $mail->send();
    } catch (\PHPMailer\PHPMailer\Exception $e) {

        return false;
    }
}

function check_access_new_pass() {
    $hash = $_GET['key'];
    return get_user_hash($hash);
}

function get_user_hash($hash) {
    global $pdo;
    $res = $pdo->prepare("SELECT * FROM recovery WHERE hash = ? LIMIT 1");
    $res->execute([$hash]);
    $row = $res->fetch();

    $now = time();

    if(!$row || ($row['expire'] - $now < 0)) {
        $_SESSION['error'] = "Link is old or you have incorrect link";
        $res = $pdo->prepare("DELETE FROM recovery WHERE expire < ?");
        $res->execute([$now]);
        return false;
    }

    return $row;
}

function generate_new_pass() {
    global $pdo;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : '';
    $hash = !empty($_POST['hash']) ? trim($_POST['hash']) : '';

    if(empty($pass)) {
        $_SESSION['error'] = "Password is required";
        return false;
    }

    if(!$row = get_user_hash($hash)) {
        return false;
    }

    $res = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
    $res->execute([$pass, $row['email']]);

    $res = $pdo->prepare("DELETE FROM recovery WHERE email = ?");
    $res->execute([$row['email']]);

    $_SESSION['success'] = "Password change success!";
        return true;
}


