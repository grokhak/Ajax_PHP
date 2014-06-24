<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<link href="css/html5reset-1.6.1.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<![endif]-->
</head>
<body>

<div id="form_wrap">
  <form action="insert.php" method="POST" id="post">
    <p>文字を入力 : <input type="text" name="str" required placeholder="適当な文字列" maxlength="20"><input type="submit" value="送信"></p>
  </form>
</div>

<div id="container">
<?php

$dsn = 'mysql:dbname=uriage;host=localhost';
$user = 'testuser';
$password = 'testuser';

try{
    $dbh = new PDO('mysql:host=localhost;dbname=ajax_test;charset=utf8;','root','root');
	$dbh -> query("SET NAMES utf8;");

    if ($dbh == null){
        print('接続に失敗しました。<br>');
    }else{
        print('接続に成功しました。<br>');
    }


    $sql = 'SELECT text, name FROM comment ORDER BY id DESC LIMIT 5';
    //$stmt = $dbh->query($sql);
    //$result = $stmt->fetch(PDO::FETCH_ASSOC);
    //$result = preserve_keys($result);
    
    /*
 while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        print($result['text']);
        print($result['name'].'<br>');
    }
*/
    
    foreach ($dbh -> query($sql) as $row) {
        print($row['text']);
        print($row['name'].'<br>');
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.11.1.min.js"><\/script>')</script>
<script src="js/ajax.js" type="text/javascript"></script>
</body>
</html>