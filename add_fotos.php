<?php
    session_start();
    if(empty($_SESSION['user']))
        header("Location: index.php");
    include("db_fotos.php");
    
   $btnFoto = filter_input(INPUT_POST, 'btnFoto', FILTER_SANITIZE_STRING);

    if($btnFoto)
    {
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['table'] = $_POST['table'];
        $_SESSION['hash'] = $_POST['hash'];
        if(isset($_POST['arquivo']))
            $_SESSION['arquivos'] = $_POST['arquivo'];
        else
            $_SESSION['arquivos'] = 0;
    }
    
    $upl = filter_input(INPUT_POST, 'upl', FILTER_SANITIZE_STRING);

    if($upl)
    {
        $pasta = '_img/'.$_SESSION['hash'].'/';
        $permite = array('image/jpg','image/jpeg','image/pjpeg');
		if(count($_FILES["file"]['name'])>0)
         { 
         for($j=0; $j < count($_FILES["file"]['name']); $j++)
         { //loop the uploaded file array
            $filen = $_FILES["file"]['name']["$j"]; //file name
            $tipo = $_FILES["file"]['type']["$j"]; //file name
            $path = $pasta.$filen; //generate the destination path
           if(move_uploaded_file($_FILES["file"]['tmp_name']["$j"],$path)) 
           {
               $query = "insert into ".$_SESSION['table']." (id,name) values (?,?)";

                $exec = mysqli_prepare($dbc_fotos,$query);

                mysqli_stmt_bind_param($exec,"is", $_SESSION['id'],$filen);

                mysqli_stmt_execute($exec);

                $rows = mysqli_stmt_affected_rows($exec);

                if($rows == 1)
                {
                    echo "Adicionado com sucesso!";
                }
                else
                    echo "Erro! Tente Novamente";		
            }
        }
        }
    }

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Galeria</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="_css/foto.css" />
	</head>
	<body>

		<!-- Wrapper -->
		<div id="wrapper">
			<!-- Main -->
			<section id="main">
				<?php
                    
                if($_SESSION['arquivos'] == 1)
                    echo "<a href='arquivo.php#".$_SESSION['hash']."><span class='icon fa-home'>Voltar</span></a>";
                else
                    echo "<a href='database.php#".$_SESSION['hash']."><span class='icon fa-home'>Voltar</span></a>";
                ?>
                <ul>
                    <?php

                    $query = "select * from ".$_SESSION['table']." where id = ".$_SESSION['id'];

                    $exec = mysqli_query($dbc_fotos,$query);
                    if($exec)
                    {  
                        while($row=mysqli_fetch_array($exec))
                        {
                            echo 
                                "
                                <li class='mouse'> <a href='_img/".$_SESSION['hash']."/".$row['name']."' target='_blank'><img style='width: 200px;height: 200px;' src='_img/".$_SESSION['hash']."/".$row['name']."'></a></li>
                                ";
                        }
                        
                    }
                    ?>
                </ul>
                <form method="post" enctype="multipart/form-data">
                        <div id='upload'>
                            <input type="file" name="file[]" multiple/>
                            <input type="submit" name="upl" value="Enviar" />
                        </div>
                    </form>
			</section>	
		</div>

	</body>
</html>
