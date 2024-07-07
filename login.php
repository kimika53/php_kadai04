<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <style>
        div {
            padding: 10px 0;
            font-size: 16px;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
    <title>ログイン</title>
</head>

<body>

    <header>
        <nav>LOGIN</nav>
        <div>
            <a href="index.php">データ登録</a>
        </div>
    </header>
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <form name="form1" action="login_act.php" method="post">
        ID:<input type="text" name="lid" />
        PW:<input type="password" name="lpw" />
        <input type="submit" value="LOGIN" />
    </form>


</body>

</html>
