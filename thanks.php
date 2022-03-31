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
        $nickname=$_POST['nickname'];
        $email=$_POST['email'];
        $anken=$_POST['anken'];

        $dsn = 'mysql:dbname=newform;host=localhost';
        $user = 'root';
        $password = '';

        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->query('SET NAMES utf8');

            $nickname = htmlspecialchars($nickname);
            $email = htmlspecialchars($email);
            $anken = htmlspecialchars($anken);

            print $nickname;
            print '様<br>';
            print '案件ありがとうございました。<br>';
            print $email;
            print 'にメールを送りましたのでご確認ください。';

            $mail_sub = 'アンケート受け付けました。';
            $mail_body = $nickname."様へ\nアンケートご協力ありがとうございました。";
            $mail_body = html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
            mb_language('Japanese');
            mb_internal_encoding("UTF-8");
            mb_send_mail($email, $mail_sub, $mail_body, $mail_head);

            $sql = 'INSERT INTO message (nickname, email, anken) VALUES("'.$nickname.'", "'.$email.'", "'.$anken.'")';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $dbh = null;

        }

        catch(Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
        }
    ?>
</body>
</html>