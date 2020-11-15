<?php
//iniciar la sesión y la conexion a la base de datos
require_once 'includes/conexion.php';


//recoger los datos del formulario
if(isset($_POST)){
    //borrar error antiguo
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }
    //recoger datos del formulario
    $email=trim($_POST['email']);
    $password=$_POST['password'];

    //consulata para comprobar las credenciales del usuario
    $sql="SELECT * FROM usuarios where email='$email' LIMIT 1";
    $login=mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login)==1){
        $usuario=mysqli_fetch_assoc($login);
        //comprobar la contraseña
        $verify=password_verify($password,$usuario['password']);

        if($verify){
            //utilizar una session para guardar los datos del usuario logeado
            $_SESSION['usuario']=$usuario;

        }else{
            // si algo falla enviar una sesion con el fallo
            $_SESSION['error_login']="Login incorrecto";
        }

    }else{
        //mensaje de error
        $_SESSION['error_login']="Login incorrecto";

    }
  
}

// redirigir al index.php
header('Location: index.php');