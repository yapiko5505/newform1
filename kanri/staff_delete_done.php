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

            $staff_code = $_POST['code'];

            $dsn = 'mysql:dbname=newform;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';

        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'DELETE FROM staff_new WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_code;
            $stmt->execute($data);

            $dbh = null;

        }
        catch(Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            print $e;
            exit();
        }

        ?>

        削除しました。<br>
        <a href = "kanri.html">戻る</a>
    
    
</body>
</html>