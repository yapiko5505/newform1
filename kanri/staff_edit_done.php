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
            $staff_name = $_POST['name'];
            $staff_pass = $_POST['pass'];

            $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
            $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

            $dsn = 'mysql:dbname=newform;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';

        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'UPDATE staff_new SET name = ?, password = ? WHERE code = ?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_name;
            $data[] = $staff_pass;
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

        修正しました。<br>
        <a href = "kanri.html">戻る</a>
    
    
</body>
</html>