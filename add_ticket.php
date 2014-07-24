<? include('../connect.php'); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title id='title'>Открыть тикет</title>
	<link href='../main.css' type='text/css' rel='stylesheet'>
</head> 
<body>
	<? include('../blocks/top.html'); ?>
	<? include('../blocks/left.html'); ?>
	<div id='center' style='text-align: center;'>
<?
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
<h2>Открыть тикет</h2>
		<a href='my_ticket.php?all='><div id='my_ticket' class='first'></div></a>
		<a href='index.php'><div id='back'></div></a>
		<a href='exit.php'><div id='exit'></div></a>
		<br><br><br>
		<form style='margin-top: 30px;' action='ticket_go.php' method='post'>
		Тема:
		<br>
		<select name='theme' required>
		<option value='1'>Технический вопрос</option>
		<option value='2'>Пополнение</option>
		<option value='3'>Блокировка аккаунта</option>
		<option value='4'>Разблокировка аккаунта</option>
		<option value='5'>Восстановление персонажа</option>
		<option value='6'>Услуги</option>
		<option value='7'>Предложения</option>
		<option value='8'>Нарушения</option>
		<option value='9' selected>Другое</option>
		</select>
		<br>
		Заголовок:
		<br>
		<input type='text' name='zagolovok' required></input>
		<br>
		Сообщение:
		<br>
		<textarea name='mess_ticket' required></textarea>
		<br>
		<input type='submit' name='go_add' value='Создать'></input>
		</form>");
		}
		?>
		</div>
	<? include('../blocks/right.html'); ?>
	<? include('../blocks/bottom.html'); ?>
</body>
</html>