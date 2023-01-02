<!-- form.php -->
<?php
header('X-FRAME-OPTIONS:DENY');
session_start();

require_once('vali.php');


function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

if( !isset($_SESSION['csrfToken'])) {
    $_SESSION['csrfToken'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['csrfToken'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>問い合わせフォーム</title>
</head>
<body>
    <h1>お問い合わせフォーム</h1>
    <form id="form" action="confirm.php" method="POST">

        <input type="hidden" name="token" value="<?= $token; ?>">

        <label for="name">氏名</label>
        <input type="text" name="name" id="name" class="cell" value="" >

        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email" class="cell" value="" >

        <label for="content">本文</label>
        <textarea name="content" id="content" cols="30" rows="5" class="cell" ></textarea>

        <input id="btn" type="submit" name="btn_confirm" value="確認">
    </form>
    <?php 
        $errors = validation($_POST);
        //validation処理
        if ( !empty($errors) && !empty($_POST['btn_confirm'])) {
        echo "<ul";
        foreach($errors as $error) {
            echo '<li>' . $error . '</li>';
            }
        echo "</ul>";
        }
    ?>
</body>
</html>