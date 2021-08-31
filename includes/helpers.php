<?php
     /*function error(){
        $err=false;
        if (!isset($_SESSION['errores']))
         $err = true;
         return $err;
        }
     
     function error1(){
         return $_SESSION['errores'];
     }
     function error2($campo){
        return $_SESSION['errores']['campo'];
        }
     

     function mostrarError2($campo){
        $alerta = '';
        if (isset($_SESSION['errores']) && !empty($campo)){
            $alerta = "<div class='alert alert-error'>".error2($campo).'</div>';
    }
    return $alerta;
    }
*/
function mostrarError($errores, $campo){
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alert alert-error'>".$errores[$campo].'</div>';
}
return $alerta;
}


function borrarErrores(){
    //$_SESSION['errores'] = null;
    if (isset($_SESSION['errores'])) {
        unset($_SESSION['errores']);
    }
    
    if (isset($_SESSION['completado'])) {
        unset($_SESSION['completado']);
    }
    
   // return $borrado;
}
?>