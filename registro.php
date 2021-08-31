<?php
     if (isset($_POST)) {
        //Conexion con la BD
        require_once 'includes/conexion.php';
        //Iniciar Session
        if (!isset($_SESSION)) {
            session_start();
        }
        

        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
        $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
        
        $errores = array();
        
        //Validar Nombre
        if (!empty($nombre) && is_string($nombre) && !preg_match("/[0-9]/",$nombre)) {
            $nombre_validado = true;
        }else {$nombre_validado = false; $errores['nombre'] = 'Nombre Invalido'; }
        //Validar Apellido
        if (!empty($apellido) && is_string($apellido) && !preg_match("/[0-9]/",$apellido)) {
            $apellido_validado = true;
        }else {$apellido_validado = false; $errores['apellido'] = 'Apellido Invalido'; }
        //Validar Correo
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_validado = true;
        }else {$email_validado = false; $errores['correo'] = 'Correo Invalido'; }
        // validar Contraseña
        if (!empty($password)){
            $password_validado = true;
        }else {$password_validado = false; $errores['password'] = "La contra esta vacia"; }
}

     $guardar_usuario = false;
     if (count($errores) == 0) {
         //Insertar Usuarios en la tabla usuarios de la bd
         //var_dump($errores);
         $guardar_usuario = true;

         $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
/*Comparar contrasena normal y cifrada
         var_dump($password);
         var_dump($password_segura);
         var_dump(password_verify($password,$password_segura));
         die();
*/
//         $sql = "insert into usuarios values (11,'Carlos','Ledesma','cb.ledesmac@gmail.com','123','2021-08-26');";
    $sql = "insert into usuarios values (null, '$nombre', '$apellido', '$email', '$password_segura', CURDATE());";
    $guardar = mysqli_query($db,$sql);
         
    /*var_dump(mysqli_error($db));
    die();*/

         if ($guardar) {
             $_SESSION['completado'] = 'El Registro se ha completado con exito';
         }else $_SESSION['errores']['general'] = 'Fallo al guardar usuario!!';
         
     }else{
        $_SESSION['errores'] = $errores;
       
     }
   
     header('Location: index.php');
?>