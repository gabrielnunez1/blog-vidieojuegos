<?php
if(isset($_POST)){
    //conexion a la base de datos
    require_once 'includes/conexion.php';

    $titulo=isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
    $descripcion=isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']) : false;
    $categoria=isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario=$_SESSION['usuario']['id'];

    $errores=array();
    
    //validar titulo
        if(!empty($titulo)){
            $titulo_validado=true;
        }else{
            $titulo_validado=false;
            $errores['titulo']='El titulo no es valido';
        }

        if(!empty($descripcion)){
            $descripcion_validado=true;
        }else{
            $descripcion_validado=false;
            $errores['descripcion']='La descripcion no es valida';
        }

        if(!empty($categoria) && is_numeric($categoria)){
            $categoria_validado=true;
        }else{
            $categoria_validado=false;
            $errores['categoria']='La categoria no es valida';
        }

        if(count($errores)==0){
            $sql = "INSERT INTO entradas VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
            $guardar=mysqli_query($db,$sql);
            header('Location: index.php');

        }else{
            $_SESSION['errores_entrada']=$errores;
            header('Location: crear-entradas.php');
        }
}
