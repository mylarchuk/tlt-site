<? include('../connect.php'); ?>
<? 
$login = $_SESSION['login'];
$zagolovok = $_POST['zagolovok'];
$mess_ticket = $_POST['mess_ticket'];
$theme = $_POST['theme'];
if($_POST['go_add']){
if(mysql_query("INSERT INTO ticket (login_user, theme, zagolovok, mess_ticket, status) VALUES ('$login', '$theme', '$zagolovok', '$mess_ticket', '1')")){
echo "<script type='text/javascript'>alert('Тикет создан!')</script>";
echo "<script type='text/javascript'>location.href='index.php'</script>";
}
else{
echo "<script type='text/javascript'>alert('Увы!')</script>";
echo "<script type='text/javascript'>location.href='add_ticket.php'</script>";
};
};
$id_ticket = $_POST['id_ticket'];
if($_POST['go_close']){
if(mysql_query("UPDATE ticket SET status='0' WHERE id_ticket = '$id_ticket'")){
echo "<script type='text/javascript'>alert('Тикет закрыт!')</script>";
echo "<script type='text/javascript'>location.href='my_ticket.php'</script>";
}
else{
echo "<script type='text/javascript'>alert('Увы!')</script>";
echo "<script type='text/javascript'>location.href='my_ticket.php'</script>";
};
};
if($_POST['go_close_moder']){
if(mysql_query("UPDATE ticket SET status='0' WHERE id_ticket = '$id_ticket'")){
echo "<script type='text/javascript'>alert('Тикет закрыт!')</script>";
echo "<script type='text/javascript'>location.href='open_ticket.php'</script>";
}
else{
echo "<script type='text/javascript'>alert('Увы!')</script>";
echo "<script type='text/javascript'>location.href='open_ticket.php'</script>";
};
};
?>