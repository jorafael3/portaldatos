<?php


class DesactivarDatos extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    function render()
    {
        $this->view->render('principal/desactivar');
    }
    function Guardar_Datos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $Ventas =  $this->model->Validar_Registrado($array);
        //$this->CrecimientoCategoriasIndex();
    }
}
