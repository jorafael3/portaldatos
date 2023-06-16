<?php

// require_once "models/logmodel.php";
// require('public/fpdf/fpdf.php');

class activarDatosmodel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }



    function Buscar_inactivos($param)
    {
        $cedula = $param["cedula"];
        // $creado_por = $_SESSION['usuarioID'];
        try {
            $query = $this->db->connect_dobra()->prepare('SELECT  * FROM WEB_CONTACTOS_CLIENTES_ACTDES
            WHERE cedula = :cedula and estado = 1');
            $query->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
                exit();
            } else {
                $err = $query->errorInfo();
                echo json_encode($err);
                exit();
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            echo json_encode($e);
            exit();
        }
    }

    function actualizar_inactivos($param)
    {
        $CONTACTO = $param["CONTACTO"];
        $CEDULA = $param["CEDULA"];
        $FECHA = $param["FECHA"];
        $creado_por = $_SESSION['usuarioID'];
        try {
            $query = $this->db->connect_dobra()->prepare('UPDATE  WEB_CONTACTOS_CLIENTES_ACTDES
            SET
                estado = 0,
                actualizado_por = :actualizado_por,
                fecha_actualizado = :fecha_actualizado
            WHERE contacto = :contacto and cedula = :cedula
            ');
            $query->bindParam(":contacto", $CONTACTO, PDO::PARAM_STR);
            $query->bindParam(":cedula", $CEDULA, PDO::PARAM_STR);
            $query->bindParam(":actualizado_por", $creado_por, PDO::PARAM_STR);
            $query->bindParam(":fecha_actualizado", $FECHA, PDO::PARAM_STR);

            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(true);
                exit();
            } else {
                $err = $query->errorInfo();
                echo json_encode($err);
                exit();
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            echo json_encode($e);
            exit();
        }
    }

    function Validar_contacto($param)
    {
        $cedula = $param["cedula"];
        $medio_id = $param["medio_id"];
        $medio = $param["medio_text"];
        $contacto = $param["contacto"];
        $comentario = $param["comentario"];
        $creado_por = $_SESSION['usuarioID'];
        $ip = $_SESSION['ip'];
        $so = $_SESSION['userAgent'];
        $empresa = $_SESSION['empresa'];
        try {
            $query = $this->db->connect_dobra()->prepare('SELECT  * FROM WEB_CONTACTOS_CLIENTES_ACTDES
            WHERE cedula = :cedula and medio_id = :medio_id');
            $query->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            $query->bindParam(":medio_id", $medio_id, PDO::PARAM_STR);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                $found = false;
                foreach ($result as $user) {
                    if ($user['contacto'] === $contacto) {
                        $found = true;
                        break;
                    }
                }
                if ($found == false) {
                    $G = $this->Guardar_Datos($param);
                } else {
                    echo json_encode($found);
                    exit();
                }
            } else {
                $err = $query->errorInfo();
                echo json_encode($err);
                exit();
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            echo json_encode($e);
            exit();
        }
    }

    function Guardar_Datos($param)
    {
        $cedula = $param["cedula"];
        $medio_id = $param["medio_id"];
        $medio = $param["medio_text"];
        $contacto = $param["contacto"];
        $comentario = $param["comentario"];
        $creado_por = $_SESSION['usuarioID'];
        $ip = $_SESSION['ip'];
        $so = $_SESSION['userAgent'];
        $empresa = $_SESSION['empresa'];
        try {
            $query = $this->db->connect_dobra()->prepare('INSERT INTO WEB_CONTACTOS_CLIENTES_ACTDES
            (
                cedula,
                medio_id,
                medio,
                contacto,
                comentario,
                creado_por,
                ip,
                so,
                empresa
            )values
            (
                :cedula,
                :medio_id,
                :medio,
                :contacto,
                :comentario,
                :creado_por,
                :ip,
                :so,
                :empresa
            )');
            $query->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            $query->bindParam(":medio_id", $medio_id, PDO::PARAM_STR);
            $query->bindParam(":medio", $medio, PDO::PARAM_STR);
            $query->bindParam(":contacto", $contacto, PDO::PARAM_STR);
            $query->bindParam(":comentario", $comentario, PDO::PARAM_STR);
            $query->bindParam(":creado_por", $creado_por, PDO::PARAM_STR);
            $query->bindParam(":ip", $ip, PDO::PARAM_STR);
            $query->bindParam(":so", $so, PDO::PARAM_STR);
            $query->bindParam(":empresa", $empresa, PDO::PARAM_STR);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(["Datos guardados", 1]);
                exit();
            } else {
                $err = $query->errorInfo();
                echo json_encode($err);
                exit();
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            echo json_encode($e);
            exit();
        }
    }
}
