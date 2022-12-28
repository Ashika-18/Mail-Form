<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録フォーム</title>
</head>
<body>
    <form action="form.php" method="post">

        <input type="checkbox" >

        <label for="name">名前</label>
        <input type="text" id="name" value="" required>

        <label for="email">メールアドレス</label>
        <input type="email" id="email" value="" required>

        <label for="title">件名</label>
        <input type="text" id="title" value="" required>

        <label for="content">お問い合わせ内容</label>
        <textarea name="content" id="content"></textarea>

        <button type="submit" value="送信">送信</button>
        <button type="back" value="戻る">戻る</button>
    </form>
</body>
</html>