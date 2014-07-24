<?php
session_start();
$host = "localhost"; 
  //Имя пользователя БД
  $user = "tlttest1";   
  //Пароль пользователя БД
  $password = "Dmuler96"; 
  //База данных
  $db = "tlttest1_users"; 
  //Функция соединения с сервером
  @mysql_connect($host,$user,$password) or die (mysql_error()); 
  //Функция соединения с базой данных
  @mysql_select_db($db) or die(mysql_error());
?>