<?php
    session_start();
    if(empty($_SESSION['user']))
        header("Location: index.php");
    
    $btnAdd = filter_input(INPUT_POST, 'btnAdd', FILTER_SANITIZE_STRING);

if($btnAdd)
{
    $dia = filter_input(INPUT_POST, 'dia', FILTER_SANITIZE_STRING);
    $mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
    $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
    
    $data = "$ano-$mes-$dia";
    $tipo = $_POST['tipo'];
    $tempo = $_POST['duração'];
    $local = $_POST['local'];
    $dest = $_POST['destinatários'];
    $elem = $_POST['elem'];
    $obs = $_POST['obs'];
    
    require_once "../db.php";
    
    $query = "insert into formacao_ex (dia,tipo,duracao,localizacao,destinatario,elementos,obs,note) values (?,?,?,?,?,?,?,?)";
    
    $exec = @mysqli_prepare($dbc,$query);
    
    @mysqli_stmt_bind_param($exec,"sssssisi",$data,$tipo,$tempo,$local,$dest,$elem,$obs,$ano);
    
    @mysqli_stmt_execute($exec);
    
    $rows = @mysqli_stmt_affected_rows($exec);
        
    if($rows == 1)
    {
        $_SESSION['msg'] = "Adicionado com sucesso!";
        header("Location: ../database.php#form_ex");
    }
    else
        $_SESSION['msg'] = "Erro! Tente Novamente";
    header("Location: ../database.php#form_ex");
}

?>
