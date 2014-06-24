<?php

	$str = $_POST['str']; // ajaxで受け取る

	try{
		$dbh = new PDO('mysql:host=localhost;dbname=ajax_test;charset=utf8;','root','root');
		$stmt = $dbh -> query("SET NAMES utf8;");

		$stmt = $dbh -> query("INSERT INTO comment(text,name) VALUES('".$str."','hoge')");
	}catch(PDOException $e){
		// tryでエラーが発生した場合
		var_dump($e->getMessage());
		exit;
	}
?>