<?php
if (isset($_POST)) {
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
            $errores['passworde']='El nombre no es valido';
        }
        
        $guarda_usuario=false;
        if (count($errores)==0){
        //INSERT USUARIO
            $guarda_usuario=true;
        }else{
            
        }


var_dump($errores);
}