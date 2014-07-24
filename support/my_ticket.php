<? include('../connect.php'); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title id='title'>Мои тикеты</title>
	<link href='../main.css' type='text/css' rel='stylesheet'>
</head> 
<body>
	<? include('../blocks/top.html'); ?>
	<? include('../blocks/left.html'); ?>
	<div id='center' style='text-align: center;'>
<?
$login_proverka = $_SESSION['login'];
$select_proverka = mysql_query("SELECT * FROM ticket WHERE login_user = '$login_proverka'");
if(!$_SESSION['login']){
		printf("
		<h2>Саппорт</h2>
		<form action='auth.php' method='post'>
		<p>Логин: <input type='text' name='login'></input></p>
		<p>Пароль: <input type='password' name='password'></input></p>
		<input type='submit' name='go' value='Вход'></input>
		</form>");
		}
		else{
		printf("
<h2>Мои тикеты</h2>
		<a href='add_ticket.php'><div id='add_ticket' class='first'></div></a>
		<a href='index.php'><div id='back'></div></a>
		<a href='exit.php'><div id='exit'></div></a>
		<br><br><br><br>");
		if(!isset($_GET['id'])){
		$login = $_SESSION['login'];
		$select = mysql_query("SELECT * FROM ticket WHERE login_user = '$login'");
		while($row = mysql_fetch_array($select)){
		printf("
		<a href='my_ticket.php?id=%s'>
		<div class='ticket_block'>
		<font style='color: gold !important; font-weight: bold; font:18px SPR;''>%s</font>
		<br>", $row['id_ticket'], $row['zagolovok']);
		if($row['status'] == '1'){
		echo"<font style='color: green; font:16px SPR;'>Открыт</font>";
		};
		if($row['status'] == '0'){
		echo"<font style='color: gray; font:16px SPR;'>Закрыт</font>";
		};
		echo"</div></a>";
		};
		};
		while($row_proverka = mysql_fetch_array($select_proverka)){
		if($_GET['id'] == $row_proverka['id_ticket']){
		if(isset($_GET['id'])){
		$id_ticket = $_GET['id'];
		$select_id = mysql_query("SELECT * FROM ticket WHERE id_ticket = '$id_ticket'");
		$select_otvet = mysql_query("SELECT * FROM ticket_otvet WHERE id_ticket = '$id_ticket'");
		while($row_id = mysql_fetch_array($select_id)){
		printf("
		<div class='ticket_block' style='margin: 20 20 0;'>
		<h3>%s</h3>
		<font style='font:18px SPR;'>%s</font>
		<br>
		", $row_id['zagolovok'], $row_id['mess_ticket']);
		if($row_id['status'] == '1'){
		echo"<font style='color: green; font:16px SPR;'>Открыт</font>";
		};
		if($row_id['status'] == '0'){
		echo"<font style='color: gray; font:16px SPR;'>Закрыт</font>";
		};
		echo"</div>";
		echo"<div class='ticket_block' style='border-top: 0px !important; margin: 0 20;'>";
		while($row_otvet = mysql_fetch_array($select_otvet)){
		echo"<font style='font:18px SPR;'>";
		if($row_otvet['role'] == '3'){echo"Вы:&nbsp";};
		if($row_otvet['role'] == '2'){echo"Модератор:&nbsp";};
		if($row_otvet['role'] == '1'){echo"Администратор:&nbsp";};
		echo $row_otvet['mess_otvet'];
		echo"</font>";
		echo "<br><br>";
		};
		echo"</div>";
		if($row_id['status'] == '1'){
		$login = $_SESSION['login'];
		$select = mysql_query("SELECT * FROM admin WHERE login = '$login'");
		$row = mysql_fetch_array($select);
		printf("
		<div class='ticket_block' style='border-top: 0px !important; margin: 0 20;'>
		<form action='answer-user.php' method='post'>
		<input type='hidden' name='id_ticket' value='%s'></input>
		<input type='hidden' name='role' value='%s'></input>
		<textarea name='answer' required></textarea>
		<br>
		<input type='submit' name='go_answer' value='Ответить'></input>
		<br><br>
		</form>", $id_ticket, $row['role']);
		printf("
		<form action='ticket_go.php' method='post'>
		<input type='hidden' value='%s' name='id_ticket'></input>
		<input type='submit' name='go_close' value='Закрыть тикет'></input>
		</form>", $row_id['id_ticket']);
		};
		echo"<br>
		<a href='javascript:history.back()'>назад</a></div>";
		};
		};
		};
		};
		};
		?>
		</div>
	<? include('../blocks/right.html'); ?>
	<? include('../blocks/bottom.html'); ?>
</body>
</html>