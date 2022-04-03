<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login'])==false)
    {
        print 'ログインされていません。<br>';
        print '<a href="../stafflogin/staff_login.html">ログイン画面へ</a>';
        exit();
    }
    else
    {
        print $_SESSION['staff_name'];
        print 'さんログイン中<br>';
        print '<br>';
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formkanri</title>
</head>
<body>
    管理メニュー<br>
    <br><br>
    <a href="../kanri/ichiran.php">案件一覧</a><br><br><br>
    <a href="../kanri/kensaku.html">案件検索</a><br><br><br>
    <a href="../kanri/staff_list.php">スタッフ一覧</a><br><br><br>
    <a href="../kanri/staff_add.php">スタッフ追加</a><br><br><br>
    <a href="staff_logout.php">ログアウト</a><br>
    
</body>
</html>