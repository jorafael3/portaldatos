<?php


class Principal extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }
    function render()
    {
        $this->view->render('principal/nuevo');
    }


    function Cargar_Datos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Cargar_Datos($array);
        //$this->CrecimientoCategoriasIndex();
    }
    function Cargar_Datos_Llenos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Cargar_Datos_Llenos($array);
        //$this->CrecimientoCategoriasIndex();
    }
    function Nueva_Carga()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Nueva_Carga($array);
        //$this->CrecimientoCategoriasIndex();
    }
    function Actualizar_Carga()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Actualizar_Carga($array);
        //$this->CrecimientoCategoriasIndex();
    }

    function Buscar_Importacion()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Buscar_Importacion($array);
        //$this->CrecimientoCategoriasIndex();
    }
    function Buscar_Liquidacion()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Buscar_Liquidacion($array);
        //$this->CrecimientoCategoriasIndex();
    }

    function closeSession()
    {

      
        session_start();
        $_SESSION = array();
        session_unset();
        session_destroy();
        session_start();
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        session_regenerate_id(true);
        header("Location: ../");
        die();
    }
}
