<? include('../connect.php'); ?>
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
<h2>Саппорт-юзер</h2>
		<a href='add_ticket.php'><div id='add_ticket' class='first'></div></a>
		<a href='my_ticket.php'><div id='my_ticket'></div></a>
		<a href='exit.php'><div id='exit'></div></a>");
		}
		?>