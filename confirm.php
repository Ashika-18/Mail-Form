<!-- confirm.php -->
<?php
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
    <title>確認フォーム</title>
</head>
<body>
    <form action="send.php" method="POST">

        <input type="checkbox" name="sample[]" value="AA">AA
        <input type="checkbox" name="sample[]" value="BB">BB
        <input type="checkbox" name="sample[]" value="CC">CC<br>

        <input type="hidden" id="name" value="<?= $_POST['name']; ?>"><br>
        <input type="hidden" id="email" value="<?= $_POST['email']; ?>"><br>
        <textarea type="hidden" name="content" id="content" value="<?= $_POST['content']; ?>"></textarea>

        <!---->
        <input type="text" id="name" value="<?php if( !empty($_POST['name']) ) { echo $_POST['name']; } ?>" required><br>

   
        <input type="email" id="email" value="<?php if( !empty($_POST['email']) ) { echo $_POST['email']; } ?>" required><br>

        <textarea name="content" id="content" value="<?php if( !empty($_POST['content']) ) { echo $_POST['content']; } ?>"></textarea>

        <button type="submit" value="送信">送信</button>
        <button type="back" value="戻る">戻る</button>
    </form>
</body>
</html>