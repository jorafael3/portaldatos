<?php

// require_once "models/logmodel.php";
// require('public/fpdf/fpdf.php');

class DesactivarDatosmodel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function Validar_Registrado($param)
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
            WHERE contacto = :contacto ');
            $query->bindParam(":contacto", $contacto, PDO::PARAM_STR);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                if (count($result) > 0) {
                    if ($result[0]["estado"] == 1) {
                        echo json_encode(["El Contacto ya esta registrado y desactivado", 0]);
                        exit();
                    } else {
                        $act = $this->actualizar_inactivos($param);
                        echo json_encode($act);
                        exit();
                    }
                } else {
                    $val = $this->Validar_contacto($param);
                }
                // echo json_encode($found);
                // exit();
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
        $CONTACTO = $param["contacto"];
        $CEDULA = $param["cedula"];
        $medio = $param["medio_id"];
        $comentario = $param["comentario"];
        // $creado_por = $_SESSION['usuarioID'];
        try {
            $query = $this->db->connect_dobra()->prepare('UPDATE WEB_CONTACTOS_CLIENTES_ACTDES
                SET
                    estado = 1,
                    comentario = :comentario
                WHERE contacto = :contacto and cedula = :cedula and medio_id = :medio_id
            ');
            $query->bindParam(":contacto", $CONTACTO, PDO::PARAM_STR);
            $query->bindParam(":cedula", $CEDULA, PDO::PARAM_STR);
            $query->bindParam(":medio_id", $medio, PDO::PARAM_STR);
            $query->bindParam(":comentario", $comentario, PDO::PARAM_STR);

            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return ["Datos Guardados", 1];
            } else {
                $err = $query->errorInfo();
                return [$err, 0];
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
