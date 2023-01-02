<!-- send.php -->
<?php
header('X-FRAME-OPTIONS:DENY');
session_start();

var_dump($_POST);

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

$token = $_SESSION['csrfToken'];

if(!isset($_POST['token'])) {
    echo '不正なアクセスの可能性があります！';
    exit;
}

if ($token === $_POST['token']) {
    $name       = $_SESSION['name'];
    $email      = $_SESSION['email'];
    $content    = $_SESSION['content'];

    $to = 'ashibasama@yahoo.co.jp';

    $subject = $name . 'さんからの入力フォームでの送信です。';

    $content = '名前:' . $name . "\r\n\r\n" . 'メールアドレス:' . $email . "\r\n\r\n" . '内容:' . $content;

    $header = 'From:' . mb_encode_mimeheader($name). '<'.$email.'>';

    mb_language('ja');
    mb_internal_encoding('UTF-8');

    if (mb_send_mail($to, $subject, $content, $header)) {
        $_SESSION = array();

        session_destroy();

        $message = '送信しました！';
    } else {
        $message = '送信に失敗しました！';
    }
} else {
    $message = 'トークンが一致しません！';
}
?>  

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>送信フォーム</title>
</head>
<body>
    <h1><?= $message ?></h1>
    <a href="index.php">HOMEへ戻る</a>
</body>
</html>