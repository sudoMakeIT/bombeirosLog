<?php
     session_start();
     include("db.php");
     if(empty($_SESSION['user']))
         header("Location: index.php"); 
    if(isset($_POST['ano']))
        $_SESSION['arquivo'] = $_POST['ano'];
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="_css/lateral.css"> 
    <script type="text/javascript">
 
           function toggle_visibility(id)
            {
                var e = document.getElementById(id);
                if(e.style.display == 'block')
                    e.style.display = 'none';
                else
                    e.style.display = 'block';
            }

        </script>
</head>
<body>
    
    <div id="header">
    <!-- Nav -->
        <nav id="nav">                      
                <ul class="menu">
                    <li><a href="#head">Formações Internas</a></li>
                    <li><a href="#form_ex">Formações Externas</a></li>
                    <li><a href="#fanfarra">Fanfarra</a></li>
                    <li><a href="#quad_atv">Quadro Ativo</a></li>
                    <li><a href="#reserva">Quadro de Resersa</a></li>
                    <li><a href="#honor">Quadro Honorário</a></li>
                    <li><a href="#desporto">Secção Desportiva</a></li>
                    <li><a href="#popo">Viaturas Antigas</a></li>   
                    <li><a href="#escola">Visitas de Estudo</a></li>
                    <li><a href="#socio_part">Sócios Particulares</a></li>
                    <li><a href="#socio_emp">Sócios Empresas</a></li>
                    <li><a href="#prot">Protocolos Empresas</a></li>
                </ul>
            </nav>
        <!-- Footer -->
        <div id="footer">
            <ul class="copyright">
                <li>
                    <a href="database.php">Voltar</a>
                </li>
            </ul>
        </div>
    </div>        

    <div id="main">     
            <header id="head">
                    <img src="_img/logo.jpg">
                    <a href="logout.php">sair</a>
                        <form method="POST" action="arquivo.php">
                        <input type="number" name='ano' placeholder="Arquivo de <?php echo $_SESSION['arquivo']; ?>">
                        <input type="submit" name="btnReset" value="PESQUISAR">
                        </form>
                </header>

            <section id="form_in" class="dark">
                    <table>
                        <caption>Formação Interna</caption>
                        <tr class="menu">
                            <td>Data</td>
                            <td>Tipo de Formação</td>
                            <td>Formador</td>
                            <td>Duração</td>
                            <td>Local</td>
                            <td>Nº de Formandos</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php
                            $flag = 0;
                            $query = "select * from formacao where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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

            <section id="form_ex">
                    <table class="indice">
                        <caption>Formação Externa</caption>
                        <tr>
                            <td>Data</td>
                            <td>Tipo de Formação</td>
                            <td>Formador</td>
                            <td>Duração</td>
                            <td>Local</td>
                            <td>Nº de Formandos</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php    
                            $flag = 0;

                            $query = "select * from formacao_ex where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='table' value= 'formacao_ex'>
                                            <input type='hidden' name='hash' value='form_ex'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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
                                        <td colspan='9' class='btn'>Tabela Sem Entradas</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>        
                    </table>
                </section>

            <section id="fanfarra" class="dark">
                    <table class="indice">
                        <caption>Fanfarra</caption>
                        <tr>
                            <td>Data</td>
                            <td>Atividade</td>
                            <td>Localização</td>
                            <td>Nº de Elementos</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php   
                            $flag = 0;

                            $query = "select * from fanfarra where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='hash' value='fanfarra'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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
                        <caption>Quandro de Reserva</caption>
                        <tr>
                            <td>Data</td>
                            <td>Nome</td>
                            <td>Categoria</td>
                            <td>Nº de Identificação</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from reserva where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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
                        <caption>Quadro Honorário</caption>
                        <tr>
                            <td>Data</td>
                            <td>Atividade</td>
                            <td>Nº de Elementos</td>
                            <td>Localização</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from honor where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='hash' value='honor'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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

            <section id="desporto">
                    <table class="indice">
                        <caption>Secção Desportiva</caption>
                        <tr>
                            <td>Data</td>
                            <td>Atividade</td>
                            <td>Localização</td>
                            <td>Nº de Elementos</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php
                            $query = "select * from desporto where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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
                        <caption>Viaturas Antigas</caption>
                        <tr>
                            <td>Data</td>
                            <td>Viatura</td>
                            <td>Atividade</td>
                            <td>Localização</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from viaturas_antigas where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

                            $exec = mysqli_query($dbc,$query);

                            if($exec)
                            {  
                                while($row=mysqli_fetch_array($exec))
                                {
                                    $_SESSION['id'] = $row['id'];
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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='hash' value='popo'>
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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

            <section id="escola">
                    <table class="indice">
                        <caption>Visitas de Estudo</caption>
                        <tr>
                            <td>Data</td>
                            <td>Guia</td>
                            <td>Intituição</td>
                            <td>Responsável/Instituição</td>
                            <td>Contacto</td>
                            <td>Nº de Crianças</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from visita_estudo where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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
                        <caption>Sócios Particulares</caption>
                        <tr>
                            <td>Data</td>
                            <td>Evento</td>
                            <td>Nº de Associados</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from socios_particulares where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='socio_part'>
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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
                        <caption>Sócios Empresas</caption>
                        <tr>
                            <td>Data</td>
                            <td>Entidade</td>
                            <td>Quantia</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from socios_empresas where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='socio_emp'>
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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
                        <caption>Protocolos</caption>
                        <tr>
                            <td>Data</td>
                            <td>Entidade</td>
                            <td>Condições</td>
                            <td>Obs.</td>
                            <td class="btn"></td>
                        </tr>
                        <?php
                            $flag = 0;

                            $query = "select * from protocolos where arquivo = '1' and note= ".$_SESSION['arquivo']." order by dia desc";

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
                                            <input type='hidden' name='arquivo' value= 1 >
                                            <input type='hidden' name='id' value= ".$_SESSION['id'].">
                                            <input type='hidden' name='hash' value='prot'>
                                            <p><input type='submit' name='btnFoto' value='foto'></p>
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
    
    
</body>
</html>