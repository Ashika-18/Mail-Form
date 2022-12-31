<!-- send.php -->
<?php
header('X-FRAME-OPTIONS:DENY');
session_start();

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

if($_POST['csrf'] === $token) :
endif;
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
    <h1>お問い合わせフォーム</h1>
    
</body>
</html>