<?php
    
    session_start();
    error_reporting(0); 
    
    $varsesion = $_SESSION['username'];   
    $varsesion3 = $_SESSION['apellido'];
    $varsesion2 = $_SESSION['ide'];
    
    
    if($varsesion == null || $varsesion = ''){
        echo 'Debes iniciar sesión para entrar aqui';
        die();
    }?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="newstyle.css">
</head>

<body>
	<header>
        <nav class="nav">           
            <ul class = "menu">
                    <li><a href="javascript:abrirperfil()">Perfil   </a></li> 
                    <li><a href="javascript:veranalitycs()">Datos Estadisticos   </a></li>
                    <li><a href="javascript:mostrarmensajes()">Dashboard   </a></li>                      
                    <li><a href="javascript:cargarruv()">Cargar Ruv   </a></li> 
                    <!--<li><a href="javascript:pedircita()">Pedir Cita</a></li>	-->
                    <li><a href="./salir.php">Cerrar Sesión   </a></li> 
                </ul> 
        </nav>
    </header>

	<div class="capa"></div>
<!--	--------------->
    <div class="ventana1" id="perfil">
        <div id="cerrarw">
            <a href="javascript:cerrar()"><img class ="cerrarw" src="cerrar-ventana.png"></a>
       </div>             
       <!--<div class="logo"> 
                <h3 class="label">Bienvenido <?php echo $_SESSION['username']?></h3>
            </div>            -->
            <form action="guardarimagen.php" class="formpredio" method="POST" enctype="multipart/form-data">
                <div class="username">
                    <label>Bienvenido <?php echo $_SESSION['username']." ".$_SESSION['apellido']?></label>
                    <label>Identificación: <?php echo $_SESSION['ide']?></label>
                </div>
                
                <div class="espaciofoto">
                    <table>
                        <tr>
                           
                        </tr>
                        <?php  
                            include 'conexionphpazure.php';
                            $queryimg = mysqli_query($conexion, "select fotopredio from Predio where fkusuariopredio = '$varsesion2'");
                            $imgis = mysqli_num_rows($queryimg);
                            if($imgis>0){
                                while($data = mysqli_fetch_array($queryimg)){
                                    ?>
                                    <tr>
                                        <img src="data:image/jpg;base64, <?php echo base64_encode($data['fotopredio'])?>" class="foto">                      
                                    </tr>
                                <?php }
                            }
                        ?>                          
                    </table>
                  </div>

                <div class="botoncargafoto">
                    <input type="file" name="findfoto" class="findfoto">
                </div>          
                
                    <div class="ingresodeganado">                   
                    <h1 class="titulo">DATOS DEL PREDIO</h1>
                        <label for="">Terneras Menores 1 año</label>
                        <input type="text" class="inputs" name="terneras1" required>              
                        <label for="">Terneros Menores 1 año</label>         
                        <input type="text" class="inputs" name="terneros1" required>      
                        <label for="">Hembras 1 - 2 año</label>                  
                        <input type="text" class="inputs" name="hembras1" required>
                        <label for=""> Machos 1 - 2 años</label>
                        <input type="text" class="inputs" name="machos1" required>
                        <label for="">Hembras 2 - 3 años</label>
                        <input type="text" class="inputs" name="hembras2" required>
                        <label for="">Machos 2 - 3 años</label>
                        <input type="text" class="inputs" name="machos2" required>
                        <label for="">Hembras Mayores 3 años</label>
                        <input type="text" class="inputs" name="hembras3" required>
                        <label for="">Machos Mayores 3 años</label>
                        <input type="text" class="inputs" name="machos3" required>  
                        <label for="">Año de carga</label>
                        <input type="text" class="inputs" name="anho1" required>  
                        <label for="">Identificacion dueño</label>
                        <input type="label" name="ide" class="inputs"></input>
                    </div>            

                    <div class="insertarpre">
                        <br>
                        <h1>PERFIL GANADERO</h1>   
                        <br>
                        <label for="">Digita la identificación de tu predio:</label>
                        <input type="number" class="inputs" name="idPredio" required>
                        <label for="">Digita el nombre de tu predio:</label>
                        <input type="text" class="inputs" name="nombrePredio" required>
                        <label for="">Digita la vereda de tu predio:</label>
                        <input type="text" class="inputs" name="NombreVereda" required>
                        <label for="">Digita la marca de tu predio:</label>
                        <input type="text" class="inputs" name="marcaPredio" required>
                        <label for="">Selecciona el municipio del predio:</label>
                        <select class="inputs" name="municipiois" required>   
                            <option value="0">Selecciona el Municipio</option>
                            <option value="1">Florencia</option>
                            <option value="2">Doncello</option>  
                            <option value="3">Albania</option>
                            <option value="4">Cartagena del Chairá</option>
                            <option value="5">Paujil</option>  
                            <option value="6">San Vicente</option> 
                            <option value="7">Puerto Rico</option> 
                        </select>
                        <br>
                        <br>
                    </div>
                    <button type="submit" class="button" onClick="window.alert('Inventario Guardado');">Guardar</button>    
            </form> 
    </div>
    <div class="ventana1" id="mensajes">
        <div id="cerrarw">
            <a href="javascript:cerrar()"><img class ="cerrarw" src="cerrar-ventana.png"></a>
        </div>
            <div class="grafica">
                <BR></BR>
                <!--<h1>DATOS PROYECTADOS 2023</h1>-->
                <BR></BR>
                <iframe title="total" width="1140" height="620" src="https://app.powerbi.com/reportEmbed?reportId=f3d331e7-79f7-47a3-a3a3-86482b3f79c6&autoAuth=true&ctid=64ebc78e-0a5f-44e1-a504-5713eff64b33" frameborder="0" allowFullScreen="true"></iframe>
                </div>        
    </div>        
    <div class="ventana1" id="analitycs">
        <div id="cerrarw">
            
            <a href="javascript:cerrar()"><img class ="cerrarw" src="cerrar-ventana.png"></a>       
        </div>
        <!--<h1>Datos Nacionales</h1>-->
        <div class="tabla">
            <div class="wrapper">
                <table  id="mitabla" class="tablainformacion" style="width:98%">
                    <thead>
                    <tr class="th">
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Codigo</th>
                        <th>Terneras Menores 1 año</th>
                        <th>Terneros Menores 1 año</th>
                        <th>Hembras 1 - 2 años</th>
                        <th>Machos 1 - 2 años</th>
                        <th>Hembras 2 - 3 años</th>
                        <th>Machos 2 - 3 años</th>
                        <th>Hembras Mayores 3 años</th>
                        <th>Machos Mayores 3 años</th>
                        <th>Total Ganado</th>
                    </tr>
                    <?php
                            include 'conexionphpazure.php';
                            $sql="select * from excel order by dpto asc";
                            $result=mysqli_query($conexion, $sql);
                            while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $mostrar['dpto']?></td>
                        <td><?php echo $mostrar['muni']?></td>
                        <td><?php echo $mostrar['codigo']?></td>
                        <td><?php echo $mostrar['terneras']?></td>
                        <td><?php echo $mostrar['terneros']?></td>
                        <td><?php echo $mostrar['hembras']?></td>
                        <td><?php echo $mostrar['machos']?></td>
                        <td><?php echo $mostrar['hmayores']?></td>
                        <td><?php echo $mostrar['mmayores']?></td>
                        <td><?php echo $mostrar['hembrasadultas']?></td>
                        <td><?php echo $mostrar['machosadultos']?></td>
                        <td><?php echo $mostrar['total']?></td>                        
                    </tr>
                    <?php } ?>
                </thead>
            </table>          
            </div>            
        </div>  
        
    </div>
    <div class="ventana1" id="ruv">
        <div id="cerrarw">
            <a href="javascript:cerrar()"><img class ="cerrarw" src="cerrar-ventana.png"></a>
        </div>
        <form action="actualizarruv.php" method="POST" class="tablaruv">
        <div class="wrapper">
                <table  id="mitabla" class="tablainformacion" style="width:98%">
                 <label class="labelruv">TUS PREDIOS REGISTRADOS</label>  
                    <thead>
                    <tr class="th">
                        <th>Identificación Predio</th>
                        <th>Nombre del predio</th>
                        <th>Nombre de la Vereda</th>
                        <th>Marca del predio </th>
                        <th>Terneras Menores 1 año</th>
                        <th>Terneros Menores 1 año</th>
                        <th>Hembras 1 - 2 años</th>
                        <th>Machos 1 - 2 años</th>
                        <th>Hembras 2 - 3 años</th>
                        <th>Machos 2 - 3 años</th>
                        <th>Hembras Mayores 3 años</th>
                        <th>Machos Mayores 3 años</th>
                        <th>Año</th>
                        <th>Registro V</th>    
                        <th>Cita   </th>  
                    <?php
                           include 'conexionphpazure.php';
                           $sqlpredio="select * from Predio where fkusuariopredio = '$varsesion2'";
                           $resultpredio=mysqli_query($conexion, $sqlpredio);
                           while($mostrarpredio=mysqli_fetch_array($resultpredio)){
                    ?>
                    <tr>
                        <td><?php echo $mostrarpredio['idPredio']?></td>
                        <td><?php echo $mostrarpredio['nombrePredio']?></td>
                        <td><?php echo $mostrarpredio['nombreVereda']?></td>
                        <td><?php echo $mostrarpredio['marcaPredio']?></td>
                        <td><?php echo $mostrarpredio['terneras']?></td>
                        <td><?php echo $mostrarpredio['terneros']?></td>
                        <td><?php echo $mostrarpredio['hembras']?></td>
                        <td><?php echo $mostrarpredio['machos']?></td>
                        <td><?php echo $mostrarpredio['hmayores']?></td>
                        <td><?php echo $mostrarpredio['mmayores']?></td>
                        <td><?php echo $mostrarpredio['hembrasadultas']?></td>
                        <td><?php echo $mostrarpredio['machosadultos']?></td>
                        <td><?php echo $mostrarpredio['anho']?></td>
                        <td><?php echo $mostrarpredio['ruv']?></td>    
                        <td><button type="button" class="botoncita" value="saludo" onClick="window.alert('Su cita a sido agendada, revisa tu correo electronico registrado');"> Cita   </button></td>                      
                    </tr>                   
                
                    <?php } ?>
                </thead>
            </table>          

            <div class="enviarinfo">
                 <label class="labelruv">¿Ya Vacunaste? Ingresa aqui tu RUV: </label>  
                 <input type="text" name="ruv" class="inputruv" placeholder="Digita tu RUV">   
                 <input type="text" class="inputruv" placeholder="Digita el Id del predio">  
                 <input type="text" class="inputruv" name="ide" placeholder="Identificación del propietario">  
                 <button type="submit" class="botonruv">Guardar RUV</button>
                
            </div>
                 
            </div>  
    </div>
        </form>
        
        
    <div class="ventana1" id="citas">
        <div id="cerrarw">
            <a href="javascript:cerrar()"><img class ="cerrarw" src="cerrar-ventana.png"></a>
        </div>
        <h1>citas</h1>
    </div>

    <!--<input type="checkbox" id="btn-menu">
    <div class="container-menu">
	    <div class="cont-menu">
 
            <nav>
                <a href="javascript:abrirperfil()">Perfil</a>
			    <a href="javascript:mostrarmensajes()">Mensajes</a>
			    <a href="javascript:veranalitycs()">Datos Estadisticos</a>
			    <a href="javascript:cargarruv()">Cargar Ruv</a>
                <a href="javascript:pedircita()">Pedir Cita</a>			
	    	</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div> -->

<script>
    function abrirperfil(){
        document.getElementById("perfil").style.display="block"
    }

    function mostrarmensajes(){
        document.getElementById("mensajes").style.display="block"
    }

    function veranalitycs(){
        document.getElementById("analitycs").style.display="block"
    }

    function cargarruv(){
        document.getElementById("ruv").style.display="block"
    }

    function pedircita(){
        document.getElementById("citas").style.display="block"
    }

    function cerrar(){
        document.getElementById("perfil").style.display="none";
        document.getElementById("mensajes").style.display="none";
        document.getElementById("analitycs").style.display="none";
        document.getElementById("ruv").style.display="none";
        document.getElementById("citas").style.display="none";
    }
</script>
</body>
</html>