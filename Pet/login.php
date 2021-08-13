<?php

    session_start();
    $con=mysqli_connect("localhost","root","", "perruno");

    if(!$con) {
        die("Error de conexion: ".mysqli_connect_error());
    }

    
    $v2 = $_REQUEST['usu'];
    $v3 = $_REQUEST['con'];
    $hash=password_hash($v3,PASSWORD_DEFAULT,['cost'=>10]);

    $t = " select * from vet where usuario ='$v2' && contra = '$hash'";

    $resulta = mysqli_query($con,$t);
    $num1 = mysqli_num_rows($resulta);

    if($num1==0){
        $_SESSION['user']=$v2;
        if($v2=='admin'){
            header("location: Admin.php");
            exit;
        }
        echo "<p>Te logueaste!! </p>";
        header("location: indexPerro.html"); //header("location: Opciones.php");
    }else{
        echo "<p>No existes :c </p>";
    }
    
?>