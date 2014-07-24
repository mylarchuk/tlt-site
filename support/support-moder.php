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
		$login = $_SESSION['login'];
$select = mysql_query("SELECT * FROM admin WHERE login = '$login'");
$row = mysql_fetch_array($select);
if($row['role'] == '2'){
		printf("
		<h2>Саппорт-модер</h2>
		<a href='open_ticket.php'>Открытые тикеты</a>
		<a href='exit.php'>Выйти</a>");
		}
		else{
		echo "<script type='text/javascript'>location.href='index.php'</script>";
		};
		};
		?>