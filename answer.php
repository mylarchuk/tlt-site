<? include('../connect.php'); ?>
<? 
if(isset($_POST['go_answer'])){
$id_ticket = $_POST['id_ticket'];
$answer = $_POST['answer'];
$role = $_POST['role'];
if(mysql_query("INSERT INTO ticket_otvet (id_ticket, mess_otvet, role) VALUES ('$id_ticket', '$answer', '$role')")){
echo "<script type='text/javascript'>alert('Вы ответили!')</script>";
echo "<script type='text/javascript'>location.href='open_ticket.php?id=";echo $id_ticket;echo"'</script>";
}
else{
echo "<script type='text/javascript'>alert('Увы!')</script>";
echo "<a href='javascript:history.back()'>назад</a>";
};
};