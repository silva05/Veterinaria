<?php
    
    //conexion a la Base de datos (Servidor,usuario,password)
    $conexion =  mysqli_connect("localhost", "root","", "perruno");
    if (!$conexion) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
    
    //capturando datos
    $v2 = $_REQUEST['Nombre'];
    
    //conuslta SQL
    $sql = ("select * from Perro where Nombre like '".$v2."'");
    
    //cuantos reultados hay en la buesqueda
    $result = mysqli_query($conexion, $sql);
    $num_resultados = mysqli_num_rows($result);
    echo "<p>Número de perros encontrados: ".$num_resultados."</p>";
    
    //mostrando informacion de los perros y detalle
    for ($i=0; $i <$num_resultados; $i++) {
        $row =  mysqli_fetch_array($result); 
        echo ($i+1);
        echo " DNI : ".$row["DNI"];
        echo " </br>Nombre : ".$row["Nombre"];
        echo " </br>Raza : ".$row["Raza"] ;
        echo " </br>Genero : ".$row["Genero"];
        echo " </br>Nacio en : ".$row["FechaNacimiento"];
        echo"</p>";
    }
?>