<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignIn</title>
  <link rel="stylesheet" href="../css/style.css">

</head>
<body>
  <a href="login.php">ログイン画面へ</a>
  <form action="signin_act.php" method="post">
  <fieldset>
      <legend>新規ユーザー（入力画面）</legend>
      <div>
        YourName: <input type="text" name="u_name">
      </div>
      <div>
        PassWord: <input type="password" name="u_pw">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
</body>
</html>