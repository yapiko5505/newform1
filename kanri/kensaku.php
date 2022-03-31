<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formkanri</title>
</head>
<body>
    <?php

        $code=$_POST['code'];

        $dsn = 'mysql:dbname=newform;host=localhost';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->query('SET NAMES utf8');

        $sql = 'SELECT * FROM message WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $code;
        $stmt->execute($data);

        while(1)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec==false)
            {
                break;
            }

            print $rec['code'];
            print $rec['nickname'];
            print $rec['email'];
            print $rec['anken'];
            print '<br>';
        }

        $dbh = null;

    ?>
    <br><a href="kensaku.html">検索メニューに戻る</a>
</body>
</html>