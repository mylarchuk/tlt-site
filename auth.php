<? include('../connect.php');
$login = $_POST['login'];
$password = $_POST['password'];
$select = mysql_query("SELECT * FROM admin WHERE login = '$login'");
$row = mysql_fetch_array($select);
if($password == $row['password']){
$_SESSION['login'] = $login;
echo "<script type='text/javascript'>location.href='index.php'</script>";
}
else {
echo 'Увы!';
};
?>