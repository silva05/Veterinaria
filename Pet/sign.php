<?php

    session_start();
    $con=mysqli_connect("localhost","root","", "perruno");

    if(!$con) {
        die("Error de conexion: ".mysqli_connect_error());
    }

    $v1 = $_REQUEST['nombre'];
    $v2 = $_REQUEST['correo'];
    $v3 = $_REQUEST['contraseña'];
    $v4 = $_REQUEST['telefono'];
    $v5 = $_REQUEST['cargo'];
    $v6 = $_REQUEST['fechaNacimiento'];
    $v7 = $_REQUEST['email'];
    $v8 = $_REQUEST['registro'];
    
    $v9 = $_REQUEST['usu'];
    $v10 = $_REQUEST['con'];

    if (isset($_REQUEST['registrar'])){
        
        $reg_Email='/^[a-z0-A-Z9]+$Z/';
        $reg_Pass='/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])[A-Za-z0-9]-{8,}+$/';

        if(!preg_match($reg_Email,$v2) || !preg_match($reg_Pass,$v3)){
            //header("location: login.html");
            echo '<script language="javascript">alert("Utiliza al menos 8 Caracteres");
                window.location.href="login.html"
            </script>';
        }
        
        $hash=password_hash($v3,PASSWORD_DEFAULT);
        $squeryregistrar = "INSERT INTO vet (nombre, correo, contraseña, telefono, cargo, direccion, fechaNacimiento, registro) VALUES ('$v1', '$v2', '$hash','$v4', '$v5', '$v6','$v7', '$v8')";

        if (mysqli_query($con,$squeryregistrar)){
            header("location: login.html");
            exit;
        }else{
            echo "Error al inscribirse";
            header("location: login.html");
            exit;
        }
    }


    if (isset($_REQUEST['loguear'])){
        $squeryusu = mysqli_query($con,"SELECT * FROM vet WHERE nombre ='$v9'");
        $nr = mysqli_num_rows($squeryusu);
        $buscar = mysqli_fetch_array($squeryusu);

        if (($nr==1)&&(password_verify($v10,$buscar['contraseña']))){
            $_SESSION['user']=$v9;
            if($v9=='admin'){
                header("location: Admin.php");
                exit;
            }
            echo "<p>Te logueaste!! </p>";
            header("location: indexPerro.php"); //header("location: Opciones.php");
        }else{
            echo '<script language="javascript">alert("Usuario o contraseña incorrecto");
            window.location.href="login.html"
            </script>';
        }
    }


    /*$s = " select * from vet where email ='$v1' ";
    $t = " select * from vet where usuario ='$v2' ";

    $result = mysqli_query($con,$s);
    $resulta = mysqli_query($con,$t);

    $num = mysqli_num_rows($result);
    $num1 = mysqli_num_rows($resulta);

    if($num==0 and $num1==0){
        $reg="INSERT INTO vet (email, usuario, contra) VALUES ('$v1', '$v2', '$hash')";
        $resultado=mysqli_query($con,$reg);
        if(!$resultado){
            echo "Error al inscribirse";
            header("location: login.html");
            exit;
        }else{
            echo "<p>Ok, datos ingresados </p>";
            header("location: login.html");
            exit;
        }
    }*/
?>