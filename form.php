<?php
header('X-FRAME-OPTIONS:DENY');
session_start();
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
$pageFlg = 0;

require_once('validation.php');

$errors = validation($_POST);

if ( !empty($_POST['btn_confirm']) && empty($errors)) {
    $pageFlg = 1;
} elseif ( !empty($_POST['btn_submit'])) {
    $pageFlg = 2;
}

?>

<!-- form.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mail-form</title>
</head>
<body>
    <!-- 入力フォーム -->
    <?php if ($pageFlg === 0) : ?>

        <?php
        //validation
        if ( !empty($errors) && !empty($_POST['btn_confirm']) ) {
            echo "<ul>";

            foreach($errors as $error) {
                echo  '<li>' . $error . '</li>';
            }
           echo "</ul>";
        }   
        ?>

        <?php
        if ( !isset( $_SESSION['csrfToken'])) {
            $_SESSION['csrfToken'] = bin2hex(random_bytes(32));
        }
    
        $token = $_SESSION['csrfToken'];
        ?>

    <form action="form.php" method="POST">
        <input type="hidden" name="csrf" value="<?= $token; ?>">

        <input type="checkbox" name="sample[]" value="aa">aa
        <input type="checkbox" name="sample[]" value="bb">bb
        <input type="checkbox" name="sample[]" value="cc">cc<br>

        <input type="text" name="name" value="<?php if( !empty($_POST['name']) ) {echo h($_POST['name']); } ?>" placeholder="お名前"><br>
        <input type="email" name="email" value=" <?php if ( !empty($_POST['email'])) {echo h($_POST['email']); }?>" placeholder="メールアドレス"><br>

        <input type="submit" name="btn_confirm" value="確認">
    </form>

    <!-- 確認フォーム -->  
    <?php elseif ($pageFlg === 1) : ?>
        <?php if($_POST['csrf'] === $_SESSION['csrfToken']) : ?>

    <form action="form.pnp" method="post">
        <input type="hidden" name="csrf" value="<?= $_POST['csrf'] ?>">
        <input type="hidden" name="name" value="<?= h($_POST['name']); ?>">
        <input type="hidden" name="email" value="<?= h($_POST['email']); ?>">
        name <?= h($_POST['name']); ?>
        email <?= h($_POST['email']); ?>

        <input type="submit" name="back" value="戻る">
        <input type="submit" name="btn_submit" value="送信">
    </form>
    <?php else : ?>
        <p>session error!!</p>
    <?php endif; ?>
    <!-- 送信フォーム -->
    <?php if ($pageFlg === 2)?>
        送信完了！
    <?php endif; ?>
</body>
</html>