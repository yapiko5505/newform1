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

            $staff_code = $_GET['staffcode'];

            $dsn = 'mysql:dbname=newform;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';

        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT code,name FROM staff_new WHERE code = ?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name = $rec['name'];

            $dbh = null;

        }
        catch(Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            print $e;
            exit();
        }

        ?>

        スタッフ削除<br><br>
        スタッフコード<br>
        <?php print $staff_code; ?><br><br>
        <form method = "post" action = "staff_delete_done.php">
            <input type = "hidden" name = "code" value = "<?php print $staff_code; ?>">
            <input type = "button" onclick="history.back()" value="戻る">
            <input type = "submit" value = "OK">
        </form>


    
    
</body>
</html>