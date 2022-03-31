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
        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $anken = $_POST['anken'];

        $nickname = htmlspecialchars($nickname);
        $email = htmlspecialchars($email);
        $anken = htmlspecialchars($anken);


        if($nickname=='')
        {
            print 'ニックネームが入力されていません。';
            print '<br>';
        }
        else 
        {
            print $nickname;
            print '様';
            print '<br>';
        }

        if($email=='')
        {
            print 'メールアドレスが入力されていません。';
            print '<br>';
        }
        else 
        {
            print 'メールアドレス:';
            print $email;
            print '<br>';
        }

        if($anken=='')
        {
            print '案件が入力されていません。';
            print '<br>';
        }
        else 
        {
            print '案件『';
            print $anken;
            print '』<br>';
        }

        if($nickname=='' || $email=='' || $anken=='')
        {
            print '<form>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
        }
        else 
        {
            print '<form method="post" action="thanks.php">';
            print '<input name="nickname" type="hidden" value="'.$nickname.'">';
            print '<input name="email" type="hidden" value="'.$email.'">';
            print '<input name="anken" type="hidden" value="'.$anken.'">';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="OK">';
            print '</form>';
        }
        
        
        
        

        
        
    ?>
    
</body>
</html>