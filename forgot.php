<!-- 

Page for forget password;
send an email for jonas78sousa@gmail.com

!-->
<?php
    session_start();
    require_once "db.php";
        
    $btnForgot = filter_input(INPUT_POST, 'btnForgot', FILTER_SANITIZE_STRING);
    
    $btnHome = filter_input(INPUT_POST, 'btnHome', FILTER_SANITIZE_STRING);
    
    if($btnHome)
        header("location: index.php");
    
    if($btnForgot)
    {
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);

        $query = "select username, password from cadastro where username='$user' limit 1";
        $resultados = mysqli_query($dbc,$query);

        if($resultados)
        {
            $row = mysqli_fetch_assoc($resultados);
            if(!empty($row))    
            {    
                $to = $row['mail'];
                $sub = "Recuperar Dados";
                $msg = "User: ".$row['username']." Senha: 123 ";
                
                    
                $header = "Bruno.BaseDeDados";
                if(mail($to,$sub,$msg,$header))
                {
                    $_SESSION['msg'] = "Informações Enviadas!";
                    header("location: index.php");
                }
            }
            else
            {
                $_SESSION['msg'] = "User Não Encontrado";
            }
        }

    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>ForgetPassword</title>
    <link rel="stylesheet" type="text/css" href="_css/login.css"> 
</head>
<body>
    <div id="wrapper">
			<!-- Main -->
			<section id="main">
				<header class=logo>
					<img src="_img/logo.jpg"/>
				</header>

           		<?php
                    if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
				?>
                
                <p> Insira E-mail para confirmar</p>
           		<form method="POST" action="forgot.php">
					<p><input type="text" name="user" placeholder="username"></p>	
                    <p><input type="submit" name="btnHome" value="HOME"><input type="submit" name="btnForgot" value="Enviar"></p>
				</form>				
				
			</section>

		</div>
		<!-- Footer -->
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; Bruno Pinto</li>
					</ul>
				</footer>
</body>
</html>