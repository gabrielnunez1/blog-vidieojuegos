<?php

if (isset($_POST)) {
    require_once 'includes/conexion.php';
    if(!isset($_SESSION)){
        session_start();
    }


// : equivale a sino
    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos=isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    
    //array de erros
    $errores=array();
    
    //validar nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
            $nombre_validado=true;
        }else{
            $nombre_validado=false;
            $errores['nombre']='El nombre no es valido';
        }
        //validar apellido
        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)){
            $apellido_validado=true;
        }else{
            $apellidos_validado=false;
            $errores['apellidos']='El apellido no es valido';
        }
        //validar email 
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validado=true;
        }else{
            $email_validado=false;
            $errores['email']='El email no es valido';
        }
        
        $guarda_usuario=false;
        if (count($errores)==0){
            $usuario=$_SESSION['usuario'];
            $guarda_usuario=true;

            //comprobar que el email no existe
            $sql="SELECT id,email from usuarios where email='$email'";
            $isset_email=mysqli_query($db,$sql);
            $isset_user=mysqli_fetch_assoc($isset_email);
            if($isset_user['id']==$usuario['id'] || empty($isset_user)){
                //actualizar USUARIO
                $sql="UPDATE usuarios set ".
                "nombre='$nombre', ".
                "apellidos='$apellidos', ".
                "email='$email' ".
                "WHERE id=".$usuario['id'];

                $guardar=mysqli_query($db, $sql);
                if ($guardar){
                    $_SESSION['usuario']['nombre']=$nombre;
                    $_SESSION['usuario']['apellidos']=$apellidos;
                    $_SESSION['usuario']['email']=$email;

                    $_SESSION['completado']="Tus datos se han actualizado con exito";
                }else{
                    $_SESSION['errores']['general']="Falla al guarda el usuario!!";
                }
            }else{
                $_SESSION['errores']['general']="El usuario ya existe!!";
            }
        }else{
            $_SESSION['errores']=$errores;
          
        }
}


header('Location: mis-datos.php');