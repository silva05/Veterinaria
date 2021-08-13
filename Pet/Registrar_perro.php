<?php
    //conexion a la Base de datos (Servidor,usuario,password)
    $conexion = mysqli_connect("localhost","root","", "perruno");
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    
    if(!$conexion) {
        die("Error de conexion: ".mysqli_connect_error());
    }

    // foto
    

    // if(isset($nameFile) && $nameFile!=""){
    //     $tipo=$_FILES['Foto']['type'];
    //     $temp=$_FILES['Foto']['tmp_name'];
    // }

    // $foto=addslashes(file_get_contents($_REQUEST['Foto']));

    //capturando datos
    $v1 = $_REQUEST['Codigo'];
    $v2 = $_REQUEST['Nombre'];
    $v3 = $_REQUEST['Raza'];
    $v4 = $_REQUEST['Genero'];
    $v5 = $_REQUEST['FechNac'];
    
    // $v6 = $foto;
    //conuslta SQL
    $sql ="INSERT INTO perro (DNI, Nombre, Raza, Genero, FechaNacimiento) VALUES ('$v1', '$v2', '$v3', '$v4', '$v5')";
    
    // $v6 = $_REQUEST['Foto'];
    //Mensaje de conformidad
    $resultado= mysqli_query($conexion, $sql);
    if(!$resultado){
        echo 'Error al registrarse';
    }else{
        echo "<p>Ok, datos ingresados </p>";
    }
    
?>