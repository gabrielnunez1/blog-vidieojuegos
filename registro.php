<?php

if (isset($_POST)) {
    require_once 'includes/conexion.php';
    session_start();
    

    $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellido=isset($_POST['apellido']) ? $_POST['apellido'] : false;
    $email=isset($_POST['email']) ? $_POST['email']:false;
    $password= isset($_POST['password']) ? $_POST['password']:false;

    $errores=array();
        //validar nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
            $nombre_validado=true;
        }else{
            $nombre_validado=false;
            $errores['nombre']='El nombre no es valido';
        }
        //validar apellido
        if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/",$apellido)){
            $apellido_validado=true;
        }else{
            $apellido_validado=false;
            $errores['apellido']='El apellido no es valido';
        }
        //validar email 
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validado=true;
        }else{
            $email_validado=false;
            $errores['email']='El email no es valido';
        }
        //validar password
        if(!empty($password)){
            $password_validado=true;
        }else{
            $password_validado=false;
            $errores['password']='El nombre no es valido';
        }
        
        $guarda_usuario=false;
        if (count($errores)==0){
            //INSERT USUARIO
            $guarda_usuario=true;
            //cifrar password
            $password_segura=password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
            $sql='insert into usuarios values(null, $apellido,$nombre,email,password, CURDATE();';
            $guardar=mysqli_query($db, $sql);
            if ($guardar){
                $_SESSION['completado']="el registro se ha completado";
            }else{
                $_SESSION['errores']['general']="falla al guarda el usuario!!";
            }


        }else{
            $_SESSION['errores']=$errores;
          
        }
}
  header('Location: index.php');