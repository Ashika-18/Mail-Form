<!-- confirm.php -->
<?php
header('X-FRAME-OPTIONS:DENY');
session_start();

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
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
    <title>確認フォーム</title>
</head>
<body>
    <h1>お問い合わせフォーム</h1>
    <form id="form" action="send.php" method="POST">
        <label for="name">氏名</label>
        <input type="text" name="name" id="name" class="cell" value="<?= $_POST['name'];?>">

        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email" class="cell" value="<?= $_POST['email'];?>">

        <label for="content">本文</label>
        <textarea name="content" id="content" cols="30" rows="5" class="cell" value="<?= $_POST['contact']?>"></textarea>

        <input id="btn" type="submit" name="btn_confirm" value="送信">
        <input type="submit" name="back" value="戻る">
    </form>
</body>
</html>