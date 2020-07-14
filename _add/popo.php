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
    
    $dia1 = filter_input(INPUT_POST, 'dia1', FILTER_SANITIZE_STRING);
    $mes1 = filter_input(INPUT_POST, 'mes1', FILTER_SANITIZE_STRING);
    $ano1 = filter_input(INPUT_POST, 'ano1', FILTER_SANITIZE_STRING);
    
    if($dia1 != '')
    {
        $date2id = 1;
    }
    else
    {
        $date2id = 0;
    }
    
    $date2 = "$ano1-$mes1-$dia1";
    $data = "$ano-$mes-$dia";
    $tempo = $_POST['duracao'];
    $local = $_POST['local'];
    $manu = $_POST['mecanico'];
    $obs = $_POST['obs'];
    
    require_once "../db.php";
    
    $query = "insert into viaturas_antigas (dia,day1,tempo,localizacao,manutencao,obs,note,date2) values (?,?,?,?,?,?,?,?)";
    
    $exec =  mysqli_prepare($dbc,$query);
    
    mysqli_stmt_bind_param($exec,"ssssssii",$data,$date2,$tempo,$local,$manu, $obs,$ano,$date2id);
    
    mysqli_stmt_execute($exec);
    
    $rows = mysqli_stmt_affected_rows($exec);
        
    if($rows == 1)
    {
        $_SESSION['msg'] = "Adicionado com sucesso!";
    }
    else
        $_SESSION['msg'] = "Erro! Tente Novamente  $date2if";
    header("Location: ../database.php#popo");
}

?>        