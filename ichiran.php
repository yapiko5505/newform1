<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <?php
        $dsn = 'mysql:dbname=newform;host=localhost';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->query('SET NAMES utf8');

        $sql = 'SELECT * FROM message WHERE 1';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

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

<br><a href="kanri.html">管理メニューに戻る</a>
</body>
</html>