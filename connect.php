<?php
session_start();
$host = "localhost"; 
  //��� ������������ ��
  $user = "tlttest1";   
  //������ ������������ ��
  $password = "Dmuler96"; 
  //���� ������
  $db = "tlttest1_users"; 
  //������� ���������� � ��������
  @mysql_connect($host,$user,$password) or die (mysql_error()); 
  //������� ���������� � ����� ������
  @mysql_select_db($db) or die(mysql_error());
?>