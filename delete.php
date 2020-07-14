<?php
    include('db.php');
    include('db_fotos.php');
    session_start();
    if(empty($_SESSION['user']))
        header("Location: index.php");
    
    $btnDel = filter_input(INPUT_POST, 'btnDel', FILTER_SANITIZE_STRING);
    $btnReset = filter_input(INPUT_POST, 'btnReset', FILTER_SANITIZE_STRING);

    if($btnDel)
    {
        $id = $_POST['id'];
        $table = $_POST['table'];
        $hash = $_POST['hash'];

        $query = "delete from $table where id='$id' limit 1";
        $query1 = "select * from $table where id='$id'";
            
        $exec = mysqli_query($dbc,$query);
        $exec1 = mysqli_query($dbc_fotos, $query1);
        if($exec && $exec1)
        {
            while($row=mysqli_fetch_array($exec1))
            {
                $path = '_img/'.$hash.'/'.$row['name'];
                unlink($path);
                            }
            $query2 = "delete from $table where id='$id'";
            $exec2 = mysqli_query($dbc_fotos, $query2);
            if($exec2)
            {
                $_SESSION['msg'] = "Eliminado com sucesso!";
                header("Location: database.php#$hash");
            }
            else
            {
            $_SESSION['msg'] = "Erro ao arquivar!";
            header("Location: database.php");
        }   
        }
        else
        {
            $_SESSION['msg'] = "Erro ao arquivar!";
            header("Location: database.php");
        }

    }
    //Arquivo
    if($btnReset)
    {
        $ano = $_POST['ano'];
        
        $tables = array('atv','desporto','fanfarra','formacao','formacao_ex','honor','protocolos','reserva','socios_empresas','socios_particulares','viaturas_antigas','visita_estudo');
        foreach($tables as $tab)
        {
            $query = "update $tab set arquivo='1' where note='$ano'";

            $exec = mysqli_query($dbc,$query);
        }
        $_SESSION['msg'] = "Arquivado com sucesso!";
        header("location: database.php");
    }
?>
