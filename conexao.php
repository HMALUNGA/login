<?php
//conexao com base de dados
$servername="localhost";
$username="root";
$password="";
$db="login";

$conexao=mysqli_connect($servername,$username,$password,$db);
if(mysqli_connect_error()):
	echo "erro de conexao: ".mysqli_connect_error();
endif;

?>