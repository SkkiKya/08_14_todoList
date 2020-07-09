<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <nav>
            <div>
                <a href="../todo/index.php">ログイン（ログインエラー）</a>
                <a href="signin_form.php">サインイン</a>
            </div>
        </nav>
    </header>

    <form action="login_act.php" method="post">
        <div>
            <fieldset>
                <legend>ログイン</legend>
                <label>NAME：<input type="text" name="lname"></label>
                <label>PASSWORD：<input type="password" name="lpw"></label>
                <input type="submit" value="ログイン">

            </fieldset>
        </div>
    </form>
</body>
</html>