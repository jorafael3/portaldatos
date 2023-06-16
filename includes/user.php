<?php
require_once 'libs/database.php';

//include_once 'models/usuario.php';
class User extends Model
{

    public $nombre;
    public $username;


    function uss($user, $contra)
    {
        $userVendedor = "empleado@computron.com";
        $userVendedorpass = "empleado123";
        $userVendedoracc = 7;

        $userAdmin = "admin@computron.com";
        $userAdminpass = "admin123";
        $userAdminacc = 2;

        $userMaster = "master@computron.com";
        $userMasterpass = "master123";
        $userMasteracc = 1;

        if (($user == $userVendedor && $userVendedorpass == $contra)) {
            $_SESSION['CompuRankSession'] = 1;
            $_SESSION['userAcces'] = $userVendedoracc;
            $_SESSION['userName'] = "Vendedor";
            return "ok";
        } else if (($user == $userAdmin && $userAdminpass == $contra)) {
            $_SESSION['CompuRankSession'] = 1;
            $_SESSION['userAcces'] = $userAdminacc;
            $_SESSION['userName'] = "Admin";
            return "ok";
        } else if (($user == $userMaster && $userMasterpass == $contra)) {
            $_SESSION['CompuRankSession'] = 1;
            $_SESSION['userAcces'] = $userMasteracc;
            $_SESSION['userName'] = "Master";
            return "ok";
        } else {
            return "err";
        }
    }

    function userExist($user, $pass, $empresa)
    {
        try {
            $usu = "";
            $sql = "SELECT
                Cédula as cedula,
                ID,
                contrasena_portal_datos,
                Nombre 
                from EMP_EMPLEADOS with(nolock)
                where 
                Anulado = 0 
                and Nombre 
                not like '%**%' 
                and Cédula = :cedula
            ";
            if ($empresa == 2) {
                $sql = "SELECT
                Cédula as cedula,
                ID,
                contrasena_portal_datos,
                Nombre 
                from COMPUTRONSA..EMP_EMPLEADOS with(nolock)
                where 
                Anulado = 0 
                and Nombre 
                not like '%**%' 
                and Cédula = :cedula
            ";
            }

            $query = $this->db->connect_dobra()->prepare($sql);
            $query->bindParam(':cedula', $user);

            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                if (count($result) > 0) {
                    $cedula   = $result[0]['cedula'];
                    $contrasena_portal_datos = $result[0]['contrasena_portal_datos'];
                    $Nombre = $result[0]['Nombre'];
                    $ID = $result[0]['ID'];
                    // echo ($usu);
                    //echo ($estado);
                    if (trim($contrasena_portal_datos) == trim($pass)) {
                        $_SESSION['iniciosesion'] = true;
                        $_SESSION['UsuarioCed'] = $usu;
                        $_SESSION['usuarioID'] = $ID;
                        $_SESSION['usuNombre'] = $Nombre;
                        $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
                        $_SESSION['ip'] = $this->getRealIP();
                        if ($empresa == 1) {
                            $_SESSION['empresa'] = 'CARTIMEX';
                        } else {
                            $_SESSION['empresa'] = 'COMPUTRON';
                        }
                        return [true, 1];
                    } else {
                        return ["Contraseña no valida", 0];
                    }
                } else {
                    return ["usuario no encontrado", 0];
                }
            } else {
                $err = $query->errorInfo();
                return [$err, 0];
                //exit();
            }
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }

    function userRegister($user, $pass, $empresa)
    {
        try {
            $usu = "";
            $sql = "SELECT
                    Cédula as cedula,
                    ID,
                    contrasena_portal_datos,
                    Nombre 
                    from EMP_EMPLEADOS with(nolock)
                    where 
                    Anulado = 0 
                    and Nombre 
                    not like '%**%' 
                    and Cédula = :cedula";
            if ($empresa == 2) {
                $sql = "SELECT
                Cédula as cedula,
                ID,
                contrasena_portal_datos,
                Nombre 
                from COMPUTRONSA..EMP_EMPLEADOS with(nolock)
                where 
                Anulado = 0 
                and Nombre 
                not like '%**%' 
                and Cédula = :cedula";
            }

            $query = $this->db->connect_dobra()->prepare($sql);
            $query->bindParam(':cedula', $user);

            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                if (count($result) > 0) {
                    if ($result[0]["contrasena_portal_datos"] == "" || $result[0]["contrasena_portal_datos"] == null) {
                        $REG = $this->Guardar_usuario($user, $pass, $empresa);
                        return $REG;
                    } else {
                        return ["El usuario ya esta registrado", 0];
                    }
                } else {
                    return ["El número de cedula no esta registrado como empleado", 0];
                }
                // if (count($result) > 0) {
                //     $cedula   = $result[0]['cedula'];
                //     $contrasena_portal_datos = $result[0]['contrasena_portal_datos'];
                //     $Nombre = $result[0]['Nombre'];
                //     $ID = $result[0]['ID'];
                //     // echo ($usu);
                //     //echo ($estado);
                //     if (trim($usu) == trim($cedula) && trim($contrasena_portal_datos) == trim($pass)) {
                //         $_SESSION['iniciosesion'] = true;
                //         $_SESSION['UsuarioCed'] = $usu;
                //         $_SESSION['usuarioID'] = $ID;
                //         $_SESSION['usuNombre'] = $Nombre;
                //         $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
                //         $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                //     } else {
                //         return true;
                //     }
                // } else {
                //     echo "error";
                //     return false;
                // }
            } else {

                //exit();
            }
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }

    function Guardar_usuario($user, $pass, $empresa)
    {
        try {
            $usu = "";
            $sql = "UPDATE EMP_EMPLEADOS SET
            contrasena_portal_datos = :contrasena_portal_datos
            where Cédula = :cedula";
            if ($empresa == 2) {
                $sql = "UPDATE COMPUTRONSA..EMP_EMPLEADOS SET
                contrasena_portal_datos = :contrasena_portal_datos
                where Cédula = :cedula";
            }

            $query = $this->db->connect_dobra()->prepare($sql);
            $query->bindParam(':contrasena_portal_datos', $pass);
            $query->bindParam(':cedula', $user);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return ["Usuario Registrado", 1];
            } else {
                return ["Error al registrar", 0];

                //exit();
            }
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }



    public function Intentos()
    {
        try {
            $usuarioId = "";
            $query = $this->db->connect()->prepare("{ CALL CSD_Login_user (?,?)}");
            $query->bindParam(1, $usuarioId, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
        }
    }



    function closeSession()
    {

        echo "adsdawdawd";
    }

    function getRealIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        return $_SERVER['REMOTE_ADDR'];
    }
}
