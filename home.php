<?php
//conexao
require_once 'conexao.php';
//iniciar a sessao
 session_start();

 //validacao para ao acesso a area restrita
 if(!isset($_SESSION['logado'])):
 	header('Location:index.php');
 endif;






 
 $id=$_SESSION['id'];

 $sql="SELECT * FROM usuario WHERE id='$id'";
 $resultado=mysqli_query($conexao,$sql);
 $dados=mysqli_fetch_array($resultado);



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<header>
		<h1>Pagina Inicial</h1>
		<p>Seja bem vindo <?php echo " ".$dados['nome']; ?> <a href="sair.php">Sair</a></p>
		
	</header>

</body>
</html>