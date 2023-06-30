<?php
 // conexao
 require_once 'conexao.php';
 //iniciar a sessao
 session_start();

 if(isset($_POST['logar'])):
    $erros=array();
   $usuario=mysqli_escape_string($conexao,$_POST['usuario']);
   $senha=mysqli_escape_string($conexao,$_POST['senha']);
   if(empty($usuario) || empty($senha)):
   	$erros[]="Usuario e ou Senha vazios";
    else:
    	$sql="SELECT usuario FROM usuario WHERE usuario='$usuario'";
    	$resultado=mysqli_query($conexao,$sql);
        if(!mysqli_num_rows($resultado)>0):
        	$erros[]="Usuario nao existe.";
        else:
        	$senha=md5($senha);
        	$sql="SELECT * FROM usuario WHERE usuario='$usuario' && senha='$senha'";
        	$resultado=mysqli_query($conexao,$sql);
        	if(mysqli_num_rows($resultado)==1):
        		//entrar no sistema
        		$dados=mysqli_fetch_array($resultado);
        		$_SESSION['logado']=true;
        		$_SESSION['id']=$dados['id'];
        		header('Location:home.php');

        	else:
        		$erros[]="O usuario e a senha não conferem!";
        	endif;
        endif;

    	endif;

 	
 endif;

?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<img src="img/user2.png" alt="logo_usuario" id="logo_user">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="text" name="usuario" placeholder="Email" maxlength="50">
			<input type="password" name="senha" placeholder="Password" maxlength="10">
			<button name="logar"><img src="img/login.png" width="25px">Login</button><br><br>
			<p><?php if(!empty($erros)):
      	foreach($erros as $valor):
      		echo "<li>$valor</li>";
      	endforeach;
      endif;  ?></p>
		</form>
	</header>
</body>
</html>