<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お気に入り登録</title>
    <style>
        fieldset{
            border: none;
        }
       a {
            text-decoration: none;
            color: inherit;
        }
        header {
            /* background-color: pink; */
            display: flex;
        }
        h3 {
            margin: auto 8px;
        }
        ul {
            /* background-color: blue; */
            display: flex;
            list-style: none;
            align-items: center;
        }
        li {
            margin: 0 16px;
        }
        h3 :hover, li :hover{
            opacity: 0.6;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <h3><a href="select.php">お気に入り登録</a></h3>
        <ul>
            <li><a href="login.php">ログイン</a></li>
            <li><a href="logout.php">ログアウト</a></li>
        </ul>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="insert.php">
        <div>
            <fieldset>
                <label>著者：<br><input type="text" name="author"></label><br><br>
                <label>タイトル：<br><textarea name="title" rows="3" cols="30"></textarea></label><br><br>
                <label>出版社：<br><input type="text" name="publisher"></label><br><br>
                <!-- <label>出版年:<br><input type="month" name="year"></label><br><br>
   -->
                <button type="save">登録</button>
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>
</html>
