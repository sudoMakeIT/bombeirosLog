<?php
    require "db.php";
    session_start();
    if(empty($_SESSION['user']))
        header("Location: index.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>MyDatabase</title>
    <link rel="stylesheet" type="text/css" href="_css/lateral.css"> 
    <link rel="stylesheet" href="icons/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="print" href="_css/print.css"> 
    <meta charset="utf-8">
    <script>
    
        function toggle_visibility(id)
        {
            var e = document.getElementById(id);
            if(e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }
        
        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;

             document.body.innerHTML = printContents;

             window.print();

             document.body.innerHTML = originalContents;
        }
        
        function showHide() {
			if(document.getElementById('mult').checked) {
				document.getElementById('opDate').style.display='block';
			} else {
				document.getElementById('opDate').style.display='none';
				}
		}


        </script>
</head>
<body>
    <!--
        Popups
    !-->
    <div id="popup" class="popup-position">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times' href="javascript:void(0)" onclick="toggle_visibility('popup')"><h1>&times;</h1></a>
                <nav>
                    <label>Escolha a categoria</label>
                    <ul>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_form_in'), toggle_visibility('popup')">Formações Internas</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_form_ex'), toggle_visibility('popup')">Formações Externas</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_fanfarra'), toggle_visibility('popup')">Fanfarra</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_quad_atv'), toggle_visibility('popup')">Quadro Ativo</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_quad_res'), toggle_visibility('popup')">Quadro de Resersa</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_honor'), toggle_visibility('popup')">Quadro Honorário</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_sport'), toggle_visibility('popup')">Secção Desportiva</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_popo'), toggle_visibility('popup')">Viaturas Antigas</a></li>   
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_escolas'), toggle_visibility('popup')">Visitas de Estudo</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_soc_part'), toggle_visibility('popup')">Sócios Particulares</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_soc_emp'), toggle_visibility('popup')">Sócios Empresas</a></li>
                       <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_prot'), toggle_visibility('popup')">Protocolos Empresas</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
    <div id="popup_del" class="popup-position">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times' href="javascript:void(0)" onclick="toggle_visibility('popup_del')"><h1>&times;</h1></a>
                <form action="delete.php" method="POST">
                    <p>Insira o ano a eliminar: <input type="number" name="ano" placeholder="ano" required size="2"></p>
                    <p>  
                        <input type="submit" name="btnReset" value="Arquivar">
                    </p>
                </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_arquivo" class="popup-position">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times' href="javascript:void(0)" onclick="toggle_visibility('popup_arquivo')"><h1>&times;</h1></a>
                <form action="arquivo.php" method="POST">
                    <p>Insira o ano a consultar: <input type="number" name="ano" placeholder="ano" required size="2"></p>
                    <p>  
                        <input type="submit" name="btnAno" value="Pesquisar">
                    </p>
                </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_escolas" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_escolas')"><h1>&times;</h1></a>
                <label>Visitas de estudo</label> 
                <form method="POST" action="_add/escolas.php">
                    <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>	
                    <p><input type="text" name="entidade" placeholder="Instiuição" required></p>
                    <p><input type="text" name="guia" placeholder="Guia" required></p>
                    <p><input type="text" name="resp" placeholder="Responsável Instituição" required></p>
                    <p><input type="text" name="contacto" placeholder="Contacto" required></p>
                    <p><input type="text" name="elem" placeholder="Nº de Crianças"></p>
                    <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                    <p>  
                        <input type="submit" name="btnAdd" value="Adicionar">
                    </p>
                </form>
            </div>
        </div>    
    </div>

    <div id="popup_form_in" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_form_in')"><h1>&times;</h1></a>
                <label>Formações Internas</label> 
                <form method="POST" action="_add/form_in.php">
                        <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>	
                        <p><input type="text" name="tipo" placeholder="tipo de formação" required></p>
                        <p><input type="text" name="duração" placeholder="Duração" required></p>
                        <p><input type="text" name="local" placeholder="Local" required></p>
                        <p><input type="text" name="destinatários" placeholder="Formador" required></p>
                        <p><input type="text" name="elem" placeholder="Nº de Formandos"></p>
                        <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                        <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_form_ex" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_form_ex')"><h1>&times;</h1></a>
                <label>Formações Externas</label> 
                <form method="POST" action="_add/form_ex.php">
                    <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>	
                    <p><input type="text" name="tipo" placeholder="tipo de formação" required></p>
                    <p><input type="text" name="duração" placeholder="Duração" required></p>
                    <p><input type="text" name="local" placeholder="Local" required></p>
                    <p><input type="text" name="destinatários" placeholder="Formador" required></p>
                    <p><input type="text" name="elem" placeholder="Nº de Formandos"></p>
                    <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                    <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                </form>
            </div>
        </div>    
    </div>

    <div id="popup_fanfarra" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_fanfarra')"><h1>&times;</h1></a>
                <label>Fanfarra</label> 
                <form method="POST" action="_add/fanfarra.php">
                        <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>	
                        <p><input type="text" name="tipo" placeholder="Atividade" required></p>
                        <p><input type="text" name="local" placeholder="Local" required></p>
                        <p><input type="text" name="elem" placeholder="Nº de Elementos"></p>
                        <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                        <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                </form>
            </div>
        </div>    
    </div>

    <div id="popup_popo" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_popo')"><h1>&times;</h1></a>
                <label>Viaturas Antigas</label> 
                <form method="POST" action="_add/popo.php">
                    <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>
                    <p id=label_mult><input type="checkbox" id="mult" name="mult" onclick="showHide()">
                    <label for="mult">Vários Dias</label>
                    <div id="opDate" style="display: none;">
                        <p><input type="number" name="dia1" placeholder="dia" size="2" > <input type="number" name="mes1" placeholder="mês" size="2" > <input type="number" name="ano1" placeholder="ano"  size="2"></p>
                    </div>
                    <p><input type="text" name="duracao" placeholder="Viatura" required></p>
                    <p><input type="text" name="local" placeholder="Local" required></p>
                    <p><input type="text" name="mecanico" placeholder="Atividade" ></p>
                    <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                    <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_prot" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_prot')"><h1>&times;</h1></a>
                <label>Protocolos empresas</label> 
                <form method="POST" action="_add/prot.php">
                        <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>
                        <p><input type="text" name="entidade" placeholder="Entidade" required></p>
                        <p><input type="text" name="cond" placeholder="condições" ></p>
                        <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                        <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_quad_atv" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_quad_atv')"><h1>&times;</h1></a>
                <label>Quadro Ativo</label> 
                <form method="POST" action="_add/quad_atv.php">
                    <?php  
                        if(!empty($_SESSION['mes']))
                        echo "<p><input type='number' name='mes' value=".$_SESSION['mes']." placeholder='mês'required> <input type='number' name='ano' value=".$_SESSION['ano']." placeholder='ano' required></p>";
                        else
                            echo "<p><input type='number' name='mes' placeholder='mês' required> <input type='number' name='ano'  placeholder='ano' required></p>";
                    ?>
                    <p><input type="text" name="nome" placeholder="Nome" required></p>
                    <p><input type="text" name="num" placeholder="Numero" required></p>
                    <p><input type="text" name="cat" placeholder="Categoria" required></p>
                    <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                    <p><input type="submit" name="btnNew" value="Novo Bombeiro"><input type="submit" name="btnAdd" value="Adicionar"></p>
                </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_honor" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_honor')"><h1>&times;</h1></a>
                <label>Quadro Honorário</label> 
                <form method="POST" action="_add/quad_honor.php">
                        <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>	
                        <p><input type="text" name="tipo" placeholder="tipo de atividade" required></p>
                        <p><input type="text" name="local" placeholder="Local" required></p>
                        <p><input type="text" name="elem" placeholder="Nº de pessoas"></p>
                        <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                        <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                    </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_quad_res" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_quad_res')"><h1>&times;</h1></a>
                <label>Quadro de Reserva</label> 
                <form method="POST" action="_add/quad_res.php">
                        <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>	
                        <p><input type="text" name="nome" placeholder="Nome" required></p>
                        <p><input type="text" name="id" placeholder="Numero de identificação" required></p>
                        <p><input type="text" name="cat" placeholder="Categoria" required></p>
                        <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                        <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                    </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_soc_emp" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_soc_emp')"><h1>&times;</h1></a>
                <label>Sócios - Empressas</label> 
                <form method="POST" action="_add/soc_emp.php">
                        <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>	
                        <p><input type="text" name="tipo" placeholder="Empresa" required></p>
                        <p><input type="text" name="id" placeholder="Quantia" required></p>
                        <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                        <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                    </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_soc_part" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_soc_part')"><h1>&times;</h1></a>
                <label>Sócios - Particulares</label> 
                <form method="POST" action="_add/soc_part.php">
                        <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>	
                        <p><input type="text" name="tipo" placeholder="Evento" required></p>
                        <p><input type="text" name="id" placeholder="Nº de Associados" required></p>
                        <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                        <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                    </form>
            </div>
        </div>    
    </div>
    
    <div id="popup_sport" class="popup-position-form">
        <div id="popup-wrapper">
            <div id="popup-container">
                <a class='times-form' href="javascript:void(0)" onclick="toggle_visibility('popup_sport')"><h1>&times;</h1></a>
                <label>Secção desportiva</label> 
                <form method="POST" action="_add/sport.php">
                    <p><input type="number" name="dia" placeholder="dia" size="2" required> <input type="number" name="mes" placeholder="mês" size="2" required> <input type="number" name="ano" placeholder="ano" required size="2"></p>	
                    <p><input type="text" name="tipo" placeholder="tipo de atividade" required></p>
                    <p><input type="text" name="local" placeholder="Local" required></p>
                    <p><input type="text" name="elem" placeholder="Nº de pessoas"></p>
                    <p><textarea name="obs" placeholder="Observações" ></textarea></p>
                    <p><input type="submit" name="btnAdd" value="Adicionar"></p>
                </form>
            </div>
        </div>    
    </div>
           
    <div class="site">
    <!--
        Parte Lateral 
    !-->     
    <div id="header">
        <!-- Nav -->
        <nav id="nav">                      
            <ul class="menu">
                <li><a href="#head">Home</a></li>
                <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_arquivo')">Arquivo</a></li>
                <li><a href="#form_in">Formações Internas</a></li>
                <li><a href="#form_ex">Formações Externas</a></li>
                <li><a href="#fanfarra">Fanfarra</a></li>
                <li><a href="#reserva">Quadro de Resersa</a></li>
                <li><a href="#honor">Quadro Honorário</a></li>
                <li><a href="#desporto">Secção Desportiva</a></li>
                <li><a href="#popo">Viaturas Antigas</a></li>   
                <li><a href="#escola">Visitas de Estudo</a></li>
                <li><a href="#socio_part">Sócios Particulares</a></li>
                <li><a href="#socio_emp">Sócios Empresas</a></li>
                <li><a href="#prot">Protocolos</a></li>
                <li><a href="javascript:void(0)" onclick="toggle_visibility('popup')">Adicionar</a></li>
                <li><a href="javascript:void(0)" onclick="toggle_visibility('popup_del')">Arquivar</a></li>
            </ul>
        </nav>
        <!-- Footer -->
        <div id="footer">
            <ul class="copyright">
                <li>
                    <?php
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                    ?>
                </li>
            </ul>
        </div>
    </div>        
        <!-- 
            Parte das tabelas
        !-->
    <div id="main">     
            <header id="head">
                    <img src="_img/logo.jpg">
                    <a href="logout.php">sair</a>
                    <span id='print' class="fa fa-print fa-3x" onclick="printDiv('main')"></span>
                </header>
            
            <div id=form_in>
            	<section id="form_in" class="dark">
                    <table>
                        <caption>Formação Interna  <a onclick="printDiv('form_in')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr class="menu">
                            <td>Data</td>
                            <td>Tipo de Formação</td>
                            <td>Formador</td>
                            <td>Duração</td>
                            <td>Local</td>
                            <td>Nº de Formandos</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_form_in')"></span></td>
                        </tr>
                        <?php
                            $flag = 0;
                            $query = "select * from formacao where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['tipo']."</td>
                                        <td>".$row['destinatario']."</td>
                                        <td>".$row['duracao']."</td>
                                        <td>".$row['localizacao']."</td>
                                        <td>".$row['elementos']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'formacao'>
                                            <input type='hidden' name='hash' value='form_in'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='submit' name='btnFoto' value='Fotos'></span>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'formacao'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='form_in'>
                                            <input type='submit' name='btnDel' value='APAGAR'>
                                        </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>     
                    </table>            
                </section>
            </div>
        
            <div id=form_ex>
                <section id="form_ex">
                    <table class="indice">
                        <caption>Formação Externa <a onclick="printDiv('form_ex')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Tipo de Formação</td>
                            <td>Formador</td>
                            <td>Duração</td>
                            <td>Local</td>
                            <td>Nº de Formandos</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_form_ex')"></span></td>
                        </tr>
                        <?php    
                            $flag = 0;

                            $query = "select * from formacao_ex where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['tipo']."</td>
                                        <td>".$row['destinatario']."</td>
                                        <td>".$row['duracao']."</td>
                                        <td>".$row['localizacao']."</td>
                                        <td>".$row['elementos']."</td>
                                        <td>".$row['obs']."</td>   
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'formacao_ex'>
                                            <input type='hidden' name='hash' value='form_ex'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'formacao_ex'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='form_ex'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                        </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1; 
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>        
                    </table>
                </section>
            </div>
            
            <section id="fanfarra" class="dark">
                    <table class="indice">
                        <caption>Fanfarra <a onclick="printDiv('fanfarra')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Atividade</td>
                            <td>Localização</td>
                            <td>Nº de Elementos</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_fanfarra')"></span></td>
                        </tr>
                        <?php   
                            $flag = 0;

                            $query = "select * from fanfarra where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['tipo']."</td>
                                        <td>".$row['localizacao']."</td>
                                        <td>".$row['elementos']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'fanfarra'>
                                            <input type='hidden' name='hash' value='fanfarra'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'fanfarra'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='fanfarra'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>        
                    </table>
                </section>

            <section id="reserva" >
                    <table>
                        <caption>Quadro de Reserva <a onclick="printDiv('reserva')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Nome</td>
                            <td>Categoria</td>
                            <td>Nº de Identificação</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_quad_res')"></span></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from reserva where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['nome']."</td>
                                        <td>".$row['categoria']."</td>
                                        <td>".$row['numero']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'reserva'>
                                            <input type='hidden' name='hash' value='reserva'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'reserva'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='reserva'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>        
                    </table>
                </section>

            <section id="honor" class="dark">
                    <table class="indice">
                        <caption>Quadro Honorário <a onclick="printDiv('honor')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Atividade</td>
                            <td>Nº de Elementos</td>
                            <td>Localização</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_honor')"></span></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from honor where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['tipo']."</td>
                                        <td>".$row['elem']."</td>
                                        <td>".$row['local']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'honor'>
                                            <input type='hidden' name='hash' value='honor'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'honor'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='honor'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>        
                    </table>             
                </section>

            <section id="desporto" >
                    <table class="indice">
                        <caption>Secção Desportiva <a onclick="printDiv('desporto')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Atividade</td>
                            <td>Localização</td>
                            <td>Nº de Elementos</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_sport')"></span></td>
                        </tr>
                        <?php
                            $query = "select * from desporto where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                $flag = 0;
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['tipo']."</td>
                                        <td>".$row['localizacao']."</td>
                                        <td>".$row['elementos']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'desporto'>
                                            <input type='hidden' name='hash' value='desporto'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'desporto'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='desporto'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                }
                                if($flag == 0)
                                    {
                                        echo "
                                        <tr>
                                            <td colspan='7'>Tabela Sem Entradas</td>
                                        </tr>
                                        ";
                                    }
                            }
                        ?>        
                    </table>            
                </section>

            <section id="popo" class="dark">
                    <table class="indice">
                        <caption>Viaturas Antigas <a onclick="printDiv('popo')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Viatura</td>
                            <td>Atividade</td>
                            <td>Localização</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_popo')"></span></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from viaturas_antigas where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    if($row['date2'] == 0)
                                    {
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['tempo']."</td>
                                        <td>".$row['manutencao']."</td>
                                        <td>".$row['localizacao']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'viaturas_antigas'>
                                            <input type='hidden' name='hash' value='popo'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'viaturas_antigas'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='popo'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                    }
                                    else
                                    {
                                        echo "
                                    <tr>
                                        <td>".$row['dia']." <br> a <br> ".$row['day1']."</td>
                                        <td>".$row['tempo']."</td>
                                        <td>".$row['manutencao']."</td>
                                        <td>".$row['localizacao']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'viaturas_antigas'>
                                            <input type='hidden' name='hash' value='popo'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'viaturas_antigas'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='popo'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                    }
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>        
                    </table>
                </section>

            <section id="escola" >
                    <table class="indice">
                        <caption>Visitas de Estudo <a onclick="printDiv('escola')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Guia</td>
                            <td>Intituição</td>
                            <td>Responsável/Instituição</td>
                            <td>Contacto</td>
                            <td>Nº de Crianças</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_escolas')"></span></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from visita_estudo where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['guia']."</td>
                                        <td>".$row['entidade']."</td>
                                        <td>".$row['resp']."</td>
                                        <td>".$row['contacto']."</td>
                                        <td>".$row['elementos']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'visita_estudo'>
                                            <input type='hidden' name='hash' value='escolas'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'visita_estudo'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='escola'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>        
                    </table>
                </section>

            <section id="socio_part" class="dark">
                    <table class="indice">
                        <caption>Sócios Particulares <a onclick="printDiv('socio_part')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Evento</td>
                            <td>Nº de Associados</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_soc_part')"></span></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from socios_particulares where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['evento']."</td>
                                        <td>".$row['new_members']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'socios_particulares'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='socio_part'>
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'socios_particulares'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='socio_part'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }

                        ?>        
                    </table>    
                </section>

            <section id="socio_emp" >
                    <table class="indice">
                        <caption>Sócios Empresas <a onclick="printDiv('socio_emp')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Empresa</td>
                            <td>Quantia</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_soc_emp')"></span></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from socios_empresas where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['nome']."</td>
                                        <td>".$row['quantia']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'socios_empresas'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='socio_emp'>
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'socios_empresas'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='socio_emp'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>        
                    </table>            
                </section>

            <section id="prot" class="dark">
                    <table class="indice">
                        <caption>Protocolos <a onclick="printDiv('prot')"><span class="fa fa-print fa-2x"></span></a></caption>
                        <tr>
                            <td>Data</td>
                            <td>Entidade</td>
                            <td>Condições</td>
                            <td>Obs.</td>
                            <td class="btn"><span class="fa fa-plus-square fa-2x" onclick="toggle_visibility('popup_prot')"></span></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from protocolos where arquivo = '0' order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
                                    echo "
                                    <tr>
                                        <td>".$row['dia']."</td>
                                        <td>".$row['entidade']."</td>
                                        <td>".$row['condicoes']."</td>
                                        <td>".$row['obs']."</td>  
                                        <td class='btn'>"."
                                        <form method='POST' action='add_fotos.php'>
                                            <input type='hidden' name='table' value= 'protocolos'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='prot'>
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
                                        </form>
                                        <form method='POST' action='delete.php'>
                                            <input type='hidden' name='table' value= 'protocolos'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='prot'>
                                            <p><input type='submit' name='btnDel' value='APAGAR'></p>
                                          </form>
                                        "."</td>
                                    </tr>
                                    ";
                                    $flag = 1;
                                }
                                if($flag == 0)
                                {
                                    echo "
                                    <tr>
                                        <td colspan='8' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>        
                    </table>            
                </section>
    </div>            
</div>
</body>
</html>
