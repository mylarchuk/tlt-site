<? include('../connect.php'); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title id='title'>Открытые тикеты</title>
	<link href='../main.css' type='text/css' rel='stylesheet'>
</head> 
<body>
	<? include('../blocks/top.html'); ?>
	<? include('../blocks/left.html'); ?>
	<div id='center' style='text-align: center;'>
<?
$login = $_SESSION['login'];
$select = mysql_query("SELECT * FROM admin WHERE login = '$login'");
$row = mysql_fetch_array($select);
if($row['role'] == '2'){
printf("
<h2>Открытые тикеты</h2>
		<a href='index.php'>Назад в саппорт</a>
		<a href='exit.php'>Выход</a>
		<br>
		<a href='open_ticket.php?theme=1'>Технический вопрос</a>&nbsp|&nbsp
		<a href='open_ticket.php?theme=2'>Пополнение</a>&nbsp|&nbsp
		<a href='open_ticket.php?theme=3'>Блокировка аккаунта</a><br>
		<a href='open_ticket.php?theme=4'>Разблокировка аккаунта</a>&nbsp|&nbsp
		<a href='open_ticket.php?theme=5'>Восстановление персонажа</a>&nbsp|&nbsp
		<a href='open_ticket.php?theme=6'>Услуги</a><br>
		<a href='open_ticket.php?theme=7'>Предложения</a>&nbsp|&nbsp
		<a href='open_ticket.php?theme=8'>Нарушения</a>&nbsp|&nbsp
		<a href='open_ticket.php?theme=9'>Другое</a><br>
		<a href='open_ticket.php?all='>Все тикеты</a>
		<br><br><br>");
		if(isset($_GET['all'])){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if($_GET['theme'] == '1'){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1' && theme ='1'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if($_GET['theme'] == '2'){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1' && theme ='2'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if($_GET['theme'] == '3'){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1' && theme ='3'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if($_GET['theme'] == '4'){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1' && theme ='4'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if($_GET['theme'] == '5'){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1' && theme ='5'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if($_GET['theme'] == '6'){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1' && theme ='6'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if($_GET['theme'] == '7'){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1' && theme ='7'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if($_GET['theme'] == '8'){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1' && theme ='8'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if($_GET['theme'] == '9'){
		$select_all = mysql_query("SELECT * FROM ticket WHERE status = '1' && theme ='9'");
		while($row_all = mysql_fetch_array($select_all)){
		printf("
		<a href='open_ticket.php?id=%s'>%s</a>
		<br><br>
		", $row_all['id_ticket'], $row_all['zagolovok']);
		};
		};
		if(isset($_GET['id'])){
		$id_ticket = $_GET['id'];
		$select_id = mysql_query("SELECT * FROM ticket WHERE id_ticket = '$id_ticket'");
		$select_otvet = mysql_query("SELECT * FROM ticket_otvet WHERE id_ticket = '$id_ticket'");
		while($row_id = mysql_fetch_array($select_id)){
		printf("
		%s
		<br><br>
		%s
		<br><br>
		", $row_id['zagolovok'], $row_id['mess_ticket']);
		};
		while($row_otvet = mysql_fetch_array($select_otvet)){
		echo $row_otvet['mess_otvet'];
		echo "<br><br>";
		};
		$login = $_SESSION['login'];
		$select = mysql_query("SELECT * FROM admin WHERE login = '$login'");
		$row = mysql_fetch_array($select);
		printf("
		<form action='answer.php' method='post'>
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
		<input type='submit' name='go_close_moder' value='Закрыть тикет'></input>
		</form>", $id_ticket);
		echo "<br><a href='open_ticket.php'>Назад</a>";
		};
		}
		else{
		echo "<script type='text/javascript'>location.href='index.php'</script>";
		}
		?>
		</div>
		<? include('../blocks/right.html'); ?>
	<? include('../blocks/bottom.html'); ?>
</body>
</html>