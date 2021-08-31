<?php
     //Iniciar la session y la conexion a la bd
     require_once 'includes/conexion.php';

    if (isset($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql  = "select * from usuarios where email = '$email'";
        $login  = mysqli_query($db,$sql);
        //validar que existe el correo
        if($login && mysqli_num_rows($login) == 1){
            $usuario = mysqli_fetch_assoc($login);
            
            $verify = password_verify($password, $usuario['password']);
            //Validar la password
            if ($verify) {
                $_SESSION['usuarios'] = $usuario;
                if (isset($_SESSION['error-login'])) {
                    unset($_SESSION['error-login']);
                }
        }else{
            $_SESSION['error-login'] = "Password Incorrecto";
        }
    }else $_SESSION['error-login'] = "Correo Invalido";
    /*var_dump($_SESSION['error-login']);
    var_dump($usuario);
    var_dump($_SESSION['usuarios']['nombre']);
    die();*/

}


header('Location: index.php');
?>