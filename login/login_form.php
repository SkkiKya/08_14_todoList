<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>ユーザーログイン画面です</h1>
    <header>
        <nav>
            <div>
                <a href="../kanri_login/login.php">管理者ログイン画面へ</a>
                <a href="signin.php">サインインへ</a>
            </div>
        </nav>
    </header>

    <form action="login.php" method="post">
        <div>
            <fieldset>
                <legend>ログイン</legend>
                <label>E-mail：<input type="email" name="email"></label>
                <label>PASSWORD：<input type="password" name="lpw"></label>
                <input type="submit" value="ログイン" name="submit">
            </fieldset>
        </div>
    </form>
</body>
</html>