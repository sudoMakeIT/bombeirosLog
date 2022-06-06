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
    $tipo = $_POST['entidade'];
    $cond = $_POST['cond'];
    $obs = $_POST['obs'];
    
    require_once "../db.php";
    
    $query = "insert into protocolos (dia,entidade,condicoes,obs,note) values (?,?,?,?,?)";
    
    $exec =  @mysqli_prepare($dbc,$query);
    
    @mysqli_stmt_bind_param($exec,"ssssi",$data,$tipo,$cond, $obs,$ano);
    
    @mysqli_stmt_execute($exec);
    
    $rows = @mysqli_stmt_affected_rows($exec);
        
    if($rows == 1)
    {
        $_SESSION['msg'] = "Adicionado com sucesso!";
    }
    else
        $_SESSION['msg'] = "Erro! Tente Novamente";
    header("Location: ../database.php#prot");
}

?>