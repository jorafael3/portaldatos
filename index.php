<?php
require_once "libs/database.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/app.php";
require_once "config/config.php";
include_once 'includes/user.php';
include_once 'includes/user_session.php';

// require_once('../boardcomputronsa2.php');


$userSession = new User_Session();
$user = new User();
// echo $_SESSION["usuario"];
$data = new Database();
if ($data->connect_dobra()) {
    //echo "true";
    if (isset($_SESSION['iniciosesion']) == 1) {

        /* if ($_SESSION['userAgent'] !== $_SERVER['HTTP_USER_AGENT']) {
             http_response_code(403);       
             die;
         }
         if (empty($_SESSION['usuarioID'])) {
             http_response_code(403);    
             die;
         }else{
            
         }*/
        $app = new App();
    } else if (isset($_POST['cedula']) && isset($_POST['password'])) {

        try {
            $usuario = $_POST['cedula'];
            $passForm = $_POST['password'];
            $empresa = $_POST['empresa'];

            if ($usuario == '') {
                $errorlogin = "Debe Escribir un numero de cédula";
                include_once 'views/login/login.php';
            } else if ($passForm == "") {
                $errorlogin = "Debe Escribir una contraseña";
                include_once 'views/login/login.php';
            } else if ($empresa == 0) {
                $errorlogin = "Debe seleccionar empresa";
                include_once 'views/login/login.php';
            } else {
                $res = $user->userExist($usuario, $passForm, $empresa);
                //  $level = $userlevel->validate($res);
                // $decode = $user->JwtDecode($res);
                // $returnArray = $decode[0]["userId"];
                // var_dump($res);
                //exit();
                if ($res[1] == true) {
                    $app = new App();
                } else {
                    $errorlogin = $res[0];
                    include_once 'views/login/login.php';
                }
            }
        } catch (Exception $e) {
        }
    } else if (isset($_POST["Registrarse_b"])) {
        $usuario = $_POST['cedula_r'];
        $passForm = $_POST['password_r'];
        $confirm_password = $_POST['confirm_password'];
        $empresa = $_POST['empresa'];
        if ($usuario == '') {
            $errorlogin = "Debe Escribir un numero de cédula";
            include_once 'views/login/login.php';
        } else if ($passForm == "") {
            $errorlogin = "Debe Escribir una contraseña";
            include_once 'views/login/login.php';
        } else if ($empresa == 0) {
            $errorlogin = "Debe seleccionar empresa";
            include_once 'views/login/login.php';
        } else {
            if (trim($passForm) == trim($confirm_password)) {
                $res = $user->userRegister($usuario, $passForm, $empresa);
                if ($res[1] == 0) {
                    $errorlogin = $res[0];
                } else {
                    $success_log = $res[0];
                }
            } else {
                $errorlogin = "La contraseña no coincide";
                include_once 'views/login/login.php';
            }
        }

        include_once 'views/login/login.php';
    } else {
        include_once 'views/login/login.php';
    }
} else {
    //include_once 'views/errores/500.php';
}
