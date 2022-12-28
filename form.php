<?php
$pageFlg = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mail-form</title>
</head>
<body>
    <?php if ($pageFlg === 0) : ?>
    <form action="form.php" method="post">
        <input type="checkbox" name="sample[]" value="aa">aa
        <input type="checkbox" name="sample[]" value="bb">bb
        <input type="checkbox" name="sample[]" value="cc">cc<br>

        <input type="text" name="name" value="" placeholder="お名前"><br>
        <input type="email" name="email" value="" placeholder="メールアドレス"><br>

        <input type="submit" value="確認">
    </form>

    <?php elseif ($pageFlg === 1) : ?>
    <form action="form.pnp" method="post">
        <input type="hidden" name="name" value="<?= $_POST['name']; ?>">
        <input type="hidden" name="email" value="<?= $_POST['email']; ?>">
        name <?= $_POST['name']; ?>
        email <?= $_POST['email']; ?>
        <input type="submit" value="送信">
    </form>

    <?php if ($pageFlg === 2)?>
    <form action="form.php">

    </form>
</body>
</html>