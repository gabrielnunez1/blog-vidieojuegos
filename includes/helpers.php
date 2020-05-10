<?php
function mostrarError($errores, $campo){
    $alerta='';
    if (isset($errores[$campo]) && !empty($campo)){
        $alerta="<div class='alerta alerta errores'></div>".$errores[$campo]."</div>";
    }
    return $alerta;
}



function borrarErrores(){

        $_SESSION['errores']=null;
        $_SESSION['completado']=null;
        unset($_SESSION['errores']);
     
     
}
?>