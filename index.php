<?php
    session_start();
    require_once "db.php";

    if(!empty($_SESSION['user']))
        header("Location: database.php");
    
    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

    if($btnLogin)
    {
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

        //echo "$user - $pass";

        //criptografar senha
        //echo password_hash($pass,PASSWORD_DEFAULT);

        $query = "select password from cadastro where username='$user' limit 1";
        $resultados = mysqli_query($dbc,$query);

        if($resultados)
        {
            $row = mysqli_fetch_assoc($resultados); //ler resultados
            if(strcmp($pass,$row['password'])==0)  
            {
                $_SESSION['user'] = $user;
                header("location: database.php");
            }
            else
            {
                $_SESSION['msg'] = "Informações Incorretas!";
            }
        }
        else
        {
            $_SESSION['msg'] = "Informações Incorretas!";
        }


    }

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="_css/login.css" />
	</head>
	<body>

		<!-- Wrapper -->
		<div id="wrapper">
			<!-- Main -->
			<section id="main">
				<header class=logo>
					<img src="_img/big-logo.jpg"/>
				</header>

           		<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
				?>
           		<form method="POST" action="index.php">
					<p><input type="text" name="user" placeholder="username" required></p>	
					<p><input type="password" name="pass" placeholder="password" required></p>
           		 	<p><input type="submit" name="btnLogin" value="Login"></p>
				</form>
            	<!--
                <p id="forgot"><a href="forgot.php">Forgot Password?</a></p>
					!-->			
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