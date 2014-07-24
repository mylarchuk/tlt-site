<? 
include('../connect.php');
$time = time(); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title id='title'>Саппорт</title>
	<link href='../main.css?<? echo $time;?>' type='text/css' rel='stylesheet'>
</head> 
<body>
	<? include('../blocks/top.html'); ?>
	<? include('../blocks/left.html'); ?>
	<div id='center' style='text-align: center;'>
		<?
		$login = $_SESSION['login'];
		$select = mysql_query("SELECT * FROM admin WHERE login = '$login'");
		$row = mysql_fetch_array($select);
		if(!$_SESSION['login']){
		printf("
		<h2>Авторизация</h2>
		<form action='auth.php' method='post'>
		<p>Логин: <input type='text' name='login'></input></p>
		<p>Пароль: <input type='password' name='password'></input></p>
		<input type='submit' name='go' value='Вход'></input>
		</form>");
		}
		else {
		if($row['role'] == '3'){
		include('support-user.php');
		};
		if($row['role'] == '2'){
		include('support-moder.php');
		};
		};
		?>
	</div>
	<? include('../blocks/right.html'); ?>
	<? include('../blocks/bottom.html'); ?>
</body>
</html>